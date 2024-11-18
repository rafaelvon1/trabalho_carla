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

/*PRECISA TESTAR O PROTECT

Exemplo de uso

$controller = new ProtectController();
$controller->proteger();
*/