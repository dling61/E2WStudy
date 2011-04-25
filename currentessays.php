<?php
  session_start();
  require_once('constants.php');
  require_once('common_fns.php');
  require_once('config/appvars.php');
  require_once('common_fns_editor.php');
  
  // ensure the user is logged
  check_valid_user(); 
?>
<?php
	if(isset($_POST['save_x'])){
		$comments = $_POST['comments'];
		$uploadfile_name = $_FILES['uploadfile']['name'];
		$tmpfile_name =  $_FILES['uploadfile']['tmp_name'];
		$uploadfile_type = $_FILES['uploadfile']['type'];
		$uploadfile_size = $_FILES['uploadfile']['size'];
		$versionid = $_SESSION['versionid'];
		
		$essayid = $_POST['essayid'];
		
		if ($_FILES["uploadfile"]["error"] > 0)
		{
			echo "Error: " . $_FILES["uploadfile"]["error"] . "<br />";
		}
		
		// read file content
		$fp      = fopen($tmpfile_name, 'r');
		$content = fread($fp, filesize($tmpfile_name));
		$content = addslashes($content);
		fclose($fp);
		if(!get_magic_quotes_gpc())
		{
			$uploadfile_name = addslashes($uploadfile_name);
		}
		
		if(($uploadfile_size>0)&&($uploadfile_size<=GW_MAXFILESIZE)){	
				
			$dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
			$query = "update essay_change_history set ".
					"edited_essay_name = '$uploadfile_name', edited_essay = '$content',edited_essay_type = '$uploadfile_type',edited_essay_size = $uploadfile_size, edit_date = NOW(), ecomment = '$comments' ".
					" where essay_id = '$essayid' and version_id = '$versionid'";
						
			$result = mysqli_query($dbc,$query);
			if ($result !== TRUE) {
				throw new Exception('can not upload the file');  // if error, roll back transaction
			}
			mysqli_close($dbc);
		}
    }
