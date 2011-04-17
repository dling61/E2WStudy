<?php
	require_once('common_fns.php');
	require_once('common_fns_main.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form name="loginform" method="post" action="member.php">
<div id="login">
  <div id="loginright">
    <div id="logintitle"><a href="index.php"><img src="images/logintitleimg.gif" width="550" height="65" /></a><br />
    </div>
    <div id="loginaera">
      <div id="loginline">
        <div id="loginname">Email: &#42</div>
        <div id="loginput">
          <input type="text" class="loginaera" name="email" />
        </div>
      </div>
      <div id="loginline">
        <div id="loginname">Password: &#42</div>
        <div id="loginput">
          <input type="password" class="loginaera" name="password" />
        </div>
      </div>
    </div>
    <div id="loginbuttom">
      <div id="loginbuttomimg"><a href="javascript:loginform.submit();"><input  type="image" src="images/login.gif" width="115" height="24" /></a></div>
    </div>
    <div id="loginforgot"><a href="forgotpw.php" class="linktext">Forgot your password?</a></div>
  </div>
  <div id="signcpright">
      <?php copyright_portion(); ?>
  </div>
</div>
</body>
</html>