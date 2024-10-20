<?php
session_start();

include('../login.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil | Pizzaria </title>
    <link rel="stylesheet" href="../../assets/styles/style_perfil.css">
</head>
<body>
<header>
    <h1>Perfil</h1>
</header>
<main>
<fieldset>
    <div class="info">
        <b> 
            <p>Informações</p>
        </b>
        <a href="#">Editar perfil</a>
    </div>
    <hr>
        <div class="dados">
            <ul>
                <li>Nome: </li>
                <li>Email: <?php echo $_SESSION['usuario']; ?> </li>
            </ul>
        </div>
    </fieldset>
</main>
<footer>
    <a href="">Voltar</a>
</footer>
</body>
</html>