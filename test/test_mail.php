<?php
	require_once('../common_mail.php');
	
	$to = 'dling61@yahoo.com';
	$subject = 'this is a good test';
	$body = ' We re going to be fine ';
	send_mail_godaddy($to, $subject, $body)
	
?>