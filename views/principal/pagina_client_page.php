<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="..\imagens_videos\pizzaicone.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/styles/principal_cliente.css">

    <title>pizza</title>

    <?php
    include("../login/protect_controller.php");
?>
</head>


<body>
    <div class="cabecalho">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="..\imagens_videos\fatia_home.png" alt="Botão para a Home"><br>
                    Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="..\reserva\reserva.php"><img src="..\imagens_videos\pizza_reserva.png"
                        alt="Botão que leva pra reserva"><br> Reserva</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="..\imagens_videos\caixa_aberta_login.png"
                        alt="Botão do cardapio"><br>
                    Cardapio</a>
            </li>
            <li class="nav-item eu">
                <a class="nav-link" href="perfil_cliente.php"><img src="..\imagens_videos\pizza_eu.png"
                        alt="Botão para sei la onde porra é"><br>
                    Perfil</a>
            </li>
            <li class="nav-item sair">
                <a class="nav-link" href="..\login\logout_controller.php"><img
                        src="..\imagens_videos\caixa_fechada_cadastro.png"
                        alt="Sair da pagina e ir para a home"><br>Sair</a>
            </li>
        </ul>
    </div>
    <div class="video-background">
        <video autoplay muted loop>
            <source src="..\imagens_videos\video_pizza.mp4" type="video/mp4">
            Seu navegador não suporta vídeos.
        </video>
        <div class="conteudo">
            <!-- Aqui você pode adicionar o conteúdo da página que ficará sobre o vídeo -->
            <h1>Bem-vindo à Pizzaria Nerdola!</h1>
            <p>Agora que você entrou no universo Nerdola, prepare-se para uma explosão de sabores e referências geek!
                Aqui, cada pizza é uma aventura, e a diversão nunca acaba. <br> Fique à vontade para explorar nossas
                opções
                inspiradas nos seus filmes, séries e jogos favoritos!</p>
            <p>Pronto para uma experiência épica? Vamos nessa, a próxima fatia é sua! 😎🍕</p>

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.0645243091217!2d-46.34044722363292!3d-23.530181560449453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce7ae5ef9df591%3A0xab444b2e732ab64f!2sAv.%20Get%C3%BAlio%20Vargas%2C%20649%20-%20Calmon%20Viana%2C%20Po%C3%A1%20-%20SP%2C%2008560-000!5e0!3m2!1spt-BR!2sbr!4v1730855764357!5m2!1spt-BR!2sbr"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>


    <?php

/**abrir uma sessao, para armazenar dados do usuario em varias paginas */
session_start();
/**pegando no arquivo conexao minha conexao :) */
include("../../../db/conexao.php");

/**verificando se a conexão foi */
if($mysqli -> connect_errno){
    echo"deu nao mano",$mysqli -> connect_errno,$mysqli -> connect_error;
}
else {
    /**pegando minhas variaveis */
    $dados = $_POST["log"] ;
    /**vai coloca comando sql aqui nao */
    $dados[0] = $mysqli -> real_escape_string($dados[0]);
    $dados[1] = $mysqli -> real_escape_string($dados[1]);
    /**gerando uma consulta para verifacar se email e senha estao corretos */
    $sql_code = "SELECT id,email,senha,pessoa_status FROM login WHERE email = '$dados[0]'";
    /**utilizando parametro query para enviar codigo sql caso nao funcione die */
    $sql_query = $mysqli -> query($sql_code) or die("voce simplismente nao existe");
    /**verificando se teve algum retorno do meu select*/
    $quantidade = $sql_query->num_rows;
    /**caso sim, entao email e senha aprovados */
    $variavel =  $sql_query->fetch_assoc();
    
    if ($quantidade == 1) {
        /**variavael ira guardar dados do banco de dados como uma array*/
        if (!isset($_SESSION)) {
            session_start();
        }
        /**usando esse parametro é possivel verificar se a senha criptografada do cliente é veridico, caso for retorna 1 True */
        if (password_verify($dados[1],$variavel["senha"])) {
            /**usado para verificar se email ja esta cadastrado no arquivo protect */
            $_SESSION["email"] = $variavel["email"];
            $_SESSION["id"] = $variavel["id"];
            $_SESSION["status"] = $variavel["pessoa_status"];
            /**separando administrador de cliente */
            if ($variavel["pessoa_status"] == "admin") {
                /**enviando pessoa administradora para sua pagina */
                header("location: ../principal/pagina_admin_page.php");
            }
            else {
                /**enviar pessoa para pagina do site */
                header("location: ../principal/pagina_client_page.php");
            }    
        }
        else {
            echo "senha incorreta"; 
        }
    }
    /**caso senha ou email estiver incorreto */
    else {
        echo"<h1>email ou senha invalido<h1/>";
    }
}
?>
    <!-- caso algo der errado, voltar para login-->
    <button type="submit"><a href="logout_controller.php">sair</a></button>

</body>

</html>