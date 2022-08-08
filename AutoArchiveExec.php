<?php
// Copyright (C) 2012-2018 Combodo SARL
//
//   This program is free software; you can redistribute it and/or modify
//   it under the terms of the GNU General Public License as published by
//   the Free Software Foundation; version 3 of the License.
//
//   This program is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU General Public License for more details.
//
//   You should have received a copy of the GNU General Public License
//   along with this program; if not, write to the Free Software
//   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA


/**
 * Module combodo-autoarchive
 *
 * @author      Erwan Taloc <erwan.taloc@combodo.com>
 * @author      Romain Quetiez <romain.quetiez@combodo.com>
 * @author      Denis Flaven <denis.flaven@combodo.com>
 * @author      Guillaume Lajarige <guillaume.lajarige@combodo.com>
 * @license     http://www.opensource.org/licenses/gpl-3.0.html LGPL
 */


/**
 * Class AutoArchiveExec
 */
class AutoArchiveExec extends AbstractWeeklyScheduledProcess
{
	const MODULE_SETTING_DEBUG = 'debug';
	const MODULE_SETTING_MAX_PER_REQUEST = 'nb_max_per_request';

	const DEFAULT_MODULE_SETTING_DEBUG = false;
	const DEFAULT_MODULE_SETTING_MAX_PER_REQUEST = '100';

	protected $bDebug;
	protected $iLimit;

	protected function GetModuleName(){
		return 'combodo-archive';
	}

	protected function GetDefaultModuleSettingTime(){
		return '23:30';
	}

	/**
	 * AutoCloseTicket constructor.
	 */
	function __construct()
	{
		$this->bDebug = (bool) MetaModel::GetModuleSetting($this->GetModuleName(), static::MODULE_SETTING_DEBUG, static::DEFAULT_MODULE_SETTING_DEBUG);
		$this->iLimit = (int) MetaModel::GetModuleSetting($this->GetModuleName(), static::MODULE_SETTING_MAX_PER_REQUEST, static::DEFAULT_MODULE_SETTING_MAX_PER_REQUEST);
		//ini_set('max_execution_time', max(3600, ini_get('max_execution_time')));

	}

