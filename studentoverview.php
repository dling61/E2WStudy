<?php
  session_start();
  require_once('constants.php');
  require_once('common_fns.php');
  require_once('common_fns_student.php');
  
  //check invadlid user and redirect it to login page
   check_valid_user();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Overview</title>
<link href="style.css" rel="stylesheet" type="text/css" />
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
        <h2 class="hname2"></h2>
        <h1 class="texttitle">Instruction</h1>
		<p class="hname4">&nbsp;</p>
		<p class="hname4">Comprehensive Editing Package</p>
        <p class="hname1"><span class="hname6">Step 1.</span>	Fill out a personal profile under the &quot;Profile&quot; table.  The profile will give our editors an idea of your interests and experiences to help you write your essay.  </p>
        <p class="hname1"><span class="hname6">Step 2.</span>	Submit your initial draft under the &quot;Submit new Essay&quot; tab with &quot;Comprehensive&quot; option.  </p>
        <p class="hname1"><span class="hname6">Step 3.</span>	Schedule an initial phone conversation. An editor will contact you based on your availability, and brainstorm essay topics and writing goals with you. 
		                                                     He/she will help you outline your essay and get you started writing.</p>
        <p class="hname1"><span class="hname6">Step 4.</span>	Student begins writing the essay, consulting the editor for help when needed via email. When a first draft is completed, 
		                                                     the student will submit that draft under the &quot;My Essay&quot; tab for the editor to review. The editor 
		                                                     will return a revised version of the essay within 2 days by uploading it to our web site and the student will get an email notification.</p>
        <p class="hname1"><span class="hname6">Step 5.</span>	The student improves the essay according to the editor&#39s comments. An ongoing dialogue can be continued through email if necessary. 
		                                                     Student can resend multiple drafts of the same essay to the editor, as many as it takes to write a compelling essay. &#42</p>
		<p class="hname1"><span class="hname6">Step 6.</span>	The editor will schedule a final phone conversation with the student to discuss any remaining questions about the essay and address any concerns.</p>
		<p class="hname1"><span class="hname6">Step 7.</span>	The student will send his final draft to the editor and the editor will do any last polishing. The editor uploads the final essay our web site to complete this process.</p>
		<p class="abstract">&nbsp;</p>
        <p class="abstract2">&#42 The default time period for the Comprehensive Editing Package is between one and twenty-one days. <br />
		                      If a user needs more time, additional days can be purchased later, up to fifty days total.  <br />
        </p>
		<p class="hname4">&nbsp;</p>
		<p class="hname4">Basic Editing Package</p>	
		 <p class="hname1"><span class="hname6">Step 1.</span>	Fill out a brief profile.              </p>
		 <p class="hname1"><span class="hname6">Step 2.</span>	Submit your essay under the &quot;Submit New Essay&quot; tab with &quot;Basic&quot; option            </p>
		 <p class="hname1"><span class="hname6">Step 3.</span>	An editor will look at your essay and make revisions. He/she will upload the revised version within 2 days. 
		                                                        An email notification will be sent out to the student.              </p>
		 <p class="hname1"><span class="hname6">Step 4.</span>	The student downloads it under the &quot;My Essay&quot; tab and revises the essay. He/she then uploads the revised version to the website.             </p>
		 <p class="hname1"><span class="hname6">Step 5.</span>	The same editor will look at the revised version and make any final edits and comments. He/she then uploads it back to the website. </p>
		 <p class="hname1"><span class="hname6">Step 6.</span>	The student downloads the essay and make any final revisions. </p>
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
