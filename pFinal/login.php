<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
include("config.php");

$nome = $_POST['nome'];
$senha = $_POST['senha'];

if (empty($nome) or empty($senha)) {
    echo "<script> alert('Preencha todos os campos!') </script>";
    echo "<script> location.href = 'index.php' </script>";
}
$sql = "SELECT * FROM usuarios WHERE nome='$nome' AND senha='$senha'";
$resultado = mysqli_query($conexao, $sql);

$dados = $resultado->fetch_object();

if (mysqli_num_rows($resultado) > 0) {
    $_SESSION['id'] = $dados->id;
    $_SESSION['nome'] = $dados->nome;
    $_SESSION['senha'] = $dados->senha;
    $_SESSION['administrador'] = $dados->nivel;
    $nivel = $_SESSION['administrador'];
   
    switch ($nivel) {
        case 0:
            header("Location: usuario.php");
            break;
        case 1:
            header("Location: administrador.php");
            break;
        default:
            header("Location: index.php");
    }
} else {
    echo "<script> alert('Usuário ou senha incorreto(s)!') </script>";
    echo "<script> location.href = 'index.php' </script>";
}
?>