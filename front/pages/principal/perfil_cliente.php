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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <nav></nav>
</header>
<main>
    <div class="imagem">
        <img src="../../assets/images/fotoperfil.png" alt="">
        <h1>Olá,</h1>
    </div>
    <br><br>
    <h2>Aqui estão suas Informações</h2>
    <div class="info">
        <ul>
            <li>Nome: </li>
            <li>Email: <?php echo $_SESSION['email']; ?></li>
            <li>Cpf: </li>
            <li>Cep: </li>
            <li>Telefone: </li>
        </ul>
    </div>
</main>
<footer>
    <p><a href="#">Clique aqui</a> para voltar </p>
</footer>
</body>
</html>