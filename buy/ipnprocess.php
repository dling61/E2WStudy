<?php
	require_once('../constants.php');
	require_once('../common_fns.php');
	require_once('../common_fns_payment.php');
	// this is to chnage the status of service selection to "checkout" so that we can assign it to editor
	function status_update($int_txns,$ppstatus,$total_amount,$ext_txns) {
	
		$dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		// keep the history of payment status changes
		$query = "insert into service_payment(int_transaction_id, payment_status, total_amount, ext_transaction_id, create_datetime) values('$int_txns','$ppstatus','$total_amount','$ext_txns',NOW())";
		$data = mysqli_query($dbc,$query)or die(mysqli_error());
		
		if ($ppstatus == 'Completed' || $ppstatus == 'completed' ) {
			$query1 = "select service_selection_id ssid, service_status sstatus from service_selection where transaction_id ='$int_txns' and service_status = 'checkout'";
			$data1 = mysqli_query($dbc,$query1)or die(mysqli_error());
			$num1 = mysqli_num_rows($data1);
			
			$service_status = "paid";
			if($num1!=0){
				while($row1 = mysqli_fetch_array($data1)){
					$s_id = $row1['ssid'];
					$s_status = $row1['sstatus'];
					if ($s_status == 'checkout') {
						$query2 = "update service_selection set service_status = \"$service_status\" WHERE service_selection_id ='$s_id'";
						$data2 = mysqli_query($dbc,$query2)or die(mysqli_error());
					}
				}
			}
		}		
		mysqli_close($dbc);
	}
 
	function custom_emailtext($message) {
		//foreach ($_POST as $key => $value){
		//	$emailtext .= $key . " = " .$value ."\n\n";
		//}
	}
?>
<?php
	// This is a IPN listener page
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
				
				// assign posted variables to local variables
				$payment_status = $_POST['payment_status'];
				$payment_amount = $_POST['mc_gross'];
				$payment_currency = $_POST['mc_currency'];
				$txn_id = $_POST['txn_id'];
				$receiver_email = $_POST['receiver_email'];
				$payer_email = $_POST['payer_email'];
				// internal transaction ID passed by e2wstudy
				$custom = $_POST['custom'];				

				// receiver_email, that's our email address
				$receiver_email = $_POST['receiver_email'];
					
				// update the service status to change it to "paid" if the payment status is "Completed"
				status_update($custom, $payment_status,$payment_amount,$txn_id);
				
				// if all these conditions are true, send the email
				// note: should also verify that $txn_id was not used before
				//$mail_From = "From: customerservice@e2wstudy.com";
				$mail_To = $payer_email;
				$mail_Subject;
				$mail_Body = "Dear customer: \n\n";
				$emailtext = "Your order status is updated";
				
				if ($payment_status == 'Completed')
					//($receiver_email == $our_email) &&
					//($payment_amount == $amount_they_should_have_paid ) &&
					//&& ($payment_currency == "USD")) {
				{
					$mail_Subject = "Your payment is completed now";
				}
				else if ($payment_status == 'Pending') {
					$mail_Subject = "Your payment is in pending now";
				}
				//custom_emailtext($_POST);
				// mail to customer to inform the payment status
				mail($mail_To, $mail_Subject, $emailtext . "\n\n" . $mail_Body);					
			}
			else if (strcmp ($res, "INVALID") == 0) {
				// log for manual investigation
				$mail_From = "From: customerservice@e2wstudy.com";
				$mail_To = "dling61@yahoo.com";
				$mail_Subject = "INVALID IPN  ---- Please check it now";
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

