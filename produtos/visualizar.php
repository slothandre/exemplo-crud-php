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
    <style>
        * {box-sizing: border-box;}
        .produtos {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1>Produtos | SELECT - <a href="../index.php">Home</a></h1>
        <hr>
    </header>
    <main>
        <h2>Lendo e carregando todos os produtos.</h2>
        <p><a href="inserir.php">Inserir novo produto</a></p>

        <section class="produtos">
            <?php foreach($listaDeProdutos as $produto){ 
                $preco = formatarPreco($produto["preco"]);
                ?>
                <article class="produto card">
                    <div class="card-header">
                        <h3><?=$produto["nome"]?></h3>
                    </div>
                    <div class="card-body">
                        <p><b>Preço: </b><?=$preco?></p>
                        <p><b>Quantidade: </b><?=$produto["quantidade"]?></p>
                    </div>
                </article>
            <?php } ?>
        </section>
    </main>
</body>
</html>