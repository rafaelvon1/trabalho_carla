<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>alterar_usuario</title>
</head>
<body>
    <?php
        $opc = $_POST["opc"];
        if ($opc == "pessoa") {
        header("location: alterar_pessoa.php"); 
        }
        elseif ($opc == "data") {
            echo"caiu em data";
        }
        elseif ($opc == "horario") {
            header("location: alterar_horario_e_data.php");
        }
        else {
            echo"nada foi enviado";
        }
    ?>  

</body>
</html>