<?php

	require_once('constants.php');
	require_once('common_fns.php');
	global $error_msg;

	if(isset($_POST['submit_x'])){
		// start a session now because it must to go before a header
		session_start();
	
		$dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME)or die('Database Error 2!');
		
		$usertype = mysqli_real_escape_string($dbc,trim($_POST['usertype']));//$_POST['usertype'];
		$firstname = mysqli_real_escape_string($dbc,trim($_POST['firstname']));//$_POST['firstname'];
		$lastname = mysqli_real_escape_string($dbc,trim($_POST['lastname']));//$_POST['lastname'];
		$password = mysqli_real_escape_string($dbc,trim($_POST['password']));//$_POST['password'];
		$password2 = mysqli_real_escape_string($dbc,trim($_POST['password2']));//$_POST['password2'];
		$email = mysqli_real_escape_string($dbc,trim($_POST['email']));//$_POST['email'];
		$phonenumber = mysqli_real_escape_string($dbc,trim($_POST['phonenumber']));//$_POST['phonenumber'];
		
		$fields=array('usertype' => $usertype, 'firstname' => $firstname, 'lastname' => $lastname,
					'password' => $password, 'password2' => $password2,'email' => $email, 'phonenumber' => $phonenumber);
					
		
		foreach($fields as $key => $val) {
			if(empty($val)) { // checks value of each field
				$error_msg.="$key is empty;  ";
			}
			else if ($key == 'email' && !validEmail($val)) {
				$error_msg.="$key is not correct email address;  ";
			}
		}
		
		//password not the same
		if ($password != $password2) {
			$error_msg.="password you entered doesn't match <br />"; 
		}
		
		if($error_msg=='') {
			// test it to see if it is already registered
			$querysearch = "select * from users where email_address='$email'";
			$data = mysqli_query($dbc,$querysearch);
			
			//register a user
			if(mysqli_num_rows($data)==0){
				$queryinsert = "insert into users(user_type,first_name,last_name,password,email_address,phone_number,create_datetime)values('$usertype','$firstname','$lastname',SHA('$password'),'$email','$phonenumber',NOW())"; 
				mysqli_query($dbc,$queryinsert)or die("Query Error !");
				
				$data2 = mysqli_query($dbc,$querysearch);
						
				$row = mysqli_fetch_array($data2);
				
				mysqli_close($dbc);
				
				// register session variables		
				 $_SESSION['user_id'] = $row['uid'];
				 $_SESSION['usertype'] = $row['user_type'];
				 $_SESSION['firstname'] = $row['first_name'];
				 $_SESSION['email'] = $row['email_address'];
				 $_SESSION['phone'] = $row['phone_number'];
				 
				// TBD: not sure we need this
				// setcookie('user_id', $row['uid'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
				 //setcookie('firstname', $row['first_name'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
				 //setcookie('usertype', $row['user_type'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
				
				// Email notification
				//$message = "Welcome to our member";
				// mail( "haoxiemanu@gmail.com ","Welcome ",$message,"From:haoxiemanu@gmail\nReply-To:haoxiemanu@gmail.com\nX-Mailer:PHP/".  phpversion()); 
				
				// provode link to the student/editor page
				//echo "<p>Your new account has been successfully created !</p>";
			
				// redirect to the editor's home page
				if ($usertype == "teacher") {
					header ('Location:editoroverview.php') ; 
				}
				else {
					header ('Location:studentoverview.php') ; 
				}
			}
			else {
				// already registered 
				$error_msg.="the user is already in our system. please go to the login page <br />"; 
			}
		}
	}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>signup</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
 
<body>
  <div id="signborder">
  <div id="signupheader"><a href="index.php"><image src="images/Register%20bgi.gif" /></a></div>
  <p><?php if ($error_msg !='') { echo '<font COLOR="#FF0000">' . $error_msg . '</font>'; } ?></p>
  <form method="post" action="register_form.php">
  <div id="signin">
	 <div id="userc"> <strong>User Type:</strong> &nbsp; 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="usertype" id="Teacher"  value="teacher"/>
      <label for="Editor" >Editor</label>
     &nbsp; 
     &nbsp;
     <input type="radio" name="usertype" id="Student"  value="student" Checked />
      <label for="Student">Student</label>
    </div>
    <div id="signnav">
      <div id="signname">
        <div id="signtext">First Name: &#42</div>
      </div>
      <div id="signfiled">
         <div id="signaera"><input type="text" class="signaera" name="firstname"/></div>
      </div> 
    </div>
    <div id="signnav">
      <div id="signname">
        <div id="signtext">Last Name: &#42</div>
      </div>
      <div id="signfiled">
         <div id="signaera"><input type="text" class="signaera" name="lastname"/></div>
      </div> 
    </div>
    <div id="signnav">
      <div id="signname">
        <div id="signtext">Email: &#42</div>
      </div>
      <div id="signfiled">
         <div id="signaera"><input type="text" class="signaera" name="email"/></div>
      </div> 
    </div>
    <div id="signnav">
      <div id="signname">
        <div id="signtext">Password: &#42</div>
      </div>
      <div id="signfiled">
         <div id="signaera"><input type="password" class="signaera" name="password"/></div>
      </div> 
    </div>
	<div id="signnav">
      <div id="signname">
        <div id="signtext">Confirm Password: &#42</div>
      </div>
      <div id="signfiled">
         <div id="signaera"><input type="password" class="signaera" name="password2"/></div>
      </div> 
    </div>
    <div id="signnav">
      <div id="signname">
        <div id="signtext">Phone Number: &#42</div>
      </div>
      <div id="signfiled">
         <div id="signaera"><input type="text" class="signaera"/ name="phonenumber"></div>
      </div> 
    </div>
    <div id="terms">By Submitting this form,you are agreeing to the <a href="PrivacyTerms.php" color="#039"> terms of service. </a></div>
    <div id="signbuttomin"><input type="image" value="login" name="submit" src="images/Register.gif" width="105" height="30" /></a></div>
  </div>  
</form>  
</div>
<div id="signcpright">Copyright © 2011 E2Wstudy, LLC. All rights reserved</div>
</body>
 </html>
