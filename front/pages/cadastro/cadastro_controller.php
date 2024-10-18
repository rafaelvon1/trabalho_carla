<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>

<?php
/**pegando conexao com o banco de dados */
include("../../../db/conexao.php");

/**pegando dados do meu arquivo html */
$dados = $_POST["cads"];
/**verificando se meus dados estao limpos,se nao ah codigo sql*/
$dados[0] = $mysqli -> real_escape_string($dados[0]);
$dados[1] = $mysqli -> real_escape_string($dados[1]);

/**verificando se ja existe alguem com o mesmo email no site */
$sql_code = "SELECT email FROM login WHERE email = '$dados[0]'";

/** utilizando um parametro para query para rodar meu codigo no banco de dados caso der erro aparece a mensagem (die->) -> aqui se espera que algo seja retornado*/
$sql_query = $mysqli -> query($sql_code) or die("voce simplismente nao existe");

/**verificando se teve algum retorno da minha consulta */
$quantidade = $sql_query->num_rows;

/**caso a consulta for igual a 1, entao ja existe um email */
if ($quantidade == 1) {
    echo "<h1>ja existe um login com esse email<h1/>";
}
else {
    /**verificando se meu email esta correto -> @gmail.com */
    if(filter_var($dados[0], FILTER_VALIDATE_EMAIL)) {
        /**criptografando minha senha, usando parametro password_hash md5 nao recomendado */
        $dados[1] = password_hash($dados[1], PASSWORD_DEFAULT); 

        /**inserindo meus dados no banco de dados*/
        $sql_code = "INSERT INTO login VALUES('null','$dados[0]','$dados[1]','client')";

        /**enviando meu codigo para o banco de dados -> aqui nao se espera q algo seja retornado, ja que estamos apenas dando um insert, ele volta como valor booleano*/
        $envio = mysqli_query($mysqli,$sql_code);

        /**!!!!!!!!!!!!! jogar meu cliente para tela com header !!!!!!!!!!!!! */


    }
    else {
        echo"deu nao mano";
    }
    
}
?>
<!-- caso de ja existir um cadastro, ir para tela de login -->
<button type="submit"><a href="../login/login_page.html">ir para tela de login</a></button>






    
</body>
</html>
