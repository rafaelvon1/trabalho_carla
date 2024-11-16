<?php
class Conexao
{
    private $name = "localhost";
    private $banco = "carla";
    private $user = "root";
    private $senha = "";
    private $mysqli;

    public function conectar(): mysqli
    {
        $this->mysqli = new mysqli($this->name, $this->user, $this->senha, $this->banco);

        if ($this->mysqli->connect_errno) {
            echo "Falha na conexão: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
            exit();
        }

        return $this->mysqli;
    }
}