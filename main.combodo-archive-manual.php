<?php

class ManualArchivePlugin implements iPopupMenuExtension
{
	/**
	 * Get the list of items to be added to a menu.
	 *
	 * This method is called by the framework for each menu.
	 * The items will be inserted in the menu in the order of the returned array.
	 *
	 * @param int $iMenuId The identifier of the type of menu, as listed by the constants MENU_xxx
	 * @param mixed $param Depends on $iMenuId, see the constants defined above
	 *
	 * @return URLPopupMenuItem[] An array of ApplicationPopupMenuItem or an empty array if no action is to be added to the menu
	 */
	public static function EnumItems($iMenuId, $param)
	{
		$aRet = array();
		if ($iMenuId == iPopupMenuExtension::MENU_OBJDETAILS_ACTIONS)
		{
			$oObject = $param;
			$sClass = get_class($oObject);

			if (ArchiveUtils::CanArchive($sClass))
			{
				if ($oObject->IsArchived())
				{
					// Menu to UNarchive
					$sArchiveUrl = utils::GetAbsoluteUrlModulePage('combodo-archive-manual', 'actions.php', array('operation' => 'unarchive_item', 'class' => $sClass, 'id' => $oObject->GetKey()));
					$aRet[] = new URLPopupMenuItem('unarchive_item', Dict::S('Action:UnarchiveItem'), $sArchiveUrl);
				}
				else
				{
					// Menu to Archive
					$sArchiveUrl = utils::GetAbsoluteUrlModulePage('combodo-archive-manual', 'actions.php', array('operation' => 'archive_item', 'class' => $sClass, 'id' => $oObject->GetKey()));
					$aRet[] = new URLPopupMenuItem('archive_item', Dict::S('Action:ArchiveItem'), $sArchiveUrl);
				}
			}
		}
		elseif ($iMenuId == iPopupMenuExtension::MENU_OBJLIST_ACTIONS)
		{
			$oSet = $param;
			$sClass = $oSet->GetFilter()->GetClass();

			if (ArchiveUtils::CanArchive($sClass))
			{
				$sScope = $oSet->GetFilter()->ToOQL(true);

				// Menu to UnArchive
				if (utils::IsArchiveMode())
				{
					$sOperation = "confirm_unarchive_list";
					$sArchiveUrl = ArchiveUtils::GetActionPageUrl($sClass, $sScope, $sOperation);
					$aRet[] = new URLPopupMenuItem('unarchive_list', Dict::S('Action:UnarchiveList'), $sArchiveUrl);
				}

				// Menu to Archive
				$sOperation = "confirm_archive_list";
				$sArchiveUrl = ArchiveUtils::GetActionPageUrl($sClass, $sScope, $sOperation);
				$aRet[] = new URLPopupMenuItem('archive_list', Dict::S('Action:ArchiveList'), $sArchiveUrl);
			}
		}
		return $aRet;
	}
}

class ArchiveUtils
{
	/**
	 * @param string $sClass
	 *
	 * @return bool true if the archive/unarchive functionnality can be used
	 */
	public static function CanArchive($sClass)
	{
		return UserRights::IsAdministrator() && MetaModel::IsArchivable($sClass);
	}

	/**
	 * @param $sClass
	 * @param $sScope
	 * @param $sOperation
	 *
	 * @return string
	 */
	public static function GetActionPageUrl($sClass, $sScope, $sOperation)
	{
		$sModuleName = basename(__DIR__);

		$aActionArgs = self::GetActionPageArgs($sClass, $sScope, $sOperation);

		$sActionPageUrl = utils::GetAbsoluteUrlModulePage($sModuleName, "actions.php", $aActionArgs);

		return $sActionPageUrl;
	}

	/**
	 * @param string $sClass
	 * @param string $sScope
	 * @param string $sOperation
	 *
	 * @return string[]
	 */
	private static function GetActionPageArgs($sClass, $sScope, $sOperation)
	{
		//TODO save menu context
		$aUiPageArgs = array(
			'operation' => $sOperation,
			'class' => $sClass,
			'scope' => $sScope,
		);

		return $aUiPageArgs;
	}

	public static function GetActionPageHtmlHiddenInputs($sClass, $sScope, $sOperation)
	{
		$sRet = '';
		$aActionPageArgs = ArchiveUtils::GetActionPageArgs($sClass, $sScope, $sOperation);
		foreach($aActionPageArgs as $sName => $sValue)
		{
			$sRet .= '<input type="hidden" name="'.$sName.'" value="'.$sValue.'">';
		}

		return $sRet;
	}
}
