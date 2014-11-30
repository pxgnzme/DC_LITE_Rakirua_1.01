<?php
// Feature.php
class FooterImage extends DataObject {

    private static $db = array(
        "Title" => "Varchar(255)",
        'SortOrder' => 'Int'
    );

    private static $has_one = array(
        "Image" => "Image"
    );

    public static $summary_fields = array(
        'Title' => 'Name',
        'Thumbnail' => 'Thumbnail',
        'SortOrder' => 'Sort order'     
    );

    public function getThumbnail() {

        return $this->Image()->CMSThumbnail();

    }

}









