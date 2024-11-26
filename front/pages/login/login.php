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

/**pegando no arquivo conexao minha conexao :) */
include("../../../db/conexao.php");

    $dados = $_POST["log"] ;
    


    $dados[0] = $mysqli -> real_escape_string($dados[0]);
    $dados[1] = $mysqli -> real_escape_string($dados[1]);

    $sql_code = "SELECT id,email,senha,pessoa_status FROM login WHERE email = '$dados[0]'";
    $sql_query = $mysqli -> query($sql_code) or die("voce simplismente nao existe");
    $variavel =  $sql_query->fetch_assoc();

    $quantidade = $sql_query->num_rows;
    if ($quantidade == 1) {

        if (password_verify($dados[1],$variavel["senha"])) {
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION["email"] = $variavel["email"];
            $_SESSION["id"] = $variavel["id"];
            $_SESSION["status"] = $variavel["pessoa_status"];

            if ($variavel["pessoa_status"] == "admin") {
                /**enviar pessoa para pagina admin */
                header("location: ../principal/pagina_admin_page.php");
            }
            else {
                /**enviar pessoa para pagina cliente */
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

?>
    <!-- caso algo der errado, voltar para login-->
    <button type="submit"><a href="login_page.html">sair</a></button>
</body>

</html>
