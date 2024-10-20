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
        include("../login/protect_controller.php");
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION["error"] = "";
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
        
            <table class="registro">
                <?php
                    /** ------essa parte ira mostrar caso tenha algun registro ja feito-------- */

                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    include("../../../db/conexao.php");
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
                
                <form method="post" action="excluir_controller.php">
                    <?php
                    /**essa parte ira excluir minha reserva */
                    if ($pull == 1) {
                            
                        /**quando meu pull for 1 siginifica q exite alguem com o id da minha conta, enta mostrar botao excluir */
                        echo"<small>excluir</small> <br>";
                        echo "<button class=\"botao_transparente\" type=\"submit\" name=\"excluir\"><img src=\"..\imagens_videos\cortador_pizza_excluir.png\" alt=\"\"></button>";
                    
                    } 
                    
                    ?>

                </form>

                <!-- alterar reserva-->
                <form method="post" action="">  
                    <small>alterar</small>
                    <br>
                    <select name="opc" required>
                                <option value="" disabled selected >o que deseja alterar</option>
                                <option value="mesa">mesa</option>
                                <option value="horario">horario</option>
                                <option value="data">data</option>
                                <option value="pessoa">pessoa</option>
                                </select>
                    <br><button type="submit">enviar</button>
                </form>
            
        </div>
      </div>
</body>
</html>