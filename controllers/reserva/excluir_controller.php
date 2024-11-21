<?php


/**caso cliente apertar no botao excluir registro */
include("../../models/conexao.php");
$id = $_SESSION["id"];

$reservaExclusao = new ReservaExclusao($mysqli, $id);
$reservaExclusao->excluirReserva();

/**verificar se botao excluir existe */
if (!isset($_SESSION)) {
    session_start();
}

class ReservaExclusao
{
    private $mysqli;
    private $id;

    public function __construct($mysqli, $id)
    {
        $this->mysqli = $mysqli;
        $this->id = $id;
    }

    public function excluirReserva()
    {
        $id = $_SESSION["id"];
        $sql_code = "DELETE FROM  reserva WHERE id_client = {$id};";
        $sql_query = $this->mysqli->query($sql_code) or die("algo deu errado");
        header("location: ../../views/reserva/reserva_view.php");

        if ($sql_query->affected_rows > 0) {
            header("location: ../../views/reserva/reserva_view.php");
            exit();
        } else {
            die("algo deu errado");
        }
    }
}

$mysqli->close();
