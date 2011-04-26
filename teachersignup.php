<?php
    // process the contract agreement
	require_once('constants.php');
	require_once('common_fns.php');
	session_start();
	
	if (isset($_POST['agree_x'])) {
		if(isset($_POST['agreeonit'])) {
			// agree
			$usertype = 'teacher';
			$firstname= $_SESSION['firstname'];
			$lastname = $_SESSION['lastname'];
			$password = $_SESSION['password'];
			$email = $_SESSION['email'];
			$phonenumber = $_SESSION['phonenumber'];
			
			$dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME)or die('Database Error 2!');
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
			
			unset($_SESSION['password']);
			unset($_SESSION['lastname']);
			
			header('Location:editoroverview.php');
		}
		else {
			header('Location:editorcontract.php');
		}
	
	}
	// back to the index page
	if(isset($_POST['back_x'])){
		$_SESSION = array();
		$result_dest = session_destroy();
		
		if ($result_dest)
		{
			// if they were logged in and are now logged out
			header ('Location:index.php');
		}
	}
?>