<?php

/**dados na posição 4 = id do cliente 
 * dados na posição 5 = mesa
 * dados na posição 0 = horario
 * dados na posição 1 = data
 * dados na posição 2 = quantidade pessoa
 * dados na posição 3 = dia da semana
 */
class InserindoController
{
    private $conexao;
    private $mysqli;

    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        include("../../models/conexao.php");
        $this->conexao = new Conexao();
        $this->mysqli = $this->conexao->conectar();
    }

    public function inserirReserva($dados)
    {
        /** Pegando id da tela de login */
        $id = $_SESSION["id"];

        // Define o fuso horário
        date_default_timezone_set('America/Sao_Paulo'); // Ajuste para seu fuso horário, se necessário

        /** Pegando data atual para verificação */
        $data = new DateTime();
        $data_atual = $data->format('Y-m-d');
        $horario_futuro = $data;
        $horario_futuro->modify('+2 hours');
        $horario_futuro = $horario_futuro->format('H:i');

        /** Pegando meus dados da reserva */
        $dados = $_POST["dados"];

        /** Pegando 2 horas antes da hora digitada */
        $horas_antes = new DateTime("$dados[1] $dados[0]");
        $horas_antes->modify('-2 hours');
        $horas_antes = $horas_antes->format('H:i');

        /** Pegando 2 horas depois da hora digitada */
        $horas_depois = new DateTime("$dados[1] $dados[0]");
        $horas_depois->modify('+2 hours');
        $horas_depois = $horas_depois->format('H:i');

        $total = 35;
        /**caso usuario esteja reservando mesa as 23:00 horario futuro ira chegar a 00:00 assim deixando usuario digitar horario na data errada */
        if ($horario_futuro >= '00:00:00') {
            $horario_futuro = '23:59:00';
        }
        if ($dados[1] == $data_atual and $dados[0] <= $horario_futuro) {
            $_SESSION["error"] = "reserve sua mesa com 2 horas de antecedencia";
            header("location: ../../views/reserva/reserva_view.php");
        }
        /**verificando se tem mesa disponivel nesse horario */
        else {

            /*apagando registro caso usuario alterar, usando update teria q fazer as mesmas verificaçoes, ent nessa parte de alterar o insert paresse ser mais viavel*/
            $sql_code = "DELETE FROM  reserva WHERE id_client = {$id};";
            $sql_query = $this->mysqli->query($sql_code) or die("algo deu errado");
            for ($i = 1; $i <= $total;) {
                $sql_code = "SELECT * FROM reserva where mesa = '$i' and data_reserva = '$dados[1]' and ((horario >= '$horas_antes' and horario <= '$dados[0]') or (horario >= '$dados[0]' and horario <= '$horas_depois')) ";
                /** utilizando um parametro para query para rodar meu codigo no banco de dados caso der erro aparece a mensagem (die->) -> aqui se espera que algo seja retornado*/
                $sql_query = $this->mysqli->query($sql_code) or die("voce simplismente nao existe");
                $pull = $sql_query->num_rows;
                /**caso nao tiver retorna q nao tem ninguem naquela mesa entao i vai ser minha mesa */
                if ($pull == 0) {
                    $dados[5] = $i;
                    $i += $total;
                } else {
                    $i += 1;
                }
            }
            if ($pull == 1) {
                $_SESSION["error"] = "pedimos descupas, mas esse horario e data estao com a mesa cheia, tente outro horario";
                header("location: reserva.php");
            } else {

                /**pegando a data e horario q meu usuario digitou, colocando ele em um formato data, para ser legivel com o parametro format */
                $dataHora = new DateTime("$dados[1] $dados[0]");

                /**o valor q sera guardado no dado[3] é o dia que o meu cliente fez a reserva seg ter quarta e assim em diante */
                $dados[3] = $dataHora->format('l');
                $dados[4] = $id;
                /*verificando se a data digitada é hoje */

                /**inserindo meus dados no banco de dados */
                $sql_code = "INSERT INTO reserva VALUES('null','$dados[4]','$dados[5]','$dados[0]','$dados[1]','$dados[2]','$dados[3]')";
                /**enviando meu codigo para o banco de dados -> aqui nao se espera q algo seja retornado, ja que estamos apenas dando um insert, ele volta como valor booleano*/
                $envio = mysqli_query($this->mysqli, $sql_code);
                header("location: ../../views/reserva/mostrando_reserva_view.php");
            }
        }
    }
}


$dados = $_POST["dados"];
$controller = new InserindoController();
$controller->inserirReserva($dados);
