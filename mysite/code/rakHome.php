<?php
class rakHome extends Page {

    private static $db = array(
        'ShowTitle' => 'Boolean',
        'MissonStatement' => 'HTMLText',
        'hasMission' => 'Boolean',
        'BodyContent' => 'HTMLText'
        
    );
 
    public function getCMSFields() {
 
      $fields = parent::getCMSFields();

      Requirements::javascript('mysite/javascript/galleryToggle.js');

      $fields->removeByName("Content");

      $missionToggle = CheckboxField::create("hasMission", "Display the mission statement on this page?")
        ->addExtraClass('hasMission');


      $fields->addFieldToTab('Root.Content.Main', new CheckboxField('ShowTitle','Show title of page?'),'Metadata');
      $fields->addFieldToTab('Root.Content.Main', new HtmlEditorField('MissonStatement','Mission statement content'),'Metadata');

      $fields->addFieldToTab('Root.Content.Main', new HtmlEditorField('BodyContent','Body content'),'Metadata');
      
      $fields->addFieldToTab('Root.Content.Main',$missionToggle,'MissonStatement');

      return $fields;    
    }
}
 
class rakHome_Controller extends Page_Controller {
 

}

?>