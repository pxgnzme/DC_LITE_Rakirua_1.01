<?php

class Hut extends DataObject {

   private static $db = array(

        'Facility' => 'Text',
        'Name' => 'Text',
        'AltName' => 'Text',
        'Cycle'=>'Text',
        'Status'=>'Text',
        'Comments'=>'Text'
    
    );

    private static $has_one = array(
        
    );

    public static $summary_fields = array(
        'Facility' => 'Facility',
        'Name' => 'Name',
        'AltName' => 'AltName',
        'Cycle'=>'Cycle',
        'Status'=>'Status',
        'Comments'=>'Comments'   
    );

 
}



?>