<?php
// Feature.php
class Feature extends DataObject {

    private static $db = array(
        "Title" => "Varchar(255)",
        "ExternalURL" => "Text"
    );

    private static $has_one = array(
        "InternalURL" => "SiteTree"
    );

}









