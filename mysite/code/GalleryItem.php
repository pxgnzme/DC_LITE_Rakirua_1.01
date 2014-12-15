<?php
// Feature.php
class GalleryItem extends DataObject {

    private static $db = array(
        "Caption" => "Text",
        'SortOrder' => 'Int'
    );

    private static $has_one = array(
        "Image" => "Image"
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main","GalleryPageID");
        $fields->removeFieldFromTab("Root.Main","SortOrder");
        return $fields;    
    }

    public static $summary_fields = array(
        'Caption' => 'Caption',
        'Thumbnail' => 'Thumbnail'    
    );

    public function getThumbnail() {

        return $this->Image()->CMSThumbnail();

    }

}









