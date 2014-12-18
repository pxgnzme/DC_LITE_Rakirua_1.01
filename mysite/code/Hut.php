<?php

class Hut extends DataObject {

   private static $db = array(

        'Facility' => 'Text',
        'Name' => 'Text',
        'RotationDay' => 'Text',
        'OneWeekPrice'=>'Text',
        'TwoWeekPrice'=>'Text',
        'Comments'=>'Text'
    
    );

    private static $has_one = array(
        
    );

    public static $summary_fields = array(
        'Facility' => 'Facility',
        'Name' => 'Name',
        'RotationDay' => 'RotationDay',
        'OneWeekPrice'=>'OneWeekPrice',
        'TwoWeekPrice'=>'TwoWeekPrice',
        'Comments'=>'Comments'   
    );

 
}



?>