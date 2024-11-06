<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="..\imagens_videos" type="image/x-icon">
    <link rel="shortcut icon" href="..\imagens_videos\pizza_reserva.png" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/styles/reserva.css">
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
        include("checking_controller.php");
    ?>
</head>


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
                <a class="nav-link" href="..\principal\pagina_client_page.php"><img
                        src="..\imagens_videos\fatia_home.png" alt=""><br> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="..\imagens_videos\pizza_reserva.png" alt=""><br> reserva</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="..\imagens_videos\caixa_aberta_login.png" alt=""><br>
                    cardapio</a>
            </li>
            <li class="nav-item eu">
                <a class="nav-link" href="#"><img src="..\imagens_videos\pizza_eu.png" alt=""><br> eu</a>
            </li>
            <li class="nav-item sair">
                <a class="nav-link" href="..\login\logout_controller.php"><img
                        src="..\imagens_videos\caixa_fechada_cadastro.png" alt=""><br> sair</a>
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
            <form method="POST" action="inserindo_controller.php">
                <h1>reserve uma mesa</h1>




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
                    <option value="" disabled selected>nao selecionado</option>
                    <option value="2">2-pessoa</option>
                    <option value="4">4-pessoa</option>
                    <option value="8">8-pessoa</option>
                </select>

                <br><br>


                <button class="botao" type="submit" name="botao">enviar</button>
                <br>
            </form>
            <?php
            if (isset($_SESSION["error"])) {
                echo$_SESSION["error"];
            }
            ?>
        </div>
    </div>

</body>

</html>