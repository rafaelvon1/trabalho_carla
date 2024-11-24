<?php

class ReservaHandler
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function verificarReserva($userId)
    {
        $sql = "SELECT id FROM reserva WHERE id_client = $userId";
        $result = $this->mysqli->query($sql);

        if ($result && $result->num_rows > 0) {
            header("Location: ../../views/reserva/mostrando_reserva_view.php");
            exit;
        }
    }
}

// Inclui o arquivo de conexão.
include("../../models/conexao.php");

// Inicializa a sessão, se ainda não estiver ativa.
if (!isset($_SESSION)) {
    session_start();
}

// Verifica se o ID do usuário está configurado na sessão.
if (!isset($_SESSION["id"])) {
    die("Usuário não autenticado.");
}

// Cria uma instância da classe Conexao e conecta ao banco.
$conexao = new Conexao();
$mysqli = $conexao->conectar();

// Instancia o handler de reservas e verifica.
$reservaHandler = new ReservaHandler($mysqli);
$reservaHandler->verificarReserva($_SESSION["id"]);
