<?php
    require_once('constants.php');
	session_start();
	if (!isset($_SESSION['user_id'])) {
		header("Location:login.php");
		exit;
	}
	if(isset($_GET['versionid'])) 
	{
		// if id is set then get the file with the id from database
		$versionid    = $_GET['versionid'];
        $essayid       = $_GET['essayid'];
		$se           = $_GET['se'];
		$dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		if($se == 's') {
			$query = "SELECT submited_essay_name fname, submited_essay_type ftype, submited_essay_size fsize, submited_essay content".
					 " FROM essay_change_history WHERE version_id = '$versionid' and essay_id = '$essayid'";
		}
		else {
		   $query = "SELECT edited_essay_name fname, edited_essay_type ftype, edited_essay_size fsize, edited_essay content " .
					 "FROM essay_change_history WHERE version_id = '$versionid' and essay_id = '$essayid'";
		}
		$result = mysqli_query($dbc, $query) or die('Error, query failed');
		list($fname, $ftype, $fsize, $content) =  mysqli_fetch_array($result);
		mysqli_close($dbc);
		header("Content-length: $fsize");
		header("Content-type: $ftype");
		header("Content-Disposition: attachment; filename=$fname");
		header("Content-transfer-encoding: binary");
		echo $content;
		exit;
	}
?>
