
<?php

  require_once('../common.php');
  require_once('../common_fns.php');
  
  session_start();
  
  // ensure the user is logged
  check_valid_user();
  
?>

<?php 
       
        $change_ssid = $_POST["SSID"];
		$service_status = $_POST["servicestatus"];
		$editor_id = $_POST["editorid"];
		
		$sql = "update service_selection set service_status = \"$service_status\", editor_id = \"$editor_id\", last_update_datetime = CURDATE() WHERE service_selection_id ='$change_ssid'";
		$result = mysql_query($sql);
           
	    // if unsuccessful redirect to an error page 
		if(!$result){
			   //echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_page.php\">";
			   // TBD: need to come out an error page
		}
		mysql_close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirmation</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
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
    <div id="usename">Welcome to&nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../logout.php"><img src="images/logout.gif" width="10" height="10" />&nbsp;Logout</a></div>
  </div>
</div>
<div class="clearfloat"></div>
<div id="maincontect">
	<div id="mcontect">
		<div id="profile"><br />
        <h1 class="hname3">Your change is done</h1>
		<h1 class="hname3"><a class="hname3" href="admin_main.php">Please go back to Admin page</a></h1>
        <p class="tables">&nbsp;</p>
		</div>
	</div>
</div>
</body>
</html>
