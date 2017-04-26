<?php

class ApprovalFromUI implements iPopupMenuExtension
{
	/**
	 * Get the list of items to be added to a menu.
	 *
	 * This method is called by the framework for each menu.
	 * The items will be inserted in the menu in the order of the returned array.
	 * @param int $iMenuId The identifier of the type of menu, as listed by the constants MENU_xxx
	 * @param mixed $param Depends on $iMenuId, see the constants defined above
	 * @return object[] An array of ApplicationPopupMenuItem or an empty array if no action is to be added to the menu
	 */
	public static function EnumItems($iMenuId, $param)
	{
		$aRet = array();
		if ($iMenuId == iPopupMenuExtension::MENU_OBJDETAILS_ACTIONS)
		{
			$oObject = $param;
			$sClass = get_class($oObject);

			if (UserRights::IsAdministrator() && MetaModel::IsArchivable($sClass))
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

			if (UserRights::IsAdministrator() && MetaModel::IsArchivable($sClass))
			{
				$sScope = $oSet->GetFilter()->ToOQL(true);

				// Menu to UNarchive
				$sArchiveUrl = utils::GetAbsoluteUrlModulePage('combodo-archive-manual', 'actions.php', array('operation' => 'unarchive_list', 'scope' => $sScope));
				$aRet[] = new URLPopupMenuItem('unarchive_list', Dict::S('Action:UnarchiveList'), $sArchiveUrl);

				// Menu to Archive
				$sArchiveUrl = utils::GetAbsoluteUrlModulePage('combodo-archive-manual', 'actions.php', array('operation' => 'archive_list', 'scope' => $sScope));
				$aRet[] = new URLPopupMenuItem('archive_list', Dict::S('Action:ArchiveList'), $sArchiveUrl);
			}
		}
		return $aRet;
	}
}
