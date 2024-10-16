<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="..\imagens_videos" type="image/x-icon">
    <link rel="shortcut icon" href="..\imagens_videos\pizza_reserva.png" type="image/x-icon">
    <title>reserva</title>
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
        


                    // Obtém a hora atual
                    $hora_atual = date('H:i'); // Formato 24 horas

                    /* 
                    forma de pegar dia da semana em formato e nome

                        $dia_semana = $data->format('l');
                        if ($dia_semana == "Sunday") {
                            $hora_max="16:00";
                        }
                        else {
                            $hora_max="20:00";
                        }
                    */
                
                ?>

                <label for="">horario: </label>
                <br>
                <input name="dados[]" type="time" required min="<?php echo $hora_atual;?>" max="20:00">


                
                <br>
                <label for="">para que dia: </label>
                <br>
                <input name="dados[]" type="date" required min="<?php echo$data_atual;?>" max="<?php echo$data_max;?>">
                <br>
                <label for="">mesa para quantos: </label>
                <br>
                <select name="dados[]" required>
                    <option VALUES="" disabled selected >nao selecionado</option>
                    <option VALUES="2">2-pessoa</option>
                    <option VALUES="4">4-pessoa</option>
                    <option VALUES="8">8-pessoa</option>
                </select>
                
                <br><br>
                

                <button class="botao" type="submit" name="botao">enviar</button>
                <br>
                <?php
                    if (isset($_POST["botao"])) {
                        /**pegando meus dados da reserva */
                        
                        $dados = $_POST["dados"];
                        

                        $dataHora = new DateTime("$dados[1] $dados[0]");
                        $dados = $_POST["dados"];
                        $dados[3] = $dataHora->format('l');
                        if ($dados[3] == "sunday") {
                            echo"hoje é quarta";
    
            
                        }
                        else {

                            include("../../../db/conexao.php");
                            $sqli = "INSERT INTO reserva VALUES('nulll','$dados[0]','$dados[1]','$dados[2]','$dados[3]')";
                            /**enviando meu codigo para o banco de dados -> aqui nao se espera q algo seja retornado, ja que estamos apenas dando um insert, ele volta como valor booleano*/
                            $envio = mysqli_query($mysqli,$sqli);
                        }
                        
                        
                    }
                    else {
                        echo "...";
                    }

                    ?>
            </form>
        </div>
      </div>
</body>
</html>