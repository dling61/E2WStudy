<?php
  session_start();
  require_once('constants.php');
  require_once('common_fns.php');
  require_once('config/appvars.php');
  // ensure the user is logged
  check_valid_user();
?>
<?php
	if((isset($_POST['addanother_x']))||(isset($_POST['continue_x']))){
	    $service = $_POST['selectop'];
		$essayname = $_POST['essayname'];
		$essayquestion = $_POST['essayquestion'];
		$wordcount = $_POST['wordcount'];
		
		$uploadfile_name = $_FILES['uploadfile']['name'];
		$tmpfile_name  =   $_FILES['uploadfile']['tmp_name'];
		$uploadfile_type = $_FILES['uploadfile']['type'];
		$uploadfile_size = $_FILES['uploadfile']['size'];
		$comments = $_POST['comments'];
		
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
		
		if(($uploadfile_type=='application/msword'||$uploadfile_type=='application/vnd.openxmlformats-officedocument.wordprocessingml.document'
		       || $uploadfile_type=='text/plain')&&($uploadfile_size>0)){	
						
						$dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
						
						mysqli_autocommit($dbc, FALSE);
						$query1 = "insert into essay (essay_name,uid)values('$essayname','".$_SESSION['user_id']."')";
						
						$result = mysqli_query($dbc,$query1);	
						if ($result !== TRUE) {
							mysqli_rollback($dbc);  // if error, roll back transaction
						}
						$eid = mysqli_insert_id($dbc);
						
						$query2 = "insert into essay_change_history ".
								"(essay_id,uid,version_id, submited_essay_name, submited_essay, scomment, submited_essay_type,submited_essay_size,submit_date,edited_essay_name, edited_essay,edited_essay_type,edited_essay_size,edit_date,count_words,ecomment)".
								" values($eid,".$_SESSION['user_id'].",1, '$uploadfile_name','$content', '$comments','$uploadfile_type','$uploadfile_size',NOW(),'','','','','','$wordcount','')";
						
						$result = mysqli_query($dbc,$query2);
						if ($result !== TRUE) {
							mysqli_rollback($dbc);  // if error, roll back transaction
						}

						$query3 = "insert into service_selection".
						     "(uid,essay_id,service_type_id, discount, pay_amount, service_status,transaction_id, create_datetime, submit_date, delivery_date, editor_id, admin_user_id, last_update_datetime) ".
							 "values(".$_SESSION['user_id'].", '$eid', '$service', '', '', 'selected', '', NOW(), CURDATE(), '', '','','' )";
						$result = mysqli_query($dbc,$query3);
						if ($result !== TRUE) {
							throw new Exception('can not insert it to service_selection table');
							mysqli_rollback($dbc);  // if error, roll back transaction
						}
						
						$eid = mysqli_insert_id($dbc);	
						// assuming no errors, commit transaction
						mysqli_commit($dbc);
						mysqli_close($dbc);
						
						// add it to the session object for next page and price calculation
						// $eid --- the ID for service_selection; $service --- service type
						//$selection = array($eid, $essayname, $service,);
						//array_push($_SESSION['cart'],$selection);
						
						if(isset($_POST['addanother_x'])){
							header("Location:submitessay1.php");	
						}
						if(isset($_POST['continue_x'])){	
							header("Location:submitessay2.php");
						}									
			}
			else {
				header("Location:submitessay1.php");	
			}

	} // first condidtion
	else {
	    throw new Exception(' This is a wrong click');
	}

?>