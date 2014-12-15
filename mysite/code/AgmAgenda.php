<?php

class AgmAgenda extends DataObject {

   private static $db = array(

        'OrderNumber' => 'Text',
        'Details' => 'Text',
        'RequestedBy' => 'Text',
        'Postal'=>'Text',
        'Status'=>'Text'
    
    );

    private static $has_one = array(
        
    );

    public static $summary_fields = array(
        'OrderNumber' => 'OrderNumber',
        'Details' => 'Details',
        'RequestedBy' => 'RequestedBy',
        'Postal'=>'Postal',
        'Status'=>'Status'    
    );

 
}



?>