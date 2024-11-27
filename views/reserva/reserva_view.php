<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../images/pizza_reserva.png" type="image/x-icon">
    <link rel="stylesheet" href="reserva.css">
    <title>reserva</title>
    <?php
    /**dados na posição 4 = id do cliente 
     * dados na posição 5 = mesa
     * dados na posição 0 = horario
     * dados na posição 1 = data
     * dados na posição 2 = quantidade pessoa
     * dados na posição 3 = dia da semana
     */
    include("../../controllers/reserva/checking_controller.php");
    ?>
</head>


<?php
// Define o fuso horário
date_default_timezone_set('America/Sao_Paulo'); // Ajuste para seu fuso horário, se necessário

/**pegando data e horario atual */
$data = new DateTime();
$data_atual = $data->format('Y-m-d');
$data_max = $data;
$data_max->modify('+2 months');
$data_max = $data->format('Y-m-d');
?>

<body>
    <div class="cabecalho">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="../principal_cliente/principal_client_view.php"><img
                        src="../../images/fatia_home.png" alt=""><br> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reserva_view.php"><img src="../../images/pizza_reserva.png"
                        alt="Botão que leva para reserva"><br> Reserva</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../cardapio/cardapio.html"><img src="../../images/caixa_aberta_login.png"
                        alt="Botão que leva para o cardapio"><br>
                    Cardapio</a>
            </li>
            <li class="nav-item eu">
                <a class="nav-link" href="../perfils/perfil_cliente/perfil_cliente_view.php"><img
                        src="../../images/pizza_eu.png" alt="Botão que leva ao perfil"><br>
                    Perfil</a>
            </li>
            <li class="nav-item sair">
                <a class="nav-link" href="../../controllers/login/logout_controller.php"><img
                        src="../../images/caixa_fechada_cadastro.png" alt="Botão que faz o usuario sair da conta"><br>
                    Sair</a>
            </li>
        </ul>
    </div>
    <div class="video-background">
        <video autoplay muted loop>
            <source src="../../images/video_reserva.mp4" type="video/mp4">
            Seu navegador não suporta vídeos.
        </video>
        <div class="conteudo">
            <!-- Aqui você pode adicionar o conteúdo da página que ficará sobre o vídeo -->
            <form method="POST" action="../../controllers/reserva/inserindo_controller.php">
                <h1>Reserve sua mesa!</h1>

                <div class="form-group">
                    <label for="horario">Horário:</label>
                    <input id="horario" name="dados[]" type="time" required min="10:00" max="20:00">
                </div>

                <div class="form-group">
                    <label for="data">Para qual dia:</label>
                    <input id="data" name="dados[]" type="date" required min="<?php echo $data_atual; ?>"
                        max="<?php echo $data_max; ?>">
                </div>

                <div class="form-group">
                    <label for="pessoas">Quantidade de pessoas:</label>
                    <select id="pessoas" name="dados[]" required>
                        <option value="" disabled selected>Não selecionado</option>
                        <option value="2">2 pessoas</option>
                        <option value="4">4 pessoas</option>
                        <option value="8">8 pessoas</option>
                    </select>
                </div>
                <button class="botao" type="submit" name="botao">enviar</button>
                <br>
            </form>
            <?php
            if (isset($_SESSION["error"])) {
                echo $_SESSION["error"];
            }
            ?>
        </div>
    </div>

</body>

</html>