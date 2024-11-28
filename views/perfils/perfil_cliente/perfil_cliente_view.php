<?php
if (!isset($_SESSION)) {
    session_start();
}

include("../../../models/conexao.php");

$conexao = new Conexao();
$mysqli = $conexao->conectar();

if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

$id = $_SESSION["id"];
$sql_cod = "SELECT d.nome, l.email, d.cep, d.cpf, d.telefone FROM dados_usuario d INNER JOIN login l ON d.id_client = l.id WHERE d.id_client = $id";

$sql_query = $mysqli->query($sql_cod) or die("erro");

$variavel = $sql_query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil | Pizzaria </title>
    <link rel="stylesheet" href="perfil_cliente.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav></nav>
    </header>
    <main>
        <div class="imagem">
            <img src="../../../images/Logopizza.jpg" alt="Imagem da pessoa">
            <h1>Olá, <?php echo $variavel['nome']; ?>!</h1>
        </div>
        <br><br>
        <h2>Aqui estão suas Informações</h2>
        <div class="info">
            <ul>
                <li>Nome: <?php echo $variavel['nome']; ?></li>
                <li>Email: <?php echo $variavel['email']; ?></li>
                <li>Cpf: <?php echo $variavel['cpf']; ?></li>
                <li>Cep: <?php echo $variavel['cep']; ?></li>
                <li>Telefone: <?php echo $variavel['telefone']; ?></li>
            </ul>
        </div>
    </main>
    <footer>
        <a href="../../principal_cliente/principal_client_view.php">Clique aqui para voltar </a>
    </footer>
</body>

</html>