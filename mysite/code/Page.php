<?php
class Page extends SiteTree {

	private static $db = array(
		
		'hasGallery' => 'Boolean',
		'hasFooterGallery' => 'Boolean'

	);

	private static $has_one = array(
	); 

	public static $has_many = array(
        'GalleryImages' => 'GalleryImage',
    );

    public function getCMSFields() {
 
	    $fields = parent::getCMSFields(); 

	    //Requirements::javascript('mysite/javascript/galleryToggle.js');
	    Requirements::javascript('mysite/javascript/galleryToggle.js');

	    //http://rmlt.co.nz/www/beta/mysite/javascript/galleryToggle.js

	    $gridFieldConfig = GridFieldConfig_RecordEditor::create(); 
	    $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
	    $gridfield = new GridField("GalleryImages", "Gallery Images", $this->GalleryImages()->sort("SortOrder"), $gridFieldConfig);

	    $galleryToggle = CheckboxField::create("hasGallery", "Does this page have a top gallery?")
        ->addExtraClass('hasGallery');

        $footerGalleryToggle = CheckboxField::create("hasFooterGallery", "Is there a footer gallery?")
        ->addExtraClass('hasFooterGallery');

	    /*$galleryToggle = new CheckboxField('hasGallery','Does this page have a top gallery?')

	    $galleryToggle->addExtraClass('hasGallery');*/

	    //->addExtraClass('switchable');

	    $fields->removeByName("Content");
	    $fields->addFieldToTab('Root.Content.TopGallery', $gridfield);

	    $fields->addFieldToTab('Root.Content.Main',$galleryToggle,'Metadata');
	    $fields->addFieldToTab('Root.Content.Main',$footerGalleryToggle,'Metadata');
	    //$fields->addFieldToTab('Root.Content.Gallery', new CheckboxField('hasGallery'));

	    return $fields;    
	}

}

class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
		'logout' 
	);

	public function Photos() {
        return $this->GalleryImages()->sort("SortOrder");
    }

	public function init() {
		parent::init();
		// You can include any CSS or JS required by your project here.
		// See: http://doc.silverstripe.org/framework/en/reference/requirements
	}

	public function footerImgWidth() {
        //$items = FooterImage::get()->sort('BlogTitle ASC');
        $items = GalleryItem::get();

        $imgPercent = 100/count($items);

        if($items) return $imgPercent."%";
        else return false;
    }

	public function items() {
        //$items = FooterImage::get()->sort('BlogTitle ASC');
        $items = GalleryItem::get()->sort('SortOrder ASC');
        if($items) return $items;
        else return false;
    }

    public function members() {
        //$items = FooterImage::get()->sort('BlogTitle ASC');
        $members = AgmMembers::get();
        if($members) return $members;
        else return false;
    }

    public function aslinks() {
        $aslinks = AssociationLink::get();
        if($aslinks) return $aslinks;
        else return false;
    }

	public function getColumn2Width($col1Width) {
    	return 12-$col1Width;
	}

	static function videoGalleryHandler($arguments, $content) {
	    // return some HTML:

	    $vids = video::get();

	    $num_vids = count($vids);

		$itemhtml = "<div class='large-12 video_wrapper'>";

		foreach ($vids as $key => $value) {

			$imgID = $value->ImageID;

			$imageData = Image::get()->byID($imgID);

			$targetWidth = 100/$num_vids;
			
			$itemhtml = $itemhtml."<div class= 'video_item medium-3 column' data-vid='$value->yid'><span class = 'video_des'>$value->des</span><span class = 'vid_thumb'><img src='$imageData->Filename' alt='video cover'/><span class= 'playtag'><i class= 'fi-play-circle'></i> CLICK TO WATCH</span></span></div>";

		}

		$itemhtml = $itemhtml . "</div>";

	    return $itemhtml;

	    //return video::get();

	}

	static function photoGalleryHandler($arguments, $content) {

		$galleryimg = FooterImage::get();

		$itemhtml = "<div class = 'photo_gallery'>";

		foreach ($galleryimg as $key => $value) {
			
			$imgID = $value->ImageID;
			//$imageData = Image::get()->byID($imgID);

			$imageData = DataObject::get('FooterImage',$imgID);

			

			//$imageDisplay = $imageData->Filename;

			//$imageDisplay = $imageData->getImage;

			$imageDisplay = print_r($imageData,true);
			//$imageDisplay = $imageData->getImage;

			//$imageDisplay = $imgObj->getImage;

			//$imageDisplay = $imageData->resizeByWidth(600);
			//$imageDisplay = $imageDisplay->croppedImage(400,400);

			//$itemhtml = $itemhtml."<div class='columns medium-3'><a href='$imageData->Filename' target='_blank'><img src='$imageData->Filename' alt=''/></a></div>";

			$itemhtml = $itemhtml."<div class='columns medium-3'><a href='$imageData->Filename' target='_blank'>$imageDisplay</a></div>";


		}

		$itemhtml = $itemhtml."</div>";

		return $itemhtml;

	}

	static function agendaTableHandler($arguments, $content) {

		$agendaItems = AgmAgenda::get();

		$agendaHTML = "<table class = 'content_table'><thead><tr><td></td><td>Details</td><td>Requested by</td><td>Postal Voting</td><td>Status</td></tr></thead><tbody>";

		foreach ($agendaItems as $key => $value) {
			
			$agendaHTML = $agendaHTML."<tr>";

			$agendaHTML = $agendaHTML."<td>".$value->OrderNumber."</td>"."<td>".$value->Details."</td>"."<td>".$value->RequestedBy."</td>"."<td>".$value->Postal."</td>"."<td>".$value->Status."</td>";

        	$agendaHTML = $agendaHTML."</tr>";

		}

		$agendaHTML = $agendaHTML."</tbody></table>";

		

		return $agendaHTML;

	}

	static function hutsHandler($arguments, $content) {

		$hutItems = Hut::get();

		$hutHTML = "<table class = 'content_table'><thead><tr><td>Facility</td><td>Block name</td><td>Rotation Day</td><td>1 Week Price</td><td>2 Week Price</td><td>Comments</td></tr></thead><tbody>";

		foreach ($hutItems as $key => $value) {
			
			$hutHTML = $hutHTML."<tr>";

			$hutHTML = $hutHTML."<td>".$value->Facility."</td>"."<td>".$value->Name."</td>"."<td>".$value->RotationDay."</td>"."<td>".$value->OneWeekPrice."</td>"."<td>".$value->TwoWeekPrice."</td>"."<td>".$value->Comments."</td>";

        	$hutHTML = $hutHTML."</tr>";

		}

		$hutHTML = $hutHTML."</tbody></table>";



		

		return $hutHTML;

	}

	

	

	static function openbookingHandler($arguments, $content) {

		$targetClass = $arguments['class'];
		$targetTitle = $arguments['title'];
		$targetSend = $arguments['sendto'];

		return "<button class= '$targetClass' data-sendto='$targetSend'>$targetTitle</button>";

	}


	public function isLoggedIn() {

        if( $member = Member::currentUser() ) {
		    // Work with $member
		    return $member;

		} else {
		    
			return false;
		    // Do non-member stuff
		}
    }

    function logout() {

	   Security::logout(false);

	   Director::redirect("/");

	}



}








