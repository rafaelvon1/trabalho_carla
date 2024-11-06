<?php
include("../../../db/conexao.php");
$id = $_GET["id"];
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
        <a href="#">Excluir perfil</a>
    </div>
    <hr>
        <div class="dados">
            <ul>
                <li>Nome: <?php echo $variavel["nome"]; ?></li>
                <li>Email: <?php echo $variavel["email"]; ?> </li>
                <li>cep: <?php echo $variavel["cep"]; ?></li>
                <li>cpf: <?php echo $variavel["cpf"]; ?></li>
                <li>numero: <?php echo $variavel["telefone"]; ?></li>
            </ul>
        </div>
    </fieldset>
</main>
<footer>
    <!-- parte do admin-->
    <a href="..\reserva_admin\reserva_admin.php">Voltar</a>
</footer>
</body>
</html>