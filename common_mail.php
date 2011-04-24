<?php
	// common functions for email
	 function send_mail_godaddy($to, $subject, $body)
 // send an email to some one from godaddy
 {
	$headers= "From: customerservice@e2wstudy.com\r\n";
	$headers.= "Reply-To:customerservice@e2wstudy.com\r\n";
	$headers.= "Return-Path:customerservice@e2wstudy.com\r\n";

	if (mail($to,$subject,$body,$headers)) {
		echo ‘sent’;
	}
 }
	
?>