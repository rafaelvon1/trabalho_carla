<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="..\imagens_videos\pizzaicone.ico" type="image/x-icon">
    <title>pizza</title>
    <link rel="stylesheet" href="../../assets/styles/pagina_admin.css">
    <?php
    include("../login/protect_controller.php");
    /**caso usuario client tentar entrar no admin com url, barrar com o if */
    if ($_SESSION["status"] == "client") {
        /**enviando pessoa cliente para sua pagina */
        header("location: ../principal/pagina_client_page.php");
    }
?>
</head>

<body>
    <div class="cabecalho">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="..\imagens_videos\fatia_home.png" alt=""><br> HOME</a>
            </li>
            <li class="nav-item">
<<<<<<< HEAD
<<<<<<< HEAD:front/pages/principal/paginaclient.php
                <a class="nav-link" href="..\reserva\reserva.html"><img src="..\imagens_videos\pizza_reserva.png" alt=""><br> RESERVA</a>
=======
                <a class="nav-link" href="..\reserva_admin\reserva_admin.php"><img src="..\imagens_videos\pizza_reserva.png" alt=""><br> reserva</a>
>>>>>>> 80922fb8c4949b66f9749989ea91f84429fbbca0:front/pages/principal/pagina_admin_page.php
            </li>
            <li class="nav-item">
                <a class="nav-link" href="..\cardapio\cardapio.html"><img src="..\imagens_videos\caixa_aberta_login.png" alt=""><br> CARDÁPIO</a>
=======
                <a class="nav-link" href="..\reserva_admin\reserva_admin.php"><img
                        src="..\imagens_videos\pizza_reserva.png" alt=""><br> reserva</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="..\imagens_videos\caixa_aberta_login.png" alt=""><br>
                    cardapio</a>
>>>>>>> 2aba80b3218351d88357951011e1d167e5d9c44e
            </li>
            <li class="nav-item sair">
<<<<<<< HEAD
<<<<<<< HEAD:front/pages/principal/paginaclient.php
                <a class="nav-link" href="..\login\logout.php"><img src="..\imagens_videos\caixa_fechada_cadastro.png" alt=""><br> SAIR</a>
=======
                <a class="nav-link" href="..\login\logout_controller.php"><img src="..\imagens_videos\caixa_fechada_cadastro.png" alt=""><br> sair</a>
>>>>>>> 80922fb8c4949b66f9749989ea91f84429fbbca0:front/pages/principal/pagina_admin_page.php
=======
                <a class="nav-link" href="..\login\logout_controller.php"><img
                        src="..\imagens_videos\caixa_fechada_cadastro.png" alt=""><br> sair</a>
>>>>>>> 2aba80b3218351d88357951011e1d167e5d9c44e
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
            <h1>Bem-vindo à Pizzaria administrador</h1>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat mollitia ut laborum voluptatibus
                assumenda dicta facere architecto distinctio dolorem officia, obcaecati sapiente qui omnis incidunt
                nobis nulla blanditiis. Ab, molestiae?</p>
        </div>
    </div>

</body>

</html>