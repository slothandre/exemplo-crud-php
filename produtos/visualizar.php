<?php
    require_once "../src/funcoes-produtos.php";
    require_once "../src/funcoes-utilitarias.php";
    $listaDeProdutos = lerProdutos($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Visualização</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <header>
        <h1 class="text-center">Produtos | SELECT - <a href="../index.php">Home</a></h1>
        <hr>
    </header>
    <main class="container">
        <h2>Lendo e carregando todos os produtos.</h2>
        <p><a href="inserir.php" class="btn btn-primary">Inserir novo produto</a></p>

        <section class="row justify-content-around">
            <?php foreach($listaDeProdutos as $produto){ ?>
                <article class="card border-primary col-11 col-sm-5 col-lg-3 m-1 shadow">
                    <div class="card-header">
                        <h3 class="card-title"><?=$produto["produto"]?></h3>
                        <h4 class="card-subtitle text-body-secondary"><?=$produto["fabricante"]?></h4>
                    </div>
                    <div class="card-body text-primary">
                        <p class="card-text"><b>Preço: </b><?=formatarPreco($produto["preco"])?></p>
                        <p class="card-text"><b>Quantidade: </b><?=$produto["quantidade"]?></p>
                        <p class="card-text"><b>Preço total: </b><?=formatarPreco($produto["preco_total"])?></p>
                        <p class="card-text"><b>Descrição: </b><?=$produto["descricao"]?></p>
                    </div>
                    <div class="card-footer">
                        <p class="card-link row justify-content-around">
                            <a href="atualizar.php?id=<?=$produto["id"]?>" class="col-5 btn btn-primary"><i class="bi bi-pencil"></i> Editar</a>
                            <a href="excluir.php?id=<?=$produto["id"]?>" class="col-5 btn btn-primary"><i class="bi bi-trash"></i> Excluir</a>
                        </p>
                    </div>
                </article>
            <?php } ?>
        </section>
    </main>
</body>
</html>