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

// aqui é onde o controller está sendo iniciado, depois precisa
// tirar isso e transformar o index.html em um arquivo php
// e em seguida chamar esse codigo.
// exemplo de uso
$controller = new LogoutController();
$controller->logout();
