<?php

/**se meu usuario ja tiver um cadastro, levar ele para mostrar reserva, nao para pagina de fazer uma reserva */
include("../../models/conexao.php");

/**pegando id da tela de login*/
if (!isset($_SESSION)) {
    session_start();
}

$id = $_SESSION["id"];

$reservaChecker = new ReservaChecker($mysqli, $id);
$reservaChecker->checkReserva();

class ReservaChecker
{
    private $mysqli;
    private $id;

    public function __construct($mysqli, $id)
    {
        $this->mysqli = $mysqli;
        $this->id = $id;
    }

    public function checkReserva()
    {
        /**----essa parte ira fazer a verificaçao se dados existem para nao aparecer na tela do layout------- */
        $sql_code = "SELECT * FROM reserva WHERE id_client = ?";
        /** utilizando um parametro para query para rodar meu codigo no banco de dados caso der erro aparece a mensagem (die->) -> aqui se espera que algo seja retornado*/
        $sql_query = $this->mysqli->prepare($sql_code);
        $sql_query->bind_param("i", $this->id);
        $sql_query->execute();
        $sql_query = $sql_query->get_result();
        $pull = $sql_query->num_rows;
        /**verifico se meu usuario ja existe no banco do registro, permitido apenas 1 reserva */
        if ($pull == 0) {
            /**nao faz nada */
        } else {
            /**me leva para a pagina onde mostra minha reserva */
            header("location: ../../views/reserva/mostrando_reserva_view.php");
            exit();
        }

        $sql_query->close();
    }
}

$mysqli->close();
