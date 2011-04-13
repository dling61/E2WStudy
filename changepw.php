<?php
	session_start();
	require_once('common.php');
	require_once('common_fns.php');
	// ensure the user is logged
	check_valid_user();
?>
<?php
    $message;
    
	if(isset($_POST['save_x']) || isset($_POST['cancel_x'])) {
	
	  if (isset($_POST['save_x'])) {
		
		$dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME)or die('Database Error 2!');
	  
		$oldpw = mysqli_real_escape_string($dbc,trim($_POST['oldpw']));
		$newpw = mysqli_real_escape_string($dbc,trim($_POST['newpw']));
		$newpw1 = mysqli_real_escape_string($dbc,trim($_POST['newpw1']));
	    
		if(!empty($oldpw)&&!empty($newpw)&&!empty($newpw1)){
		
			if ($newpw != $newpw1) {
				$message = 'The password you entered do not match. Please try again';
			}
			else {
				$uid = $_SESSION['user_id'];
				$query = "select * from users where uid = '$uid' and password = SHA('$oldpw')";
				$data = mysqli_query($dbc, $query);
				
				if ( mysqli_num_rows($data)==1) {
					//update the password
					$query1 = "update users set password = SHA('$newpw') where uid = '$uid'";
					$data1 =  mysqli_query($dbc, $query1);
					
					mysqli_close($dbc);
					
					if ($_SESSION['usertype'] == 'teacher') {
						header('location:editoroverview.php');
					}
					else if ($_SESSION['usertype'] == 'student') {
						header('location:studentoverview.php');
					}
					else if ($_SESSION['usertype'] == 'admin') {
						header('location:admin_main.php');
					}
				}
				else {
					$message = 'The old password you entered is not correct. Please try again';
				}
			}
		}
		else {
			$message = 'Please enter all the data and try again';
		}
	  }
	  
	  if (isset($_POST['cancel_x'])) {
		if ($_SESSION['usertype'] == 'teacher') {
			header('location:editoroverview.php');
		}
		else if ($_SESSION['usertype'] == 'student') {
			header('location:studentoverview.php');
		}
		else if ($_SESSION['usertype'] == 'admin') {
			header('location:admin_main.php');
		}
	  }
	
	}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
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
   <div id="usename">Welcome  &nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"><img src="images/logout.gif" width="10" height="10" />&nbsp;Logout</a>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="changepw.php">Change Password</a></div>
  </div>
</div>
<div class="clearfloat"></div>
<div id="maincontect"><p class="hname3">Change Password</p><div id="login3">
    <form name="changepwform" method="post" action="">
	<?php global $message; if ($message) echo $message; ?>
    <div id="loginaera2">
      <div id="loginline2">
        <div id="loginname2">Old Password: </div>
        <div id="loginput3">
          <input type="password" name="oldpw" class="loginaera"/>
        </div>
      </div>
      <div id="loginline2">
        <div id="loginname2"> New Password: </div>
        <div id="loginput3">
          <input type="password" name="newpw1" class="loginaera"/>
        </div>
      </div>
      <div id="loginline2">
        <div id="loginname2">Confirm Password: </div>
        <div id="loginput3">
          <input type="password" name="newpw" class="loginaera"/>
        </div>
      </div>
    </div>
    <br />
    <div id="loginbuttom2">
      <div id="loginbuttomimg2"><input type="image" src="images/cancel01.gif" name="cancel" width="60" height="24" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="image" src="images/save01.gif" name="save" width="60" height="24" /></div>
	</form>
    </div>
    </div>
    <br />
    <br />
    <br />
    <br />
    <br />
     <br />
    <br />
    <br />
    <br />
    <br />
     <br />
   
</div></div>
</div>

<div class="clearfloat"></div>
<div id="foot">
  <div id="footer">
    <div id="copyright">
      <p>Questions? Contact Customer Service at: 1-800-555-1234(US)<br />
        Copyright &amp;copy 2011 E2Wstudy.com LLC<br />
        All rights reserved. </p>
    </div>
  </div>
</div>
</body>
</html>
