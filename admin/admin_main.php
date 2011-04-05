<?php

  require_once('../common.php');
  require_once('../common_fns.php');
  
  session_start();
  
  // ensure the user is logged
  check_valid_user();
  
?>

<?php
	
	// this is the main page for an admin
	$sql="SELECT distinct u.first_name fname, u.last_name lname, u.uid uid, e.essay_name ename, e.essay_id essayid, s.service_selection_id ssid, 
			s.service_type_id stid, s.service_status sstatus, s.editor_id eid
				FROM users u, service_selection s, essay e where s.essay_id = e.essay_id and s.uid = u.uid";
	$result=mysql_query($sql);
	if (!$result) { 
	 die('Invalid query: ' . mysql_error());
	}  
	$count=mysql_num_rows($result);
        
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
	<table width="400" border="0" cellspacing="1" cellpadding="0">
		<tr>
		<!--
		<td><form name="form1" method="post" action="">
		-->
		<table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
		<tr>
		<td bgcolor="#FFFFFF">&nbsp;</td>
		<td colspan="4" bgcolor="#FFFFFF"><strong>Essay Management Page</strong> </td>
		</tr>
		<tr>
		<td align="center" bgcolor="#FFFFFF"><strong>Student Last Name</strong></td>
		<td align="center" bgcolor="#FFFFFF"><strong>Student First Name</strong></td>
		<td align="center" bgcolor="#FFFFFF"><strong>Essay Name</strong></td>
		<td align="center" bgcolor="#FFFFFF"><strong>Essay ID</strong></td>
		<td align="center" bgcolor="#FFFFFF"><strong>Service Type ID</strong></td>
		<td align="center" bgcolor="#FFFFFF"><strong>Service Status</strong></td>
		<td align="center" bgcolor="#FFFFFF"><strong>Editor ID</strong></td>
		<td align="center" bgcolor="#FFFFFF"><strong></strong></td>
		</tr>
		<?php
		$i = 1;
		while($rows=mysql_fetch_array($result)){
		$i++;
		?>
		<tr>
		<form name="form1" method="post" action="admin_edit.php">
		<input type="hidden" id="SSID" name="SSID" value="<?php echo $rows['ssid']; ?>" />
		<input type="hidden" id="UID" name="UID" value="<?php echo $rows['uid']; ?>" />
		<input type="hidden" id="EID" name="EID" value="<?php echo $rows['essayid']; ?>" />
		<!--
		<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $rows['uid']; ?>"></td>
		 -->
		<td bgcolor="#FFFFFF"><?php echo $rows['fname']; ?></td>
		<td bgcolor="#FFFFFF"><?php echo $rows['lname']; ?></td>
		<td bgcolor="#FFFFFF"><?php echo $rows['ename']; ?></td>
		<td bgcolor="#FFFFFF"><?php echo $rows['essayid']; ?></td>
		<td bgcolor="#FFFFFF"><?php echo $rows['stid']; ?></td>
		<td bgcolor="#FFFFFF"><?php echo $rows['sstatus']; ?></td>
		<td bgcolor="#FFFFFF"><?php echo $rows['eid']; ?></td>
		<td colspan="5" align="center" bgcolor="#FFFFFF"><input name="save" type="submit" id="save" value=""></td>
		</tr>
		</form>
		<?php
		}
		?>
		<tr>
		</tr>
		</table>
		</tr>
	</table>
	</div>
</div>
</body>
</html>
	