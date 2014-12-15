<?php

class ContentGallery extends DataObject {
  public static $db = array(   
      'Title' => 'Text'
  );
  public static $has_one = array(
    'Page' => 'Page'  
  );

  public static $has_many = array(
      'ContentImages' => 'ContentImage',
  );

  public function getCMSFields() {
    $fields = parent::getCMSFields();
    $fields->removeFieldFromTab("Root.Main","GalleryPageID");

    $gridFieldConfig = GridFieldConfig_RecordEditor::create(); 
    $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
    $gridfield = new GridField("ContentImages", "Content Images", $this->ContentImages(), $gridFieldConfig);

    $fields->addFieldToTab('Root.Main', $gridfield);

    return $fields;    
  }
   public static $summary_fields = array(
    'ID' => 'ID',
    'Title' => 'Title'   
   );
   
 
}

?>