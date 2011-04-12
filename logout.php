<?php
	session_start();
    $old_user = $_SESSION['user_id'];
	//store it to test if they were logged in
	$_SESSION = array();
	$result_dest = session_destroy();
	if (!empty($old_user))
	{
	  if ($result_dest)
	  {
		// if they were logged in and are now logged out
		header ('Location:main.php');
	  }
	  else
	  {
	    // they were logged in and could not logged out
		echo 'Could not log you out.<br/>';
	  }
	} 
	else
	{
	  //if they weren't logged in byt came to this page somehow
	  echo 'You were not logged in and so have not been logged out. <br/>';
	  header ('Location:login.php');
	}		 
?>