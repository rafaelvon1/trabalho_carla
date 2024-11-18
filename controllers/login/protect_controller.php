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

/* Exemplo de uso
$controller = new ProtectController();
$controller->proteger();
*/