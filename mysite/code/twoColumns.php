<?php
class twoColumns extends Page {

    private static $db = array(
        'ShowTitle' => 'Boolean',
        'Column1Width' => 'Text',
        'Column1' => 'HTMLText',
        'Column2' => 'HTMLText'
        
    );
 
    public function getCMSFields() {
 
      $fields = parent::getCMSFields();

      $fields->removeByName("Content");


      $fields->addFieldToTab('Root.Content.Main', new CheckboxField('ShowTitle'),'Metadata');
      $fields->addFieldToTab('Root.Content.Main', new TextField('Column1Width'),'Metadata');
      $fields->addFieldToTab('Root.Content.Main', new HtmlEditorField('Column1'),'Metadata');
      $fields->addFieldToTab('Root.Content.Main', new HtmlEditorField('Column2'),'Metadata');

      return $fields;    
    }
}
 
class twoColumns_Controller extends Page_Controller {
 

}

?>