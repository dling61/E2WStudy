
<?php

   require_once('constants.php');
   require_once('common_fns.php');
   
   session_start();
	
   //check invadlid user and redirect it to login page
   check_valid_user();
	     
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editor Instruction</title>
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
  <div id="usename">Welcome to&nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"><img src="images/logout.gif" width="10" height="10" />&nbsp;Logout</a></div>
</div>
<div class="clearfloat"></div>
<div id="maincontect">
  <div id="leftnav">
    <h1>EDITOR </h1>
    <li><a href="editorinstruction.php">Instructions</a></li>
    <li><a href="currentessays.php" >Current Essays</a></li>
    <li><a href="completeessays.php" >Completed Essays</a></li>
  </div>
  <div id="mainEditI">
    <div id="mcontect">
      <div id="profile">
        <h1 class="hname3">Protocol for Editing Essays</h1>
        <h2 class="hname1">Some things to keep in mind while editing the essay. </h2>
        <p class="hname1"><strong class="hname6">1.	Focus:</strong> How well does the essay address the essay question or prompt? Are there areas where the writing strays from the main idea of the essay or the prompt? </p>
        <p class="hname1"><strong class="hname6">2.	Flow:</strong> Is there a logical flow between the sentences and paragraphs? Each paragraph should make a distinct point yet transition naturally from the preceding paragraph.</p>
        <p class="hname1"> <strong class="hname6">3.	Structure:</strong> Do the paragraphs follow a logical order? Is there a build-up or progression in the essay that culminates in some conclusion? Is each sentence/paragraph at the best place it could be in the essay? </p>
        <p class="hname1"><strong class="hname6">4.	Voice:</strong> Does the writer sound like he/she is being sincere and genuine? Look for flowery language or &quot;thesaurus&quot; words.</p>
        <p class="hname1"> <strong class="hname6">5.	 Concision:</strong> Help the student cut down on unnecessary words and sentences. Especially pay attention to repetitive areas and eliminate them.</p>
        <p class="hname1"> <strong class="hname6">6.	Specific:</strong> Is the writer using specific examples to develop her points? Avoid making general statements without concrete support. </p>
        <p class="hname1"><strong class="hname6">7.	Language:</strong> Check for proper English usage. Correct for colloquial terms, clichés, acronyms. Check for logical word order, proper grammar and spelling. Is the essay easy to read or are there awkward parts? Don't change too many of the words to make it sound &quot;sophisticated&quot;. We want to preserve the writer's voice and style. </p>
        <p class="hname1"><strong class="hname6">8.	Additional Resources: </strong><a href="http://www.collegeboard.com/student/apply/essay-skills/9406.html " class="hname1">http://www.collegeboard.com/student/apply/essay-skills/9406.html </a></p>
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
