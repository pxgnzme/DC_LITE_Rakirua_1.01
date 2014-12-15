<?php
class rakHunting extends Page {

    private static $db = array(
        'ShowTitle' => 'Boolean',
        'Column1Width' => 'Text',
        'Column1' => 'HTMLText',
        'Column2' => 'HTMLText' 
    );

    public static $has_many = array(
        'ContentGallerys' => 'ContentGallery',
    );
 
    public function getCMSFields() {
 
      $fields = parent::getCMSFields();

      $fields->removeByName("Content");

      $fields->addFieldToTab('Root.Content.Main', new CheckboxField('ShowTitle'),'Metadata');
      $fields->addFieldToTab('Root.Content.Main', new TextField('Column1Width'),'Metadata');
      $fields->addFieldToTab('Root.Content.Main', new HtmlEditorField('Column1'),'Metadata');
      $fields->addFieldToTab('Root.Content.Main', new HtmlEditorField('Column2'),'Metadata');

      //AgmAgenda

      $gridFieldConfig2 = GridFieldConfig_RecordEditor::create(); 
      $gridfield2 = new GridField("ContentGallerys", "Content Gallerys", $this->ContentGallerys(), $gridFieldConfig2);

      $gridFieldConfig = GridFieldConfig_RecordEditor::create(); 
      $gridfield = new GridField("Huts", "Huts", Hut::get(), $gridFieldConfig);

      $fields->addFieldToTab('Root.Content.Huts', $gridfield);
      $fields->addFieldToTab('Root.Content.ContentGallerys', $gridfield2);

      return $fields;    
    }
}
 
class rakHunting_Controller extends Page_Controller {
 
  static function contentGalleryHandler($arguments, $content) {

    $printArray = array();

    $current = Controller::curr();

    $data = $current->ContentGallerys();

    $galleryHTML = "<ul class= 'content_gallery_wrapper small-block-grid-2 medium-block-grid-4'>";

    foreach ($data as $key => $value) {

      $galleryArray = array();

      if($value->ID == $arguments['id']){
      
        foreach ($value->ContentImages() as $key2 => $value2) {

          $galleryHTML = $galleryHTML."<li><a href='".$value2->Image()->Filename."'><img src='".$value2->Image()->Filename."' alt='".$value2->Image()->Filename."'/></a></li>";

        }

     }


    }

    $galleryHTML = $galleryHTML."</ul>";

    return $galleryHTML;

  }


  

}

?>