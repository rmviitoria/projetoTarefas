<?php

session_start();

if (!isset($_SESSION['id'])) {
    header("Location:index.php");
}
$id = $_GET['id'];

include("config.php");

if (isset($_POST['btn-editar'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $sql = "UPDATE usuarios SET nome='$nome', senha='$senha' WHERE id='$id'";
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado) {
        echo "<script> alert('Usuario alterado com sucesso!')</script>";
        echo "<script> location.href= 'administrador.php' </script>";
    } else {
        echo "Ocorreu algum erro de conexão!";
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/editar.css">
    <title>- Editar</title>
</head>

<body>
    <?php
    $sql = "SELECT * FROM usuarios WHERE id='$id'";
    $resultado = mysqli_query($conexao, $sql);
    $dados = $resultado->fetch_object();
    ?>
    <form class="formulario" action="" method="post">
        <h1>Editar</h1>
        <input class="inputs" type="text" name="nome" placeholder="Nome:" value="<?php echo $dados->nome ?>">
        <input class="inputs" type="password" name="senha" placeholder="Senha:" value="<?php echo $dados->senha ?>">
        <input class="btn-editar" type="submit" name="btn-editar" value="Editar">
    </form>
</body>

</html>