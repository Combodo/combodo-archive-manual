<?php
Dict::Add('FR FR', 'French', 'Français', array(
	'Action:ArchiveItem' => 'Archiver !',
	'Action:UnarchiveItem' => 'Désarchiver !',
	'Action:ArchiveList' => 'Archiver tout...',
	'Action:UnarchiveList' => 'Désarchiver tout...',
	'UI:Button:Archive' => 'Archiver !',
	'UI:Button:UnArchive' => 'Désarchiver !',

	'Archive:Title:ActionPage' => 'Opération d\'archivage en cours',

	'Archive:Title:Archiving' => 'Archivage d\'un objet',
	'Archive:Message:Archiving' => 'L\'objet "%1$s" a été archivé avec succès',
	'Archive:Title:UnArchiving' => 'Désarchivage d\'un objet',
	'Archive:Message:UnArchiving' => 'L\'objet "%1$s" a été désarchivé avec succès',
	'Archive:Message:Redirect' => 'Vous allez être redirigé vers <a href="%1$s">la page de l\'objet</a>',

	'Msg:ArchivedSuccess' => 'L\'objet a été archivé avec succès',
	'Msg:UnarchivedSuccess' => 'L\'object a été désarchivé avec succès',

	'Archive:Title:ArchivingList' => 'Archivage de plusieurs objets',
	'Archive:Confirm:ArchivingList' => 'Confirmez que vous voulez bien archiver les %1$d objets de type %2$s ci-dessous.',
	'Archive:Message:ArchivingList' => '%1$d objet(s) ont été archivé(s).',
	'Archive:Title:UnArchivingList' => 'Désarchivage de plusieurs objets',
	'Archive:Confirm:UnArchivingList' => 'Confirmez que vous voulez bien désarchiver les %1$d objets de type %2$s ci-dessous.',
	'Archive:Message:UnArchivingList' => '%1$d objet(s) ont été désarchivé(s).',
	'Archive:Message:ListTechnical' => 'Temps de traitement : %1$s',


	// Class ArchivingRule
	'Class:ArchivingRule/Name' => '%1$s',
	'Class:ArchivingRule' => 'Règle d\'archivage',
	'Class:ArchivingRule+' => '',
	'Class:ArchivingRule/Attribute:name' => 'Nom',
	'Class:ArchivingRule/Attribute:name+' => '',
	'Class:ArchivingRule/Attribute:target_class' => 'Classe',
	'Class:ArchivingRule/Attribute:target_class+' => '',
	'Class:ArchivingRule/Attribute:status' => 'Statut',
	'Class:ArchivingRule/Attribute:status+' => '',
	'Class:ArchivingRule/Attribute:status/Value:active' => 'Active',
	'Class:ArchivingRule/Attribute:status/Value:inactive' => 'Inactive',
	'Class:ArchivingRule/Attribute:type' => 'Option appliquée',
	'Class:ArchivingRule/Attribute:type+' =>  'Quelle option sera utilisée au regard des champs remplis. Si les 2 options sont remplies, l\'option avancée sera appliquée',
	'Class:ArchivingRule/Attribute:type/Value:simple' => 'Simple',
	'Class:ArchivingRule/Attribute:type/Value:advanced' => 'Avancée',
	'Class:ArchivingRule/Attribute:pre_archiving_status_code' => 'Code du statut avant archivage',
	'Class:ArchivingRule/Attribute:pre_archiving_status_code+' => 'Choisir l\'attribute à tester sur les objets de la classe choisie pour que la règle leur soit appliquée' ,
	'Class:ArchivingRule/Attribute:pre_archiving_status_value' => 'Valeur du statut avant archivage',
	'Class:ArchivingRule/Attribute:pre_archiving_status_value+' => 'Valeur du statut dans lequel les objets de la classe choisie doivent être pour que la règle leur soit appliquée',
	'Class:ArchivingRule/Attribute:date_to_check_att' => 'Date à contrôler',
	'Class:ArchivingRule/Attribute:date_to_check_att+' => 'Code atribut de la date à contrôler',
	'Class:ArchivingRule/Attribute:autoarchive_delay' => 'Délai d\'archivage',
	'Class:ArchivingRule/Attribute:autoarchivee_delay+' => 'Délai en jours avant l\'application de l\'archivage sur les objets (par rapport à la date de contrôle)',
	'Class:ArchivingRule/Attribute:oql_scope' => 'Périmêtre OQL',
	'Class:ArchivingRule/Attribute:oql_scope+' => 'Requête OQL définissant les objets concernés par cette règle.',

	// Integrity errors
	'Class:ArchivingRule/Error:ClassNotValid' => 'La classe doit faire partie du modèle de données, "%1$s" donnée',
	'Class:ArchivingRule/Error:AttributeNotValid' =>  '"%2$s" n\'est pas un attribut valide pour la classe "%1$s"',
	'Class:ArchivingRule/Error:AttributeMustBeDate' =>'"%2$s" doit être un attribut de type date pour la classe "%1$s"',
	'Class:ArchivingRule/Error:StatusNotValid' => '"%2$s" n\'est pas un attribut valide pour la classe  "%1$s"',
	'Class:ArchivingRule/Error:StatusCodeNotValid' => 'L\'attribute "%2$s" n\'est pas de type énum pour la classe "%1$s".',
	'Class:ArchivingRule/Error:StatusValueNotValid' => '"%3$s" n\'est pas une valeur valide pour l\'attribut "%2$s" pour la classe "%1$s"',
	'Class:ArchivingRule/Error:ExistingRuleForClass' =>'Il existe déjà une règle d\'archivage pour la classe "%1$s"',
	'Class:ArchivingRule/Error:NoOptionFilled' => 'Une des 2 options doit être remplie',
	'Class:ArchivingRule/Error:OptionOneMissingField' => 'Les champs date et délais de l\'option 1 doivent être remplis',

	// Presentation
	'ArchivingRule:general' => 'Informations générales',
	'ArchivingRule:simple' => 'Remplir l\'option (simple) ...',
	'ArchivingRule:advanced' => '... ou l\'option 2 (avancée)',

	// Tabs
	'UI:AutoArchive:Preview' => 'Aperçu',
	'UI:AutoArchive:Title' => '%1$s à archiver à cet instant',

	// Menus
	'Menu:ArchivingRule' => 'Règles d\'archivage',
	'Menu:ArchivingRule+' => 'Règles d\'archivage',
));
