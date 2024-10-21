<?php
  
  if (!isset($_SESSION)) {
    session_start();
  }
  if (!isset($_SESSION["email"])) {
    die("<h1>vai conseguir nao mano<h1/>");
  }
  
    //if ($variavel["pessoa_status"] == "admin") {
        /**enviando pessoa administradora para sua pagina */
        //header("location: ../principal/pagina_admin_page.php");
    //}
    //else {
        /**enviar pessoa para pagina do site */
        //header("location: ../principal/pagina_client_page.php");
    //} 
   
?>