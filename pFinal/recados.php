<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
} else if ($_SESSION["administrador"] != 1) {
    header("Location: index.php");
}
include("config.php");
$sql = "SELECT * FROM recados";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Final - Recados</title>
</head>

<body>
    <div>
        <div class="container-titulo">
            <h1>Listagem de Recados</h1>
        </div>
        <div class="container-acoes">
            <div class="container-links">
                <a href="adicionarRecado.php">Adicionar recado</a>
            </div>
            <div class="container-voltar">
            <a href="administrador.php">Voltar para a página anterior</a>
            </div>
        </div>

        <?php
        if (mysqli_num_rows($resultado) > 0) {
            echo "<table class='tabela'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Recado</th>";
            echo "<th>Data</th>";
            echo "<th>Usuário</th>";
            echo "<th colspan='3'>Ações</th>";
            echo "</tr>";
            while ($dados = $resultado->fetch_object()) {
                echo "<tr>";
                echo "<td>" . $dados->id . "</td>";
                echo "<td>" . $dados->recado . "</td>";
                echo "<td>" . $dados->data . "</td>";
                echo "<td>" . $dados->fkidusuario . "</td>";
                echo "<td> <a class='link-editar-recado' href=editarRecado.php?id=" . $dados->id . ">Editar</a></td>";
                echo "<td> <a class='link-excluir-recado' href=excluirRecado.php?id=" . $dados->id . ">Excluir</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>

</body>

</html>