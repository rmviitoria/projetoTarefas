<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
} else if ($_SESSION["administrador"] != 1) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>- Cadastro Administrador</title>
</head>

<body>
    <div class="login">
            <div class="signin">
                <div class="content">
                    <h2> Cadastro ADM </h2>
                    <form action="cadastrarAdmin.php" method="post" class="formulario">
                        <div class="form">
                            <div class="inputBox">
                                <input type="text" name="nome" required placeholder="Nome">
                            </div>
                            <div class="inputBox">
                                <input type="password" name="senha" required placeholder="Senha">
                            </div>
                            <div class="inputBox">
                                <div class="btn-cadastrar"> <input type="submit" value="Cadastrar"> </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </div>
    </form>
</body>
</html>