<?php
  session_start();
  require_once('constants.php');
  require_once('common_fns.php');
  check_valid_user();
  // student ID and get
  if (isset($_GET['essid']) && isset($_GET['eid']))  {
	
	$editorid = $_GET['eid'];
	$essayid  = $_GET['essid'];
	
	$dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$query = "SELECT uid from service_selection where editor_id = '$editorid' and essay_id = '$essayid'";
	
    $data = mysqli_query($dbc, $query) or die("Error: ".mysqli_error($dbc));
    $row = mysqli_fetch_array($data);
	
	if ($row != NULL) {
		$studentid = $row['uid'];
	
		$query = "SELECT us.first_name firstname, us.last_name lastname, us.email_address email, us.phone_number phone," .
                 " up.subjects subjects, up.interests interests, up.activities, activities, up.experiences experiences, up.plans plans, up.adversity adversity, " .
				 " up.skills skills, up.rolemodel rolemodel, up.environment environment from users us, user_profiles up where us.uid = '$studentid' and up.uid = '$studentid'";
		
		$data = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($data);
		
		if ($row != NULL) {
			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
			$email  = $row['email'];
			$phone = $row['phone'];
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
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Profile</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">  
</script>
</head>
<body>
      <div id="profile">
        <h1 class="hname33">Student Profile</h1>
        <div id="info">
          <ul class="ulprofile">    
            <p class="hname1"><strong>Name:</strong>&#32<?php echo $firstname . "&#32" . $lastname ?><br />
              <strong>Email:</strong>&#32<?php echo $email ?> <br />
              <strong>Phone:</strong>&#32<?php echo " " . $phone ?> <br />
            </p>
          </ul>
        </div>
        <div id="followfiled">
          <ul class="ulprofile">
            <p class="hname8" >Favorite Subject(s) in School:</p>
            <p class="aeraborder2">
			  <textarea class="area" name="subjects" readonly="readonly" id="textarea1" cols="45" rows="5"><?php if (!empty($subjects)) echo $subjects ?></textarea>
			</p>
            <p class="hname8" >Interests/Hobbies:</p>
            <p class="aeraborder2">
              <textarea type="text" class="area" name="interests" readonly="readonly" id="textarea2" cols="45" rows="5"><?php if (!empty($interests)) echo $interests ?></textarea>
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
      </div>
</body>
</html>