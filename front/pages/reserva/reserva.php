<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="..\imagens_videos" type="image/x-icon">
    <link rel="shortcut icon" href="..\imagens_videos\pizza_reserva.png" type="image/x-icon">
    <title>reserva</title>
    <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        include("../login/protect.php");
    ?>
</head>
<style>
.cabecalho {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: black;
}

.nav {
    display: flex;
    width: 100%;
    list-style: none;
    padding: 0;
    margin: 0;
}

.nav-item {
    margin-right: 20px; /* Espaçamento entre os itens */
}

.nav-item.sair {
    margin-left: auto; /* Move o item 'sair' para o final da linha */
}
.nav-link {
    text-align: center;
}
a {
    /*font :)*/
    font-family: 'Courier New', Courier, monospace;
    color: #8f8c04; /* Cor do texto */
}
.video-background {
    position: relative;
    width: 100%;
    height: 100vh; /* Define a altura do vídeo como a altura total da tela */
    overflow: hidden;
}

.video-background video {
    position: absolute;
    top: 50%;
    left: 50%;
    min-width: 100%; /* Garante que o vídeo cubra toda a largura */
    min-height: 100%; /* Garante que o vídeo cubra toda a altura */
    width: auto;
    height: auto;
    transform: translate(-50%, -50%);
    z-index: -1; /* Coloca o vídeo atrás do conteúdo */
}

.conteudo {
    position: relative;
    z-index: 1; /* Garante que o conteúdo fique na frente do vídeo */
    color: white; /* Cor do texto para contraste com o vídeo */
    text-align: center;
    font-family: 'Courier New', Courier, monospace;
}
.botao{
    background-color: blue;
    color: #ffffff;
}
.sql_mostra{
    margin:auto;
}
.registro{
    margin: auto;
    background-color: rgba(255, 255, 0, 0.5);
    color: black;
}
.botao_transparente {
      background-color: transparent;
      border: none;
      padding: 0;
      cursor: pointer;
    }

    /* Deixa a imagem ajustada no botão */
    .botao_transparente img {
      display: block;
      height: auto;
    }
