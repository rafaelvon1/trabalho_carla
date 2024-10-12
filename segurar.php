<?php
  
  if (!isset($_SESSION)) {
    session_start();
  }
  if (!isset($_SESSION["email"])) {
    die("<h1>vai conseguir nao mano<h1/>");
  }
?>