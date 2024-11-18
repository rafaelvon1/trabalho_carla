<?php

class ProtectController
{
  public function proteger()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    if (!isset($_SESSION["email"])) {
      die("<h1>vai conseguir nao mano<h1/>");
    }
  }
}

// aqui é onde o controller está sendo iniciado, depois precisa
// tirar isso e transformar o index.html em um arquivo php
// e em seguida chamar esse codigo.
// exemplo de uso 
$controller = new ProtectController();
$controller->proteger();
