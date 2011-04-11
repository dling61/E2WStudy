
<?php

	require_once('../constants.php');
	require_once('../common_fns.php');
	require_once('../common_fns_payment.php');
	// this is to chnage the status of service selection to "checkout" so that we can assign it to editor
	function status_update($custom) {
	
	$dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		
	$service_status = "paid";
	$query1 = "select service_selection_id ssid, service_status sstatus from service_selection where transaction_id ='$custom' and service_status = 'checkout'";
	$data1 = mysqli_query($dbc,$query1)or die(mysqli_error());
	$num1 = mysqli_num_rows($data1);
	
	if($num1!=0){
		while($row1 = mysqli_fetch_array($data)){
		    $s_id = $row1['ssid'];
			$s_status = $row1['sstatus'];
		    if ($s_status == 'selected') {
				$query = "update service_selection set service_status = \"$service_status\" WHERE service_selection_id ='$s_id'";
				$data = mysqli_query($dbc,$query)or die(mysqli_error());
			}
		}
	}	
    mysqli_close($dbc);
 }

?>

<?php
	// This is a IPN listener page
	//include_once("Mail.php"); 

	// read the post from PayPal system and add 'cmd'
	$req = 'cmd=_notify-validate';

	foreach ($_POST as $key => $value) {
		$value = urlencode(stripslashes($value));
		$req .= "&$key=$value";
	}

	// post back to PayPal system to validate
		
	$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
	 
		// If testing on Sandbox use: 
	$header .= "Host: www.sandbox.paypal.com:443\r\n";
	//$header .= "Host: www.paypal.com:443\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

		// If testing on Sandbox use:
	$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
	//$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);

	// assign posted variables to local variables
	$item_name = $_POST['item_name'];
	$item_number = $_POST['item_number'];
	$payment_status = $_POST['payment_status'];
	$payment_amount = $_POST['mc_gross'];
	$payment_currency = $_POST['mc_currency'];
	$txn_id = $_POST['txn_id'];
	$receiver_email = $_POST['receiver_email'];
	$payer_email = mysql_escape_string($_POST['payer_email']);

	if (!$fp) {
	// HTTP ERROR
	} else {
		fputs ($fp, $header . $req);
		while (!feof($fp)) {
			$res = fgets ($fp, 1024);
			if (strcmp ($res, "VERIFIED") == 0) {
				// check the payment_status is Completed
				// check that txn_id has not been previously processed
				// check that receiver_email is your Primary PayPal email
				// check that payment_amount/payment_currency are correct
				// process payment
				
				$payment_status = $_POST['payment_status'];
				$payment_amount = $_POST['mc_gross'];
				$payment_currency = $_POST['mc_currency'];
				$txn_id = $_POST['txn_id'];
				
				// custom info
				$custom = $_POST['custom'];
				
				// buyer info
				$payer_email = $POST['payer_email'];
				$first_name = $_POST['first_name'];
				$address_city = $_POST['address_city'];
				$address_state = $_POST['address_state'];
				$address_country = $_POST['address_country'];

				// receiver_email, that's our email address
				$receiver_email = $_POST['receiver_email'];

				// put your actual email address here
				// test email: dling7_1296533755_biz@hotmail.com
				// real email: ding.dongling@gmail.com
				// $our_email = 'foobar@example.com';
				$our_email = 'dling7_1296533755_biz@hotmail.com';
				
				// if all these conditions are true, send the email
				// note: should also verify that $txn_id was not used before
				if (($payment_status == 'Completed') &&
					//($receiver_email == $our_email) &&
					//($payment_amount == $amount_they_should_have_paid ) &&
					&& ($payment_currency == "USD")) {
					
					// update the service status to change it to "checkout"
					status_update($custom);
				
					//$mail_From = "From: customerservice@e2wstudy.com";
					// TBD: will change it to the payer email address
					$mail_To = "dling61@yahoo.com";
					$mail_Subject = "VERIFIED IPN";
					$mail_Body = $req;

					foreach ($_POST as $key => $value){
						$emailtext .= $key . " = " .$value ."\n\n";
					}

					//mail($mail_To, $mail_Subject, $emailtext . "\n\n" . $mail_Body, $mail_From);
					mail($mail_To, $mail_Subject, $emailtext . "\n\n" . $mail_Body);
				}
			}
			else if (strcmp ($res, "INVALID") == 0) {
				// log for manual investigation

				$mail_From = "From: customerservice@e2wstudy.com";
				$mail_To = "dling61@yahoo.com";
				$mail_Subject = "INVALID IPN";
				$mail_Body = $req;

				foreach ($_POST as $key => $value){
					$emailtext .= $key . " = " .$value ."\n\n";
				}
				
				//mail($mail_To, $mail_Subject, $emailtext . "\n\n" . $mail_Body, $mail_From);
				mail($mail_To, $mail_Subject, $emailtext . "\n\n" .$mail_Body);
			
			}
		}	
	}
	fclose ($fp);
?>

