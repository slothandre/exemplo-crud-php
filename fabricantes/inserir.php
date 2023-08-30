<?php
/* Verificando se o formulário/botão foi acionado */
if(isset($_POST["inserir"])){
    // Importando as funções e conexão
    require_once "../src/funcoes-fabricantes.php";

    // Capturando o valor digitado do nome e sanitizando
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);

    // Outra maneira de sanitizar;
    // $nome = filter_var($_POST["nome"], FILTER_SANITIZE_SPECIAL_CHARS);

    /* Chamar a função, passar os dados de conexão e o
    dado (nome do fabricante) digitando no formulário. */
    inserirFabricante($conexao, $nome);

    /* Redirecionamento */
    header("location:visualizar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Inserção</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1 class="text-center">Fabricantes | INSERT</h1>
        <hr>
    </header>
    <main class="container">
        <form action="" method="post">
            <p class="form-floating">
                <input class="form-control" required type="text" name="nome" id="nome" placeholder="">
                <label for="nome">Nome:</label>
            </p>
            <button type="submit" name="inserir" class="btn btn-primary">Inserir fabricante</button>
        </form>
        <hr>
        <p><a href="visualizar.php" class="btn btn-primary">Voltar</a></p>
    </main>
</body>
</html>