
<?php
 // left side manu for student login
 function display_main_tab() {
     
	echo '<li><a href="main.php">HOME</a></li>';
    echo '<li><a href="aboutus.php">ABOUT</a></li>';
    echo '<li><a href="servicesoverview.php">SERVICES</a></li>';
	echo '<!--';
    echo '<li><a href="blog.html">BLOG</a></li>';
	echo  '-->';
    echo '<li><a href="contactus.php">CONTACT</a></li>';
	
 }
 
 function display_student_uinfo_tab() {
	echo  '<li><a href="uinfo.php">The Application Process</a></li>';
    echo  '<li><a href="SAT.php">The SAT I and SAT II</a></li>';
    echo  '<li><a href="College.php">College Rankings and Information</a></li>';
 }
 
 function header_portion($title) {
 
	 echo '<html xmlns="http://www.w3.org/1999/xhtml">';
	 echo '<head>';
	 echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	 echo '<title>$title</title>';
	 echo '<link href="style.css" rel="stylesheet" type="text/css" />';
	 echo '</head>';
 
 }
 
 function footer_portion() {
 
	 echo '<div id="foot">';
	 echo ' <div id="footer">';
	 echo '  <div id="copyright">';
	 echo '    <p>Questions? Contact Customer Service at: 1-800-555-1234(US)<br />';
	 echo '      Copyright &amp;copy 2011 E2Wstudy.com LLC<br />';
	 echo '      All rights reserved. </p>';
	 echo '  </div>';
	 echo ' </div>';
	 echo '</div>';
 
 
 }
 
 function copyright_portion() {
 
	echo '<div id="signcpright">';
	echo 'Questions? Contact Customer Service at: 1-800-555-1234(US) Copyright © 2011 E2Wstudy, LLC U.S.A All rights reserved';
	echo '</div>';
 
 }
  
 function copyright_portion_background() {
 
	echo '<div id="copyright">';
    echo ' <p>Questions? Contact Customer Service at: 1-800-555-1234(US)<br />';
    echo '   Copyright &amp;copy 2011 E2Wstudy.com LLC<br />';
    echo '    All rights reserved. </p>';
    echo '</div>';
 
 }
 
?>