	/**
	 * @inheritdoc
	 */
	public function Process($iTimeLimit)
	{
		$iTotalObjectArchived = 0;
		CMDBObject::SetTrackInfo('Automatic - Background task autoarchiving');
		CMDBObject::SetTrackOrigin('custom-extension');

		$oRulesSearch = DBObjectSearch::FromOQL('SELECT ArchivingRule WHERE status = "active"');
		$oRulesSet = new DBObjectSet($oRulesSearch);

		$this->Trace('Processing '.$oRulesSet->Count().' active archiving rules...');

		/** @var ArchivingRule $oRule */
		$iTotalProcessedObjectsCount = 0;
		while((time()<$iTimeLimit) && ($oRule = $oRulesSet->Fetch()))
		{
			$iRuleProcessedObjectsCount = 0;
			$this->Trace('Processing rule "'.$oRule->Get('friendlyname').'" (#'.$oRule->GetKey().')...');

			try
			{
				// Retrieving rule's params
				$sClass = $oRule->Get('target_class');
				$oSearch = $oRule->GetFilter();
				$this->Trace('|- Parameters:');
				$this->Trace('|  |- Class: '.$sClass);
				$this->Trace('|  |- OQL scope: '.$oSearch->ToOQL(true));
				$this->Trace('|- Objects:');
				$iFlag = 1;
				$bArchive = true;
				$bRuleToProcess = true;
				$this->Trace('|- TimeLimit:'.$iTimeLimit);
				//while there is objects to process
				while ($bRuleToProcess && (time()<$iTimeLimit)) {
					$oSet = new DBObjectSet($oSearch, array(),  array(),  null, $this->iLimit);
					if (MetaModel::IsStandaloneClass($sClass)) {
						$oSet->OptimizeColumnLoad(array($sClass => array()));
						$aTemp = $oSet->GetColumnAsArray('id');
						$aIds = array($sClass => $aTemp);
					} else {
						$oSet->OptimizeColumnLoad(array($sClass => array('finalclass')));
						$aTemp = $oSet->GetColumnAsArray('finalclass');
						$aIds = array();
						foreach ($aTemp as $iObjectId => $sObjectClass) {
							$aIds[$sObjectClass][$iObjectId] = $iObjectId;
						}
					}
					$this->Trace('|- count(aTemp):'.count($aTemp));
					if(count($aTemp)<$this->iLimit) {
						//no need another loop
						$bRuleToProcess = false;
					}

					try {
						ArchivingRule::OnExecution($aIds);
						foreach ($aIds as $sFinalClass => $aObjectIds) {
							$sIds = implode(', ', $aObjectIds);
							$this->Trace('|- archiving:'.$sIds);
							$sArchiveRoot = MetaModel::GetAttributeOrigin($sFinalClass, 'archive_flag');
							$sRootTable = MetaModel::DBGetTable($sArchiveRoot);
							$sRootKey = MetaModel::DBGetKey($sArchiveRoot);
							$aJoins = array("`$sRootTable`");
							$aUpdates = array();
							foreach (MetaModel::EnumParentClasses($sFinalClass, ENUM_PARENT_CLASSES_ALL) as $sParentClass) {
								if (!MetaModel::IsValidAttCode($sParentClass, 'archive_flag')) {
									continue;
								}

								$sTable = MetaModel::DBGetTable($sParentClass);
								$aUpdates[] = "`$sTable`.`archive_flag` = $iFlag";
								if ($sParentClass == $sArchiveRoot) {
									if ($bArchive) {
										// Set the date (do not change it)
										$sDate = '"'.date(AttributeDate::GetSQLFormat()).'"';
										$aUpdates[] = "`$sTable`.`archive_date` = coalesce(`$sTable`.`archive_date`, $sDate)";
									} else {
										// Reset the date
										$aUpdates[] = "`$sTable`.`archive_date` = null";
									}
								} else {
									$sKey = MetaModel::DBGetKey($sParentClass);
									$aJoins[] = "`$sTable` ON `$sTable`.`$sKey` = `$sRootTable`.`$sRootKey`";
								}
							}
							$sJoins = implode(' INNER JOIN ', $aJoins);
							$sValues = implode(', ', $aUpdates);
							$sUpdateQuery = "UPDATE $sJoins SET $sValues WHERE `$sRootTable`.`$sRootKey` IN ($sIds)";
							CMDBSource::Query($sUpdateQuery);
						}
						$iRuleProcessedObjectsCount +=count($aTemp);
					}
					catch (Exception $e) {
						throw new ProcessFatalException('|  |- [Archiving KO] /!\\ '.json_encode($aIds).' exception raised! Error message: '.$e->getMessage());
					}
				}
				$this->Trace('|- Processed rule "'.$oRule->Get('friendlyname').'" (#'.$oRule->GetKey().') : '.$iRuleProcessedObjectsCount.' .');

				// Info to help understand why not all objects have been processed during this batch.
				if (time() >= $iTimeLimit)
				{
					$this->Trace('Stopped because time limit exceeded!');
				}
			}
			catch(Exception $e)
			{
				throw new ProcessFatalException('Skipping rule archiving as there was an exception! ('.$e->getMessage().')');
			}
			$iTotalObjectArchived +=$iRuleProcessedObjectsCount;
		}

		// Report
		return $iTotalObjectArchived.' object(s) archived';
	}

	/**
	 * Prints a $sMessage in the cron output.
	 *
	 * @param string $sMessage
	 */
	protected function Trace($sMessage)
	{
		if ($this->bDebug)
		{
			echo $sMessage."\n";
		}
	}
}
