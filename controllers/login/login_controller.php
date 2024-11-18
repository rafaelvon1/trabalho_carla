<?php
class LoginController
{
    private $conexao;
    private $mysqli;

    public function __construct()
    {
        include("../../models/conexao.php");
        $this->conexao = new Conexao();
        $this->mysqli = $this->conexao->conectar();
    }

    public function login($dados)
    {
        /** Verificando se meus dados estão limpos, se não há código SQL */
        $dados[0] = $this->mysqli->real_escape_string($dados[0]);
        $dados[1] = $this->mysqli->real_escape_string($dados[1]);

        /** Verificando se já existe alguém com o mesmo email no site */
        $sql_code = "SELECT * FROM login WHERE email = '$dados[0]'";
        $sql_query = $this->mysqli->query($sql_code) or die("Erro na consulta ao banco de dados");

        /** Verificando se teve algum retorno da minha consulta */
        $quantidade = $sql_query->num_rows;

        /** Caso a consulta for igual a 1, então já existe um email */
        if ($quantidade == 1) {
            /** Variável irá guardar dados do banco de dados como um array */
            $variavel = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            /** Usando esse parâmetro é possível verificar se a senha criptografada do cliente é verídica, caso for retorna 1 True */
            if (password_verify($dados[1], $variavel["senha"])) {
                /** Usado para verificar se email já está cadastrado no arquivo protect */
                $_SESSION["email"] = $variavel["email"];
                $_SESSION["id"] = $variavel["id"];
                $_SESSION["status"] = $variavel["pessoa_status"];

                /** Separando administrador de cliente */
                if ($variavel["pessoa_status"] == "admin") {
                    /** Enviando pessoa administradora para sua página */
                    header("location: ../../views/principal_admin/principal_admin_view.php");
                } else {
                    /** Enviar pessoa para página do site */
                    header("location: ../../views/principal_cliente/principal_client_view.php");
                }
                exit();
            } else {
                echo "Senha incorreta";
            }
        } else {
            /** Caso senha ou email estiver incorreto */
            echo "<h1>Email ou senha inválido<h1/>";
        }
    }
}

// Exemplo de uso
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = $_POST["log"];
    $controller = new LoginController();
    $controller->login($dados);
}
