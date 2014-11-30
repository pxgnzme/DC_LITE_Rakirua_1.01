<?php
class rakGallery extends Page {

    private static $db = array(
        'ShowTitle' => 'Boolean'
        
    );
 
    public function getCMSFields() {
 
      $fields = parent::getCMSFields();

      $fields->removeByName("Content");

      $fields->addFieldToTab('Root.Content.Main', new CheckboxField('ShowTitle'),'Metadata');

      return $fields;    
    }
}
 
class rakGallery_Controller extends Page_Controller {
 

}

?>