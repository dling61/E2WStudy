<?php

  require_once('../common.php');
  require_once('../common_fns.php');
  
  session_start();
  
  // ensure the user is logged
  check_valid_user();
  
?>
   
   
   
<?php
	// Check if delete button active, start this 
	//if($save){
	//	for($i=0;$i<$count;$i++){
	//	$del_id = $checkbox[$i];
	//	$sql = "DELETE FROM users WHERE uid='$del_id'";
	//	$result = mysql_query($sql);
	//	}
	//    echo "dddddd";
		// if successful redirect to delete_multiple.php 
	//	if($result){
	//	   echo "<meta http-equiv=\"refresh\" content=\"0;URL=delete.php\">";
	//	}
	//}
	//mysql_close();
	$editor_array = array();
	// service selection ID
	$edit_ssid = $_POST["SSID"];
	// student ID associated with this service
	$edit_uid = $_POST["UID"];
	// essay ID associated with this service
	$edit_eid = $_POST["EID"];
	$sql="SELECT u.first_name fname, u.last_name lname, e.essay_name ename, s.service_type_id stid, s.service_status sstatus, s.editor_id eid
					 FROM users u, service_selection s, essay e where s.service_selection_id = '$edit_ssid' and u.uid = '$edit_uid' and e.essay_id = '$edit_eid'";
	$result=mysql_query($sql);
	$rows=mysql_fetch_array($result);
	$myarray = $rows;
	if (!$result) { 
	 die('Invalid query: ' . mysql_error());
	}
	
	//get the list of editor
	$sql1 = "Select first_name fname, last_name lname, uid editorid from users where user_type = 'teacher'";
	if ($result1 = mysql_query($sql1)) {
		if (mysql_num_rows($result1)) {
			while ($row1 = mysql_fetch_assoc($result1)) {
				$editor_array[] = $row1;
			}
		}
	}
	if (!$result1) { 
	 die('Invalid query: ' . mysql_error());
	}
	
	//get the current editor's name
	$assigned_editor_id = $rows['eid'];
	$sql2 = "Select first_name firstname, last_name lastname from users where user_type = 'teacher' and uid = '$assigned_editor_id'";
	$result2=mysql_query($sql2);
	$row2=mysql_fetch_array($result2);
	if (!$result2) { 
	 die('Invalid query: ' . mysql_error());
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
	<h1 class="hname3">Service Editting Page</h1>
	<p class="tables">&nbsp;</p>
	<form name="form1" method="post" action="admin_change.php">	
	<input type="hidden" id="SSID" name="SSID" value="<?php echo $edit_ssid; ?>" />
	<table width="650" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
	<tr>
		<td align="center" bgcolor="#FFFFFF"><strong>Name</strong></td>
		<td align="center" bgcolor="#FFFFFF"><strong>Value</strong></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">First Name</td>
		<td bgcolor="#FFFFFF"><?php echo $myarray['fname']; ?></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">Last Name</td>
		<td bgcolor="#FFFFFF"><?php echo $myarray['lname']; ?></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">Essay Name</td>
		<td bgcolor="#FFFFFF"><?php echo $myarray['ename']; ?></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">Service Status</td>
		<td>
			<select name="servicestatus">
				<option value="<?php echo $myarray['sstatus']; ?>" selected="selected"><?php echo $myarray['sstatus']; ?></option>
				<option value="Assigned">Assigned</option>
				<option value="Completed">Completed</option>
				<option value="Cancelled">Cancelled</option>
			</select>
		</td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">Editor ID</td>
		<td>
			<select name="editorid">
				<option value="<?php echo $myarray['eid']; ?>" selected="selected"><?php echo $row2['firstname'].' '.$row2['lastname']; ?></option>
				<?php
					foreach ($editor_array as $editor) {
						echo '<option value="'.$editor['editorid'].'">'.$editor['fname'].' '.$editor['lname'];
						echo '</option>';
					}
				?>						
			</select>
		</td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">Service Type ID</td>
		<td bgcolor="#FFFFFF"><?php echo $myarray['stid']; ?></td>	
	</tr>
	<tr>
	<td><input name="change" type="submit" id="change" value="change" /></td><td><a href="./admin_main.php">Back</a></td>
	</tr>
	</table>
	</div>
	</div>
	</div>
	</body>
 </html> 
