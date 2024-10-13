<?php  
$name = "localhost";
$banco = "carla";
$user = "root";
$senha = "";

/*conectando com meu banco de dados <<CARLA>> */
$mysqli = new mysqli($name,$user,$senha,$banco);

if ($mysqli->connect_errno) {
    echo "Falha na conexão: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

?>