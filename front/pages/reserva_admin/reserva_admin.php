<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="..\imagens_videos" type="image/x-icon">
    <link rel="shortcut icon" href="..\imagens_videos\pizza_reserva.png" type="image/x-icon">
    <title>reserva administrador</title>
    <?php
        /**dados na posição 4 = id do cliente 
         * dados na posição 5 = mesa
         * dados na posição 0 = horario
         * dados na posição 1 = data
         * dados na posição 2 = quantidade pessoa
         * dados na posição 3 = dia da semana
        */
        include("../login/protect_controller.php");
        /**caso usuario client tentar entrar no admin com url, barrar com o if */
        if ($_SESSION["status"] == "client") {
            /**enviando pessoa administradora para sua pagina */
            header("location: ../principal/pagina_client_page.php");
        }

        /*ligando com o arquivo conexao*/
        include("../../../db/conexao.php");
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
.registro{
    margin: auto;
    background-color: rgba(255, 255, 0, 0.8);
    color: black;
}
.pesquisa{
    display: block;
    font-family: 'Courier New', Courier, monospace;
    color: white;
    text-align: center;
}
.aviso{
    margin: auto;
    background-color: rgba(255, 255, 0, 0.8);
    color: black;
    width: 450px;
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
                <a class="nav-link" href="..\principal\pagina_admin_page.php"><img src="..\imagens_videos\fatia_home.png" alt=""><br> Home</a>
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
            <source src="..\imagens_videos\mario_page_adm.mp4" type="video/mp4">
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

            
        <table class ="registro">
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
                    }
                    elseif ($pesquisa == "2") {
                        $sql_cod = "SELECT r.id_client,d.nome,r.mesa,r.horario,r.data_reserva,r.quantidade from reserva r, dados_usuario d where r.id_client = d.id_client and data_reserva < date(now());";  
                    }
                    else {
                        
                        $sql_cod = "SELECT r.id_client,d.nome,r.mesa,r.horario,r.data_reserva,r.quantidade from reserva r, dados_usuario d where r.id_client = d.id_client and nome like '$pesquisa%';";
                    }
                }
                
                /**utilizando parametro query para enviar codigo sql caso nao funcione die */
                $sql_query = $mysqli -> query($sql_cod) or die("voce simplismente nao existe");
                /**verificando se teve algum retorno da minha consulta */
                $retorno = $sql_query->num_rows;
                if ($retorno == 0) {
                    echo"<h2 class=\"aviso\">nada registrado<h2/>";
                } 
                else {
                    while ($variavel = $sql_query->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td> <a href=\"perfil_admin.php?id=$variavel[id_client]\">entrar</a> </td>";
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