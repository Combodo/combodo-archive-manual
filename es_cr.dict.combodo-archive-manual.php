<?php
/**
 * Spanish Localized data
 *
 * @copyright   Copyright (C) 2010-2021 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 * @traductor   Miguel Turrubiates <miguel_tf@yahoo.com>
 * @notas       Utilizar codificación UTF-8 para mostrar acentos y otros caracteres especiales
 */

Dict::Add('ES CR', 'Spanish', 'Español, Castellano', array(
	'Action:ArchiveItem'    => 'Archivar',
	'Action:UnarchiveItem'  => 'DesArchivar',
	'Action:ArchiveList'    => 'Archivar Todo',
	'Action:UnarchiveList'  => 'DesArchivar Todo',
	'UI:Button:Archive' => 'Archive!~~',
	'UI:Button:UnArchive' => 'Unarchive!~~',

	'Archive:Title:ActionPage' => 'Archive operation in progress~~',

	'Archive:Title:Archiving' => 'Single object archiving~~',
	'Archive:Message:Archiving' => 'The object "%1$s" has been successfully archived~~',
	'Archive:Title:UnArchiving' => 'Single object unarchiving~~',
	'Archive:Message:UnArchiving' => 'The object "%1$s" has been successfully unarchived~~',
	'Archive:Message:Redirect' => 'You will be redirect to <a href="%1$s">the object page</a>~~',

	'Msg:ArchivedSuccess' => 'El objeto ha sido exitosamente archivado',
	'Msg:UnarchivedSuccess' => 'El objeto ha sido exitosamente desarchivado',

	'Archive:Title:ArchivingList' => 'Archiving multiple objects~~',
	'Archive:Confirm:ArchivingList' => 'Please confirm that you want to archive the following %1$d objects of class %2$s.~~',
	'Archive:Message:ArchivingList' => '%1$d object(s) will be archived.~~',
	'Archive:Title:UnArchivingList' => 'Unarchiving multiple objects~~',
	'Archive:Confirm:UnArchivingList' => 'Please confirm that you want to unarchive the following %1$d objects of class %2$s.~~',
	'Archive:Message:UnArchivingList' => '%1$d object(s) will be unarchived.~~',
	'Archive:Message:ListTechnical' => 'Average update speed : %1$s~~',
));
