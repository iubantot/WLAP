<?php
 session_start();
 if(session_destroy()) // Destroying All Sessions
 {
   header("Location:facLogin.php"); // Redirecting To Home Page
 }
?>
