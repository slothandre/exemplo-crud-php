<?php
    require_once "../src/funcoes-fabricantes.php";
    require_once "../src/funcoes-produtos.php";
    $listaDeFabricantes = lerFabricantes($conexao);

    if(isset($_POST["inserir"])){
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
        $preco = filter_input(
            INPUT_POST, "preco",
            FILTER_SANITIZE_NUMBER_FLOAT,
            FILTER_FLAG_ALLOW_FRACTION
        );
        $quantidade = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_NUMBER_INT);

        // Pegaremos o value, ou seja, o valor do id do fabricante
        $fabricanteId = filter_input(INPUT_POST, "fabricante", FILTER_SANITIZE_NUMBER_INT);
        $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);

        inserirProduto($conexao, $nome, $preco, $quantidade, $fabricanteId, $descricao);
        header("location:visualizar.php");
    };
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserção</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        textarea {
            resize: none;
        }
    </style>
</head>
<body>
    <header>
        <h1 class="text-center">Produtos | INSERT</h1>
        <hr>
    </header>
    <main class="container">
        <form action="" method="post">
            <p class="form-floating">
                <input class="form-control" type="text" name="nome" id="nome" required placeholder="">
                <label for="nome">Nome:</label>
            </p>
            <p class="form-floating">
                <input class="form-control" type="number" min="10" max="10000" step=".01" name="preco" id="preco" required placeholder="">
                <label for="preco">Preço:</label>
            </p>
            <p class="form-floating">
                <input class="form-control" type="number" min="1" max="100" name="quantidade" id="quantidade" required placeholder="">
                <label for="quantidade">Quantidade:</label>
            </p>
            <p class="form-floating">
                <select class="form-control" name="fabricante" id="fabricante" required>
                    <option value="">Selecione um fabricante</option>
                    <?php foreach($listaDeFabricantes as $fabricante){ ?>
                        <option value="<?=$fabricante["id"]?>"><?=$fabricante["nome"]?></option>
                    <?php } ?>
                </select>
                <label for="fabricante">Fabricante:</label>
            </p>
            <p class="form-floating">
                <textarea class="form-control" name="descricao" id="descricao" placeholder=""></textarea>
                <label for="descricao">Descrição:</label>
            </p>
            <button class="btn btn-primary" type="submit" name="inserir">Inserir produto</button>
        </form>
        <hr>
        <p><a href="visualizar.php" class="btn btn-primary">Voltar</a></p>
    </main>
</body>
</html>