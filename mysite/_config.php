<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	"type" => 'MySQLDatabase',
	"server" => 'ghost.hosts.net.nz',
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
    'agendaTable', array('Page_Controller', 'agendaTableHandler')
);

// register shortcodes
ShortcodeParser::get('default')->register(
'openbooking', array('Page_Controller', 'openbookingHandler')
);

// register shortcodes
ShortcodeParser::get('default')->register(
'hutsTable', array('Page_Controller', 'hutsHandler')
);


// register shortcodes
ShortcodeParser::get('default')->register(
'contentGallery', array('rakHunting_Controller', 'contentGalleryHandler')
);