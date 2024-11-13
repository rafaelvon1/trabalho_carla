<?php
  
  if (!isset($_SESSION)) {
    session_start();
  }
  session_destroy();
  header("location: ..\..\..\index1.0.html");
  

?>