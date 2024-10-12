<?php
session_start();

// lembrar de atualizar o caminho do arquivo conexao.php caso queria ir para o login
if (!isset($_SESSION["id"])) {
    header("Location: front/pages/cadastro/cadastro.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
    include("back/controllers/segurar.php");
?>

<body>

    <h1>funcionou</h1>
    <a href="back/controllers/logout.php">sair</a>
</body>

</html>