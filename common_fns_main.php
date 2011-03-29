
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
?>