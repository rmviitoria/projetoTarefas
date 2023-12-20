<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location:index.php");
}
$id = $_GET['id'];

include("config.php");

$sql = "DELETE FROM recados WHERE id='$id'";

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
    echo "<script> alert('Recado excluído com sucesso!')</script>";
    echo "<script> location.href= 'recados.php' </script>";
} else {
    echo "Ocorreu algum erro de conexão!";
}
?>