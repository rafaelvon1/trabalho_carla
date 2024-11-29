<?php
session_start();
$status = isset($_SESSION['status']) ? $_SESSION['status'] : 'client';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cardapio</title>
    <link rel="stylesheet" href="cardapio.css">
</head>

<body>

    <div class="cabecalho">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="../../controllers/cardapio/cardapio_controller.php"><img
                        src="../../images/fatia_home.png" alt="Acesso a pagina principal"><br> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../reserva/reserva_view.php"><img src="../../images/pizza_reserva.png"
                        alt="Acesso a reserva"><br>
                    Reserva</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cardapio.php"><img src="../../images/caixa_aberta_login.png" alt=""><br>
                    Cardapio</a>
            </li>
            <?php if ($status === 'client'): ?>
                <li class="nav-item eu">
                    <a class="nav-link" href="../perfils/perfil_cliente/perfil_cliente_view.php"><img
                            src="../../images/pizza_eu.png" alt=""><br> Perfil</a>
                </li>
            <?php endif; ?>
            <li class="nav-item sair">
                <a class="nav-link" href="../../controllers/login/logout_controller.php"><img
                        src="../../images/caixa_fechada_cadastro.png" alt=""><br> Sair</a>
            </li>
        </ul>
    </div>

    <div class="inter">
        <button class="botaocima" id="pizzas" onclick="esconderrsca()">PIZZAS</button>
        <button class="botaocima" id="esfiha" onclick="esconderrsca()">ESFIHAS</button>
        <button class="botaocima" id="bebidas" onclick="escondersd()">BEBIDAS</button>
    </div>
    <div class="menu">
        <button class="botaobaixo" id="btsalgada">Salgadas</button>
        <button class="botaobaixo" id="btdoce">Doces</button>
        <button class="botaobaixo" id="btrefri">Refrigerante</button>
        <button class="botaobaixo" id="btsuco">Suco</button>
        <button class="botaobaixo" id="btcerva">Cerveja</button>
        <button class="botaobaixo" id="btagua">Água</button>
    </div>

    <div id="principal">
        <!--Colocando as divs em uma borda-->
        <div id="alimentos">
            <div id="salgadas">
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <br>
                            <H6>A MODA DA CASA</H6>
                            <small>Presunto, Calabresa defumada fatiada, Molho de Tomate, Bacon, Mussarela,
                                Milho,Orégano</small>
                            <br>
                            <strong id="rs">R$ 54.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>ATUM</H6>
                            <small>Atum, Molho de tomate, Mussarela, Orégano, Palmito</small>
                            <br>
                            <strong id="rs">R$ 52.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>BAURU</H6>
                            <small>Molho de tomate, Mussarela, Orégano, Presunto, Tomate</small>
                            <br>
                            <strong id="rs">R$ 49.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>BRÓCOLIS COM CATUPIRY</H6>
                            <small>Bacon, Brócolis, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 49.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>CALABRESA</H6>
                            <small>Azeitona Verde, Calabresa fatiada, Cebola, molho de tomate, Orégano</small>
                            <br>
                            <strong id="rs">R$ 49.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>CARNE SECA COM CATUPIRY</H6>
                            <small>Carne seca, Cebola, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 52.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>CINCO QUEIJOS</H6>
                            <small>Gorgonzola, Mussarela, Parmesão, Provolone, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 52.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>DOIS QUEIJO</H6>
                            <small> Mussarela, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 45.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>DORITOS</H6>
                            <small>Doritos, Mussarela, Peperona</small>
                            <br>
                            <strong id="rs">R$ 52.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>ESCAROLA</H6>
                            <small>Bacon, Escarola, MOlho de tomate, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 46.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>ESPANHOLA</H6>
                            <small>Calabresa fatiada, Mussarela, Ovo, Presunto</small>
                            <br>
                            <strong id="rs">R$ 52.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>FRANCESA</H6>
                            <small>Cebola, Ervilha, Mussarela, Palmito</small>
                            <br>
                            <strong id="rs">R$ 49.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>FRANGO COM CATUPIRY</H6>
                            <small>Frango, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 52.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>GALETO</H6>
                            <small>Frango, Palmito, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 49.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>GREGO</H6>
                            <small>Ervilha, Mussarela, Palmito, Presunto, Tomate</small>
                            <br>
                            <strong id="rs">R$ 46.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>HAVAIANA</H6>
                            <small>Abacaxi em calda, Lombo, Mussarela</small>
                            <br>
                            <strong id="rs">R$ 52.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>JARDINEIRA</H6>
                            <small> Ervilha, Milho, Mussarela, Palmito, Tomate</small>
                            <br>
                            <strong id="rs">R$ 45.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>LIGHT</H6>
                            <small>Brócolis, Milho, Palmito, Tomate</small>
                            <br>
                            <strong id="rs">R$ 45.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>LOMBO</H6>
                            <small>Bacon, Lombo, Palmito, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$52.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>MEXICANA</H6>
                            <small>Azeitona verde, Molho de tomate, Mussarela, Orégano, Peperone, Pimentão</small>
                            <br>
                            <strong id="rs">R$ 49.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>NAPOLITANA</H6>
                            <small>Molho de tomate, Orégano, Parmesão, Tomate</small>
                            <br>
                            <strong id="rs">R$ 52.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>NERDOLA A MODA DO CHEFE</H6>
                            <small>Bacon, Carne seca, Cheddar, Orégano, Molho de tomate, Azeitona verde, Alho
                                frito</small>
                            <br>
                            <strong id="rs">R$ 57.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>PÃO DE ALHO</H6>
                            <small>Molho de tomate, Mussarela, Pão de alho, Pasta de alho</small>
                            <br>
                            <strong id="rs">R$ 45.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>PERUANA</H6>
                            <small>Atum, Bacon, Ervilha, Milho, Mussarela</small>
                            <br>
                            <strong id="rs">R$ 52.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>QUATRO QUEIJOS</H6>
                            <small>Mussarela, Parmesão, Provolone, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 52.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>SICILIANA</H6>
                            <small>Bacon, Champignon, Mussarela</small>
                            <br>
                            <strong id="rs">R$ 49.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>SONHO DA NOITE</H6>
                            <small>Bacon, Milho, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 45.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>TOSCANA</H6>
                            <small>Calabresa Fatiada, Cebola, Mussarela, Tomate</small>
                            <br>
                            <strong id="rs">R$ 52.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>TRÊS QUEIJOS</H6>
                            <small>Mussarela, Parmesão, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 49.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>VEGANA</H6>
                            <small>Alho frito, Brócolis, Champignon, Milho, Palmito</small>
                            <br>
                            <strong id="rs">R$ 45.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>VENEZA</H6>
                            <small>Bacon, Lombo, Mussarela, Palmito, Presunto</small>
                            <br>
                            <strong id="rs">R$ 52.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/pizza.png" alt="">
                            <H6>Volcano</H6>
                            <small>Molho de tomate, Mussarela, Calabresa, Jalapeños, Pimentão, Cebola, Azeitana verde,
                                Orégano</small>
                            <br>
                            <strong id="rs">R$ 52.99</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!--div salgada termina aqui -->
            <div id="doces">
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>ABACAXI COM CANELA</H6>
                            <small>Abacaxi fatiado, Açucar e canela, Calda de caramelo</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>ABÓBORA COM ESPECIARIAS</H6>
                            <small>Purê de abóbora, Canela, Noz-Moscada,Cobertura cream cheese</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>BANANA COM DOCE DE LEITE</H6>
                            <small>Banana fatiada, Doce de leite, Canela</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>BAUNILHA COM AMÊNDOAS</H6>
                            <small>Creme de baunilha, Amêndoas fatiadas, Frutas de estação</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>BIS</H6>
                            <small>Bis, Chcocolate ao leite, Chocolate branco</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>CARAMELO SALGADO</H6>
                            <small>Creme de caramelo, Flocos de sal, Nozes e Amêndoas</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>CHEESECAKE</H6>
                            <small>Cream cheese, Açucar, Baunilha, Cobertura de frutas verlhas</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>CHOCOLETE BRANCO E FRUTAS</H6>
                            <small>Chocolate branco, Morango, Kiwi, Framboesa</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>CHURROS</H6>
                            <small>Doce de leite/Chocolate, Canela, Açucar, Cobertura de chantilly</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>COCO</H6>
                            <small>Coco ralado, Leite de coco, Açucar </small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>DOCE DE LEITE</H6>
                            <small>Doce de leite, Coco ralado</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>ECLAIR</H6>
                            <small>Creme de confeiteiro, Cobertura de chocolate</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>FERRERO ROCHER</H6>
                            <small>Creme de avelã, Pedaços de ferrero rocher, avelãs trituradas</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6> FONDUE DE CHOCOLATE</H6>
                            <small>Chocolate derretido, Base com chocolate, Marshmallows para mergulhar</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>GELATO</H6>
                            <small>IORGURTE GREDO, MEL</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>IOGURTE GREGO COM AMENDOIM</H6>
                            <small>Iogurte grego, Mel, Amendoim triturado</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>IOGURTE E FRUTAS VERMELHAS</H6>
                            <small>Iogurte natural, Frutas vermelhas, Mel</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>KINDER BUENO</H6>
                            <small>Chocolate ao leite, Creme ninho, Kinder bueno</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>KITKAT</H6>
                            <small>Chocolate ao leite, Kitkat</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>LEITE NINHO</H6>
                            <small>Leite em pó, Doce de leite</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>LIMÃO</H6>
                            <small>Creme de limão, Raspas de limão, Açucar</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>MAÇA COM CANELA</H6>
                            <small>Maças fatiadas, Açucar, Canela em pó</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>M&M</H6>
                            <small>Chocolate ao leite, M&M's coloridos</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>MORANGO COM CHANTILLY</H6>
                            <small>Morango frescos, Cobertura chantilly, Açucar</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>NUTELLA</H6>
                            <small>Nutella</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>NUTELLA COM LEITE NINHO</H6>
                            <small>Nutella, Leite em pó</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>NUTELLA COM MORANGO</H6>
                            <small>Nutella, Morango</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>OREO</H6>
                            <small>Oreo, Chocolate ao leite</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>PAÇOCA</H6>
                            <small>Paçoca esfarelada, Chocolate ao leite, Amendoim</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>PRESTÍGIO</H6>
                            <small>Chocolate ao leite, Coco ralado, Leite condensado</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>RAFFAELLO</H6>
                            <small>Coco, Leite em pó, Raffaello</small>
                            <br>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/imagempizzadoce.png" alt="">
                            <H6>TORTUGUITA</H6>
                            <small>Chocolate ao leite, Granulado, Tortuguita</small>
                            <strong id="rs">R$ 66.99</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!--div doce termina aqui-->
        </div>
        <!--div alimentos 1 termina aqui (pizza salgadas e doces)-->
        <div id="alimentos2">
            <div id="salgada">
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>ALHO COM MUSSARELA</H6>
                            <small>Alho, Mussarela</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>ATUM</H6>
                            <small>Atum</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>ATUM COM QUEIJO E PALMITO</H6>
                            <small>Atum, Palmito, Queijo</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>ATUM COM CATUPIRY</H6>
                            <small>Atum, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>ATUM COM QUEIJO</H6>
                            <small>Atum, Queijo</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>BACON</H6>
                            <small>Bacon, Mussarela</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>BACON COM CHEDDAR</H6>
                            <small>Bacon, Cheddar</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>BAURU</H6>
                            <small>Mussarela, Presunto, Tomate</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>BRÓCOLIS COM CATUPIRY E BACON</H6>
                            <small>Bacon, Brócolis, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>BRÓCOLIS COM QUEIJO</H6>
                            <small>Brócolis, Queijo</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>BRÓCOLIS COM QUEIJO E BACON</H6>
                            <small>Bacon, Brócolis, Queijo</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>CALABRESA</H6>
                            <small>Calabresa, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>CALABRESA COM CATUPIRY</H6>
                            <small>Calabresa, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>CALABRESA COM CHEDDAR</H6>
                            <small>Calabresa, Cheddar</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>CALABRESA COM QUEIJO</H6>
                            <small>Calabresa, Queijo</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>CARNE</H6>
                            <small>Carne temperada</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>CARNE COM CATUPIRY</H6>
                            <small>Carne temperada, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>CARNE COM QUEIJO</H6>
                            <small>Carne temperada, Queijo</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>CARNE SECA COM CATUPIRY</H6>
                            <small>Carne seca, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>CARNE SECA COM QUEIJO</H6>
                            <small>Carne seca, Queijo</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>CATUPIRY</H6>
                            <small>Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>CHEDDAR</H6>
                            <small>Cheddar</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>DOIS QUEIJOS</H6>
                            <small>Mussarela, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>ESCAROLA COM QUEIJO</H6>
                            <small>Escarola, Queijo</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>ESCAROLA COM QUEIJO E BACON</H6>
                            <small>Bacon, Escarola, Queijo</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>ESCAROLA COM CATUPIRY</H6>
                            <small>Escarola, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>FRANGO</H6>
                            <small>Frango</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>FRANGO COM CATUPIRY</H6>
                            <small>Frango, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>FRANGO COM CHEDDAR</H6>
                            <small>Cheddar, Frango</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>FRANGO COM CREAM CHEESE</H6>
                            <small>Cream cheese, Frango</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>FRANGO COM MUSSARELA</H6>
                            <small>Frango, Mussarela</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>MILHO COM CATUPIRY</H6>
                            <small>Milho, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>MILHO COM MUSSARELA</H6>
                            <small>Milho, Mussarela</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>PALMITO</H6>
                            <small>Palmito, Mussarela</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>PALMITO COM CATUPIRY</H6>
                            <small>Palmito, Requeijão cremoso</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>PÃO DE ALHO</H6>
                            <small>Mussarela, Pão de alho</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>PEPERONE COM MUSSARELA</H6>
                            <small>Peperone, Mussarela</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>PORTUGUESA</H6>
                            <small>Ovo, Mussarela, Presunto</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>PRESUNTO COM QUEIJO</H6>
                            <small>Mussarela, Presunto</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihasalgad.jpeg" alt="">
                            <H6>QUEIJO</H6>
                            <small>Mussarela</small>
                            <br>
                            <strong id="rs">R$ 6.00</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!--final da identação esfiha salgada-->
            <div id="doce">
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <br>
                            <H6>ABACAXI</H6>
                            <small>Abacaxi picado, Açúcar, Canela</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>ABÓBORA</H6>
                            <small>purê de abóbora, açúcar, canela</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>BRIGADEIRO</H6>
                            <small>Leite condensado, Chocolate em pó, Granulado</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>CHOCOLATE AO LEITE</H6>
                            <small>Chocalate ao leite derretido</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <br>
                            <H6>Coco</H6>
                            <small>Coco ralado, Leite condensado</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>DOCE DE LEITE</H6>
                            <small>Doce de Leite</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>DOCE DE LEITE COM COCO</H6>
                            <small>Doce de leite, Coco ralado</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>DUO</H6>
                            <small>Kitkat, Galak</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <br>
                            <H6>GALAK</H6>
                            <small>Galak</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>GALAK COM NEGRESCO</H6>
                            <small>Galak, Negresco</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>GOIABADA</H6>
                            <small>Goiabada fatiada, Leite condensado</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>IOGURTE GREGO</H6>
                            <small>Iogurte grego</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <br>
                            <H6>KIWI</H6>
                            <small>Kiwi, Leite condensado</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>LEITE CONSENSADO COM AMENDOIM</H6>
                            <small>Amendoim, Leite condensado</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>MAÇA</H6>
                            <small>Maçã fatiada, Açúcar, Canela</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>MARACUJÁ</H6>
                            <small>Polpa de maracujá, Açúcar</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <br>
                            <H6>MARSHMALLOWS</H6>
                            <small>Marshmallow picado</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>MEL</H6>
                            <small>Mel</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>NUTELLA</H6>
                            <small>Nutella</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>NUTELLA COM BANANA</H6>
                            <small>Nutella, Banana fatiada</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <br>
                            <H6>OVOMALTINE</H6>
                            <small>Creme de ovomaltine</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>PAÇOCA</H6>
                            <small>Paçoca esfarelada</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>PAÇOCA COM AMENDOIM EXTRA CROCANTE</H6>
                            <small>Paçoca esfarelada, Amendoim crocante</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>PAÇOCA COM CHOCOLATE</H6>
                            <small>Paçoca esfarelada, Chocolate derretido</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <br>
                            <H6>PACOÇA COM COCO</H6>
                            <small>Paçoca esfarelada, Coco ralado</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>PERA</H6>
                            <small>Pera picada, Açúcar, Canela</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>PISTACHE</H6>
                            <small>Pistaches triturados, Açúcar</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>QUINDIM</H6>
                            <small>Coco ralado, Açúcar, Leite de coco</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <br>
                            <H6>ROMÃ</H6>
                            <small>Sementes de romã, Açúcar</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>ROMEU E JULIETA</H6>
                            <small>Catupiry, Goiabada</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>SORVETE</H6>
                            <small>Sorvete de Morango/Chocolate/Creme (de sua escolha, só 1)</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>TAPIOCA</H6>
                            <small>Tapioca, Leite condensado</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <br>
                            <H6>TAPIOCA COM NUTELLA</H6>
                            <small>Tapioca, Nutella</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>TIRAMISU</H6>
                            <small>Mascarpone, Café, Açúcar, Cacau em pó</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>TORTA DE LIMÃO</H6>
                            <small>Creme de limão, Raspas de limão</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/esfihadoce.jpeg" alt="">
                            <H6>UVA</H6>
                            <small>Uvas cortadas, Açúcar</small>
                            <br>
                            <strong id="rs">R$ 14.99</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!--Final Identação esfiha doce-->
        </div>
        <!--Final da identação alimentos 2 (esfihas)-->
        <div id="drink">
            <div id="refri">
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/cc2l.jpg" alt="">
                            <br>
                            <H6>COCA-COLA 2 LITROS</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 17.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/cc600ml.jpg" alt="">
                            <H6>COCA-COLA 600ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 8.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/cc350ml.jpg" alt="">
                            <H6>COCA-COLA 350ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 5.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/ccz2l.jpg" alt="">
                            <H6>COCA-COLA ZERO 2 LITROS</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 17.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/ccz600ml.jpg" alt="">
                            <br>
                            <H6>COCA-COLA ZERO 600ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 8.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/ccz350ml.jpg" alt="">
                            <H6>COCA-COLA ZERO 350ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 5.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/fl2l.jpg" alt="">
                            <H6>FANTA LARANJA 2 LITROS</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 15.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/fl600ml.jpg" alt="">
                            <H6>FANTA LARANJA 600ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 8.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/fl350ml.jpg" alt="">
                            <br>
                            <H6>FANTA LARAJANTA 350ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 5.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/fu2l.jpg" alt="">
                            <H6>FANTA UVA 2 LITROS</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 15.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/fu600ml.jpg" alt="">
                            <H6>FANTA UVA 600ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 8.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/fu350ml.jpg" alt="">
                            <H6>FANTA UVA 350ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 5.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/ga2l.png" alt="">
                            <br>
                            <H6>GUARANÁ ANTARCTICA 2 LITROS</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 15.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/ga600ml.jpg" alt="">
                            <H6>GUARANÁ ANTARCTICA 600ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 8.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/ga350ml.jpg" alt="">
                            <H6>GUARANA ANTARCTICA 350ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 5.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/ps2l.jpg" alt="">
                            <H6>PEPSI 2 LITROS</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 15.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/ps600ml.jpg" alt="">
                            <br>
                            <H6>PEPSI 600ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 8.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/ps350ml.jpg" alt="">
                            <H6>PEPSI 350ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 5.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/sw350ml.jpg" alt="">
                            <H6>SCHWEPPES CITRUS 350ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 5.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/sp2l.jpg" alt="">
                            <H6>SPRITE 2 LITROS</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 15.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/sp600ml.jpg" alt="">
                            <br>
                            <H6>SPRITE 600ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 8.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/sp350ml.jpg" alt="">
                            <H6>SPRITE 350ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 5.99</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!--final identação refri-->
            <div id="suco">
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/scgoiaba.jpg" alt="">
                            <br>
                            <H6>DEL VALE GOIABA LATA 290ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 6.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/scmanga.jpg" alt="">
                            <H6>DEL VALE MANGA LATA 290ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 6.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/scmaracas.jpg" alt="">
                            <H6>DEL VALE MARACUJÁ LATA 290ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 6.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/scpessego.jpg" alt="">
                            <H6>DEL VALE PÊSSEGO LATA 290ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 6.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/scuvavale.jpg" alt="">
                            <br>
                            <H6>DEL VALE UVA LATA 290ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 6.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/scuva.png" alt="">
                            <H6>SUCO DE UVA 1,5L</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 24.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/sclaranja.jpg" alt="">
                            <H6>SUCO DE LARANJA 1,5 LITROS</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 24.99</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!--final identação suco-->
            <div id="cerva">
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/antarticaln.jpg" alt="">
                            <br>
                            <H6>ANTARCTICA LONG NECK</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 11.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/amstelln.jpg" alt="">
                            <H6>AMSTEL LONG NECK</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 13.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/bohemialn.jpg" alt="">
                            <H6>BOHEMIA LONG NECK</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 11.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/brahmaln.jpg" alt="">
                            <H6>BRAHMA LONG NECK</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 15.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/budweiserln.jpg" alt="">
                            <br>
                            <H6>BUDWEISER LONG NECK</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 11.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/coronaln.png" alt="">
                            <H6>CORONA LONG NECK</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 13.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/heinekenln.png" alt="">
                            <H6>HEINEKIN LONG NECK</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 13.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/itaipavaln.jpg" alt="">
                            <H6>ITAIPAVA LONG NECK</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 15.99</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/kaiserln.jpg" alt="">
                            <br>
                            <H6>KAISER LONG NECK</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 11.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/polarln.jpg" alt="">
                            <H6>POLAR LONG NECK</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 11.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/skolln.jpg" alt="">
                            <H6>SKOL LONG NECK</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 15.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/stellaln.jpg" alt="">
                            <H6>STELLA ARTOIS LONG NECK</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 13.99</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!--final identação cerveja-->
            <div id="agua">
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/aguanormal.png" alt="">
                            <br>
                            <H6>ÁGUA 500ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 5.49</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/aguagas.png" alt="">
                            <H6>ÁGUA COM GÁS 500ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 5.49</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/aguasw.png" alt="">
                            <H6>ÁGUA TÔNICA SCHWEPPES 350ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 6.99</strong>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container">
                            <img class="imagem" src="../../images/h20limao.jpg" alt="">
                            <H6>H20 COM LIMÃO 500ML</H6>
                            <small></small>
                            <br>
                            <strong id="rs">R$ 7.99</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!--final identação agua-->
        </div>
        <!--final identação drink-->
    </div>
    <!--Identação da Principal-->
    <script src="btnbaixo.js"></script>
    <script src="btncima.js"></script>
    <script src="esconderbtn.js"></script>
</body>

</html>