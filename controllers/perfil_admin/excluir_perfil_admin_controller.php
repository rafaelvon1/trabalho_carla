<?php
include("../../models/conexao.php");
$conexao = new Conexao();
$mysqli = $conexao->conectar();
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>excluir</title>
</head>

<body>
    <h1>Tem certeza que deseja remover esse usuario?</h1>
    <form method="post">
        <button name="deletar">Excluir</button>
    </form>
    <?php
    if (isset($_POST["deletar"])) {
        $sql_code = "DELETE from login where id = '$id';
                        DELETE from reserva where id_client = '$id';
                        DELETE from dados_usuario where id_client = '$id';";
        /**com multi_query e possivel executar varios comendo sql */
        $sql_query = $mysqli->multi_query($sql_code) or die("algo deu errado");
        header("location: ../../views/reserva_admin/reserva_admin_view.php");
    }
    ?>

    <br><br>
    <?php echo "<button><a href=\"../../views/perfils/perfil_admin/perfil_admin_view.php?id=$id\">voltar</a></button> "; ?>
</body>

</html>