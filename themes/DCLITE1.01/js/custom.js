// version 1.01

$(document)
.on('open.fndtn.offcanvas', '[data-offcanvas]', function() {
  $('html').css('overflow', 'hidden');
  $.logThis("OPEN");
})

$(document).ready(function() {
	

	placeholderFix();

	gallerySlider();

	videoGallery();

	bookingListerners();

	loginListeners();
	
});

function loginListeners(){

	//login_btn

	$("header .login_btn").on('click',function(e){

		e.preventDefault();

		$('header .login_btn').hide();

		$('.close_login').show();

		$('.login_form_container').show();

	});

	$(".right-off-canvas-menu .login_btn").on('click',function(e){

		e.preventDefault();

		$('.right-off-canvas-menu .login_form_container').show();

	});

	$('.close_login').on('click',function(){

		$('.close_login').hide();

		$('header .login_btn').show();

		$('.login_form_container').hide();

	});

	$('#MemberLoginForm_LoginForm_action_dologin').addClass("button");

	$('#Email label').html("Username");

};

function bookingListerners(){

	$('.booking_btn').on('click',function(){

		var sendto = $(this).attr('data-sendto');

		var formHTML = '<h2>Make a booking</h2><form><div class = "form_feild" id = "valid_1"><label class= "form_label">Your Name:</label><input type="text" name="fname" id="name" placeholder = "Enter your name" class="serial" data-val = "1" data-id="1"/><small class="error">Enter your name</small></div><div class = "form_feild" id = "valid_2"><label class= "form_label">Email:</label><input type="Email" name="email" id="email" placeholder = "email" class="serial" data-val = "1" data-id="2"/><small class="error">Enter a valid email</small></div><div class = "form_feild" id = "valid_3"><label class= "form_label">Your phone number:</label><input type="text" name="phone" id="phone" placeholder = "Your phone number" class="serial" data-val = "1" data-id="3"/><small class="error">Enter your phone number</small></div><div class = "form_feild" id = "valid_4"><label class= "form_label">Hunting Block:</label><input type="text" name="block" id="block" placeholder = "Hunting block" class="serial" data-val = "1" data-id="4"/><small class="error">Enter a hunting block name</small></div><div class = "form_feild" id = "valid_5"><label class= "form_label">Proposed from date:</label><input type="text" name="fromd" id="deadline" placeholder = "Proposed from date" class="serial datepicker" data-val = "1" data-id="5"/><small class="error">Enter proposed from date for the booking</small></div><div class = "form_feild" id = "valid_6"><label class= "form_label">Proposed to date:</label><input type="text" name="tod" id="deadlineto" placeholder = "Proposed to date" class="serial datepicker" data-val = "1" data-id="6"/><small class="error">Enter proposed to date for the booking</small></div><div class = "form_feild" id = "valid_7"><label class= "form_label">Comments:</label><textarea name="com" id="brief" placeholder="Comments" class="serial multiline" id = "brief" data-val = "0" data-id="7"></textarea></div></form><div class = "large-12 columns"><button class = "expand button" id = "submit_btn">SUBMIT</button></div>';

		$('#modal_container').html(formHTML);

		$('#page_modal').foundation('reveal', 'open');

		placeholderFix();

		$('#submit_btn').on('click',function(){

			$(this).hide();
			var sendmail = true;

			$(".form_feild .error").hide();
			$('.form_feild').removeClass('error');

			$('.serial').each(function(value,index){

				if($(this).attr("data-val") > 0 ){

					if($(this).attr("type") == "Email"){

						if(!validateEmail($(this).val())){

							sendmail = false;

							var targetID = $(this).attr("data-id");

							$('#valid_'+targetID).addClass('error');

							$('#valid_'+targetID+" .error").css('display','block');


						}

					}else{

						if($(this).val().length == 0){

							sendmail = false;

							var targetID = $(this).attr("data-id");

							//$.logThis("target id :> "+targetID);

							$('#valid_'+targetID).addClass('error');

							$('#valid_'+targetID+" .error").css('display','block');

						}

					}

				}	

			});

			if(sendmail){

				$('#submit_btn').off('click');

				$.post(

	      			"scripts/send_mail.php",

	      			{
	      				formdata:$('.serial').serialize(),
	      				sendto:sendto
	      			},

	      			function(data){

	      				$.logThis(data.status);

	      				if(data.status == "success"){

	      					$("#submit_2").show();

	      					$('#page_modal').foundation('reveal', 'close');

	      					/*$('#thanks_modal').foundation('reveal', 'open');

	      					$("#submit_thankyou").html("<h2>Thankyou for submitting your site brief. We will be in touch soon...</h2>");*/
	      					

	      				}else{

	      					alert("Sorry there was an error sending the booking");

	      					$("#submit_2").show();

	      				}

	      			},

	      			"json"

	      		);

			}else{

				$('#submit_btn').show();

			}

		});

	})

}

function videoGallery(){

	$('.video_item').on('click',function(){

		//$('#video_modal').foundation('reveal', 'open');

		var targetID = $(this).attr('data-vid');
		
		//var embedHTML = '<iframe width="100%" height="450" src="//www.youtube.com/embed/'+targetID +'" frameborder="0" allowfullscreen></iframe>';

		//$('#youtube_container').html(embedHTML);

		var linkURL = "https://www.youtube.com/embed/"+targetID;

		window.open(
		  linkURL,
		  '_blank' // <- This is what makes it open in a new window.
		);



	});

};

function gallerySlider(){

	$.logThis("load slider");

	//$('.gallery_frame').slick({arrows:false,dots:false,autoplay:true});
	
	/*$('.gallery_frame').superslides({
		inherit_width_from: '.gallery_wrapper',
		inherit_height_from: '.gallery_wrapper'
	});*/

	$('#slides').superslides({
		play:8000,
		inherit_width_from: '.gallery_wrapper',
		inherit_height_from: '.gallery_wrapper',
		animation:'fade'
	});

}

// =====================================================================================================

//IE placehoder input fix
function placeholderFix(){

	$.logThis("placeholder fix called");

    //ie placeholder fix
    $.support.placeholder = ( 'placeholder' in document.createElement('input') );
	
	if($.support.placeholder){

		$.logThis("placeholder supported");
		
		$('.form_label').hide();
	}

}

// validate email
function validateEmail(email){ 

	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/; 
	
	if(!reg.test(email)){ 
	
		return false;
	
	}else{
		
		return true;
		
	} 

} 

// CONSOLE LOG FUNCTION ---------------------------------------------
// taken from http://www.nodans.com/index.cfm/2010/7/12/consolelog-throws-error-on-Internet-Explorer-IE

jQuery.logThis = function(text){
	
   if((window['console'] !== undefined)){
	   
        console.log(text);
		
   }

}