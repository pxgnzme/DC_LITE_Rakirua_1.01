<?php
class ContactPage extends Page{

    private static $db = array(
        'Mailto' => 'Varchar(100)',
        'SubmitText' => 'Text',
        'ShowTitle' => 'Boolean',
        'Column1Width' => 'Text',
        'Column1' => 'HTMLText',
        'Column2' => 'HTMLText'
    );
     
    function getCMSFields() {
        $fields = parent::getCMSFields();
     
        $fields->addFieldToTab("Root.Content.OnSubmission", new TextField('Mailto', 'Email submissions to'));   
        $fields->addFieldToTab("Root.Content.OnSubmission", new TextareaField('SubmitText', 'Text on Submission')); 

        $fields->addFieldToTab('Root.Content.Main', new CheckboxField('ShowTitle'),'Metadata');
        $fields->addFieldToTab('Root.Content.Main', new TextField('Column1Width'),'Metadata');
        $fields->addFieldToTab('Root.Content.Main', new HtmlEditorField('Column1'),'Metadata');
        $fields->addFieldToTab('Root.Content.Main', new HtmlEditorField('Column2'),'Metadata');    
     
        return $fields;
    }

}
class ContactPage_Controller extends Page_Controller{

    private static $allowed_actions = array('Form');
    public function Form() {
        $fields = new FieldList(
            new TextField('Name'),
            new EmailField('Email'),
            new TextareaField('Message')
        );
        $actions = new FieldList(
            new FormAction('submit', 'Submit')
        );

        $validator = new RequiredFields('Name', 'Message');
        return new Form($this, 'Form', $fields, $actions, $validator); 
        //return new Form($this, 'Form', $fields, $actions);
    }

    public function submit($data, $form) {
        $email = new Email();
          
        $email->setTo($this->Mailto);
        $email->setFrom($data['Email']);
        $email->setSubject("Contact Message from {$data["Name"]}");
          
        $messageBody = "
            <p><strong>Name:</strong> {$data['Name']}</p>
            <p><strong>Message:</strong> {$data['Message']}</p>
        ";
        $email->setBody($messageBody);
        $email->send();
        return array(
            'Content' => '<p>'.$this->SubmitText.'</p>',
            'Form' => ''
        );
    }

}