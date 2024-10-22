<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="..\imagens_videos" type="image/x-icon">
    <link rel="shortcut icon" href="..\imagens_videos\pizza_reserva.png" type="image/x-icon">
    <title>alterar</title>
    <!--<?php
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
        $id = $_SESSION["id"];
        $sql_code = "SELECT * FROM reserva where id_client = $id"; 
        $sql_query = $mysqli -> query($sql_code) or die("voce simplismente nao existe");
        $variavel = $sql_query->fetch_assoc();
    ?>
    -->
</head>
<style>
.cabecalho {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: black;
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


.registro{
    text-align: center;
    margin: 350px;
    width: auto;
    background-color: rgba(80, 80, 80, 0.8);
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
<!--
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
-->

<body>
   
    </div>
    <div class="video-background">
        <video autoplay muted loop>
            <source src="..\imagens_videos\mario_alterar_usuario.mp4" type="video/mp4">
            Seu navegador não suporta vídeos.
        </video>
        <div class="conteudo">
            <!-- Aqui você pode adicionar o conteúdo da página que ficará sobre o vídeo -->
            <form class="registro" method="POST" action="inserindo_controller.php">
                <h1>alterar</h1>
                <label for="">horario: </label>
                <br>
                <input name="dados[]" type="time" value="<?php echo $variavel['horario']?>" required min="10:00" max="20:00">
            
                <br>
                <label for="">para que dia: </label>
                <br>
                <input name="dados[]" type="date" value="<?php echo $variavel['data_reserva']?>" required min="<?php echo$data_atual;?>" max="<?php echo$data_max;?>">
                <br>
                <label for="">mesa para quantos: </label>
                <br>
                <select name="dados[]" required >
                    <option value="<?php echo $variavel['quantidade']?>"> <?php echo $variavel['quantidade'],"-pessoas";?></option>
                    <option value="2">2-pessoa</option>
                    <option value="4">4-pessoa</option>
                    <option value="8">8-pessoa</option>
                </select>
                
                <br><br>
                

                <button class="botao" type="submit" name="botao">enviar</button>
                <br>
                <button><a href="mostrando_reserva.php">voltar</a></button>
            </form>  
            
        </div>
      </div>
      
</body>
</html>