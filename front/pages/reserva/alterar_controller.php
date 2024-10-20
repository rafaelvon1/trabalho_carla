<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alterar_usuario</title>
</head>
<body>
<form action="" method="post">
    <?php
    include("../../../db/conexao.php");
        $opc = $_POST["opc"];
        if ($opc == "pessoa") {
            echo"caiu em pessoa";
        }
        
    ?>  
</form>
    <button><a href="mostrando_reserva.php"> voltar</a></button>
</body>
</html>