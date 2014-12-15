<?php

class AgmMembers extends DataObject {

   private static $db = array(

        'Name' => 'Text',
        'Bio' => 'HTMLText',
        'Email' => 'Text'
       
    
    );

     public static $has_one = array(
        'Image' => 'Image',
      );

    public static $summary_fields = array(
        'Name' => 'Name',
        'Bio' => 'Bio',
        'Email' => 'Email',
        'Thumbnail' => 'Thumbnail'
    );

    public function getThumbnail() {

        return $this->Image()->CMSThumbnail();

    }

 
}



?>