<?php
include("../../../db/conexao.php");

$dados = $_POST["cads"];


if(filter_var($dados[0], FILTER_VALIDATE_EMAIL)) {
    $sqli = "INSERT INTO login(email,senha) VALUES('$dados[0]','$dados[1]')";
    $envio = mysqli_query($mysqli,$sqli);
}
else {
    echo"deu nao mano";
}



?>