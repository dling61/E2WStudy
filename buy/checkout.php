<?php
  session_start();
  require_once('../constants.php');
  require_once('../common_fns.php');
  require_once('../common_fns_payment.php');
  // ensure the user is logged
  check_valid_user(); 
?>
<?php
    // transaction Id
	$txns = rand();
	
	function checkout() {
	    global $txns;
		$myOrder = $_SESSION['myOrder'];
		$myIndex = $_SESSION['myIndex'];
		
		// ename   0--   essay name
		// stypeid 1---  service type ID
		// eid     2---- essay ID
		// ssid    3---- Service Selection ID
		// price   4---- price
		
		// it is to insert an internal transaction ID for checkout items
		$dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		
		for ($row = 0; $row < $myIndex; $row++) {
		    $ssid = $myOrder[$row][3];
			$query = "update service_selection set transaction_id = '$txns', service_status = 'checkout', last_update_datetime = Now() where service_selection_id = '$ssid'";
			
			$data = mysqli_query($dbc,$query)or die(mysqli_error());

		}
		mysqli_close($dbc);
	}
	
	function paypal() {
	     global $txns;
	
		// this is to construct a http request to paypal
		$myOrder = $_SESSION['myOrder'];
		$myIndex = $_SESSION['myIndex'];
		
		$urlvariables = array();
		// fixed values
		$urlvariables['cmd'] = '_cart';
		$urlvariables['upload'] = '1';
		$urlvariables['business'] = PAYPAL_BUSINESS_ACCOUNT;
		
		//  dynamically generate items
		$inumber = 1;
		for ($row = 0; $row < $myIndex; $row++) {
		    // multiple items 
			$item_name = "item_name_".$inumber;
			$item_amount = "amount_".$inumber;
			if ($myOrder[$row][1] == 1) 
				$item_value = $myOrder[$row][0]." "."Basic";
			else 
				$item_value = $myOrder[$row][0]." "."Comprehensive";
				
			$urlvariables[$item_name] = $item_value;
			$urlvariables[$item_amount] = $myOrder[$row][4];
			++$inumber;
		}
		
		// pass the transaction ID to paypal
		$urlvariables['custom'] = $txns;
		
		// fixed values
		$urlvariables['shipping'] = '2';
		$urlvariables['currency_code'] = 'USD';
		$urlvariables['return'] = 'http://www.e2wstudy.com/buy/confirmation.php';
		$urlvariables['cancel_return'] = 'http://www.e2wstudy.com/buy/confirmation.php';
	
	    $paypal = http_build_query($urlvariables);
		$paypal = PAYPAL_WEB_URL.'? '.$paypal;
		
		header("Location:".$paypal);
	}

	//insert a transaction ID into service selection table
	checkout();
	// set the cookie to remember the transaction ID
	setcookie('custom', $txns, time() + (60 * 60 * 24 ));  // expires in one day
	// redirect to paypal web site
	paypal();
?>