<?php

class AssociationLink extends DataObject {

   private static $db = array(
        "Name" => "Varchar(255)",
        "ExternalURL" => "Text"
    );

    private static $has_one = array(
        "Image" => "Image"
    );

    public static $summary_fields = array(
        'Name' => 'Name',
        'Thumbnail' => 'Thumbnail',
        "ExternalURL" => "Link"    
    );

    public function getThumbnail() {

        return $this->Image()->CMSThumbnail();

    }
 
}



?>