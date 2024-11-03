<?php
/**verificar se botao excluir existe */
    if (!isset($_SESSION)) {
        session_start();
    }
    /**caso cliente apertar no botao excluir registro */
    include("../../../db/conexao.php");
    $id = $_SESSION["id"];
    $sql_code = "DELETE FROM  reserva WHERE id_client = {$id};";
    $sql_query = $mysqli -> query($sql_code) or die("algo deu errado");
    header("location: ../reserva/reserva.php");
?>