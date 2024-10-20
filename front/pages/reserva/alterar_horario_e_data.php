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
        /**dados na posição 4 = id do cliente 
         * dados na posição 5 = mesa
         * dados na posição 0 = horario
         * dados na posição 1 = data
         * dados na posição 2 = quantidade pessoa
         * dados na posição 3 = dia da semana
        */
        include("../login/protect_controller.php");
        include("../../../db/conexao.php");
        if (!isset($_SESSION)) {
            session_start();
        }
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
<body>
    <div class="cabecalho">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="..\principal\pagina_client_page.php"><img src="..\imagens_videos\fatia_home.png" alt=""><br> Home</a>
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
                <a class="nav-link" href="..\login\logout_controller.php"><img src="..\imagens_videos\caixa_fechada_cadastro.png" alt=""><br> sair</a>
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
            <form  method="POST" action="">
                <h1>altera horario e data</h1>
                <label for="">horario: </label>
                <br>
                <input name="dados[]" type="time" required min="10:00" max="20:00">
                <br>
                <label for="">para que dia: </label>
                <br>
                <input name="dados[]" type="date" required min="<?php echo$data_atual;?>" max="<?php echo$data_max;?>">
                
                <br><br>
                

                <button class="botao" type="submit" name="botao">enviar</button>
                <br>
                <button><a href="mostrando_reserva.php">voltar</a></button>
                <?php
                        /**dados na posição 4 = id do cliente 
                         * dados na posição 5 = mesa
                         * dados na posição 0 = horario
                         * dados na posição 1 = data
                         * dados na posição 2 = quantidade pessoa
                         * dados na posição 3 = dia da semana
                        */

                    if (isset($_POST["dados"])) {
                            /**pegando meus dados da reserva */
                        $dados = $_POST["dados"];

                        $sql_code = "SELECT * FROM reserva WHERE id_client = '" . $_SESSION['id'] . "'";
                        $sql_query = $mysqli -> query($sql_code) or die("voce simplismente nao existe");
                        $variavel = $sql_query->fetch_assoc();         
                        $bck_horario = $variavel["horario"];
                        $bck_data = $variavel["data_reserva"];
                        /**deleteando horario e data do meu usuario para mudar para novo horario */
                        $sql_code = "UPDATE reserva SET horario = '00:00:00', data_reserva = '0000-00-00' WHERE id_client = {$_SESSION['id']} LIMIT 1";
                        $sql_query = $mysqli -> query($sql_code) or die("algo deu errado");

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
                            $_SESSION["error"] = "pedimos descupas, mas esse horario e data estao com a mesa cheia, tente outro horario";
                            $sql_code = "UPDATE reserva SET horario = '{$bck_horario}', data_reserva = '{$bck_data}',mesa = '{$dados[5]}' WHERE id_client = {$_SESSION ['id']} LIMIT 1";
                            $sql_query = $mysqli -> query($sql_code) or die("algo deu errado");
                            header("location: reserva.php");
                        }
                        else{
                            $sql_code = "UPDATE reserva SET horario = '{$dados[0]}', data_reserva = '{$dados[1]}' ,mesa = '{$dados[5]}'WHERE id_client = {$_SESSION['id']} LIMIT 1";
                            $sql_query = $mysqli -> query($sql_code) or die("algo deu errado");
                            echo"<h2>alteraçao feita com sucesso<h2/>";
                        }
                    }
                ?>
            </form>  
      
</body>
</html>