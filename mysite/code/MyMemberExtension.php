<?php
class MyMemberExtension extends DataExtension {

    private static $db = array(
        "GoToAdmin" => "Boolean"
    );
    private static $has_one = array(
        "LinkedPage" => "SiteTree"
    );
    public function updateCMSFields(FieldList $fields) {
          
           $fields->addFieldToTab("Root.Members", new CheckboxField("GoToAdmin", " Go to Admin area"), 'Members');
            $fields->addFieldToTab("Root.Members", new TreeDropdownField("LinkedPageID", "Or select a Page to redirect to", "SiteTree"), 'Members');

          $fields->push(new CheckboxField("GoToAdmin", "Go to Admin area"));
          $fields->push(new TreeDropdownField("LinkedPageID", "Or select a Page to redirect to", "SiteTree"));
    }
}

?>
