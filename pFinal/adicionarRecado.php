<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar recado</title>
</head>

<body>
    <form class="formulario" action="adicionar.php" method="post">
        <h1>Recado</h1>
        <textarea class="area-recado" name="recado" cols="30" rows="10" placeholder="Recado:"></textarea>
        <input class="input-data" type="date" name="data" id="data-recado">
        <input class="btn-adicionar" type="submit" value="Adicionar">
    </form>
</body>
</html>