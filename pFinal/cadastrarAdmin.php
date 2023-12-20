<?php

include("config.php");

$nome = $_POST["nome"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuarios WHERE nome='$nome'";
$resultado = mysqli_query($conexao, $sql);

if (empty($nome) or empty($senha)) {
    echo "<script> alert('Preencha todos os campos!')</script>";
    echo "<script> location.href='paginaCadastro.php'</script>";
} else if (mysqli_num_rows($resultado) > 0) {
    echo "<script> alert('Usuário já cadastrado!')</script>";
    echo "<script> location.href='paginaCadastroAdmin.php'</script>";
} else {
    $sql = "INSERT INTO usuarios (nome, senha) VALUES ('$nome', '$senha')";
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado) {
        echo "<script> alert('Usuário cadastrado com sucesso!')</script>";
        echo "<script> location.href='administrador.php'</script>";
    } else {
        echo "Ocorreu algum erro de conexão!";
    }
}
