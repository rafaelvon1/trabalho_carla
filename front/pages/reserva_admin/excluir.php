
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>excluir</title>
</head>
<?php
    include("../../../db/conexao.php");
    $id=$_GET["id"];
?>
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

            $sql_query = $mysqli -> multi_query($sql_code) or die("algo deu errado");
            header("location: reserva_admin.php");
        }
    ?>
    
    <br><br>
    <?php echo "<button><a href=\"perfil_page.php?id=$id\">voltar</a></button> ";?>
</body>
</html>