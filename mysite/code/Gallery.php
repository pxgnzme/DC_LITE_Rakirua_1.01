<?php
class Gallery extends Page {

//class Gallery extends twoColumns {
 
   public static $has_many = array(
        'GalleryImages' => 'GalleryImage',
   );

   private static $db = array(
        'Column1Width' => 'Text',
        'Column1' => 'HTMLText',
        'Column2' => 'HTMLText'
    );
 
   public function getCMSFields() {
 
    $fields = parent::getCMSFields(); 
    $gridFieldConfig = GridFieldConfig_RecordEditor::create(); 
    $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
    $gridfield = new GridField("GalleryImages", "Gallery Images", $this->GalleryImages()->sort("SortOrder"), $gridFieldConfig);

    $fields->removeByName("Content");
    $fields->addFieldToTab('Root.Content.Gallery', $gridfield);
    $fields->addFieldToTab('Root.Content.Main', new TextField('Column1Width'),'Metadata');
    $fields->addFieldToTab('Root.Content.Main', new HtmlEditorField('Column1'),'Metadata');
    $fields->addFieldToTab('Root.Content.Main', new HtmlEditorField('Column2'),'Metadata'); 
    return $fields;    
  }
}
 
class Gallery_Controller extends Page_Controller {
 
    public static $allowed_actions = array (
    );
    public function Photos() {
        return $this->GalleryImages()->sort("SortOrder");
    }
    public function init() {
        parent::init();
    }
}

?>