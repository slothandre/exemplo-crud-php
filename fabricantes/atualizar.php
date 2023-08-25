<?php
    /* Obtendo e sanitizando o valor vindo do parâmetro de URL
    (link dinâmico) */
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Atualização</title>
</head>
<body>
    <header>
        <h1>Fabricantes | SELECT/UPDATE</h1>
        <hr>
    </header>
    <main>
        <form action="" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input required type="text" name="nome" id="nome">
            </p>
            <button type="submit" name="atualizar">Atualizar fabricante</button>
        </form>
        <hr>
        <p><a href="visualizar.php">Voltar</a></p>
    </main>
</body>
</html>