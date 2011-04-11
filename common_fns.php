<?php

require_once('constants.php');

function validEmail($email)
	{
	   $isValid = true;
	   $atIndex = strrpos($email, "@");
	   if (is_bool($atIndex) && !$atIndex)
	   {
		  $isValid = false;
	   }
	   else
	   {
		  $domain = substr($email, $atIndex+1);
		  $local = substr($email, 0, $atIndex);
		  $localLen = strlen($local);
		  $domainLen = strlen($domain);
		  if ($localLen < 1 || $localLen > 64)
		  {
			 // local part length exceeded
			 $isValid = false;
		  }
		  else if ($domainLen < 1 || $domainLen > 255)
		  {
			 // domain part length exceeded
			 $isValid = false;
		  }
		  else if ($local[0] == '.' || $local[$localLen-1] == '.')
		  {
			 // local part starts or ends with '.'
			 $isValid = false;
		  }
		  else if (preg_match('/\\.\\./', $local))
		  {
			 // local part has two consecutive dots
			 $isValid = false;
		  }
		  else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
		  {
			 // character not valid in domain part
			 $isValid = false;
		  }
		  else if (preg_match('/\\.\\./', $domain))
		  {
			 // domain part has two consecutive dots
			 $isValid = false;
		  }
		  else if
	(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
					 str_replace("\\\\","",$local)))
		  {
			 // character not valid in local part unless 
			 // local part is quoted
			 if (!preg_match('/^"(\\\\"|[^"])+"$/',
				 str_replace("\\\\","",$local)))
			 {
				$isValid = false;
			 }
		  }
		  if ($isValid && !(checkdnsrr($domain,"MX") || !checkdnsrr($domain,"A")))
		  {
			 // domain not found in DNS
			 $isValid = false;
		  }
	   }
	   return $isValid;
	}
	
 function login($email, $password)
 {
       session_start();
	  // Connect to the database
      $dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

      // Grab the user-entered log-in data
      $user_username = $email;
      $user_password = $password;
	  
	  $query = "SELECT uid, first_name, user_type, phone_number FROM users WHERE email_address = '$user_username' AND password = SHA('$user_password')";
      $data = mysqli_query($dbc, $query);
		
      if ( mysqli_num_rows($data)==1) {
           // set session variables
		   $row = mysqli_fetch_array($data);
		   $_SESSION['user_id'] = $row['uid'];
           $_SESSION['firstname'] = $row['first_name'];
		   $_SESSION['usertype'] = $row['user_type'];
		   $_SESSION['phone'] = $row['phone_number'];
		   $_SESSION['phone'] = $user_username;
		   $_SESSION['cart'] = array();
		   //setcookie('user_id', $row['uid'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
           //setcookie('firstname', $row['first_name'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
		   //setcookie('usertype', $row['user_type'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
           
		   return true;
	  }
	  else {
	    throw new Exception('Could not log you in');
	  }
 }
 
 function check_valid_user()
 //see if someone is logged in and notify then if not
 {
    if (isset($_SESSION['user_id'])) {
	  // You are fine
	}
	else
	{
	    // they are not login
		echo 'You are not login in <br> />';
		header("Location:login.php");
		exit;
    }
 }
 
 function set_cookies()
 // set the cookies for paypal returned PDT
 {
	setcookie('user_id', $_SESSION['user_id'], time() + (60 * 60 * 24 ));    // expires in one day
    setcookie('firstname', $_SESSION['firstname'], time() + (60 * 60 * 24 ));  // expires in one day
	setcookie('usertype', $_SESSION['usertype'], time() + (60 * 60 * 24 ));  // expires in one day
 
 }
 
 function set_common_top()
 // a common code for all registered users
 {
 
 }
?>