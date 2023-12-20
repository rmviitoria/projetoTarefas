<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <div class="login">
        <section>
            <div class="signin">
                <div class="content">
                    <h2> Fazer login </h2>
                    <form class="formulario" action="login.php" method="post">
                        <div class="form">

                            <div class="inputBox">

                                <input type="text" name="nome" id="Nome" placeholder="Nome">

                            </div>

                            <div class="inputBox">

                                <input type="password" name="senha" placeholder="senha" id-="senha" required>

                            </div>

                            <a href="paginaCadastro.php">Cadastrar</a>

                        </div>

                        <div class="inputBox">

                            <input class="btn-entrar" type="submit" value="Entrar">
                            <br><br>
                            <a class="link-api" href="api.php">API de emperatura</a>
                            <br><br>
                            admin: rmviitoria senha: 2 
                            <br><br>
                            <h3>Para fazer login sendo administrador, é necessário que o nivel seja igual a 0, portanto,</h3>
                            <h3>coloque no banco de dados a coluna 'nivel',</h3>
                            <h3>na linha do usuário desejado, valendo '0'. Para ser apenas um usuário, criei um cadastro normalmente.</h3>
                    </form>

                </div>

            </div>

    </div>

    </div>
</body>

</html>