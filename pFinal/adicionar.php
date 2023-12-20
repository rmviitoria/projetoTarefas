<?php

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$id = $_SESSION['id'];
$nivel = $_SESSION['administrador'];
include("config.php");

$recado = $_POST['recado'];
$data = $_POST['data'];

if (empty($recado) or empty($data)) {
    echo "<script> alert('Preencha todos os campos!')</script>";
    echo "<script> location.href='adicionarRecado.php'</script>";
} else {
    $sql = "INSERT INTO recados (recado, data,fkidusuario) VALUES ('$recado', '$data',$id)";
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado) {
        echo "<script> alert('Recado adicionado com sucesso!')</script>";
        switch ($nivel) {
            case 0:
                echo "<script> location.href='usuario.php'</script>";
                break;
            case 1:
                echo "<script> location.href='recados.php'</script>";
                break;
            default:
                echo "<script> location.href='index.php'</script>";

        }
    } else {
        echo "Ocorreu algum erro de conexão!";
    }
}
?>