<?php
class LogoutController
{
  public function logout()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    session_destroy();
    header("Location: ../../index.html");
    exit();
  }
}

// Exemplo de uso
$controller = new LogoutController();
$controller->logout();
