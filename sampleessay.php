<?php 
   require_once('common_fns_main.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample Essay</title>
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
<link href="style.css" rel="stylesheet" type="text/css" />
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
    <li><a href="ServicesOverview.php">Overview</a></li>
	<!--
    <li><a href="Useful Information.html">Useful Information</a></li>
	-->
  </div>
  <div id="mainSampE">
    <div id="mcontect">
      <div id="step2">
        <ul>
		<!--
          <li><a href="gettingstarted.php">Getting Started</a></li>
          <li><a href="sampleessay.php">Sample Essay </a></li>
          <li><a href="onlinepayment.php">Online Payment</a></li>
		 -->
		 <li><a href="gettingstarted.php">Getting Started</a></li>
         <li><a href="sampleessay.php">Sample Essay </a></li>
         <li><a href="onlinepayment.php">Online Payment</a></li>
        </ul>
      </div>
      <div id="profile">
        <h1 class="hname3">Sample Essay</h1>
        <ul class="ulprofile">
          <h2 class="hname7">Before:</h2>
          <h1 class="hname9">University of California Application-Personal Statement</h1>
          <p class="abstract">Prompt: Tell us about a personal quality, talent, accomplishment, contribution or experience that is important to you. What about this quality or accomplishment makes you proud and how does it relate to the person you are?</p>
          <p class="Essaytext">Starting high school, I volunteered once a week at a homeless shelter near my home. I was forced to do this because of a requirement at my high school. They said we had to do a certain number of hours volunteering each year to help us &quot;care about others&quot;. I didn't want to do this because it seemed to me like a waste of my time and also very boring. The first day I went there, I didn't like the sight of the place. There were a lot of dirty and smelly people at the front entrance and when I got inside, the place looked like a mess. There were people hanging out everywhere and clothes and bags around. I was assigned to help with preparing the meals but I didn't know how to cook or even liked cooking. However, there were some nice people there who helped me and at the end, I enjoyed working in the kitchen a lot. After that first time, I didn't really want to go back to volunteer, but since I signed up to go in every week, I had to. One experience I had really changed my outlook on volunteering. One man who I had been serving food to every week suddenly started crying during the dinnertime. At first, I didn't know what to do, because I wasn't sure if I should go talk to him. Eventually, I felt sorry for him, and came and asked him what was wrong. He told me that his mother was sick and probably dying, and he had no way to see her. At this point, I felt very bad for this gentleman, and tried to say things that would make him feel better. He then told me about his life, starting from how he was raised by his mother growing up, and then how alcohol problems tore him and his mother apart. Now, he just heard that his mom was dying and he had no way to reach her. I listened very carefully to his story and tried to say something to comfort him. After that night, I really began to put a human face to my volunteering. I realized that I was not just there to do a job, but to help real human beings who have a life and feelings. I began to change my view from this being a requirement to volunteering because I cared about people who are less fortunate than I am. From that day on, I strove to be more aware of the people I was serving, and try to care for their personal and emotional needs. Eventually, that man was able to find his mother and be with her before she died. He later thanked me for being there to listen to him, and I just felt so happy that I could help someone's life so much. This experience showed me how much I could effect someone's life by just being there for him. If we stop and pay attention to the people around us, we can really make a big impact on someone else's life. </p>
          <p class="Essaytext">&nbsp;</p>
        </ul>
        <div>
		  <object type="application/pdf" data="Sample_essay_Edited.pdf" width="100%" height="90%">
             <a href="Sample_essay_Edited.pdf">After</a>
          </object>
	
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
