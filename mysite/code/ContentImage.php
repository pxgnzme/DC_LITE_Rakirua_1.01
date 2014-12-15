<?php

class ContentImage extends DataObject {
  public static $db = array(   
      'SortOrder' => 'Int',
      'Caption' => 'Varchar'
  );
  public static $has_one = array(
    'Image' => 'Image',
    'ContentGallerys' => 'ContentGallery'  
  );

  public function getCMSFields() {
    $fields = parent::getCMSFields();
    
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

?>