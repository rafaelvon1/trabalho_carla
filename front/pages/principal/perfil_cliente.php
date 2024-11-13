<?php
if (!isset($_SESSION)) {
    session_start();
}
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
       <!-- <a href="#">Editar perfil</a> -->
    </div>
    <hr>
        <div class="dados">
            <ul>
                <!--<li>Nome: <?php echo $_SESSION['']; ?> </li> --->
                <li>Email: <?php echo $_SESSION['email']; ?> </li>
                <li>Status: <?php echo $_SESSION['status']; ?> </li>
            </ul>
        </div>
    </fieldset>
</main>
<footer>
    <a href="">Voltar</a>
</footer>
</body>
</html>