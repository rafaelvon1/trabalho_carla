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
<?php
                    /**bugs a serem resolvidos, quando atualizo a pagina ele salva mais uma vez minha reserva
                     * outro bug o echo abaixo sai apenas quando atualizo a pagina, a primeira vez q passa ele ainda 
                     * nao existe por isso desse erro
                     */
                    
                    include("../../../db/conexao.php");
                    /**pegando id da tela de login*/
                    $id = $_SESSION["id"];
                    /**----essa parte ira fazer a verificaçao se dados existem para nao aparecer na tela do layout------- */
                    if (isset($_POST["botao"])) { 
                        $sql_code = "SELECT * FROM reserva where id_client = $id";
                        /** utilizando um parametro para query para rodar meu codigo no banco de dados caso der erro aparece a mensagem (die->) -> aqui se espera que algo seja retornado*/
                        $sql_query = $mysqli -> query($sql_code) or die("voce simplismente nao existe");
                        $pull =$sql_query->num_rows;

                        if ($pull == 0) {
                            /**pegando meus dados da reserva */
                            $dados = $_POST["dados"];
                            
                            $dataHora = new DateTime("$dados[1] $dados[0]");
                            $dataHora->modify('+2 hours');
                            $dataHora = $dataHora->format('H:i');
                            /**pegando meus dados da reserva */
                            $sql_code = "SELECT count(*) total from reserva"; 
                            $sql_query = $mysqli -> query($sql_code) or die("voce simplismente nao existe");
                            $total = $sql_query->fetch_assoc();
                            /**para ter certeza q ira rodar mesmo se meu retordo so select for 0 */
                            $total["total"]+= 1;
                            /**verificando se tem mesa disponivel nesse horario */
                            for ($i=1; $i <= $total["total"]; $i++) { 
                                    $sql_code = "SELECT * FROM reserva where mesa = '$i' and data_reserva = '$dados[1]' and horario >= 'horario' and horario <= '$dataHora' ";
                                    /** utilizando um parametro para query para rodar meu codigo no banco de dados caso der erro aparece a mensagem (die->) -> aqui se espera que algo seja retornado*/
                                    $sql_query = $mysqli -> query($sql_code) or die("voce simplismente nao existe");
                                    $pull =$sql_query->num_rows;
                                    /**caso nao tiver retorna q nao tem ninguem naquela mesa entao i vai ser minha mesa */
                                    if ($pull == 0) {
                                        $dados[5]=$i;
                                        $i += $total["total"] ;
                                    }
                            } 
                            if ($pull >= 1) {
                                echo"pedimos descupas, mas esse horario e data estao com a mesa cheia";
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
                                        $sql_code = "INSERT INTO reserva VALUES('null','$dados[4]','$dados[5]','$dados[0]','$dados[1]',$dados[2],$dados[3],)";
                                        /**enviando meu codigo para o banco de dados -> aqui nao se espera q algo seja retornado, ja que estamos apenas dando um insert, ele volta como valor booleano*/
                                        $envio = mysqli_query($mysqli,$sql_code);
        
                                    }
                                    /*verificando se horario esta antes do horario atual */
                                    if ($dados[0] <= $hora_futura) {
                                        echo"faça a reserva com 2 horas de antecedencia";

                                        /** colocar em um novo arquivo,quando retornar verifica qual foi o erro retornado */
                                    }
                    
                                }
                                else {
                                    /**inserindo meus dados no banco de dados */
                                    $sql_code = "INSERT INTO reserva VALUES(null, '$dados[4]', '$dados[5]', '$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]')";
                                    /**enviando meu codigo para o banco de dados -> aqui nao se espera q algo seja retornado, ja que estamos apenas dando um insert, ele volta como valor booleano*/
                                    $envio = mysqli_query($mysqli,$sql_code);
                                }
                            }
                        }
                                
                    }
                    
                ?>

echo"<select name=\"pessoa\" required>
                    <option value=\"\" disabled selected >nao selecionado</option>
                    <option value=\"2\">2-pessoa</option>
                    <option value=\"4\">4-pessoa</option>
                    <option value=\"8\">8-pessoa</option>
                </select>";

</table>
</body>
</html>