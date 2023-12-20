<?php

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
$id = $_SESSION['id'];

include("config.php");
$sql = "SELECT * FROM recados WHERE fkidusuario = '$id'";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>- Usuário</title>
</head>

<body>
    <div class="all">
        <div class="container-titulo">
            <h1>Página inicial</h1>
        </div>
        <div class="container-acoes">
            <div class="container-links">
                <a href="adicionarRecado.php">Adicionar recado</a>
            </div>
            <div class="container-sair">
                <a href="logout.php">Sair</a>
            </div>
        </div>
        <?php
        if (mysqli_num_rows($resultado) > 0) {
            echo "<table class='tabela'>";
            echo "<tr>";
            echo "<th>Recado</th>";
            echo "<th>Data</th>";
            echo "<th>Ações</th>";
            echo "</tr>";
            while ($dados = $resultado->fetch_object()) {
                echo "<tr>";
                echo "<td>" . $dados->recado . "</td>";
                echo "<td>" . $dados->data . "</td>";
                echo "<td> <a class='link-editar-recado' href=editarRecado.php?id=" . $dados->id . ">Editar</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        ?>
    </div>
</body>

</html>