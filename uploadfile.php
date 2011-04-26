<?php
	session_start();
	require_once('constants.php');
	require_once('common_fns.php');
	require_once('common_mail.php');
	require_once('common_fns_student.php');
	require_once('config/appvars.php');  
	// ensure the user is logged
	check_valid_user();
    
	if(isset($_POST['save_x'])){
		$comments = $_POST['comments'];
		$uploadfile_name = $_FILES['uploadfile']['name'];
		$tmpfile_name =  $_FILES['uploadfile']['tmp_name'];
		$uploadfile_type = $_FILES['uploadfile']['type'];
		$uploadfile_size = $_FILES['uploadfile']['size'];
		$versionid = $_POST['versionid'];
		$essayid = $_POST['essayid'];
		
		if ($_FILES["uploadfile"]["error"] > 0)
		{
			echo "Error: " . $_FILES["uploadfile"]["error"] . "<br />";
			if ($_SESSION['usertype'] == 'student') 
				header('Location:myessays.php');
			else if ($_SESSION['usertype'] == 'teacher')
				header('Location:currentessays.php');
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
			// add more protections late TBD
			$comments = mysqli_real_escape_string($dbc,trim($comments));
			
			if ($_SESSION['usertype'] == 'student') {
				
				if ($_SESSION['action'] == 'insert') {
					$query = "insert into essay_change_history ".
						"(essay_id,uid,version_id, submited_essay_name, submited_essay, scomment, submited_essay_type,submited_essay_size,submit_date,edited_essay_name, edited_essay,edited_essay_type,edited_essay_size,edit_date,count_words,ecomment)".
						" values($essayid,".$_SESSION['user_id'].",$versionid, '$uploadfile_name','$content', '$comments','$uploadfile_type','$uploadfile_size',NOW(),'','','','','','','')";
				}
				else if ($_SESSION['action'] == 'update') {
					$query = "update essay_change_history set ".
						"submited_essay_name = '$uploadfile_name', submited_essay = '$content',submited_essay_type = '$uploadfile_type',submited_essay_size = $uploadfile_size, submit_date = NOW(), scomment = '$comments' ".
						" where essay_id = '$essayid' and version_id = '$versionid'";
				}
				$result = mysqli_query($dbc,$query);
				if ($result !== TRUE) {
					// throw new Exception('can not upload the file');  // if error, roll back transaction
					echo "Can not reload the file";
					header('Location:myessays.php');
				}
				
				$query1 = "select email_address, first_name from users us, service_selection ss where ss.uid = ".$_SESSION['user_id']." and ss.editor_id = us.uid and ss.essay_id = '$essayid' ";
				$result1 = mysqli_query($dbc,$query1);
				if (mysqli_num_rows($result1)==1) {
					$row1 = mysqli_fetch_array($result1);
					$first_name = $row1['first_name'];
					//mail it to the editor
					$to   = $row1['email_address'];
<<<<<<< HEAD
					$body = "Hi $first_name,\r\n
							An essay has been uploaded to your account on E2WStudy.com. Please check your account and download this essay for editing. \r\n
							Thank You,\r\n
							E2Wstudy.com\r\n ";
=======
					$body = "Hello $first_name,\r\n
								An updated essay has been loaded into the E2Wstudy.com. Please login in your account on \r\n
								the http://www.e2wstudy.com to edit it.\r\n
								\r\n
							 Thank You\r\n
							  \r\n
							  E2Wstudy Administrator\r\n ";
>>>>>>> 2124966791d021f34e011f66f32ebf034f30290e
					$subject = " Student has uploaded the edited essay ";
					send_mail_godaddy($to, $subject, $body);
				}
				mysqli_close($dbc);
				header('Location:myessays.php');
			} else if ($_SESSION['usertype'] == 'teacher') {
				
				$query = "update essay_change_history set ".
					"edited_essay_name = '$uploadfile_name', edited_essay = '$content',edited_essay_type = '$uploadfile_type',edited_essay_size = $uploadfile_size, edit_date = NOW(), ecomment = '$comments' ".
					" where essay_id = '$essayid' and version_id = '$versionid'";
						
				$result = mysqli_query($dbc,$query);
				if ($result !== TRUE) {
					echo "Can not reload the file";
					header('Location:currentessays.php');
				}
				
				$query1 = "select email_address, first_name from users us, service_selection ss where ss.uid = us.uid and ss.essay_id = '$essayid'";
				$result1 = mysqli_query($dbc,$query1);
				if (mysqli_num_rows($result1)==1) {
					$row1 = mysqli_fetch_array($result1);
					$first_name = $row1['first_name'];
					//mail it to the editor
					$to   = $row1['email_address'];
<<<<<<< HEAD
					$body = "Hi $first_name,\r\n
							An essay has been uploaded to your account on E2WStudy.com. Please check your account and download this essay for editing.\r\n
							Thank You\r\n
							E2Wstudy.com\r\n";
					$subject = "An editor has uploaded the edited essay";
=======
					$body = "Hello $first_name,\r\n
								An edited essay has been loaded into the E2Wstudy.com. Please login in your account on \r\n
								the http://www.e2wstudy.com to review it.\r\n
								\r\n
							 Thank You\r\n
							  \r\n
							  E2Wstudy Administrator\r\n ";
					$subject = " An editor has uploaded the edited essay ";
>>>>>>> 2124966791d021f34e011f66f32ebf034f30290e
					send_mail_godaddy($to, $subject, $body);
				}
				mysqli_close($dbc);
				header('Location:currentessays.php');
			}
		}
		// handle file upload failures or failure
		else {
			if ($_SESSION['usertype'] == 'student') 
				header('Location:myessays.php');
			else if ($_SESSION['usertype'] == 'teacher')
				header('Location:currentessays.php');		
		}
    }
?>