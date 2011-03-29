

<?php

  require_once('constants.php');
  require_once('common_fns.php');
  require_once('common_fns_editor.php');
  
  session_start();
  
  // ensure the user is logged
  check_valid_user();
  
?>

<?php

// first search the database to get the list of essay; only show "completed" essays 		
	function display_essay(){
	
		$dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME)or die('Database Error 2!');
		$query=$query = "select distinct us.first_name fname, us.last_name lname, es.essay_name ename, ss.service_type_id stypeid, ss.service_selection_id ssid, ss.submit_date sdate, ss.delivery_date ddate ".
				" from essay es, service_selection ss, users us where ss.essay_id = es.essay_id and ss.uid = us.uid and service_status = 'completed' and ss.editor_id = ".$_SESSION['user_id']."";
		$data = mysqli_query($dbc,$query)or die(mysqli_error());
		
		$num = mysqli_num_rows($data);
		if ($num != 0) {
			while($row = mysqli_fetch_array($data)){
				echo '<tr>';
				echo '<td align="center" valign="middle" bgcolor="#FFFFFF">'.$row['fname'].' '.$row['lname'].'</td>';
				if ($row['stypeid'] == 1) 
					echo '<td align="center" valign="middle" bgcolor="#FFFFFF">Basic</td>';
				else
					echo '<td align="center" valign="middle" bgcolor="#FFFFFF">Comprehensive</td>';
				echo '<td align="center" valign="middle" bgcolor="#FFFFFF">'.$row['ename'].'</td>';
				echo '<td align="center" valign="middle" bgcolor="#FFFFFF">'.$row['sdate'].'</td>';
				echo '<td align="center" valign="middle" bgcolor="#FFFFFF">'.$row['ddate'].'</td>';
				echo '</tr>';
			}
	    }
		else {
		   echo ' No completed assay ';
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Completed Essays</title>
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
  <div id="usename">Welcome to&nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"><img src="images/logout.gif" width="10" height="10" />&nbsp;Logout</a></div>
</div>
<div class="clearfloat"></div>
<div id="maincontect">
  <div id="leftnav">
    <h1>EDITOR </h1>
    <?php display_editor_side_menu(); ?>
  </div>
  <div id="mainComE">
    <div id="mcontect">
      <div id="profile">
        <h1 class="hname3">Completed Essays</h1>
        <p class="hname1" > List all the essays you have completed.</p>
        <p class="tables">&nbsp;</p>
        <table width="650" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
          <tr>
            <td align="center" clavalign="middle" bgcolor="#CCCCCC" class="hname9"><strong>Student Name</strong></td>
            <td align="center" valign="middle" bgcolor="#CCCCCC" class="hname9"><strong>Service Type </strong></td>
            <td align="center" valign="middle" bgcolor="#CCCCCC" class="hname9"><strong>Completed Essay Name </strong></td>
            <td align="center" valign="middle" bgcolor="#CCCCCC" class="hname9"><strong>Date Submitted</strong></td>
            <td align="center" valign="middle" bgcolor="#CCCCCC" class="hname9"><strong>Date Completed</strong></td>
          </tr>
          <?php display_essay(); ?>
        </table>
        </p>
        <br />
      </div>
    </div>
  </div>
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