?>
<?php 
	// first search the database to get the list of essay; only show "assigned" essays 		
	function display_essay(){
	    
		$dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME)or die('Database Error 2!');
		$query0=$query = "select distinct es.essay_name ename, ss.service_type_id stypeid, es.essay_id eid, ss.service_selection_id ssid, ss.service_status ssstatus ".
				" from essay es, service_selection ss where ss.essay_id = es.essay_id and service_status = 'assigned' and ss.editor_id = ".$_SESSION['user_id']."";
		$data0 = mysqli_query($dbc,$query0)or die(mysqli_error());
		$number = 0;
		// the list of essays
		while($row0 = mysqli_fetch_array($data0)){
		   $eid = $row0['eid'];
		   ++$number;
			$query1="select version_id, submited_essay_name, scomment, submit_date, edited_essay_name, edit_date, ecomment from essay_change_history ech where ".
                   " ech.essay_id = ".$eid." order by ech.submit_date"; 
		
			$data1 = mysqli_query($dbc,$query1)or die(mysqli_error());

			$num1 = mysqli_num_rows($data1);
			
			if($num1!=0){
				$count=1;
  ?>
                <div id="current2">
				  <div id="current4">
					<h2 class="hname4"><?php echo "$number" . ". 	Student Name:"; ?><?php echo $row0['ename'];?> Essay Name: <?php echo $row0['ename'];?> Service Name:<?php if ($row0['stypeid'] == 1) echo ' Basic'; else echo ' Comprehensive'; ?> </h2> 
				    <div id="Curtable2">
				    <table width="650" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999" id="showlink"> 
				    <tr> 
				      <td align="center" valign="middle" bgcolor="#CCCCCC" class="hname9"><strong>Version</strong></td>
                      <td align="center" valign="middle" bgcolor="#CCCCCC" class="hname9"><strong>Submitted Essay </strong></td>
                      <td align="center" valign="middle" bgcolor="#CCCCCC" class="hname9"><strong>Date Submitted</strong></td>
                      <td align="center" valign="middle" bgcolor="#CCCCCC" class="hname9"><strong>Student Comments</strong></td>
                      <td align="center" valign="middle" bgcolor="#CCCCCC" class="hname9"><strong>Edited Essay</strong></td>
                      <td align="center" valign="middle" bgcolor="#CCCCCC" class="hname9"><strong>Edited Date</strong></td>
                      <td align="center" valign="middle" bgcolor="#CCCCCC" class="hname9"><strong>Editor Comments</strong></td>
				    </tr> 
			<?php
			    // the change history of an essay
				while($row1 = mysqli_fetch_array($data1)){
				  $_SESSION['versionid'] = $row1["version_id"];
			?>
				<tr>
				<td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row1["version_id"];?></td> 
				<td align="center" valign="middle" bgcolor="#FFFFFF"><a style="color:black" href="download.php?versionid=<?php echo $row1["version_id"]; ?>&essayid=<?php echo $eid; ?>&se=s"><?php echo $row1["submited_essay_name"]; ?></a></td>
				<td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row1["submit_date"];?></td> 
				<!--
				 <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row1["scomment"];?></td> 
				 -->
				 <td align="center" valign="middle" bgcolor="#FFFFFF">
				  <?php 
						if (!empty($row1["scomment"])) { 
						  echo '<input type="button" onclick="show_alert(\'' . $row1['scomment'] .'\')" value="See comments" />';
						}
				  ?>
				</td> 
				<td align="center" valign="middle" bgcolor="#FFFFFF"><a style="color:black" href="download.php?versionid=<?php echo $row1["version_id"]; ?>&essayid=<?php echo $eid; ?>&se=e"><?php echo $row1["edited_essay_name"]; ?></a></td> 
				<td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row1["edit_date"];?></td> 
				<td align="center" valign="middle" bgcolor="#FFFFFF"><?php 
						if (!empty($row1["ecomment"])) { 
						  echo '<input type="button" onclick="show_alert(\'' . $row1['ecomment'] .'\')" value="See comments" />';
						}
				  ?>
				 </td>
				 </tr>
				 <?php
				 }
				 ?>
				</table>
				</div>
				</div>
              <div id="current5">
				<div id="browseaera3">
				<p class="hname8" >Upload Revised Essay </p>
                 <div id="browseaera2">
					<form name="smform" enctype="multipart/form-data" method="post" action="uploadfile.php">
					<!-- post version ID and essay ID so a file can be inserted into a essay  -->
					<input type="hidden" name="essayid" value="<?php echo $eid; ?>" />
					<input type="hidden" name="versionid" value="<?php echo $_SESSION['versionid']; ?>" />
					<input name="uploadfile" type="file" class="text1" id="uploadessay" />
				</div>
				</div>
			   <div id="inputaera">
				<p class="hname8">Comments (Anything in particular you want the student to look into)</p>
				<p class="aeraborder2">
					<textarea class="area" name="comments" id="textarea4" cols="45" rows="5"></textarea> 
				</p>
				</div>				
                  <div id="save"><input type="image" alt="submit" name="save" src="images/save01.gif" width="60" height="24" /></div>
			    </form>
			   </div>
		       </div>
	<?php	
			}
			else{
				echo "Sorry no essay";
			}
		}	
        if ($number == 0) {
		  echo '<h2 class="hname4"> No essay is assigned to you yet </h2>';
        }		
		mysqli_close($dbc);
		
	}//function
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Current Essays</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">  
function show_alert(msg)
{
	alert(msg);
}
</script>
</head>
<body>
<div id="ftop">
<div id="header">
  <div id="usename">Welcome to&nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"><img src="images/logout.gif" width="10" height="10" />&nbsp;Logout</a>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="changepw.php">Change Password</a></div>
</div>
<div class="clearfloat"></div>
<div id="maincontect">
  <div id="leftnav">
    <h1>EDITOR </h1>
	<?php display_editor_side_menu(); ?>
  </div>
  <div id="mainCurE">
      <div id="profile"><br />
        <h1 class="hname3">Current Essays</h1>
        <p class="hname4" > All your assigned essays will be listed on this page. Please come here often to check on newly assigned essays. You will have 48 hours to edit and comment on an essay. </p>
        <br />
        <!-- first loop to get the list of essays  -->
         <?php display_essay(); ?>
        </div>
    </div>
</div>
<div class="clearfloat"></div>
<div id="foot">
  <div id="footer">
    <div id="copyright">
     <?php copyright_portion(); ?>
    </div>
  </div>
</div>
</body>
</html>