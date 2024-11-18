<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mostrando_reserva.css">
    <link rel="shortcut icon" href="../../images/pizza_reserva.png" type="image/x-icon">
    <title>reserva</title>
    <?php
        /**dados na posição 4 = id do cliente 
         * dados na posição 5 = mesa
         * dados na posição 0 = horario
         * dados na posição 1 = data
         * dados na posição 2 = quantidade pessoa
         * dados na posição 3 = dia da semana
        */
        include("../../controllers/login/protect_controller.php");
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION["error"] = "";   
    ?>
</head>

<body>
    <div class="cabecalho">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="../principal_cliente/principal_client_view.php"><img
                        src="../../images/fatia_home.png" alt=""><br> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="../../images/pizza_reserva.png" alt=""><br> Reserva</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="../../images/caixa_aberta_login.png" alt=""><br>
                    Cardapio</a>
            </li>
            <li class="nav-item eu">
                <a class="nav-link" href="#"><img src="../../images/pizza_eu.png" alt=""><br> Perfil</a>
            </li>
            <li class="nav-item sair">
                <a class="nav-link" href="../../controllers/login/logout_controller.php"><img
                        src="../../images/caixa_fechada_cadastro.png" alt=""><br> Sair</a>
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

            <table class="registro">
                <?php
                    /** ------essa parte ira mostrar caso tenha algun registro ja feito-------- */

                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    include("../../models/conexao.php");
                    $id = $_SESSION["id"];
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

            <form method="post" action="../../controllers/reserva/excluir_controller.php">
                <small>excluir</small> <br>
                <button class="botao_transparente" type="submit" name="excluir"><img
                        src="../../images/cortador_pizza_excluir.png" alt=""></button>
            </form>

            <form action="../alterar/alterar_view.php" method="post">
                <br>
                <small>alterar</small>
                <br>
                <button type="submit"><img src="../../images/alterar.png" alt=""></button>
            </form>
            <!-- alterar reserva
                <form method="post" action="alterar_controller.php">  
                    
                    <small>alterar</small>
                    <br>
                    <select name="opc" required>
                                <option value="" disabled selected >o que deseja alterar</option>
                                <option value="horario">horario e data</option>
                                <option value="pessoa">pessoa</option>
                                </select>
                    <br><button type="submit">enviar</button>
                </form>
                -->


        </div>
    </div>
</body>

</html>