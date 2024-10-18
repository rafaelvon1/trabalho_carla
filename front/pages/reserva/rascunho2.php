<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mostrando dados</title>
</head>
<body>
<table>
<tr>
    <td>id</td>
    <td>nome</td>
    <td>email</td>
    <td>cidade</td>
    <td>numero</td>
</tr>

<?php
/*ligando com o arquivo conexao*/
include("../../../db/conexao.php");

/**forma de mostrar todos os registros da tabela sql */
/**verificando se a conexão foi */
if($mysqli -> connect_errno){
    echo"deu nao mano",$mysqli -> connect_errno,$mysqli -> connect_error;
}
else {
    $sql_cod = "SELECT * FROM teste_reserva";
    /**utilizando parametro query para enviar codigo sql caso nao funcione die */
    $sql_query = $mysqli -> query($sql_cod) or die("voce simplismente nao existe");
    /**variavael ira guardar dados do banco de dados como uma array,*/
    
    while ($variavel = $sql_query->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $variavel['id'] . "</td>";
        echo "<td>" . $variavel['name'] . "</td>";
        echo "<td>" . $variavel['horario'] . "</td>";
        echo "<td>" . $variavel['quantidade_pessoa'] . "</td>";
        echo "<td>" . $variavel['data'] . "</td>";
        echo "</tr>";
    }
    
}

?>

</table>
</body>
</html>