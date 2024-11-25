<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
</head>

<body>

    <?php

    /*
dados[0] = nome
dados[1] = telefone
dados[2] =  cpf
dados[3] =  cep
dados[4] = email
dados[5] = senha

*/
    /**pegando conexao com o banco de dados */
    $dados = $_POST["cads"];
    $controller = new CadastroController();
    $controller->cadastrar($dados);
    class CadastroController
    {
        private $conexao;
        private $mysqli;

        public function __construct()
        {
            include("../../models/conexao.php");
            $this->conexao = new Conexao();
            $this->mysqli = $this->conexao->conectar();
        }

        public function cadastrar($dados): void
        {
            /** Verificando se meus dados estão limpos, se não há código SQL */
            $dados[4] = $this->mysqli->real_escape_string($dados[4]);
            $dados[5] = $this->mysqli->real_escape_string($dados[5]);

            /** Verificando se já existe alguém com o mesmo email no site */
            $sql_code = "SELECT email FROM login WHERE email = '$dados[4]'";

            /** Utilizando um parâmetro para query para rodar meu código no banco de dados caso der erro aparece a mensagem (die->) -> aqui se espera que algo seja retornado */
            $sql_query = $this->mysqli->query($sql_code) or die("Você simplesmente não existe");

            /** Verificando se teve algum retorno da minha consulta */
            $quantidade = $sql_query->num_rows;

            /** Caso a consulta for igual a 1, então já existe um email */
            if ($quantidade == 1) {
                echo "<h1>ja existe um login com esse email<h1/>";
            } else {
                /* verificando se meu email esta correto -> @gmail.com */
                if (filter_var($dados[4], FILTER_VALIDATE_EMAIL)) {
                    /**criptografando minha senha, usando parametro password_hash md5 nao recomendado */
                    $dados[5] = password_hash($dados[5], PASSWORD_DEFAULT);

                    /**inserindo meus dados no banco de dados*/
                    $sql_code = "INSERT INTO login VALUES('null','$dados[4]','$dados[5]','client');";

                    /**enviando meu codigo para o banco de dados -> aqui nao se espera q algo seja retornado, ja que estamos apenas dando um insert, ele volta como valor booleano*/
                    $envio = mysqli_query($this->mysqli, $sql_code);

                    /**pegando id q foi cadastrado no login para  */
                    $sql_code = "SELECT id FROM login WHERE email = '$dados[4]'";
                    $envio = mysqli_query($this->mysqli, $sql_code);
                    $variavel = $envio->fetch_assoc();
                    $id_usuario = $variavel['id'];
                    $sql_code = "INSERT INTO dados_usuario VALUES('null','$id_usuario','$dados[0]','$dados[1]','$dados[2]','$dados[3]');";
                    $envio = mysqli_query($this->mysqli, $sql_code);
                    /**!!!!!!!!!!!!! jogar meu cliente para tela com header !!!!!!!!!!!!! */
                    header("location: ../../views/login/login_view.php");
                } else {
                    echo "deu nao mano";
                }
            }
        }
    }

    ?>
    <!-- caso de ja existir um cadastro, voltar para tela de cadastro -->
    <button type="submit"><a href="../../views/cadastro/cadastro_view.html">ir para tela de login</a></button>


</body>

</html>