
<?php

  require_once('constants.php');
  require_once('common_fns.php');
  
  session_start();
  
  // ensure the user is logged
  check_valid_user();
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Submit Essay Step_1</title>
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
function check(){
	if(document.getElementById("Basic").checked){
	//alert(document.getElementById("servicetype").innerHTML);
		document.getElementById("servicetype").innerHTML="Basic";
	}
	if(document.getElementById("Comprehensive").checked){
	
		document.getElementById("servicetype").innerHTML="Comprehensive";
	}
}

</script>
</head>

<body>
<div id="ftop">
  <div id="header">
    <div id="usename">Welcome to&nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"><img src="images/logout.gif" width="10" height="10" />&nbsp;Logout</a>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="changepw.php">Change Password</a></div>
  </div>
</div>
<div class="clearfloat"></div>
<div id="maincontect">
  <div id="leftnav">
    <h1>STUDENT</h1>
    <li><a href="studentoverview.php">Overview</a> </li>
    <li><a href="studentprofile.php">Profile</a></li>
    <li><a href="submitessay1.php">Submit New Essay</a></li>
    <li><a href="myessays.php">My Essays</a></li>
    <li><a href="uinfo.php">Useful Information</a></li>
  </div>
  <div id="mainSubE1">
    <div id="mcontect">
      <div id="step">
        <ul>
          <li><a href="submitessay1.php">1 Submit Essay</a></li>
          <li><a href="submitessay2.php">2 Review Order and Pay </a></li>
          <li><a href="confirmation.php">3 Confirmation</a></li>
        </ul>
      </div>
	  <form name="smform" enctype="multipart/form-data" method="post" action="addessay.php">
      <input type="hidden" name="MAX_FILE_SIZE" value="32768" />
	  <div id="profile">
        <div id="Selection">
          <div id="selectiontitle">&nbsp;&nbsp;Package Selection</div>
          <div id="selection2">
            <h1 class="hname4">
              <input type="radio" name="selectop" id="Basic"  value="1" checked="checked" onClick="check()" />
              <label for="Basic">Basic</label>
            </h1>
            <p class="hname1">&nbsp;&nbsp;&nbsp;&nbsp;• Essay is edited twice by same editor<br />
              &nbsp;&nbsp;&nbsp;&nbsp;• Edited essay will be given back within 48 hours. </p>
            <h2 class="hname4">
              <input type="radio" name="selectop" id="Comprehensive"  value="2" checked="checked" onClick="check()" />
              <label for="Comprehensive">Comprehensive</label>
            </h2>
            <p class="hname1">&nbsp;&nbsp;&nbsp;&nbsp;• An editor will work with you on the essay from the beginning to the end.<br />
              &nbsp;&nbsp;&nbsp;&nbsp;• Unlimited email contact and two phone conversations with the editor. </p>
          </div>
        </div>
        <div id="selected">
          <h2 class="hname5"><span id="servicetype">Comprehensive</span> </h2>
          <div id="PackageSelection">
            <p class="hname8" >1.Essay Name(include the name of the college here): </p>
            <p class="aeraborder2">
              <input class="signaera" name="essayname" id="essayname" />
            </p>
          </div>
          <div id="PackageSelection">
            <p class="hname8" >2.Essay Prompt/Question</p>
            <p class="aeraborder2">
              <textarea class="area" name="essayquestion" id="textarea2" cols="45" rows="5"></textarea>
            </p>
          </div>
          <div id="PackageSelection">
            <p class="hname8" >3.Required word count: </p>
            <p class="aeraborder2">
              <input class="signaera" name="wordcount" id="wordcount" />
            </p>
          </div>
          <div id="current3">
            <p class="hname8" >4.Option: Upload  your essay.<em>Microsoft Word files or text files are accepted (.doc /.txt)</em></p>
            <div id="browseaera">
              <div id="browseaera2">
                <input name="uploadfile" type="file" class="text1" id="uploadfile" />
				<!--
				<input type="hidden" name="MAX_FILE_SIZE" value="327680000" />
				-->
              </div>
			  <!--
              <div id="brow"><a href="" >Browse</a></div>
			  -->
            </div>
          </div>
          <div id="PackageSelection">
            <p class="hname8" >5.Questions or comments you want the editor to address:</p>
            <p class="aeraborder2">
              <textarea class="area" name="comments" id="textarea5" cols="45" rows="5"></textarea>
            </p>
          </div>
          <div id="addor"><input name="addanother" type="image" src="images/add01.gif" width="150" height="24" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="image" name="continue" src="images/Continue01.gif" width="150" height="24" /></div>
          <br />
        </div>
      </div>
	  </form>
    </div>
  </div>
</div>
</div>
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
</body>
</html>
