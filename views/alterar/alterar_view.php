<?php

require_once("../../models/conexao.php");

session_start();

$id = $_SESSION["id"];

$conexao = new Conexao();
$mysqli = $conexao->conectar();

$sql_code = "SELECT * FROM reserva WHERE id_client = $id";
$sql_query = $mysqli->query($sql_code) or die("Erro na consulta: " . $mysqli->error);

$variavel = $sql_query->fetch_assoc();

date_default_timezone_set('America/Sao_Paulo');

$data = new DateTime();
$data_atual = $data->format('Y-m-d');
$data_max = $data;
$data_max->modify('+2 months');
$data_max = $data->format('Y-m-d');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../images/pizza_reserva.png" type="image/x-icon">
    <link rel="stylesheet" href="alterar.css">
    <title>alterar</title>
</head>

<body>

    <div class="video-background">
        <video autoplay muted loop>
            <source src="../../images/mario_alterar_usuario.mp4" type="video/mp4">
            Seu navegador não suporta vídeos.
        </video>
        <div class="conteudo">
            <!-- Aqui você pode adicionar o conteúdo da página que ficará sobre o vídeo -->
            <form class="registro" method="POST" action="../../controllers/reserva/inserindo_controller.php">
                <h1>alterar</h1>
                <label for="">horario: </label>
                <br>
                <input name="dados[]" type="time" value="<?php echo $variavel['horario']; ?>" required min="10:00"
                    max="20:00">

                <br>
                <label for="">para que dia: </label>
                <br>
                <input name="dados[]" type="date" value="<?php echo $variavel['data_reserva']; ?>" required
                    min="<?php echo $data_atual; ?>" max="<?php echo $data_max; ?>">
                <br>
                <label for="">mesa para quantos: </label>
                <br>
                <select name="dados[]" required>
                    <option value="<?php echo $variavel['quantidade'] ?? ''; ?>">
                        <?php echo ($variavel['quantidade'] ?? 'Selecione'), "-pessoas"; ?>
                    </option>
                    <option value="2">2-pessoa</option>
                    <option value="4">4-pessoa</option>
                    <option value="8">8-pessoa</option>
                </select>


                <br><br>

                <button class="botao" type="submit" name="botao">enviar</button>
                <br>
                <button><a href="../reserva/mostrando_reserva_view.php">voltar</a></button>
            </form>

        </div>
    </div>

</body>

</html>