</style>
<body>
    <div class="cabecalho">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="..\principal\paginaclient.php"><img src="..\imagens_videos\fatia_home.png" alt=""><br> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="..\imagens_videos\pizza_reserva.png" alt=""><br> reserva</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="..\imagens_videos\caixa_aberta_login.png" alt=""><br> cardapio</a>
            </li>
            <li class="nav-item eu">
                <a class="nav-link" href="#"><img src="..\imagens_videos\pizza_eu.png" alt=""><br> eu</a>
            </li>
            <li class="nav-item sair">
                <a class="nav-link" href="..\login\logout.php"><img src="..\imagens_videos\caixa_fechada_cadastro.png" alt=""><br> sair</a>
            </li>
        </ul>
    </div>
    <div class="video-background">
        <video autoplay muted loop>
            <source src="..\imagens_videos\video_reserva.mp4" type="video/mp4">
            Seu navegador não suporta vídeos.
        </video>
        <div class="conteudo">
            <!-- Aqui você pode adicionar o conteúdo da página que ficará sobre o vídeo -->
            <form  method="POST">
                <h1>reserve uma mesa</h1>


                <?php
                    // Define o fuso horário
                    date_default_timezone_set('America/Sao_Paulo'); // Ajuste para seu fuso horário, se necessário

                    /**pegando data e horario atual */
                    $data = new DateTime();
                    $data_atual = $data ->format('Y-m-d');
                    $data_max = $data ;
                    $data_max->modify('+2 months');
                    $data_max = $data-> format('Y-m-d');
                ?>

                <label for="">horario: </label>
                <br>
                <input name="dados[]" type="time" required min="10:00" max="20:00">
            
                <br>
                <label for="">para que dia: </label>
                <br>
                <input name="dados[]" type="date" required min="<?php echo$data_atual;?>" max="<?php echo$data_max;?>">
                <br>
                <label for="">mesa para quantos: </label>
                <br>
                <select name="dados[]" required>
                    <option value="" disabled selected >nao selecionado</option>
                    <option value="2">2-pessoa</option>
                    <option value="4">4-pessoa</option>
                    <option value="8">8-pessoa</option>
                </select>
                
                <br><br>
                

                <button class="botao" type="submit" name="botao">enviar</button>
                <br>
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

                            /**pegando um numero aletorio mesa> */
                            $dados[5] = rand(1,3);
                            $sql_code = "SELECT * FROM reserva where mesa = '$dados[5]' and data_reserva = '$dados[1]' and horario = '$dados[0]'";
                            /** utilizando um parametro para query para rodar meu codigo no banco de dados caso der erro aparece a mensagem (die->) -> aqui se espera que algo seja retornado*/
                            $sql_query = $mysqli -> query($sql_code) or die("voce simplismente nao existe");
                            $pull =$sql_query->num_rows;
                            /**essa parte ira verificar se existe a mesa na qual o rand escolheu aleatoriamente */
                            if ($pull >= 1) {
                                echo"ja tem uma pessoa com essa reserva";
                                
                            }
                            else {
                                /**pegando hora futura daqui 2 horas */
                                $hora_futura = $data;
                                $hora_futura->modify('+2 hours');
                                $hora_futura = $data->format('H:i');
                                
                                /**verificando de horario e data corresponde com a data */
                                /**pegando a data e horario q meu usuario digitou, colocando ele em um formato data, para ser legivel com o parametro format */
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
                                    }
                    
                                }
                                else {
                                    /**inserindo meus dados no banco de dados */
                                    echo $dados[5],"<br>";
                                    $sql_code = "INSERT INTO reserva VALUES(null, '$dados[4]', '$dados[5]', '$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]')";
                                    /**enviando meu codigo para o banco de dados -> aqui nao se espera q algo seja retornado, ja que estamos apenas dando um insert, ele volta como valor booleano*/
                                    $envio = mysqli_query($mysqli,$sql_code);
                                }
                            }
                        }
                                
                    }
                    
                ?>
            </form>

            <table class="registro">
                <?php
                    /** ------essa parte ira mostrar caso tenha algun registro ja feito-------- */
                    $sql_code = "SELECT * FROM reserva where id_client = $id"; 
                    $sql_query = $mysqli -> query($sql_code) or die("voce simplismente nao existe");
                    $pull =$sql_query->num_rows;
                    $variavel = $sql_query->fetch_assoc();
                    if ($pull == 1) {
                        echo"<tr>";
                        echo"<td>---mesa---</td>";
                        echo"<td>---dia---</td>";
                        echo"<td>---pessoas---</td>";
                        echo"<td>---horario---</td>";
                        echo"<td>---reserva---</td>";

                        echo "<tr>";
                        echo "<td>" . $variavel["mesa"] . "</td>";
                        echo "<td>" . $variavel["dias"] . "</td>";
                        echo "<td>" . $variavel["quantidade"] . "</td>";
                        echo "<td>" . $variavel["horario"] . "</td>";
                        echo "<td>" . $variavel["data_reserva"] . "</td>";
                        echo "</tr>";
                    } 
                    else {
                        echo"<h2 class=\"total_reserva\"> faça sua reserva<h2/>";
                    }
                    
                

                ?>

            </table>
            <form method="post">
                <?php
                /**essa parte ira excluir minha reserva */
                if ($pull == 1) {
                        /**verificar se botao excluir existe */
                        if (isset($_POST["excluir"])) {
                            /**caso cliente apertar no botao excluir registro */
                            $sql_code = "DELETE FROM  reserva WHERE id_client = {$id};";
                            $sql_query = $mysqli -> query($sql_code) or die("algo deu errado");
                            $envio = mysqli_query($mysqli,$sql_code);
                            echo"<h2>atualize a pagina<h2/> <br>";
                            echo "<button class=\"botao_transparente\" type=\"submit\" name=\"excluir\"><img src=\"..\imagens_videos\pizza_reserva.png\" alt=\"\"></button>";
                        }
                        else {
                            /**caso ainda nao existir, mostrar botao excluir */
                            echo"<small>excluir</small> <br>";
                            echo "<button class=\"botao_transparente\" type=\"submit\" name=\"excluir\"><img src=\"..\imagens_videos\cortador_pizza_excluir.png\" alt=\"\"></button>";
                        }
                } 
                
                ?>

            </form>
            
        </div>
      </div>
</body>
</html>