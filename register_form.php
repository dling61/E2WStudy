<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>signup</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
 
<body>
<form method="post" action="register_new.php">
  <div id="signborder">
  <div id="signupheader"><a href="main.php"><image src="images/Register%20bgi.gif" /></a></div>
  <div id="signin">
	 <div id="userc"> <strong>User Type:</strong> &nbsp; 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="usertype" id="Teacher"  value="teacher"/>
      <label for="Editor" >Editor</label>
     &nbsp; 
     &nbsp;
     <input type="radio" name="usertype" id="Student"  value="student" Checked />
      <label for="Student">Student</label>
    </div>
    <div id="signnav">
      <div id="signname">
        <div id="signtext">First Name: </div>
      </div>
      <div id="signfiled">
         <div id="signaera"><input type="text" class="signaera" name="firstname"/></div>
      </div> 
    </div>
    <div id="signnav">
      <div id="signname">
        <div id="signtext">Last Name: </div>
      </div>
      <div id="signfiled">
         <div id="signaera"><input type="text" class="signaera" name="lastname"/></div>
      </div> 
    </div>
    <div id="signnav">
      <div id="signname">
        <div id="signtext">Email:</div>
      </div>
      <div id="signfiled">
         <div id="signaera"><input type="text" class="signaera" name="email"/></div>
      </div> 
    </div>
    <div id="signnav">
      <div id="signname">
        <div id="signtext">Password:</div>
      </div>
      <div id="signfiled">
         <div id="signaera"><input type="password" class="signaera" name="password"/></div>
      </div> 
    </div>
	<div id="signnav">
      <div id="signname">
        <div id="signtext">Confirm Password:</div>
      </div>
      <div id="signfiled">
         <div id="signaera"><input type="password" class="signaera" name="password2"/></div>
      </div> 
    </div>
    <div id="signnav">
      <div id="signname">
        <div id="signtext">Phone Number:</div>
      </div>
      <div id="signfiled">
         <div id="signaera"><input type="text" class="signaera"/ name="phonenumber"></div>
      </div> 
    </div>
    <div id="terms">By Submitting this form,you are agreeing to the <a href="main.php" color="#039"> terms of service. </a></div>
    <div id="signbuttomin"><input type="image" value="login" name="submit" src="images/Register.gif" width="105" height="30" /></a></div>
  </div>    
</div>
<div id="signcpright">Questions? Contact Customer Service at: 1-800-555-1234(US) Copyright © 2011 E2Wstudy.com LLC All rights reserved
</div>
</form>
</body>
 </html>
