<?php
  session_start();
  require_once('constants.php');
  require_once('common_fns.php');
  require_once('common_fns_student.php');
   
  // ensure the user is logged
  check_valid_user();
?>
<?php 
    $subjects = "";
    $interests = "";
	$activities = "";
	$experiences = "";
	$plans = "";
	$adversity = "";
	$skills = "";
	$rolemodel = "";
	$environment = "";	

  // get the current user
  $user_id = $_SESSION['user_id'];
  
  // Connect to the database
  $dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  
  if (isset($_POST['submit_x'])) {
    // Grab the profile data from the POST
    $subjects = mysqli_real_escape_string($dbc, trim($_POST['subjects']));
    $interests = mysqli_real_escape_string($dbc, trim($_POST['interests']));
    $activities = mysqli_real_escape_string($dbc, trim($_POST['activities']));
    $experiences = mysqli_real_escape_string($dbc, trim($_POST['experiences']));
    $plans = mysqli_real_escape_string($dbc, trim($_POST['plans']));
	$adversity = mysqli_real_escape_string($dbc, trim($_POST['adversity']));
    $skills = mysqli_real_escape_string($dbc, trim($_POST['skills']));
    $rolemodel = mysqli_real_escape_string($dbc, trim($_POST['rolemodel']));
	$environment = mysqli_real_escape_string($dbc, trim($_POST['environment']));
  
    $query = "select * from user_profiles WHERE uid = '$user_id'";
	$result = mysqli_query($dbc, $query);
	
	// TBD: may need to check the number of $result->num_rows
	if(mysqli_num_rows($result)==0){
		// insert a new profile
		$query = "insert into user_profiles (uid, subjects, interests, activities, experiences, plans, adversity, skills, rolemodel, environment) ".
		          "values ('$user_id', '$subjects','$interests','$activities','$experiences','$plans','$adversity','$skills','$rolemodel','$environment')";
		$result = mysqli_query($dbc, $query);
		if (!$result) 
		  throw new Exception('Could not insert a profile into database'.' - please try again late.');
	}
	else {
	   // update an existing one
		$query = "UPDATE user_profiles SET subjects = '$subjects', ".
				   " interests = '$interests', activities = '$activities', " .
				   " experiences = '$experiences', plans = '$plans', adversity = '$adversity', ".
				   " skills = '$skills', rolemodel = '$rolemodel', environment = '$environment' WHERE uid = '$user_id'";	
		$result = mysqli_query($dbc, $query);
		if (!$result) 
		  throw new Exception('Could not update a profile in the database'.' - please try again late.');
	}
		//redirect to the student overview page
		header ('Location:studentoverview.php') ;
  } // End of check for form submission
  else {
    // Grab the profile data from the database
    $query = "SELECT * from user_profiles where uid = '$user_id'";
	
    $data = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($data);

    if ($row != NULL) {
		$subjects = $row['subjects'];
		$interests = $row['interests'];
		$activities = $row['activities'];
		$experiences = $row['experiences'];
		$plans = $row['plans'];
		$adversity = $row['adversity'];
		$skills = $row['skills'];
		$rolemodel = $row['rolemodel'];
		$environment = $row['environment'];	  
    }
    else {
      //throw new Exception('Could not get a profile in the database'.' - please try again late.');
    }
  }
  mysqli_close($dbc);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Profile</title>
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
<div id="maincontect">
  <div id="leftnav">
    <h1>STUDENT</h1>
    <?php display_student_side_menu(); ?>
  </div>
  <div id="mainStuP">
    <div id="mcontect">
      <div id="profile">
        <h1 class="hname3">Student Profile</h1>
        <div id="info">
          <ul class="ulprofile">
            <h2 class="hname4">Basic Information(required) </h2>
            <p class="hname1"><strong>Name:</strong>&nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?><br />
              <strong>Email:</strong>&nbsp;&nbsp;<?php echo $_SESSION['email']; ?><br />
              <strong>Phone: </strong>&nbsp;&nbsp;<?php echo $_SESSION['phone']; ?><br />
            </p>
          </ul>
        </div>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div id="followfiled">
          <ul class="ulprofile">
            <h2 class="hname4">The following questions are highly recommended because they will help our editors know your motivation and goals. </h2>
            <p class="hname8" >Favorite Subject(s) in School:</p>
            <p class="aeraborder2">
			  <textarea class="area" name="subjects" id="textarea1" cols="45" rows="5"><?php if (!empty($subjects)) echo $subjects ?></textarea>
			</p>
            <p class="hname8" >Interests/Hobbies:</p>
            <p class="aeraborder2">
              <textarea type="text" class="area" name="interests" id="textarea2" cols="45" rows="5"><?php if (!empty($interests)) echo $interests ?></textarea>
            </p>
            <p class="hname8" >Extracurricular Activities(Sports, Music, Art): </p>
            <p class="aeraborder2">
              <textarea class="area" name="activities" id="textarea3" cols="45" rows="5"><?php if (!empty($activities)) echo $activities ?></textarea>
            </p>
            <p class="hname8" >Work/Volunteer Experiences: </p>
            <p class="aeraborder2">
              <textarea class="area" name="experiences" id="textarea4" cols="45" rows="5"><?php if (!empty($experiences)) echo $experiences ?></textarea>
            </p>
            <p class="hname8" >Future Goals/Career Plans:</p>
            <p class="aeraborder2">
              <textarea class="area" name="plans" id="textarea5" cols="45" rows="5"><?php if (!empty($plans)) echo $plans ?></textarea>
            </p>
          </ul>
          <ul class="ulprofile2">
            <h2 class="hname1">The following questions are optional, but answering them will greatly aid your editor in helping you write an essay that reflects your best traits and highlights who you are. </h2>
            <p class="hname8" >Adversity/Hardships(Describe an experience in your life where you dealt with an obstacle.): </p>
            <p class="aeraborder2">
              <textarea class="area" name="adversity" id="textarea6" cols="45" rows="5"><?php if (!empty($adversity)) echo $adversity ?></textarea>
            </p>
            <p class="hname8" >Do you have any special skills, abilities, talents?</p>
            <p class="aeraborder2">
              <textarea class="area" name="skills" id="textarea7" cols="45" rows="5"><?php if (!empty($skills)) echo $skills ?></textarea>
            </p>
            <p class="hname8" >Who is your role model? Describe a person who has had a significant influence on you. </p>
            <p class="aeraborder2">
              <textarea class="area" name="rolemodel" id="textarea8" cols="45" rows="5"><?php if (!empty($rolemodel)) echo $rolemodel ?></textarea>
            </p>
            <p class="hname8" >How has your environment(your family, home, neighborhood, community) made you who you are? </p>
            <p class="aeraborder2">
              <textarea class="area" name="environment" id="textarea9" cols="45" rows="5"><?php if (!empty($environment)) echo $environment ?></textarea>
            </p>
          </ul>
        </div>
        <div id="save"><input type="image" src="images/save01.gif" name="submit" value="submit" width="60" height="24" /></div>
		</form>
      </div>
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