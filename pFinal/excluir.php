<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location:index.php");
} else if ($_SESSION['administrador'] != 1) {
    header("Location:index.php");
}
$id = $_GET['id'];
include("config.php");
$sql = "DELETE FROM usuarios WHERE id='$id'";
$resultado = mysqli_query($conexao, $sql);
if ($resultado) {
    echo "<script> alert('Usuario excluído com sucesso!')</script>";
    echo "<script> location.href='administrador.php' </script>";
} else {
    echo "Ocorreu algum erro de conexão!";
}
?>