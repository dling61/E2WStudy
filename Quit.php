<?php
session_start();
session_destroy();
setcookie('user_id', $_SESSION['user_id'], time()-1);    // expires in 30 days
setcookie('firstname', $_SESSION['firstname'], time()-1);  // expires in 30 days
echo "<meta   http-equiv='refresh'content=0;URL='Login.php'>";
?>