<?php 
   require_once('common_fns_main.php');
   require_once('common_fns.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>index</title>
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
<div id="topaera">
  <div id="introdaction">
    <div id="des">
      <div id="destext">
        <p class="fptext">We provide real assistance on your college application essay to help you get into your dream US College.</p>
      </div>
      <div id="fpbottom">
        <div id="editorin">
          <p><a href="login.php">EDITORS</a></p>
        </div>
        <div id="studentin"><a href="login.php">STUDENTS</a></div>
      </div>
    </div>
    <div id="fpimage">
      <ul>
        <br />
        &nbsp;&nbsp;<img src="images/front_image01.jpg" width="294" height="235" />
      </ul>
    </div>
  </div>
</div>
<div id="maincontect">
  <div id="topdes">
    <div id="dleft">
      <div id="dleftimg" >
        <ul>
          <br />
          <img src="images/front-page_image3.jpg" width="260" height="157" />
        </ul>
      </div>
    </div>
    <div id="dright">
      <div id="drighttext">
        <p class="fptext02">Why the college application essay? </p>
        <p class="fptext03">•   A high test score will not guarantee admission to a good American University. </p>
        <p class="fptext03">•  A well-written essay is one of the most important factors in a college application. </p>
        <p class="fptext03">•  The college essay helps an applicant stand out among thousands of applicants. </p>
        <p class="fptext03">•  It is also an opportunity for the student to highlight their strengths and describe important aspects of their life not mentioned in the college application. </p>
      </div>
    </div>
  </div>
  <div class="clearfloat"></div>
  <div id="topdes2">
    <div id="dleft">
      <div id="dleftimg2">
        <ul>
          <img src="images/front-page_image2.jpg" width="256" height="193" />
        </ul>
      </div>
    </div>
    <div id="dright">
      <div id="drighttext">
        <p class="fptext02">Why choose us?</p>
        <p class="fptext03"> • Our US-based team is composed of senior college students and recent graduates that have passed successfully through the college admission process.</p>
        <p class="fptext03"> • These essay editors come from the best American Universities, including Harvard . </p>
        <p class="fptext03">• Many of our editors are bilingual and American-born Chinese, allowing them to relate to our clients on a more personal level. </p>
      </div>
    </div>
  </div>
  <div class="clearfloat"></div>
</div>
<div id="foot">
  <div id="footer">
    <div id="copyright">
      <?php copyright_portion(); ?>
    </div>
  </div>
</div>
</body>
</html>
