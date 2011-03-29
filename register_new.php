<?php

	require_once('constants.php');
	require_once('common_fns.php');
	
	session_start();
	if(!isset($_SESSION['user_id'])){
		if(isset($_COOKIE['user_id'])&&isset($_COOKIE['firstname'])){
			$_SESSION['user_id']=$_COOKIE['user_id'];
			$_SESSION['firstname']=$_COOKIE['firstname'];
		}
	}
	
	if(isset($_SESSION['user_id'])){
		//echo '<p>You have been loggined, where do you go? </p>';
		//echo "<meta   http-equiv='refresh'content=2;URL='StudentProfile.php'>";
		Header("Location:FrontPage.php");
		//echo '<p><a href="FrontPage.php">Home Page</p>';
		//exit();
		//echo "<meta   http-equiv='refresh'content=1;URL='StudentProfile.php'>";
	}
	
	if(isset($_POST['submit'])){
	
	$dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME)or die('Database Error 2!');
	
	$usertype = mysqli_real_escape_string($dbc,trim($_POST['usertype']));//$_POST['usertype'];
	$firstname = mysqli_real_escape_string($dbc,trim($_POST['firstname']));//$_POST['firstname'];
	$lastname = mysqli_real_escape_string($dbc,trim($_POST['lastname']));//$_POST['lastname'];
	$password = mysqli_real_escape_string($dbc,trim($_POST['password']));//$_POST['password'];
	$password2 = mysqli_real_escape_string($dbc,trim($_POST['password2']));//$_POST['password2'];
	$email = mysqli_real_escape_string($dbc,trim($_POST['email']));//$_POST['email'];
	$phonenumber = mysqli_real_escape_string($dbc,trim($_POST['phonenumber']));//$_POST['phonenumber'];
	
	// email address not valid
	if (!validEmail($email)) {
	   throw new Exception('That is not a valid email address. Please go back and try again');
	}
	
	//password not the same
	if ($password != $password2) {
	     throw new Exception ('The password you entered do not match. Please go back and try again');
	}
	
	if(!empty($firstname)&&!empty($lastname)&&!empty($password)&&!empty($email)&&!empty($phonenumber)){
	//if(!empty($firstname)&&!empty($lastname)&&!empty($password)&&!empty($email)&&!empty($phonenumber)){
		$querysearch = "select * from users where email_address='$email'";
		$data = mysqli_query($dbc,$querysearch);
		
		//register a user
		if(mysqli_num_rows($data)==0){
			$queryinsert = "insert into users(user_type,first_name,last_name,password,email_address,phone_number,create_datetime)values('$usertype','$firstname','$lastname',SHA('$password'),'$email','$phonenumber',NOW())"; 
			mysqli_query($dbc,$queryinsert)or die("Query Error !");
			
			$data2 = mysqli_query($dbc,$querysearch);
					
			$row = mysqli_fetch_array($data2);
			//echo ".....................here".$row['first_name'];
			mysqli_close($dbc);
			//echo ".....................second".$row['first_name'];
			// register session variables		
			 $_SESSION['user_id'] = $row['uid'];
			 $_SESSION['usertype'] = $row['user_type'];
			 $_SESSION['firstname'] = $row['first_name'];
			 
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
			
		}else{
			echo "<script>alert('An account already excists !')</script>";
			echo "An account already excists !";
			
			
		}
	}else{
		echo "<script>alert('Please enter all of the sign-up data !')</script>";
		echo "Please enter all of the sign-up data !";
		}
	}
	else{
	//echo "dddddddddddddddd";
	}
?>