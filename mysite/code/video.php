<?php

class video extends DataObject {

   private static $db = array(
        "des" => "Text",
        "yid" => "Text"
    );

    private static $has_one = array(
        "Image" => "Image"
    );

    public static $summary_fields = array(
        'des' => 'des',
        'Thumbnail' => 'Thumbnail',
        'yid' => 'yid' 
    );

    public function getThumbnail() {

        return $this->Image()->CMSThumbnail();

    }
 
}



?>