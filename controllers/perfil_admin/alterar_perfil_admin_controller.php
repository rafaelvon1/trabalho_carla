<?php
include("../../models/conexao.php");
$conexao = new Conexao();
$mysqli = $conexao->conectar();
$id = $_GET["id"];
$sql_cod = "SELECT d.nome,l.email,d.cep,d.cpf ,d.telefone from dados_usuario d inner join login l on d.id_client = l.id where d.id_client = $id";
/**utilizando parametro query para enviar codigo sql caso nao funcione die */
$sql_query = $mysqli->query($sql_cod) or die("erro");
/**variavael ira guardar dados do banco de dados como uma array,*/
$variavel = $sql_query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil | Pizzaria </title>
    <link rel="stylesheet" href="../../assets/styles/style_perfil.css">
</head>

<body>
    <header>
        <h1>Perfil</h1>
    </header>
    <main>
        <fieldset>
            <div class="info">
                <b>
                    <p>Informações</p>
                </b>
                <?php echo " <a href=\"perfil_admin.php?id=$id\">voltar perfil</a>"; ?>

            </div>
            <hr>
            <form action="" method="post">

                <label for="">Nome:</label>
                <input type="text" name="nome" value="<?php echo $variavel['nome'] ?>">
                <br>
                <label for="">Cep</label>
                <input type="number" name="cep" value="<?php echo $variavel['cep'] ?>">
                <br>
                <label for="">Cpf</label>
                <input type="number" name="cpf" value="<?php echo $variavel['cpf'] ?>">
                <br>
                <label for="">Numero</label>
                <input type="number" name="telefone" value="<?php echo $variavel['telefone'] ?>">
                <br>
                <button type="submit" name="alterar">alterar</button>
            </form>
            <?php
            if (isset($_POST["alterar"])) {
                $nome = $_POST["nome"];
                $cep = $_POST["cep"];
                $cpf = $_POST["cpf"];
                $telefone = $_POST["telefone"];
                $sql_code = "UPDATE dados_usuario d set d.nome = '$nome', telefone = '$telefone' ,cpf = '$cpf' ,cep = '$cep' where id_client = $id; ";
                $sql_query = $mysqli->query($sql_code) or die("voce simplismente nao existe");
                header("location: ../../views/reserva_admin/reserva_admin_view.php");
            }

            ?>
        </fieldset>
    </main>
    <footer>
        <!-- parte do admin-->
        <a href="../../views/reserva_admin/reserva_admin_view.php?id=$id\">Voltar</a>
    </footer>
</body>

</html>