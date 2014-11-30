<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	"type" => 'MySQLDatabase',
	"server" => 'odin.hosts.net.nz',
	"username" => 'rmlt_admin',
	"password" => '&?%Z$qi($OgC',
	"database" => 'rmlt_ss',
	"path" => '',
);

// Set the site locale
i18n::set_locale('en_US');

// register shortcodes
ShortcodeParser::get('default')->register(
    'videoGallery', array('Page_Controller', 'videoGalleryHandler')
);

// register shortcodes
ShortcodeParser::get('default')->register(
    'photogallery', array('Page_Controller', 'photoGalleryHandler')
);

// register shortcodes
ShortcodeParser::get('default')->register(
    'openbooking', array('Page_Controller', 'openbookingHandler')
);