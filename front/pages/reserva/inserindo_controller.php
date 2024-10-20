<?php
    /**dados na posição 4 = id do cliente 
     * dados na posição 5 = mesa
     * dados na posição 0 = horario
     * dados na posição 1 = data
     * dados na posição 2 = quantidade pessoa
     * dados na posição 3 = dia da semana
    */

    if (!isset($_SESSION)) {
        session_start();
    }
    include("../../../db/conexao.php");
    /**pegando id da tela de login*/
    $id = $_SESSION["id"];
    /**----essa parte ira fazer a verificaçao se dados existem para nao aparecer na tela do layout------- */
    // Define o fuso horário
    date_default_timezone_set('America/Sao_Paulo'); // Ajuste para seu fuso horário, se necessário

    /**pegando data e horario atual */
    $data = new DateTime();
    $data_atual = $data ->format('Y-m-d');
    $sql_code = "SELECT * FROM reserva where id_client = $id";
    /** utilizando um parametro para query para rodar meu codigo no banco de dados caso der erro aparece a mensagem (die->) -> aqui se espera que algo seja retornado*/
    $sql_query = $mysqli -> query($sql_code) or die("voce simplismente nao existe");
    $pull =$sql_query->num_rows;
    /**verifico se meu usuario ja existe no banco do registro, permitido apenas 1 reserva */
    if ($pull == 0) {
        # code...
    
        /**pegando meus dados da reserva */
        $dados = $_POST["dados"];

        /**pegando 2 horas antes da hora digitada */
        $horas_antes = new DateTime("$dados[1] $dados[0]");
        $horas_antes->modify('-2 hours');
        $horas_antes = $horas_antes->format('H:i');

        /**pegando 2 horas depois da hora digitada */
        $horas_depois = new DateTime("$dados[1] $dados[0]");
        $horas_depois->modify('+2 hours');
        $horas_depois = $horas_depois->format('H:i');
        /**mesas pre definidas
         */
        $total= 35;
        /**verificando se tem mesa disponivel nesse horario */
        for ($i=1; $i <= $total; ) { 
                $sql_code = "SELECT * FROM reserva where mesa = '$i' and data_reserva = '$dados[1]' and ((horario >= '$horas_antes' and horario <= '$dados[0]') or (horario >= '$dados[0]' and horario <= '$horas_depois')) ";
                /** utilizando um parametro para query para rodar meu codigo no banco de dados caso der erro aparece a mensagem (die->) -> aqui se espera que algo seja retornado*/
                $sql_query = $mysqli -> query($sql_code) or die("voce simplismente nao existe");
                $pull =$sql_query->num_rows;
                /**caso nao tiver retorna q nao tem ninguem naquela mesa entao i vai ser minha mesa */
                if ($pull == 0) {
                    $dados[5]=$i;
                    $i += $total;
                }
                else {
                    $i +=1;
                }
                
        } 
        if ($pull == 1) {
            $_SESSION["error"] = "pedimos descupas, mas esse horario e data estao com a mesa cheia";
            header("location: reserva.php");
            /**tentar mudar o mesa do moço para ver se tem alguma mesa disponivel na mesma data posso usar enquanto no pull*/

            
        }
        else {
            /**verificando de horario e data corresponde com a data */
            /**pegando a data e horario q meu usuario digitou, colocando ele em um formato data, para ser legivel com o parametro format */
            $hora_futura = $data;
            $hora_futura->modify('+2 hours');
            $hora_futura = $data->format('H:i');
            $dataHora = new DateTime("$dados[1] $dados[0]");

            /**o valor q sera guardado no dado[3] é o dia que o meu cliente fez a reserva seg ter quarta e assim em diante */
            $dados[3] = $dataHora->format('l');
            $dados[4] = $id;
            /*verificando se a data digitada é hoje */
            if ($dados[1] == $data_atual) {
                /*verificando se horario digitado esta com 2h da hora atual */
                if ($dados[0] >= $hora_futura ) {
                    /**inserindo meus dados no banco de dados */
                    $sql_code = "INSERT INTO reserva VALUES('null','$dados[4]','$dados[5]','$dados[0]','$dados[1]','$dados[2]','$dados[3]',)";
                    /**enviando meu codigo para o banco de dados -> aqui nao se espera q algo seja retornado, ja que estamos apenas dando um insert, ele volta como valor booleano*/
                    $envio = mysqli_query($mysqli,$sql_code);
                    header("location: checking_controller.php");

                }
                /*verificando se horario esta antes do horario atual */
                else {
                    $_SESSION["error"] = "faça a reserva com 2 horas de antecedencia";
                    header("location: reserva.php");
                    /** colocar em um novo arquivo,quando retornar verifica qual foi o erro retornado */
                }

            }
            else {
                /**inserindo meus dados no banco de dados */
                
                $sql_code = "INSERT INTO reserva VALUES(null, '$dados[4]', '$dados[5]', '$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]')";
                /**enviando meu codigo para o banco de dados -> aqui nao se espera q algo seja retornado, ja que estamos apenas dando um insert, ele volta como valor booleano*/
                $envio = mysqli_query($mysqli,$sql_code);
                header("location: checking_controller.php");
            }
        }
    }
    else {
        $_SESSION["error"] = "faça sua reserva";
        header("location: reserva.php");
    }

    
                    
?>