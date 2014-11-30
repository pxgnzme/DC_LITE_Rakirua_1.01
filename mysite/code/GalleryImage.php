<?php

class GalleryImage extends DataObject {
  public static $db = array(   
      'SortOrder' => 'Int',
      'Title' => 'Varchar'
  );
  public static $has_one = array(
    'Image' => 'Image',
    'Page' => 'Page'  
  );
  public function getCMSFields() {
    $fields = parent::getCMSFields();
    $fields->removeFieldFromTab("Root.Main","GalleryPageID");
    $fields->removeFieldFromTab("Root.Main","SortOrder");
    return $fields;    
  }
   public static $summary_fields = array(
    'ID' => 'ID',
    'Title' => 'Title',
    'Thumbnail' => 'Thumbnail'    
   );
   public function getThumbnail() {
     return $this->Image()->CMSThumbnail();
  }
 
}

?>