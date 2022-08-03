<?php
Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Action:ArchiveItem' => 'Archiviere!',
	'Action:UnarchiveItem' => 'Dearchiviere!',
	'Action:ArchiveList' => 'Archiviere alle...',
	'Action:UnarchiveList' => 'Dearchiviere alle...',
	'UI:Button:Archive' => 'Archiviere!',
	'UI:Button:UnArchive' => 'Dearchiviere!',

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
	'Class:ArchivingRule/Name' => '%1$s~~',
	'Class:ArchivingRule' => 'Archiving rule~~',
	'Class:ArchivingRule+' => '~~',
	'Class:ArchivingRule/Attribute:name' => 'Name~~',
	'Class:ArchivingRule/Attribute:name+' => '~~',
	'Class:ArchivingRule/Attribute:target_class' => 'Class~~',
	'Class:ArchivingRule/Attribute:target_class+' => '~~',
	'Class:ArchivingRule/Attribute:status' => 'Status~~',
	'Class:ArchivingRule/Attribute:status+' => '~~',
	'Class:ArchivingRule/Attribute:status/Value:active' => 'Active~~',
	'Class:ArchivingRule/Attribute:status/Value:inactive' => 'Inactive~~',
	'Class:ArchivingRule/Attribute:type' => 'Applied option~~',
	'Class:ArchivingRule/Attribute:type+' => 'Which option will be used regarding the filled fields. If both are filled, advanced option is applied~~',
	'Class:ArchivingRule/Attribute:type/Value:simple' => 'Simple~~',
	'Class:ArchivingRule/Attribute:type/Value:advanced' => 'Advanced~~',
	'Class:ArchivingRule/Attribute:pre_archiving_status_code' => 'Pre-archiving status code~~',
	'Class:ArchivingRule/Attribute:pre_archiving_status_code+' => 'Choose attribute to test on objects of the chosen class for the rule to apply~~',
	'Class:ArchivingRule/Attribute:pre_archiving_status_value' => 'Pre-archiving status value~~',
	'Class:ArchivingRule/Attribute:pre_archiving_status_value+' => 'Value of attribute defined above in which objects of the chosen class must be for the rule to apply~~',
	'Class:ArchivingRule/Attribute:date_to_check_att' => 'Date to check~~',
	'Class:ArchivingRule/Attribute:date_to_check_att+' => 'Attribute code of the date to check~~',
	'Class:ArchivingRule/Attribute:autoarchive_delay' => 'Autoarchiving delay~~',
	'Class:ArchivingRule/Attribute:autoarchivee_delay+' => 'Delay in days before applying the stimulus on the objects (regarding the date to check)~~',
	'Class:ArchivingRule/Attribute:oql_scope' => 'OQL scope~~',
	'Class:ArchivingRule/Attribute:oql_scope+' => 'OQL query to define which objects are concerned by this rule.~~',

	// Integrity errors
	'Class:ArchivingRule/Error:ClassNotValid' => 'Class must be a valid class from datamodel, "%1$s" given~~',
	'Class:ArchivingRule/Error:AttributeNotValid' => '"%2$s" is not a valid attribute for class "%1$s"~~',
	'Class:ArchivingRule/Error:AttributeMustBeDate' => '"%2$s" must be a date attribute of class "%1$s"~~',
	'Class:ArchivingRule/Error:StatusNotValid' => '"%2$s" is not a valid attribute for class "%1$s"~~',
	'Class:ArchivingRule/Error:StatusCodeNotValid' => 'Attribute "%2$s" is not an enum for class "%1$s".~~',
	'Class:ArchivingRule/Error:StatusValueNotValid' => '"%3$s" is not a valid value for attribute "%2$s" of "%1$s" class~~',
	'Class:ArchivingRule/Error:ExistingRuleForClass' => 'There is already a archiving rule for class "%1$s"~~',
	'Class:ArchivingRule/Error:NoOptionFilled' => 'Either option 1 or option 2 must be filled~~',
	'Class:ArchivingRule/Error:OptionOneMissingField' => 'Fields date and delay of option 1 must be filled~~',

	// Presentation
	'ArchivingRule:general' => 'General informations~~',
	'ArchivingRule:simple' => 'Fill either option 1 (simple) ...~~',
	'ArchivingRule:advanced' => '... or option 2 (advanced)~~',

	// Tabs
	'UI:AutoArchive:Preview' => 'Preview~~',
	'UI:AutoArchive:Title' => '%1$s to be Archive as of now~~',

	// Menus
	'Menu:ArchivingRule' => 'Archiving  rules~~',
	'Menu:ArchivingRule+' => 'Archiving rules~~',
));
