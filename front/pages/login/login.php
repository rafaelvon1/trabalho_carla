<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

<?php
/**abrir uma sessao, para armazenar dados do usuario em varias paginas */
session_start();
/**pegando no arquivo conexao minha conexao :) */
include("../../../db/conexao.php");

/**verificando se a conexão foi */
if($mysqli -> connect_errno){
    echo"deu nao mano",$mysqli -> connect_errno,$mysqli -> connect_error;
}
else {
    /**pegando minhas variaveis */
    $dados = $_POST["log"] ;
    /**vai coloca comando sql aqui nao */
    $dados[0] = $mysqli -> real_escape_string($dados[0]);
    $dados[1] = $mysqli -> real_escape_string($dados[1]);
    /**gerando uma consulta para verifacar se email e senha estao corretos */
    $sql_code = "SELECT * FROM login WHERE email = '$dados[0]' AND senha ='$dados[1]'";
    /**utilizando parametro query para enviar codigo sql caso nao funcione die */
    $sql_query = $mysqli -> query($sql_code) or die("voce simplismente nao existe");
    /**verificando se teve algum retorno do meu select*/
    $quantidade = $sql_query->num_rows;
    /**caso sim, entao email e senha aprovados */
    if ($quantidade == 1) {
        /**variavael ira guardar dados do banco de dados como uma array*/
        $variavel =  $sql_query->fetch_assoc();
        if (!isset($_SESSION)) {
            session_start();
        }
        /**enviar pessoa para pagina do site */
        header("location: ../principal/principal.html"); 
    }
    /**caso senha ou email estiver incorreto */
    else {
        echo"<h1>ta errado meu virgem, email ou senha<h1/>";
    }
}
?>
    <!-- caso algo der errado, voltar para login-->
    <button type="submit"><a href="logout.php">sair</a></button>
</body>

</html>
