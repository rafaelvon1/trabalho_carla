<?php
/*ligando com o arquivo conexao*/
include("../db/conexao.php");

/**forma de mostrar todos os registros da tabela sql */
/**verificando se a conexão foi */
if($mysqli -> connect_errno){
    echo"deu nao mano",$mysqli -> connect_errno,$mysqli -> connect_error;
}
else {
    $sql_cod = "SELECT * FROM pessoas";
    /**utilizando parametro query para enviar codigo sql caso nao funcione die */
    $sql_query = $mysqli -> query($sql_cod) or die("voce simplismente nao existe");
    /**verificando se teve algum retorno do meu select*/   
    $quantidade = $sql_query->num_rows;
    $loop = 0;
    /**variavael ira guardar dados do banco de dados como uma array*/
    while ($loop < $quantidade) {
        /**variavael ira guardar dados do banco de dados como uma array*/
        $variavel =  $sql_query->fetch_assoc();  
        foreach ($variavel as $teste) {
            echo $teste, "<br>";
        }
        $loop += 1;
        echo"<hr>";
    }
    
}

?>
