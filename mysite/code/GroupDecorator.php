<?php
class GroupDecorator extends DataObjectDecorator {

	public function extraStatics(){
         
        return array(
            'db' => array(
                "GoToAdmin" => "Boolean"
            ),
            'has_one' => array(
                "LinkedPage" => "SiteTree"
            ),
        );
    }

    //public function updateCMSFields(FieldSet &$fields) {
    public function updateCMSFields(FieldSet $fields) {
       $fields->addFieldToTab("Root.Members", new CheckboxField("GoToAdmin", " Go to Admin area"), 'Members');
       $fields->addFieldToTab("Root.Members", new TreeDropdownField("LinkedPageID", "Or select a Page to redirect to", "SiteTree"), 'Members');
    }

}
