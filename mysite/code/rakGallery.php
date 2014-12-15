<?php
class rakGallery extends Page {

    private static $db = array(
        'ShowTitle' => 'Boolean'
        
    );
 
    public function getCMSFields() {
 
      $fields = parent::getCMSFields();

      $fields->removeByName("Content");

      $fields->addFieldToTab('Root.Content.Main', new CheckboxField('ShowTitle'),'Metadata');

      $gridFieldConfig = GridFieldConfig_RecordEditor::create(1000); 
	  $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
	  $gridfield = new GridField("GalleryImage", "Gallery Images", GalleryItem::get()->sort('SortOrder ASC'), $gridFieldConfig);

	  $fields->addFieldToTab('Root.Content.ImageGallery', $gridfield);

      return $fields;    
    }
}
 
class rakGallery_Controller extends Page_Controller {
 

}

?>