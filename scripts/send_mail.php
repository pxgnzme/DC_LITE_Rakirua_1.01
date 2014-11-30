<?php 

$dev = false;

//GET form data
$form_data = $_POST['formdata'];
parse_str($form_data);

if($dev){

	$sendto = "frazer.cameron@nzme.co.nz";

}else{

	$sendto = $_POST['sendto'];
}

// Send email

$mailcheck = spamcheck($email);

	if($mailcheck == FALSE){

		echo json_encode(array("status"=> "invalid", "hint"=>"invalid email"));
		
	}else{

	$subject_em1 = "A new Rakiura hunting booking";
	$recipient_em1 = $sendto;

	//create a boundary for the email.
	$boundary = uniqid('np');

	$headers_em1 = "MIME-Version: 1.0\r\n";
	$headers_em1 .= "From: ".$email." \r\n";
	$headers_em1 .= "To: ".$recipient_em1."\r\n";
	$headers_em1 .= "Content-Type: multipart/alternative;boundary=" . $boundary . "\r\n";

	$message_em1 = "This is a MIME encoded message.";
	//txt email
	$message_em1 .= "\r\n\r\n--" . $boundary . "\r\n";
	$message_em1 .= "Content-type: text/plain;charset=utf-8\r\n\r\n";

	$message_em1 .= 'Name: ' .$fname. "\n\n";
	$message_em1 .= 'Phone: '.$phone."\n\n";
	$message_em1 .= $email."\n\n";
	$message_em1 .= 'Hunting block: '.$block."\n\n";
	$message_em1 .= 'From: '.$fromd."\n\n";
	$message_em1 .= 'To: '.$tod."\n\n";
	$message_em1 .= $com;

	//HTMl email
	$message_em1 .= "\r\n\r\n--" . $boundary . "\r\n";
	$message_em1 .= "Content-type: text/html;charset=utf-8\r\n\r\n";

	$message_em1 .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>'. $subject_em1 .'</title>
	<style type="text/css">
	
	body{
		background-color:#FFFFFF;
	}
	
	</style>
	</head>

	<body style="background-color:#FFF;margin:0px;padding:0px">
	
	<!-- / MAIN WRAPPER \ -->
	<table width="96%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFF" bordercolor="white" style="background-color:#FFF">
		
		<tr>
		
			<td align="center">

				<table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="background-color:#FFF">

					<tr>
						<td bgcolor="#fff" style="text-align:left;padding:10px;font-family: Arial, sans-serif;font-size:18px;color:#666;background-color:#FFF">

<strong style="font-weight:bold">'. $subject_em1 .'</strong><br><br>
<strong style="font-weight:bold">Booking details:</strong><br>
Name: ' .$fname. '<br>
Phone: '.$phone.'<br>
<a href="mailto:'.$email.'" target="_blank">email</a><br><br>
Hunting block: '.$block.'<br>
From: '.$fromd.'<br>
To: '.$tod.'<br>
<strong style="font-weight:bold">Comments:</strong><br>
'.$com.'

						<!----></td>
					</tr>

				</table>

			<!----></td>

		</tr>

	</table>

	</body>';

	$message_em1 .= "\r\n\r\n--" . $boundary . "--";

	$body_em1 = $message_em1;

	$mailSent_em1 = mail('', $subject_em1, $body_em1, $headers_em1);

	if($mailSent_em1){
		
		die(json_encode(array("status"=>"success")));
		// --
		
	}else{
		
		die(json_encode(array("status"=>"error sending email1")));
		
	}

}

// --------------------------------- SPAM CHECK FUNC

function spamcheck($field){
	
	//filter_var() sanitizes the e-mail
	//address using FILTER_SANITIZE_EMAIL
	$field=filter_var($field, FILTER_SANITIZE_EMAIL);

	//filter_var() validates the e-mail
	//address using FILTER_VALIDATE_EMAIL
	if(filter_var($field, FILTER_VALIDATE_EMAIL)){
	  
		return TRUE;
		
	}else{
		
		return FALSE;
		
	}
	
}



?>