
<?php 
$dontsendemail = 0;
$possiblespam = FALSE;
$strlenmessage = "";
$email = $_REQUEST['email']; 
$message = $_REQUEST['message']; 
$subject = "website contact form inquiry";$emailaddress = "beejwagner@gmail.com"; /* NOTE: Although your email address 
	is visible here in this code, the person contacting you will never see this email address. 
	Your email address will remain on your server, and it will not be sent from your server 
	to the person contacting you. It will also remain invisible to spam bots. Your email address
	is also never stored on any of our servers. You can choose to delete or not delete this note
	when you publish this page. 
	It will not change the functionality of the contact form. 
	*/

function checkemail($field) {
	// checks proper syntax
	if( !preg_match( "/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/", $field))
	{
		die("Improper email address detected. Please hit your browser back button and try again."); 
		return 1;
	}
}

function strlencheck($field,$minlength,$whichfieldresponse) {
	if (strlen($field) < $minlength){
		die($whichfieldresponse); 
		return 1;
	}
}

if ($dontsendemail == 0) $dontsendemail = checkemail($email);

if ($dontsendemail == 0) $dontsendemail = strlencheck($email,5,"The email address field is too short. Please hit your browser back button and check your entry.<br />");

if ($dontsendemail == 0) $dontsendemail = strlencheck($message,1,"The message field is too short. Please hit your browser back button and check your entry.<br />");
if ($dontsendemail == 0) $dontsendemail = strlencheck($emailaddress,2,"You have not selected a recipient of your message. Please hit your browser back button and check your entry.<br />");
if ($dontsendemail == 0) {mail($emailaddress,"Subject: $subject",$message,"From: $email" ); include('index.php');}
?>
