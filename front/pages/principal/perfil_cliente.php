<?php
if (!isset($_SESSION)) {
    session_start();
}
include("../../../db/conexao.php");
$id = $_SESSION["id"];
    $sql_cod = "SELECT d.nome,l.email,d.cep,d.cpf ,d.telefone from dados_usuario d inner join login l on d.id_client = l.id where d.id_client = $id";
    /**utilizando parametro query para enviar codigo sql caso nao funcione die */
    $sql_query = $mysqli -> query($sql_cod) or die("erro");
    /**variavael ira guardar dados do banco de dados como uma array,*/
    $variavel = $sql_query->fetch_assoc();
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
        <img src="../../assets/images/fotoperfil.png" alt="Foto de perfil">
        <!--Mostrando nome do usuario logado-->
        <h1>Olá, <?php echo $variavel['nome'] ?></h1>
    </div>
    <br><br>
    <h2>Aqui estão suas Informações</h2>
    <div class="info">
        <ul>
            <!--mostrando informações do usuário logado--->
            <li>Nome: <?php echo $variavel['nome']; ?></li>
            <li>Email: <?php echo $variavel['email']; ?></li>
            <li>Cpf: <?php echo $variavel['cpf']; ?></li>
            <li>Cep: <?php echo $variavel['cep']; ?></li>
            <li>Telefone: <?php echo $variavel['telefone']; ?></li>
        </ul>
    </div>
</main>
<footer>
    <p><a href="../principal/pagina_client_page.php">Clique aqui</a> para voltar</p>
</footer>
</body>
</html>