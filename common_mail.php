<?php
<<<<<<< HEAD
function send_mail_godaddy($to, $subject, $body)
=======
	// common functions for email
	 function send_mail_godaddy($to, $subject, $body)
>>>>>>> 2124966791d021f34e011f66f32ebf034f30290e
 // send an email to some one from godaddy
 {
	$headers= "From: customerservice@e2wstudy.com\r\n";
	$headers.= "Reply-To:customerservice@e2wstudy.com\r\n";
	$headers.= "Return-Path:customerservice@e2wstudy.com\r\n";
<<<<<<< HEAD
	
	mail($to,$subject,$body,$headers);
 }	
=======

	if (mail($to,$subject,$body,$headers)) {
		echo ‘sent’;
	}
 }
	
>>>>>>> 2124966791d021f34e011f66f32ebf034f30290e
?>