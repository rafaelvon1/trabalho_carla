<?php
// Inclui o arquivo de conexão
include("../../models/conexao.php");

// Inicializa a sessão, se ainda não estiver ativa
if (!isset($_SESSION)) {
    session_start();
}


$id = $_SESSION["id"];

// Cria uma instância da conexão com o banco de dados
$conexao = new Conexao();
$mysqli = $conexao->conectar();

// Define a classe para exclusão de reserva
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
        // Monta o SQL para exclusão
        $sql_code = "DELETE FROM reserva WHERE id_client = ?";
        $stmt = $this->mysqli->prepare($sql_code);

        if (!$stmt) {
            die("Erro ao preparar a consulta: " . $this->mysqli->error);
        }

        // Substitui o `?` pelo ID do cliente
        $stmt->bind_param("i", $this->id);

        // Executa a consulta
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                // Redireciona se a exclusão foi bem-sucedida
                header("Location: ../../views/reserva/reserva_view.php");
                exit();
            } else {
                die("Nenhum registro encontrado para excluir.");
            }
        } else {
            die("Erro ao executar a consulta: " . $stmt->error);
        }
    }
}

// Instancia a classe e realiza a exclusão
$reservaExclusao = new ReservaExclusao($mysqli, $id);
$reservaExclusao->excluirReserva();

// Fecha a conexão com o banco de dados
$mysqli->close();
