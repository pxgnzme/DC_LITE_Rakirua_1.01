<?php
class CustomLoginForm extends MemberLoginForm {

	public function dologin($data) {
		
        if($this->performLogin($data)) {
                if(!$this->redirectByGroup($data))
                    Director::redirect(Director::baseURL());
        } else {
            if($badLoginURL = Session::get("BadLoginURL")) {
                Director::redirect($badLoginURL);
            } else {
                Director::redirectBack();
            }
        }     
    }

     public function redirectByGroup($data){  
        // gets the current member that is logging in
        $member = Member::currentUser();
         
        // gets all the groups.
        $Groups = DataObject::get("Group");
         
        //cycle through each group 
        foreach($Groups as $Group)
        {
            //if the member is in the group and that group has GoToAdmin checked
            if($member && $member->inGroup($Group->ID) && $Group->GoToAdmin)
            {  
                //redirect to the admin page
                return Director::redirect(Director::baseURL() . 'admin' );
            }
            //otherwise if the member is in the group and that group has a page linked
            elseif($member && $member->inGroup($Group->ID)  && $Page = $Group->LinkedPage())
            {  
                //direct to that page
                return Director::redirect(Director::baseURL() . $Page->Link());             
            }
        }
         
        return false;
    }

}
