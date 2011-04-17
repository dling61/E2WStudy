<?php
  session_start();
  require_once('constants.php');
  require_once('common_fns.php');
  require_once('config/appvars.php');
  require_once('common_fns_student.php');
  //check invadlid user and redirect it to login page
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
var file_selected = false; 
  
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

function checkForm() {

	if (document.smform.essayname.value == '')
	{
		// something is wrong
		alert('Essay name is needed');
		return false;
	}
	else if (document.smform.essayquestion.value == '')
	{
		// something else is wrong
		alert('Essay Question is needed');
		return false;
	}
	else if (document.smform.wordcount.value == '')
	{
		// something else is wrong
		alert('Word Count Number is needed');
		return false;
	}
	else if(!file_selected) 
	{
		alert('No file selected!');
		return false;
	}
	else // check if the word account is numeric
	{
		var strValidChars = "0123456789";
		var strChar;
        var blnResult = true;

		strString = document.smform.wordcount.value;
        //  test strString consists of valid characters listed above
		for (i = 0; i < strString.length && blnResult == true; i++)
		{
			strChar = strString.charAt(i);
			if (strValidChars.indexOf(strChar) == -1)
			{
				alert('Word Count has to be number, e.g. 234');
				blnResult = false;
				return false;
			}
		}
	}
	
	return true;
}
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
  <div id="mainSubE1">
    <div id="mcontect">
      <div id="step">
        <ul>
          <li><a style="background-color:red">1 Submit Essay</a></li>
          <li><a>2 Review Order and Pay </a></li>
          <li><a>3 Confirmation</a></li>
        </ul>
      </div>
	  <form name="smform" enctype="multipart/form-data" method="post" action="addessay.php" onSubmit="return checkForm()">
      <input type="hidden" name="MAX_FILE_SIZE" value="32768000" />
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
            <p class="hname8" >1. &#42 Essay Name(include the name of the college here): </p>
            <p class="aeraborder2">
              <input class="signaera" name="essayname" id="essayname" />
            </p>
          </div>
          <div id="PackageSelection">
            <p class="hname8" >2. &#42 Essay Prompt/Question</p>
            <p class="aeraborder2">
              <textarea class="area" name="essayquestion" id="textarea2" cols="45" rows="5"></textarea>
            </p>
          </div>
          <div id="PackageSelection">
            <p class="hname8" >3. &#42 Required word count: </p>
            <p class="aeraborder2">
              <input class="signaera" name="wordcount" id="wordcount" />
            </p>
          </div>
          <div id="current3">
            <p class="hname8" >4. &#42 Upload  your essay. <em>Microsoft Word files or text files are accepted (.doc /.txt)</em></p>
            <div id="browseaera">
              <div id="browseaera2">
                <input name="uploadfile" type="file" class="text1" id="uploadfile" onchange="file_selected = true;" />
              </div>
            </div>
          </div>
          <div id="PackageSelection">
            <p class="hname8" >5.Questions or comments you want the editor to address:</p>
            <p class="aeraborder2">
              <textarea class="area" name="comments" id="textarea5" cols="45" rows="10"></textarea>
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
	<?php copyright_portion(); ?>
  </div>
</div>
</body>
</html>