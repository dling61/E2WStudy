<?php
  session_start();
  require_once('constants.php');
  require_once('common_fns.php');
  require_once('common_fns_student.php');
   
  // ensure the user is logged
  check_valid_user();
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
        <h1 class="texttitle">Pricing</h1>
        <p>&nbsp;</p>
	 <h2 class="hname4">1.	Basic Package Pricing </h2>
		<p class="table">&nbsp;</p>
        <table width="400" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
          <tr>
            <td align="center" valign="middle" bgcolor="#CCCCCC"><strong class="hname4">Word  Count</strong></td>
            <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>Price</strong></td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><strong>250-450</strong></td>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><strong>$139</strong></td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><strong>451-550</strong></td>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><strong>$159</strong></td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><strong>551-750</strong></td>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><strong>$179</strong></td>
          </tr>
        </table>
		<p class="abstract">&nbsp;</p>
        <p class="abstract2">Discounts: If a customer submits more than 1 essay, On the second essay, he/she gets<br />
           10% off the original price. On the third essay, he/she  gets 15% off the original price.<br />
        </p>  
		<p class="hname4">&nbsp; </p>
        <h2 class="hname4">2.	Comprehensive Package Pricing </h2>
		<p class="table">&nbsp;</p>
        <table width="400" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
          <tr>
            <td align="center" valign="middle" bgcolor="#CCCCCC"><strong class="hname4">Time Period</strong></td>
            <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>Price</strong></td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><strong>Default(Days 1-21)*</strong></td>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><strong>$299</strong></td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><strong>First additional 2 weeks(Days 22-35)</strong></td>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><strong>$129</strong></td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><strong>Second additional weeks(Days 36-50)</strong></td>
            <td align="center" valign="middle" bgcolor="#FFFFFF"><strong>$99</strong></td>
          </tr>
        </table>
		<p class="abstract">&nbsp;</p>
        <p class="abstract2">* All comprehensive packages start with a default three week period for $299.<br />
          At the end of the three week period, users may choose to purchase an additional two weeks for $129. <br />
          At the end of those two weeks, the user may choose to buy another two weeks for $99.  </p>  
		<p class="abstract">&nbsp;</p>
        <p class="abstract2">Discounts: If a customer submits more than 1 essay,On the second essay, he/she gets<br />
          10% off the original price. On the third essay, he/she  gets 15% off the original price.<br />
           </p>  
		<p class="abstract">&nbsp;</p>
		<p class="abstract">&nbsp;</p>
		<p class="abstract2"><strong>Terms and Conditions: </strong><br />
		<p class="abstract2">&nbsp;</p>
		1.	The full price amount must be paid during submission of essay(s).  <br />
		2.	We accept credit and debit card payments through Paypal.                  <br />
		3.	Early termination of service will not result in refund.   <br />
		</p>
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