<?php 
    require_once("common.php");
	require_once('common_fns_main.php');
	require_once('common_fns.php');

	if(isset($_POST['submit_x'])) {
	    //check
		$email = $_POST['email'];
		
		$email = mysql_real_escape_string($email);
		$status = "OK";
		$msg="";
		//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
		if (!stristr($email,"@") OR !stristr($email,".")) {
			echo $email;
			$msg="Your email address is not correct<BR>"; 
			$status= "NOTOK";
		}

		echo "<br><br>";
		if($status=="OK"){  
		    $dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
			$query="SELECT email_address email FROM users WHERE email_address = '$email'";
			$st=mysqli_query($dbc, $query);
			$recs=mysqli_num_rows($st);
			$row=mysqli_fetch_array($st);
			$em =$row['email'];// email is stored to a variable
			if ($recs == 0) { 
				echo "<center><font face='Verdana' size='2' color=red><b>No Password</b><br> Sorry Your address is not there in our database . You can signup and login to use our site. <BR><BR><a href='register_form.php'> Sign UP </a> </center>";
				exit;
			}
			
			// reset a password and send it to the user
			$newpassword = rand();
			$query ="update users set password = SHA('$newpassword') WHERE email_address = '$email'";
			$st=mysqli_query($dbc, $query);
			if (!$st) {
				echo "Can't get password, please come back late";
				exit;
			}
			
			$headers4="admin@e2wstudy.com";         ///// Change this address within quotes to your address ///
			$headers.="Reply-to: $headers4\n";
			$headers .= "From: $headers4\n"; 
			$headers .= "Errors-to: $headers4\n"; 
			//$headers = "Content-Type: text/html; charset=iso-8859-1\n".$headers;// for html mail un-comment this line

			if(mail("$em","E2WSTUDY Password Reset","Your account password has been reset to the following password.\n Password: $newpassword \n\n Thank You \n \n E2WSTUDY","$headers")){
			    header_portion("Thank You");
				echo '<html><body><div id="ftop"><div id="header"></div></div>';
				echo '<div id="maincontect">';
				echo '</br></br>';
				echo '<center><div id="clearfloat"><b>THANK YOU</b><br><br><br>Your password is posted to your emil address . Please check your mail after some time. </div></center>';
				echo '</br>';
				echo '<center><a href="index.php"> Please Go back to E2WSTUDY.COM </a></center>';
				echo '</div>';
				echo '<br><br><br><br><br>';
				footer_portion();
				echo '</body></html>';
				exit();
			}
			else { 
				echo " <center><font face='Verdana' size='2' color=red >There is some system problem in sending login details to your address. Please contact site-admin. <br><br><input type='button' value='Retry' onClick='history.go(-1)'></center></font>";
			}


		} 
		else {
			echo "<center><font face='Verdana' size='2' color=red >$msg <br><br><input type='button' value='Retry' onClick='history.go(-1)'></center></font>";
		}
		
		mysqli_close($dbc);
	}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="login">
  <div id="loginright">
    <div id="logintitle"><a href="index.php"><img src="images/forgot.gif" width="550" height="65" /></a><br />
    </div>
	<form name="forgotpwform" method="post" action="">
    <div id="loginaera"><br />
      <div id="loginline">
        <div id="loginname">Your Email: </div>
        <div id="loginput">
          <input type="text" class="loginaera" name="email" />
        </div>
      </div>
    </div>
    <div id="loginbuttom">
	  <div id="loginbuttomimg"><input type="image" src="images/Retrieve.gif" name="submit" width="150" height="24" /></div>
	</form>
    </div>
  </div>
  <div id="signcpright"><?php copyright_portion(); ?></div>
</div>
</body>
</html>
