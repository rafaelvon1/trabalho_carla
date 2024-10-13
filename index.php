<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaria Coisada</title>
    <link rel="stylesheet" href="front/assets/styles/reset.css">
    <link rel="stylesheet" href="front/assets/styles/style.css">
</head>

<?php
    include("backend/segurar.php");
?>

<body>
    <div class="container">
        <h1>Bem-vindo à Pizzaria nerdola!</h1>
        <p class="lead">Saboreie nossas deliciosas pizzas artesanais!</p>
        <a href="front/pages/login/login.html" class="btn btn-primary">Login</a>
        <a href="front/pages/cadastro/cadastro.html" class="btn btn-secondary">Criar Conta</a>
    </div>
</body>

</html>