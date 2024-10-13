<?php
  
  if (!isset($_SESSION)) {
    session_start();
  }
  
  /*

  pensar em outra logica para isso

  caso o usuario nao esteja logado, ele não pode acessar a pagina de login ou de cadastro
  tornando isso meio inutil por enquanto
  
  if (!isset($_SESSION["email"])) {
    die("<h1>vai conseguir nao mano<h1/>");
  }*/

?>