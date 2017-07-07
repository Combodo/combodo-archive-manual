<?php

// Copyright (C) 2010-2017 Combodo SARL
//
//   This file is part of iTop.
//
//   iTop is free software; you can redistribute it and/or modify
//   it under the terms of the GNU Affero General Public License as published by
//   the Free Software Foundation, either version 3 of the License, or
//   (at your option) any later version.
//
//   iTop is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU Affero General Public License for more details.
//
//   You should have received a copy of the GNU Affero General Public License
//   along with iTop. If not, see <http://www.gnu.org/licenses/>


/**
 * Archive/Unarchive a single/set of object(s)
 *
 * @copyright   Copyright (C) 2010-2017 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

require_once('../approot.inc.php');
require_once(APPROOT.'/application/application.inc.php');
require_once(APPROOT.'/application/itopwebpage.class.inc.php');

require_once(APPROOT.'/application/startup.inc.php');

require_once(APPROOT.'/application/loginwebpage.class.inc.php');
LoginWebPage::DoLogin(true); // Check user rights and prompt if needed (must be admin)

$sOperation = utils::ReadParam('operation', '');
$oAppContext = new ApplicationContext();

$oP = new iTopWebPage('Archiving...');
//$oP->SetBreadCrumbEntry('archive-manual', Dict::S('Menu:RunQueriesMenu'), Dict::S('Menu:RunQueriesMenu+'), '', utils::GetAbsoluteUrlAppRoot().'images/wrench.png');
$oP->DisableBreadCrumb();

try
{
	switch ($sOperation)
	{
		case 'archive_item':
			$sClass = utils::ReadParam('class');
			$iId = utils::ReadParam('id');
			$oObject = MetaModel::GetObject($sClass, $iId, true, true);
			$oP->p('Archiving '.$oObject->GetHyperlink().'...');
			$oObject->DBArchive();
			$oP->p('Done!');
			cmdbAbstractObject::SetSessionMessage(get_class($oObject), $oObject->GetKey(), 'just-archived', Dict::S('Msg:ArchivedSuccess'), 'ok', 0, true /* must not exist */);
			$sUrl = ApplicationContext::MakeObjectUrl($sClass, $iId);
			$oP->p("Jumping back to the object page: $sUrl...");
			$oP->add_header("Location: $sUrl");
			break;

		case 'unarchive_item':
			$sClass = utils::ReadParam('class');
			$iId = utils::ReadParam('id');
			$oObject = MetaModel::GetObjectWithArchive($sClass, $iId, true, true);
			$oP->p('Unarchiving '.$oObject->GetHyperlink().'...');
			$oObject->DBUnarchive();
			$oP->p('Done!');
			cmdbAbstractObject::SetSessionMessage(get_class($oObject), $oObject->GetKey(), 'just-unarchived', Dict::S('Msg:UnarchivedSuccess'), 'ok', 0, true /* must not exist */);
			$sUrl = ApplicationContext::MakeObjectUrl($sClass, $iId);
			$oP->p("Jumping back to the object page: $sUrl...");
			$oP->add_header("Location: $sUrl");
			break;

		case 'archive_list':
			$fStarted = microtime(true);
			$sScope = utils::ReadParam('scope', null, false, 'raw_data');
			$oSearch = DBSearch::FromOQL($sScope);
			$oSet = new DBObjectSet($oSearch);

			$oP->p("Archiving: ".htmlentities($sScope, ENT_QUOTES, 'UTF-8'));
			$oP->p($oSet->Count().' objects');
			$oSet->GetFilter()->DBBulkWriteArchiveFlag(true);
			$fElapsed = microtime(true) - $fStarted;
			$sRate = $fElapsed > 0.0001 ? round($oSet->Count()/$fElapsed, 1).' updates /s' : $fElapsed. 's... not significant';
			$oP->p("Done! ($sRate)");
			break;

		case 'unarchive_list':
			$fStarted = microtime(true);
			$sScope = utils::ReadParam('scope', null, false, 'raw_data');
			$oSearch = DBSearch::FromOQL($sScope);
			$oSet = new DBObjectSet($oSearch);

			$oP->p("Unarchiving: ".htmlentities($sScope, ENT_QUOTES, 'UTF-8'));
			$oP->p($oSet->Count().' objects');
			$oSet->GetFilter()->DBBulkWriteArchiveFlag(false);
			$fElapsed = microtime(true) - $fStarted;
			$sRate = $fElapsed > 0.0001 ? round($oSet->Count()/$fElapsed, 1).' updates /s' : $fElapsed. 's... not significant';
			$oP->p("Done! ($sRate)");
			break;

		default:
			$oP->p("Unsupported operation: $sOperation");

	}
}
catch(Exception $e)
{
	$oP->p($e->getMessage());
}

$oP->output();
