<?php
class Appearance extends DataObject {
    private static $db = array(
        'BgColor' => 'Color',
        'h1Color' => 'Color',
        'h2Color' => 'Color',
        'h3Color' => 'Color',
        'h4Color' => 'Color',
        'h5Color' => 'Color',
        'pColor' => 'Color',
        'h1Size' => 'Text',
        'h2Size' => 'Text',
        'h3Size' => 'Text',
        'h4Size' => 'Text',
        'h5Size' => 'Text',
        'bodySize' => 'Text',
        'navBgColor' => 'Color',
        'navInnerWidth' => 'Text',
        'navInnerBgColor' => 'Color',
        'bodyBgColor' => 'Color',
        'bodyInnerWidth' => 'Text',
        'bodyInnerBgColor' => 'Color',
        'footerBgColor' => 'Color',
        'footerInnerWidth' => 'Text',
        'footerInnerBgColor' => 'Color'
    );

	public static $has_one = array(
		'siteLogo' => 'Image'
	);

    public static $has_many = array(
        'AssociationLink' => 'AssociationLink',
    );

    public function getCMSFields(/*FieldList $fields*/) {

        $fields = parent::getCMSFields();

    	//GENERAL SITE CONFIG
        $fields->addFieldToTab('Root.Main', new UploadField('siteLogo', 'Site logo'));

        //GENERAL LAYOUT CONFIG
        $fields->addFieldToTab('Root.Layout', new ColorField('BgColor', 'Background colour'));
        $fields->addFieldToTab('Root.Layout', new ColorField('h1Color', 'H1 colour'));
        $fields->addFieldToTab('Root.Layout', new ColorField('h2Color', 'H2 colour'));
        $fields->addFieldToTab('Root.Layout', new ColorField('h3Color', 'H3 colour'));
        $fields->addFieldToTab('Root.Layout', new ColorField('h4Color', 'H4 colour'));
        $fields->addFieldToTab('Root.Layout', new ColorField('h5Color', 'H5 colour'));
        $fields->addFieldToTab('Root.Layout', new ColorField('pColor', 'Paragraph colour'));
        $fields->addFieldToTab('Root.Layout', new TextField('bodySize', 'Body font size'));
        $fields->addFieldToTab('Root.Layout', new TextField('h1Size', 'H1 size'));
        $fields->addFieldToTab('Root.Layout', new TextField('h2Size', 'H2 size'));
        $fields->addFieldToTab('Root.Layout', new TextField('h3Size', 'H3 size'));
        $fields->addFieldToTab('Root.Layout', new TextField('h4Size', 'H4 size'));
        $fields->addFieldToTab('Root.Layout', new TextField('h5Size', 'H5 size'));
        
        //NAV
        $fields->addFieldToTab('Root.Nav', new ColorField('navBgColor', 'Navigation background color'));
        $fields->addFieldToTab('Root.Nav', new TextField('navInnerWidth', 'Navigation inner width'));
        $fields->addFieldToTab('Root.Nav', new ColorField('navInnerBgColor', 'Navigation inner background color'));

        //HEADER
        $fields->addFieldToTab('Root.Header', new ColorField('headerBgColor', 'Header background color'));
        $fields->addFieldToTab('Root.Header', new TextField('headerInnerWidth', 'Header inner width'));
        $fields->addFieldToTab('Root.Header', new ColorField('headerInnerBgColor', 'Header inner background color'));

         //BODY
        $fields->addFieldToTab('Root.Body', new ColorField('bodyBgColor', 'Body background color'));
        $fields->addFieldToTab('Root.Body', new TextField('bodyInnerWidth', 'Body inner width'));
        $fields->addFieldToTab('Root.Body', new ColorField('bodyInnerBgColor', 'Body inner background color'));

         //BODY
        $fields->addFieldToTab('Root.Footer', new ColorField('footerBgColor', 'Footer background color'));
        $fields->addFieldToTab('Root.Footer', new TextField('footerInnerWidth', 'Footer inner width'));
        $fields->addFieldToTab('Root.Footer', new ColorField('footerInnerBgColor', 'Footer inner background color'));

        //$gridFieldConfig = GridFieldConfig_RecordEditor::create(); 

        //$gridfield = new GridField('AssociationLink', 'Association Links', new DataList('AssociationLink'), GridFieldConfig_Base::create());

        /*$gridFieldConfig =GridFieldConfig::create()->addComponents(
            newGridFieldToolbarHeader(),
            newGridFieldAddNewButton('toolbar-header-right'),
            newGridFieldSortableHeader(),
            newGridFieldDataColumns(),
            newGridFieldPaginator(15),
            newGridFieldEditButton(),
            newGridFieldDeleteAction(),
            newGridFieldDetailForm(),newGridFieldFilterHeader(),
        );*/
        
        //$gridfield = new GridField("AssociationLink", "Association Links", new DataList('AssociationLink'), $gridFieldConfig);
        //$gridfield = new GridField("AssociationLink", "Association Links", $this->AssociationLink(), $gridFieldConfig);
        //$this->RegisterEvents()
        //$gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
        


        $fields->addFieldToTab('Root.FooterGallery', $gridfield);
    	
    }

}









