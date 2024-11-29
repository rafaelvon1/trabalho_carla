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

// Verifica se a variável de sessão 'status' está definida
if (isset($_SESSION["status"]) && $_SESSION["status"] == "client") {
    // Envia o cliente para sua página
    header("location: ../principal/pagina_client_page.php");
    exit();
}

/*ligando com o arquivo conexao*/
include("../../models/conexao.php");

$conexao = new Conexao();
$mysqli = $conexao->conectar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reserva_admin.css">
    <link rel="shortcut icon" href="..\imagens_videos" type="image/x-icon">
    <link rel="shortcut icon" href="..\imagens_videos\pizza_reserva.png" type="image/x-icon">
    <title>reserva administrador</title>
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
                <a class="nav-link" href="../principal_admin/principal_admin_view.php"><img
                        src="../../images/fatia_home.png" alt=""><br> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="../../images/pizza_reserva.png"
                        alt="Botão que leva para reserva"><br> Reserva</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="../../images/caixa_aberta_login.png"
                        alt="Botão que leva para o cardapio"><br>
                    Cardapio</a>
            </li>
            <li class="nav-item eu">
                <a class="nav-link" href="#"><img src="../../images/pizza_eu.png" alt="Botão que leva ao perfil"><br>
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
            <source src="../../images/mario_page_adm.mp4" type="video/mp4">
            Seu navegador não suporta vídeos.
        </video>
        <div class="pesquisa">
            <form action="" method="post">
                <label for="pesquisa">pesquisar</label>
                <br>
                <input type="text" name='pesquisa' placeholder="1° letra do nome" required>
                <br>
                <button type="submit">enviar</button>
                <br>
            </form>
            <!--filtros para procurar cliente
                <form action="" method="post">
                    <div>
                            <button name="todos">todos</button>
                            <button>todos</button>
                            <button>todos</button>
                            <button>todos</button>
                    </div>
                </form>
                -->

        </div>
        <div class="conteudo">
            <!--


             <input type="radio>
            <form action="" method="post" class="form-container">
                <label for="">pesquisa</label>
                <br>
                <input type="text">
                <br>
                <button type="submit">pesquisar</button>
                <br>
                <select name="" required>
                    <option value="" disabled selected >nao selecionado</option>
                    <option value="2">todos usuarios</option>
                    <option value="4">reservas atrasadas</option>
                    <option value="8">por ordem</option>
                </select>
            </form>
            -->


            <table class="registro">
                <tr>
                    <td>----perfil----</td>
                    <td>----nome----</td>
                    <td>----mesa----</td>
                    <td>----horario----</td>
                    <td>----data_reserva----</td>
                    <td>----pessoa----</td>
                </tr>

                <?php


                /**forma de mostrar todos os registros da tabela sql */
                /**verificando se a conexão foi */
                $sql_cod = "SELECT r.id_client,d.nome,r.mesa,r.horario,r.data_reserva,r.quantidade from reserva r, dados_usuario d where r.id_client = d.id_client;";
                if (isset($_POST['pesquisa'])) {
                    $pesquisa = $_POST['pesquisa'];
                    if ($pesquisa == "1") {
                        $sql_cod = "SELECT r.id_client,d.nome,r.mesa,r.horario,r.data_reserva,r.quantidade from reserva r, dados_usuario d where r.id_client = d.id_client order by d.nome;";
                    } elseif ($pesquisa == "2") {
                        $sql_cod = "SELECT r.id_client,d.nome,r.mesa,r.horario,r.data_reserva,r.quantidade from reserva r, dados_usuario d where r.id_client = d.id_client and data_reserva < date(now());";
                    } else {

                        $sql_cod = "SELECT r.id_client,d.nome,r.mesa,r.horario,r.data_reserva,r.quantidade from reserva r, dados_usuario d where r.id_client = d.id_client and nome like '$pesquisa%';";
                    }
                }

                /**utilizando parametro query para enviar codigo sql caso nao funcione die */
                $sql_query = $mysqli->query($sql_cod) or die("voce simplismente nao existe");
                /**verificando se teve algum retorno da minha consulta */
                $retorno = $sql_query->num_rows;
                if ($retorno == 0) {
                    echo "<h2 class=\"aviso\">nada registrado<h2/>";
                } else {
                    while ($variavel = $sql_query->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td> <a href=\"../perfils/perfil_admin/perfil_admin_view.php?id=$variavel[id_client]\">entrar</a> </td>";
                        echo "<td>" . $variavel['nome'] . "</td>";
                        echo "<td>" . $variavel['mesa'] . "</td>";
                        echo "<td>" . $variavel['horario'] . "</td>";
                        echo "<td>" . $variavel['data_reserva'] . "</td>";
                        echo "<td>" . $variavel['quantidade'] . "</td>";
                        echo "</tr>";
                    }
                }



                ?>
            </table>
        </div>
    </div>

</body>

</html>