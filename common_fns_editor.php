
<?php
 // left side manu for student login
 function display_editor_side_menu() {
    echo '<li><a href="editorinstruction.php">Instructions</a></li>';
    echo '<li><a href="currentessays.php" >Current Essays</a></li>';
    echo '<li><a href="completedessays.php" >Completed Essays</a></li>';
 }
define('STUDENT_PROFILE_URL', 'http://127.0.0.1:8888/site4/viewstudentprofile.php');
//define('STUDENT_PROFILE_URL', 'http://www.e2wstudy.com/viewstudentprofile.php');

?>