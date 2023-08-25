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
</head>
<body>
    <header>
        <h1>Fabricantes | INSERT</h1>
        <hr>
    </header>
    <main>
        <form action="" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input required type="text" name="nome" id="nome">
            </p>
            <button type="submit" name="inserir">Inserir fabricante</button>
        </form>
        <hr>
        <p><a href="visualizar.php">Voltar</a></p>
    </main>
</body>
</html>