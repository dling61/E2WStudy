<?php
   require_once('constants.php');
   require_once('common_fns.php');
   
   //create short variable name
   $email = $_POST['email'];
   $password = $_POST['password'];
   
   if ($email && $password)
   // they have just tried logging in
   {
      try 
	  {
	    // inside the function session variables are set
	    login($email, $password);
	  }
	  catch (Exception $e)
	  {
	    //unsucceful lgin and go back the login password
		echo 'You could not be logged in.
		         You must be logged in to view this page.';
		// go back to the login.page
		header ('Location:login.php') ; 
		exit;
	  }
	}
	
	//check invadlid user if failed redirect to login.php
	check_valid_user();

	if ($_SESSION['usertype'] == "teacher") {
		header ('Location:editoroverview.php') ; 
	}
	else if ($_SESSION['usertype'] == "student") {
		header ('Location:studentoverview.php') ; 
	}
	else if ($_SESSION['usertype'] == "admin") {
		// admin user
		header ('Location:./admin/admin_main.php') ; 
	}
	     
?>