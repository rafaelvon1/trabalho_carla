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
    session_start();
/**pegando no arquivo conexao minha conexao :) */
include("../../../db/conexao.php");

$dados = $_POST["log"] ;
/**verificando se a conexão foi */

if($mysqli -> connect_errno){
    echo"deu nao mano",$mysqli -> connect_errno,$mysqli -> connect_error;
}



else {
    /**vai coloca comando sql aqui nao */
    $dados[0] = $mysqli -> real_escape_string($dados[0]);
    $dados[1] = $mysqli -> real_escape_string($dados[1]);

    $sql_code = "SELECT * FROM login WHERE email = '$dados[0]' AND senha ='$dados[1]'";
    $sql_query = $mysqli -> query($sql_code) or die("voce simplismente nao existe");
    $quntidade = $sql_query->num_rows;
    if ($quntidade == 1) {
        /**variavael ira guardar dados do banco de dados */
        $variavel =  $sql_query->fetch_assoc();
        if (!isset($_SESSION)) {
            session_start();
        }
        /*guardando meu dados do banco em session*/
        $_SESSION["id"] = $variavel["id"];
        $_SESSION["email"] = $variavel["email"];
        $teste = $variavel["email"];
        echo $teste ;
        header("location: ../../../index.php");
    }
    else {
        echo"<h1>ta errado meu virgem, email ou senha<h1/>";
    }
}
?>
    <button type="submit"><a href="back/controllers/logout.php">sair</a></button>
</body>

</html>