<?php
 // left side manu for student login
 function display_student_side_menu() {
    echo '<li><a href="studentoverview.php">Overview</a></li>';
    echo '<li><a href="studentprofile.php">Profile</a></li>';
    echo '<li><a href="submitessay1.php">Submit New Essay</a></li>';
    echo '<li><a href="myessays.php">My Essays</a></li>';
    echo '<li><a href="uinfo.php">Useful Information</a></li>';	
 }
 function display_student_uinfo_tab() {
	echo  '<li><a href="uinfo.php">The Application Process</a></li>';
    echo  '<li><a href="SAT.php">The SAT I and SAT II</a></li>';
    echo  '<li><a href="College.php">College Rankings and Information</a></li>';
 }
?>