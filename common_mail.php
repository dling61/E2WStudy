<?php
function send_mail_godaddy($to, $subject, $body)
 // send an email to some one from godaddy
 {
	$headers= "From: customerservice@e2wstudy.com\r\n";
	$headers.= "Reply-To:customerservice@e2wstudy.com\r\n";
	$headers.= "Return-Path:customerservice@e2wstudy.com\r\n";
	
	mail($to,$subject,$body,$headers);
 }	
?>