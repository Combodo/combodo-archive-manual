<?php
Dict::Add('NL NL', 'Dutch', 'Nederlands', array(
	'Action:ArchiveItem' => 'Archive!~~',
	'Action:UnarchiveItem' => 'Unarchive!~~',
	'Action:ArchiveList' => 'Archive all...~~',
	'Action:UnarchiveList' => 'Unarchive all...~~',
	'UI:Button:Archive' => 'Archive!~~',
	'UI:Button:UnArchive' => 'Unarchive!~~',

	'Archive:Title:ActionPage' => 'Archive operation in progress~~',

	'Archive:Title:Archiving' => 'Single object archiving~~',
	'Archive:Message:Archiving' => 'The object "%1$s" has been successfully archived~~',
	'Archive:Title:UnArchiving' => 'Single object unarchiving~~',
	'Archive:Message:UnArchiving' => 'The object "%1$s" has been successfully unarchived~~',
	'Archive:Message:Redirect' => 'You will be redirect to <a href="%1$s">the object page</a>~~',

	'Msg:ArchivedSuccess' => 'The object has been successfully archived~~',
	'Msg:UnarchivedSuccess' => 'The object has been successfully unarchived~~',

	'Archive:Title:ArchivingList' => 'Archiving multiple objects~~',
	'Archive:Confirm:ArchivingList' => 'Please confirm that you want to archive the following %1$d objects of class %2$s.~~',
	'Archive:Message:ArchivingList' => '%1$d object(s) will be archived.~~',
	'Archive:Title:UnArchivingList' => 'Unarchiving multiple objects~~',
	'Archive:Confirm:UnArchivingList' => 'Please confirm that you want to unarchive the following %1$d objects of class %2$s.~~',
	'Archive:Message:UnArchivingList' => '%1$d object(s) will be unarchived.~~',
	'Archive:Message:ListTechnical' => 'Average update speed : %1$s~~',

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
	'Class:ArchivingRule/Attribute:autoarchive_delay+' => 'When this delay in days is passed after the "Date to check", objects are automatically archived)~~',
	'Class:ArchivingRule/Attribute:oql_scope' => 'OQL scope~~',
	'Class:ArchivingRule/Attribute:oql_scope+' => 'OQL query to define which objects are concerned by this rule.~~',

	// Integrity errors
	'Class:ArchivingRule/Error:ClassNotValid' => 'Class "%1$s" does not exist in your datamodel~~',
	'Class:ArchivingRule/Error:ClassNotArchivable' => 'Class "%1$s" is not archivable, please modify first your datamodel~~',
	'Class:ArchivingRule/Error:AttributeNotValid' => '"%2$s" is not a valid attribute for class "%1$s"~~',
	'Class:ArchivingRule/Error:AttributeMustBeDate' => '"%3$s" must be a date attribute of class "%1$s", "%2$s" is not a date~~',
	'Class:ArchivingRule/Error:StatusNotValid' => '"%2$s" is not a valid attribute for class "%1$s"~~',
	'Class:ArchivingRule/Error:StatusCodeNotValid' => '"%3$s" must be an enum attribute of class "%1$s", "%2$s" is not an enum~~',
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
