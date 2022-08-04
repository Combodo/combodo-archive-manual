<?php
/**
 * Localized data
 *
 * @copyright   Copyright (C) 2018 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 * @author      Lars Kaltefleiter <lars.kaltefleiter@itomig.de>
 */

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Action:ArchiveItem' => 'Archivieren!',
	'Action:UnarchiveItem' => 'Dearchivieren!',
	'Action:ArchiveList' => 'Alle archivieren...',
	'Action:UnarchiveList' => 'Alle Dearchivieren...',
	'UI:Button:Archive' => 'Archivieren!',
	'UI:Button:UnArchive' => 'Dearchivieren!',

	'Archive:Title:ActionPage' => 'Archivierungsvorgang läuft',

	'Archive:Title:Archiving' => 'Archivierung eines einzelnen Objekts',
	'Archive:Message:Archiving' => 'Das Objekt "%1$s" wurde erfolgreich archiviert',
	'Archive:Title:UnArchiving' => 'Dearchivierung eines einzelnen Objektes',
	'Archive:Message:UnArchiving' => 'Das Objekt "%1$s" wurde erfolgreich dearchiviert',
	'Archive:Message:Redirect' => 'Sie werden zur Seite des Objekts <a href="%1$s"> weitergeleitet</a>',

	'Msg:ArchivedSuccess' => 'Das Objekt wurde erfolgreich archiviert',
	'Msg:UnarchivedSuccess' => 'Das Objekt wurde erfolgreich dearchiviert',

	'Archive:Title:ArchivingList' => 'Archivieren mehrerer Objekte',
	'Archive:Confirm:ArchivingList' => 'Bitte bestätigen Sie das Archivieren der folgenden %1$d Objekte der Klasse %2$s.',
	'Archive:Message:ArchivingList' => '%1$d Objekt(e) werden archiviert.',
	'Archive:Title:UnArchivingList' => 'Dearchivieren mehrerer Objekte',
	'Archive:Confirm:UnArchivingList' => 'Bitte bestätigen Sie das Dearchivieren der folgenden %1$d Objekte der Klasse %2$s.',
	'Archive:Message:UnArchivingList' => '%1$d Objekt(e) werden dearchiviert.',
	'Archive:Message:ListTechnical' => 'Durchschnittliche Update-Geschwindigkeit : %1$s',

	// Class ArchivingRule
	'Class:ArchivingRule/Name' => '%1$s',
	'Class:ArchivingRule' => 'Archivierungsregel',
	'Class:ArchivingRule+' => '',
	'Class:ArchivingRule/Attribute:name' => 'Name',
	'Class:ArchivingRule/Attribute:name+' => '',
	'Class:ArchivingRule/Attribute:target_class' => 'Klasse',
	'Class:ArchivingRule/Attribute:target_class+' => '',
	'Class:ArchivingRule/Attribute:status' => 'Status',
	'Class:ArchivingRule/Attribute:status+' => '',
	'Class:ArchivingRule/Attribute:status/Value:active' => 'Aktiv',
	'Class:ArchivingRule/Attribute:status/Value:inactive' => 'Inaktiv',
	'Class:ArchivingRule/Attribute:type' => 'Anzuwendende Option',
	'Class:ArchivingRule/Attribute:type+' => 'Anzuwendende Option bzgl. der gefüllten Felder. Wenn beide gefüllt sind, wird die fortgeschrittene Option verwendet.',
	'Class:ArchivingRule/Attribute:type/Value:simple' => 'Einfach',
	'Class:ArchivingRule/Attribute:type/Value:advanced' => 'Fortgeschritten',
	'Class:ArchivingRule/Attribute:pre_archiving_status_code' => 'Attributs-Code zur Archivierung',
	'Class:ArchivingRule/Attribute:pre_archiving_status_code+' => 'Geben Sie einen technischen Attributs-Code an, der vor der automatischen Archivierung überprüft wird.',
	'Class:ArchivingRule/Attribute:pre_archiving_status_value' => 'Attributswert zur Archivierung',
	'Class:ArchivingRule/Attribute:pre_archiving_status_value+' => 'Ausprägung des oben angegebenen Attributs, bei der Objekte archiviert werden sollen.',
	'Class:ArchivingRule/Attribute:date_to_check_att' => 'Zu überprüfendes Datumsfeld',
	'Class:ArchivingRule/Attribute:date_to_check_att+' => 'Attributs-Code des zu überprüfenden Datumsfelds',
	'Class:ArchivingRule/Attribute:autoarchive_delay' => 'Zeitversatz bis zur automatischen Archivierung',
	'Class:ArchivingRule/Attribute:autoarchive_delay+' => 'Anzahl an Tagen, die auf Basis des angegebenen Datumsfeld erreicht sein muss, bis das Objekt archiviert wird.',
	'Class:ArchivingRule/Attribute:oql_scope' => 'OQL-Scope',
	'Class:ArchivingRule/Attribute:oql_scope+' => 'OQL-Abfrage die definiert, welche Objekte von dieser Regel betroffen sind.',

	// Integrity errors
	'Class:ArchivingRule/Error:ClassNotValid' => 'Die Klasse muss eine gültige Klasse des Datenmodells sein, es wurde aber "%1$s" angegeben.',
	'Class:ArchivingRule/Error:AttributeNotValid' => '"%2$s" ist kein gültiges Attribut der Klasse "%1$s"',
	'Class:ArchivingRule/Error:AttributeMustBeDate' => '""%2$s" muss ein Attribut vom Typ "Datum" der Klasse "%1$s" sein',
	'Class:ArchivingRule/Error:StatusNotValid' => '"%2$s" ist kein gültiges Attribut der Klasse "%1$s"',
	'Class:ArchivingRule/Error:StatusCodeNotValid' => '"%2$s" ist kein Attribut vom Typ "Enum" der Klasse "%1$s".',
	'Class:ArchivingRule/Error:StatusValueNotValid' => '"%3$s" ist kein gültiger Wert für das Attribute "%2$s" der Klasse "%1$s"',
	'Class:ArchivingRule/Error:ExistingRuleForClass' => 'Es existiert bereits eine Archivierungsregel für die Klasse "%1$s"',
	'Class:ArchivingRule/Error:NoOptionFilled' => 'Option 1 oder Option 2 muss ausgefüllt sein.',
	'Class:ArchivingRule/Error:OptionOneMissingField' => 'Die Felder "Zu überprüfendes Datumsfeld" und "Zeitversatz bis zur automatischen Archivierung" müssen ausgefüllt werden.',

	// Presentation
	'ArchivingRule:general' => 'Allgemeine Informationen',
	'ArchivingRule:simple' => 'Füllen Sie entweder Option 1 aus (Einfach)...',
	'ArchivingRule:advanced' => '... oder Option 2 (Fortgeschritten)',

	// Tabs
	'UI:AutoArchive:Preview' => 'Vorschau',
	'UI:AutoArchive:Title' => 'Objekte der Klasse "%1$s", die Stand jetzt archiviert werden sollen',

	// Menus
	'Menu:ArchivingRule' => 'Archivierungsregeln',
	'Menu:ArchivingRule+' => 'Archivierungsregeln',
));
