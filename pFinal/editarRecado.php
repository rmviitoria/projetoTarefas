<?php

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$id = $_GET['id'];
$nivel = $_SESSION['administrador'];
include("config.php");

if (isset($_POST['btn-editar-recado'])) {
    $recado = $_POST['recado'];
    $data = $_POST['data'];
    $sql = "UPDATE recados SET recado='$recado', data='$data' WHERE id='$id'";
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado) {
        echo "<script> alert('Recado alterado com sucesso!')</script>";
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

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/editarRecado.css">
    <title>Projeto Final - Editar Recado</title>
</head>

<body>
    <?php
    $sql = "SELECT * FROM recados WHERE id='$id'";
    $resultado = mysqli_query($conexao, $sql);
    $dados = $resultado->fetch_object();
    ?>
    <form class="formulario" action="" method="post">
        <h1>Editar Recado</h1>
        <textarea class="area-recado" name="recado" id="area-recado" cols="30" rows="10"
            placeholder="Recado:"><?php echo $dados->recado ?></textarea>
        <input class="input-data" type="date" name="data" id="data-recado" value="<?php echo $dados->data ?>">
        <input class="btn-editar-recado" type="submit" name="btn-editar-recado" value="Editar recado">
    </form>
</body>

</html>