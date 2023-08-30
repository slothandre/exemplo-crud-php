<?php
    require_once "../src/funcoes-produtos.php";
    require_once "../src/funcoes-fabricantes.php";
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $produto = lerUmProduto($conexao, $id);
    $listaDeFabricantes = lerFabricantes($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Atualização</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        textarea {
            resize: none;
        }
    </style>
</head>
<body>
    <header>
        <h1 class="text-center">Produtos | SELECT/UPDATE</h1>
        <hr>
    </header>
    <main class="container">
        <form action="" method="post">
            <p class="form-floating">
                <input class="form-control" type="text" name="nome" id="nome" required placeholder="" value="<?=$produto["nome"]?>">
                <label for="nome">Nome:</label>
            </p>
            <p class="form-floating">
                <input class="form-control" type="number" min="10" max="10000" step=".01" name="preco" id="preco" required placeholder="" value="<?=$produto["preco"]?>">
                <label for="preco">Preço:</label>
            </p>
            <p class="form-floating">
                <input class="form-control" type="number" min="1" max="100" name="quantidade" id="quantidade" required placeholder="" value="<?=$produto["quantidade"]?>">
                <label for="quantidade">Quantidade:</label>
            </p>
            <p class="form-floating">
                <select class="form-control" name="fabricante" id="fabricante" required>
                    <option value="">Selecione um fabricante</option>
                    <?php
                        foreach($listaDeFabricantes as $fabricante){
                            if($produto["fabricante_id"] === $fabricante["id"]){ ?>
                                <option value="<?=$fabricante["id"]?>" selected><?=$fabricante["nome"]?></option>
                            <?php } else { ?>
                                <option value="<?=$fabricante["id"]?>"><?=$fabricante["nome"]?></option>
                            <?php }
                        };
                    ?>
                </select>
                <label for="fabricante">Fabricante:</label>
            </p>
            <p class="form-floating">
                <textarea class="form-control" name="descricao" id="descricao" placeholder=""><?=$produto["descricao"]?></textarea>
                <label for="descricao">Descrição:</label>
            </p>
            <button class="btn btn-primary" type="submit" name="atualizar">Atualizar produto</button>
        </form>
        <hr>
        <p><a href="visualizar.php" class="btn btn-primary">Voltar</a></p>
    </main>
</body>
</html>