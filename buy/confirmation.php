
<?php 
	//require_once('common_fns_payment.php');
?>


<?php
    // This is PDT return page and we need to process multiple items and amounts

	// read the post from PayPal system and add 'cmd'
	$req = 'cmd=_notify-synch';

	$tx_token = $_GET['tx'];

	$auth_token = "uWaLjkNaKHr9EeLceCQvWO1uV6xWjShCs7WkbNA16MblVN0d5x9FVtbbWIK";

	$req .= "&tx=$tx_token&at=$auth_token";


	// post back to PayPal system to validate
	$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
	$fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30);
	// If possible, securely post back to paypal using HTTPS
	// Your PHP server will need to be SSL enabled
	// $fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);

	if (!$fp) {
	// HTTP ERROR
	} 
	else {
		fputs ($fp, $header . $req);
		// read the body data
		$res = '';
		$headerdone = false;
		while (!feof($fp)) {
		$line = fgets ($fp, 1024);
		if (strcmp($line, "\r\n") == 0) {
		// read the header
		$headerdone = true;
		}
		else if ($headerdone)
		{
		// header has been read. now read the contents
		$res .= $line;
		}
		}

		// parse the data
		$lines = explode("\n", $res);
		$keyarray = array();
		if (strcmp ($lines[0], "SUCCESS") == 0) {
			for ($i=1; $i<count($lines);$i++){
				list($key,$val) = explode("=", $lines[$i]);
				$keyarray[urldecode($key)] = urldecode($val);
			}
			// check the payment_status is Completed
			// check that txn_id has not been previously processed
			// check that receiver_email is your Primary PayPal email
			// check that payment_amount/payment_currency are correct
			// process payment
			$firstname = $keyarray['first_name'];
			$lastname = $keyarray['last_name'];
			// display multiple item names
			$itemname1 = $keyarray['item_name1'];
			$item1_amount = $keyarray['mc_gross_1'];
			$itemname2 = $keyarray['item_name2'];
			$item2_amount = $keyarray['mc_gross_2'];
			$amount = $keyarray['mc_gross'];
			// pass back from Paypal
			$userid_paypal = $keyarray['custom'];
			
			// check the user_id and then restore the session
			//unset($userid);
			//if ($_COOKIE['user_id']) {
			//  $userid = $_COOKIE['user_id'];
			// if ($userid_paypal == $userid) {
				// restore the session
			//	$_SESSION['userid_id'] = $_COOKIE['user_id'];
			//	$_SESSION['firstname'] = $_COOKIE['firstname'];
			//	$_SESSION['usertype'] =  $_COOKIE['usertype']
			//  }
			//  else
			//  {
				// not the same user. need to redirect the main page
			//	header ('Location:main.php') ;
			// }
			//}
			//else 
			//{
				// need to relogin
			//	header ('Location:main.php') ;
			//}

			//
			//echo ("<p><h2>Thank you for your purchase!</h2></p>");

			//echo ("<b>Payment Details</b><br>\n");
			//echo ("<li>Name: $firstname $lastname</li>\n");
			//echo ("<li>Item: $itemname</li>\n");
			//echo ("<li>Total Amount: $amount</li>\n");
			//echo ("");
		}
		else if (strcmp ($lines[0], "FAIL") == 0) {
		// log for manual investigation
		}

	}
	fclose ($fp);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirmation</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">  
<!--   
var LastLeftID = "";   
  
function DoMenu(emid){   
    var obj = document.getElementById(emid);    
    obj.className = (obj.className.toLowerCase() == "expanded"?"collapsed":"expanded");   
    if((LastLeftID!="")&&(emid!=LastLeftID)){   
        document.getElementById(LastLeftID).className = "collapsed";   
    }   
        LastLeftID = emid;   
}   
-->  
</script>
</head>

<body>
<div id="ftop">
  <div id="header">
    <div id="usename">Welcome to&nbsp;&nbsp;XXXX&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=""><img src="images/logout.gif" width="10" height="10" />&nbsp;Logout</a></div>
  </div>
</div>
<div class="clearfloat"></div>
<div id="maincontect">
  <div id="leftnav">
    <h1>STUDENT</h1>
    <li><a href="studentoverview.php">Overview</a> </li>
    <li><a href="studentprofile.php">Profile</a></li>
    <li><a href="submitessay1.php">Submit New Essay</a></li>
    <li><a href="myessays.php">My Essays</a></li>
    <li><a href="uinfo.php">Useful Information</a></li>
  </div>
  <div id="mainSubE2">
    <div id="mcontect">
      <div id="step">
        <ul>
          <li><a href="Submit Essay page_step_1.html">Submit Essay </a></li>
          <li><a href="Submit Essay page_step_2.html">Review Order and Pay </a></li>
          <li><a href="Confirmation.html"> Confirmation</a></li>
        </ul>
      </div>
      <div id="profile">
        <div id="ordershow">
          <h1 class="hname5">Order Information:</h1>
          <table width="500" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
            <tr>
              <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>#</strong></td>
              <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>Essay Name</strong></td>
              <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>Price</strong></td>
            </tr>
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFFFF">1</td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo "$itemname1"; ?><a href="#">(</a></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo "$item1_amount"; ?></td>
            </tr>
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFFFF">2</td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo "$itemname1"; ?></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo "$item1_amount"; ?></td>
            </tr>
          </table>
          <div id="payment">Total: $<?php echo "$amount"; ?></div>
        </div>
        <div id="pay"> &nbsp;Confirmation:
          <div id="paymentmethod"> Your Order has been confirmed. <br />
            Thank you for choosing us. You will get email from us. </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="clearfloat"></div>
<div id="foot">
  <div id="footer">
    <div id="copyright">
      <p>Questions? Contact Customer Service at: 1-800-555-1234(US)<br />
        Copyright &amp;copy 2011 E2Wstudy.com LLC <br />
        All rights reserved. </p>
    </div>
  </div>
</div>
</body>
</html>