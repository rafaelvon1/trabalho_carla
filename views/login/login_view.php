<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
</head>

<body>

    <main class="container">
        <section class="image-panel">
            <img src="../../images/pizza.jpg" alt="Pizza imagem">
        </section>

        <section class="login">

            <div class="form-container">
                <h2>Login pizzaria nerdola!</h2>

                <form action="../../controllers/login/login_controller.php" method="post">
                    <input type="email" id="email" name="log[]" placeholder="Email" required>
                    <input type="password" placeholder="Senha" input type="password" name="log[]" required>
                    <div class="options">
                        <label><input type="checkbox"> Lembrar senha</label>
                    </div>
                    <button type="submit">Login</button>

                    <p class="signup">Deseja voltar para a home? <a href="../../index.html">Clique aqui!</a></p>
                </form>
            </div>
        </section>
    </main>
</body>

</html>