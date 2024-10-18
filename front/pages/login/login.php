<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>login_code</title>
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
    $sql_code = "SELECT id,email,senha,pessoa_status FROM login WHERE email = '$dados[0]'";
    /**utilizando parametro query para enviar codigo sql caso nao funcione die */
    $sql_query = $mysqli -> query($sql_code) or die("voce simplismente nao existe");
    /**verificando se teve algum retorno do meu select*/
    $quantidade = $sql_query->num_rows;
    /**caso sim, entao email e senha aprovados */
    $variavel =  $sql_query->fetch_assoc();
    
    if ($quantidade == 1) {
        /**variavael ira guardar dados do banco de dados como uma array*/
        if (!isset($_SESSION)) {
            session_start();
        }
        /**usando esse parametro é possivel verificar se a senha criptografada do cliente é veridico, caso for retorna 1 True */
        if (password_verify($dados[1],$variavel["senha"])) {
            /**usado para verificar se email ja esta cadastrado no arquivo protect */
            $_SESSION["email"] = $variavel["email"];
            $_SESSION["id"] = $variavel["id"];
            /**separando administrador de cliente */
            if ($variavel["pessoa_status"] == "admin") {
                /**enviando pessoa administradora para sua pagina */
                header("location: ../principal/pagina_admin_page.php");
            }
            else {
                /**enviar pessoa para pagina do site */
                header("location: ../principal/pagina_client_page.php");
            }    
        }
        else {
            echo "senha incorreta"; 
        }
    }
    /**caso senha ou email estiver incorreto */
    else {
        echo"<h1>email ou senha invalido<h1/>";
    }
}
?>
    <!-- caso algo der errado, voltar para login-->
    <button type="submit"><a href="logout_controller.php">sair</a></button>
</body>

</html>
