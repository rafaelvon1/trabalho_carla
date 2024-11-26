<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>

<?php
/*
dados[0] = nome
dados[1] = telefone
dados[2] =  cpf
dados[3] =  cep
dados[4] = email
dados[5] = senha

*/
/**pegando conexao com o banco de dados */
include("../../../db/conexao.php");


$dados = $_POST["cads"];

$dados[4] = $mysqli -> real_escape_string($dados[4]);
$dados[5] = $mysqli -> real_escape_string($dados[5]);

$sql_code = "SELECT email FROM login WHERE email = '$dados[4]'";

$sql_query = $mysqli -> query($sql_code) or die("deu nao mano");

$quantidade = $sql_query->num_rows;
if ($quantidade == 1) {
    echo "<h1>ja existe um login com esse email<h1/>";
}
else {
    if(filter_var($dados[4], FILTER_VALIDATE_EMAIL)) {


        
        /**criptografando minha senha, usando password_hash. md5 nao recomendado */
        $dados[5] = password_hash($dados[5], PASSWORD_DEFAULT); 

        $sql_code = "INSERT INTO login VALUES('null','$dados[4]','$dados[5]','client');";
        $envio = mysqli_query($mysqli,$sql_code);

        $sql_code = "SELECT id FROM login WHERE email = '$dados[4]'";
        $envio = mysqli_query($mysqli,$sql_code);
        $variavel = $envio->fetch_assoc();
        $id_usuario = $variavel['id'];

        $sql_code = "INSERT INTO dados_usuario VALUES('null','$id_usuario','$dados[0]','$dados[1]','$dados[2]','$dados[3]');";
        $envio = mysqli_query($mysqli,$sql_code);
        /**!!!!!!!!!!!!! jogar meu cliente para tela com header !!!!!!!!!!!!! */
        header("location:../login/login_page.html");

    }
    else {
        echo"deu nao mano";
    }
    
}
?>
<!-- caso de ja existir um cadastro, voltar para tela de cadastro -->
<button type="submit"><a href="../cadastro/cadastro_page.html">ir para tela de login</a></button>






    
</body>
</html>
