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

$dados = $_POST["log"];

/**verificando se a conexão foi */
if($mysqli -> connect_errno){
    echo"deu nao mano",$mysqli -> connect_errno,$mysqli -> connect_error;
}

else {
    $email = $mysqli->real_escape_string($dados['email']);
    $password = $mysqli->real_escape_string($dados['password']);

    $sql_code = "SELECT * FROM login WHERE email = '$email' AND senha = '$password'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1) {
        $usuario = $sql_query->fetch_assoc();
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['email'] = $usuario['email'];
        header("Location: ../../../index.php");
        exit();
    } else {
        echo "Login ou senha incorretos.";
    }
}
?>
    <button type="submit"><a href="/trabalho_carla/index.php">sair</a></button>
</body>

</html>