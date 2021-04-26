<?php
 
 session_start();
 $logged_in = $_SESSION['logged_in'];
 $session_user = $_SESSION['username'];
 $session_id = $_SESSION['user_id'];
 if($logged_in !== true){
   return  header('location: index.php?login_required');
 }

?>