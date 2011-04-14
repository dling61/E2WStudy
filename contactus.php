<?php 
   require_once('common_fns.php');
   require_once('common_fns_main.php');
	global $error_msg;
	if (isset($_POST['submit_x'])) {
		$username = $_POST['username'];
		$email    = $_POST['email'];
		$phone    = $_POST['phone'];
		$comment  = $_POST['comment'];
		
		$fields=array('name' => $username, 'email' => $email, 'comment' => $comment);

		foreach($fields as $key => $val) {
			if(empty($val)) { // checks value of each field
				$error_msg.="$key is empty<br />";
			}
			else if ($key == 'email' && !validEmail($val)) {
				$error_msg.="$key is not correct email address.<br />";
			}
		}
		
		if($error_msg=='') {
			/* all is well so do what you need to */
			$recipient = "admin@e2wstudy.com";
			$subject   = "Contact Request from our customer e2wstudy.com";
			$message   = '$coment' . '<br />' . ' from $username ' . ' $phone '. 'email address is $email';
			// mail to admin
			mail($recipient, $subject, $message);
			
			header('Location: main.php');
		}
		else {
			$error_msg.="Please try again. <br />";
		}	
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact us</title>
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
    <div id="signup">
      <ul>
        <li><a href="register_form.php">SIGNUP</a></li>
        <li><a href="login.php">LOGIN</a></li>
      </ul>
    </div>
    <div id="topnav">
      <ul>
        <?php display_main_tab(); ?>
      </ul>
    </div>
  </div>
</div>
<div class="clearfloat"></div>
<div id="maincontect">
  <div id="contactitem">
    <li> <p class="hname13">Customer Support</p></li>
    <li>
      <p class="hname5">1-800-393-7550(U.S)</p>
      <strong>Pacific Time</strong>: Monday to Friday <BR />
      8:30 AM - 6:00 PM</li>
      
    <li>
      <p class="hname5">021-12345678(China)</p>
      <strong>Beijing Time</strong>: Monday to Friday <BR />
      8:30 AM - 6:00 PM</li>
    <li>
      <p class="hname13">Social Meadia</p>
    </li>
    <li>FACEBOOK </li>
    <li>PRENREN </li>
    <li>
      <p class="hname13">Headquarters</p>
    </li>
    <li>E2WSTUDY, LLC </br>
	    1538 Cameo Dr. </br>
		San Jose, California </br>
		U.S.A.
	</li>
  </div>
  <div id="main2">
    <div id="mcontect2">
      <div id="contactsub"> <br />
        <div id="loginline3">
          <p class="hname7"><strong>Contact E2WSTUDY</strong></p>
          <p class="hname12">Please fill out the form below and a E2WSTUDY representative will contact you as soon as possible.
            For immediate assistance,please contact our customer support.</p>
		  <p><?php if ($error_msg !='') { echo "<br />"; echo '<font COLOR="#FF0000">' . $error_msg . '</font>'; } ?></p>
        </div>
		<form method="POST" action="" name="form1">
        <div id="loginaera3">
          <div id="loginline3">
            <div id="loginname"><strong>Name: &#42 </strong></div>
            <div id="loginput2">
              <input type="text" name="username" class="loginaera2"/>
            </div>
          </div>
          <div id="loginline3">
            <div id="loginname"><strong>Email: &#42</strong></div>
            <div id="loginput2">
              <input type="text" name="email" class="loginaera2"/>
            </div>
          </div>
          <div id="loginline3">
            <div id="loginname"><strong>Phone:</strong></div>
            <div id="loginput2">
              <input type="text" name="phone" class="loginaera2"/>
            </div>
          </div>
          <div id="loginline3">
            <div id="loginname"><strong>Comment: &#42</strong></div>
            <div id="loginput2">
              <p class="aeraborder2">
                <textarea class="commentarea2" name="comment" id="textarea1" cols="45" rows="5"></textarea>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div id="loginbuttom3">
        <div id="loginbuttomimg"><input type="image" name="submit" src="images/submit.gif" width="115" height="24" /></a></div>
      </div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
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
</div>
</body>
</html>