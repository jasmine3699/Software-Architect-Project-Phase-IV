<?php
   session_start();
   unset($_SESSION['id']);
   unset($_SESSION['name']);
   if(session_destroy()) {
      header("Location: login.php");
   }
?>