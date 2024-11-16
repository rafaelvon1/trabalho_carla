<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pizza</title>
    <link rel="stylesheet" href="pagina_admin.css">
    <?php
    include("../../controllers/login/protect_controller.php");
    /**caso usuario client tentar entrar no admin com url, barrar com o if */
    if ($_SESSION["status"] == "client") {
        /**enviando pessoa administradora para sua pagina */
        header("location: ../principal_cliente/pagina_cliente_view.php");
    }
    ?>
</head>

<body>
    <div class="cabecalho">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="../../images/fatia_home.png" alt=""><br> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../reserva_admin/reserva_admin_view.php"><img
                        src="../../Images/pizza_reserva.png" alt=""><br> Reserva</a>
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
    <div class="app__video-background">
        <video autoplay muted loop>
            <source src="../../images/video_pizza.mp4" type="video/mp4">
            Seu navegador não suporta vídeos.
        </video>
        <div class="app__conteudo">
            <!-- Aqui você pode adicionar o conteúdo da página que ficará sobre o vídeo -->
            <h1>Bem-vindo à Pizzaria administrador</h1>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat mollitia ut laborum voluptatibus
                assumenda dicta facere architecto distinctio dolorem officia, obcaecati sapiente qui omnis incidunt
                nobis nulla blanditiis. Ab, molestiae?</p>
        </div>
    </div>

</body>

</html>