<?php 
   require_once('common_fns_main.php');
   require_once('common_fns.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Services Overview</title>
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
  <div id="leftnav">
    <h1>SERVICES</h1>
    <li><a href="servicesoverview.php">Overview</a></li>
	<!--
    <li><a href="Useful Information.html">Useful Information</a></li>
	-->
  </div>
  <div id="mainSerO">
    <div id="mcontect">
      <div id="step2">
        <ul>
          <li><a href="gettingstarted.php">Getting Started</a></li>
          <li><a href="sampleessay.php">Sample Essay </a></li>
          <li><a href="onlinepayment.php">Online Payment</a></li>
        </ul>
      </div>
      <div id="profile">
        <h2 class="hname2"></h2>
        <h1 class="texttitle">SERVICES OVERVIEW</h1>
        <p>&nbsp;</p>
        <h2 class="hname7">College Application Essay </h2>
        <h2 class="hname4">1.	Basic Essay Editing Package </h2>
        <p class="hname1">&nbsp;&nbsp;&nbsp;&nbsp;Our editors will make a thorough critique of your essay, providing counsel on broad areas like essay focus and structure, as well as polishing finer areas like grammar and word choice. </p>
        <p class="hname6"><strong>Features</strong> </p>
        <p class="hname1">•Your essay will be reviewed twice by the same editor, allowing for feedback on revisions.</p>
        <p class="hname1">•	 After submission, edited essay will be returned within 2 days.</p>
        <p class="hname1"> •	Total time = Time for Editor(2 days x 2) + the time a student spends on revising essay. </p>
        <p class="hname1">•	For more information about this package, click here(hyperlink to the page &quot;Steps_Timeline.docx&quot;). </p>
        <p class="hname6"><strong>Pricing </strong> </p>
        <p class="table">&nbsp;</p>
        <table width="400" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
          <tr>
            <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>Word  Count</strong></td>
            <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>Basic-Price</strong></td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#FFFFFF">250-450</td>
            <td align="center" valign="middle" bgcolor="#FFFFFF">$139</td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#FFFFFF">451-550</td>
            <td align="center" valign="middle" bgcolor="#FFFFFF">$159</td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#FFFFFF">551-750</td>
            <td align="center" valign="middle" bgcolor="#FFFFFF">$179</td>
          </tr>
        </table>
        </p>
        <p class="abstract">&nbsp;</p>
        <p class="abstract2">Discounts: If a customer submits more than 1 essay:<br />
          On the second essay, he/she gets 10% off the original price.<br />
          On the third essay, he/she  gets 15% off the original price. </p>
        <p class="hname4">&nbsp; </p>
        <h2 class="hname4">2.	Comprehensive Essay Consultation and Editing </h2>
        <p class="hname1">&nbsp;&nbsp;&nbsp;&nbsp;Our editors will help build your essay from the beginning, working with you to brainstorm ideas and choose a topic. They will then assist you in writing and organizing your essay, providing advice on the structure and flow of the composition. Finally, they will help polish your essay for grammar and spelling mistakes, making it ready for submission. </p>
        <p class="hname6"><strong>Features</strong> </p>
        <p class="hname1">•	An editor will work with you on your essay from the beginning to the end, ensuring that your essay is the best that it can be.</p>
        <p class="textcontect">•	Email contact and two phone conversations with the editor to discuss the progress of your essay. </p>
        <p class="hname1"> •	Total time = Anywhere from 2 weeks to 2 months, depending on the student's progress on the essay. Editors will return revised essays within 2 days. </p>
        <p class="hname1">•	For more information about this package, click here(hyperlink to the page &quot;steps_times.doc). </p>
        <p class="hname6"><strong>Pricing </strong> </p>
        <p class="table">&nbsp;</p>
        <table width="400" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
          <tr>
            <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>Time  Period</strong></td>
            <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>Comprehensive-Price</strong></td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#FFFFFF">7-21  days</td>
            <td align="center" valign="middle" bgcolor="#FFFFFF">$299</td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#FFFFFF">22-36  days</td>
            <td align="center" valign="middle" bgcolor="#FFFFFF">$399</td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#FFFFFF">37-50  days</td>
            <td align="center" valign="middle" bgcolor="#FFFFFF">$469</td>
          </tr>
        </table>
        </p>
        <p class="abstract">&nbsp;</p>
        <p class="abstract2">Discounts: If a customer submits more than 1 essay. <br />
          On the second essay, he/she gets 10% off the original price.<br />
          On the third essay, he/she  gets 15% off the original price. </p>
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
