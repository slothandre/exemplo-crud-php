<?php
    /* Importando as funções de manipulação de fabricantes */
    require_once "../src/funcoes-fabricantes.php"; 

    /* Guardando o retorno/resultado da função lerFabricantes */
    $listaDeFabricantes = lerFabricantes($conexao);

    /* Contando quantos fabricantes temos na matriz $listaDeFabricantes */
    $quantidade = count($listaDeFabricantes);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Visualização</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <header>
        <h1 class="text-center">Fabricantes | SELECT - <a href="../index.php">Home</a></h1>
        <hr>
    </header>
    <main class="container">
        <h2>Lendo e carregando todos os fabricantes.</h2>
        <p><a href="inserir.php" class="btn btn-primary">Inserir novo fabricante</a></p>

        <?php if(isset($_GET["status"]) && $_GET["status"] === "sucesso"){ ?>
            <h2 style="color:blue">Fabricante atualizado com sucesso!</h2>
        <?php } elseif(isset($_GET["status"]) && $_GET["status"] === "apagado"){ ?>
            <h2 style="color:red">Fabricante apagado com sucesso!</h2>
        <?php } ?>

        <table class="table table-bordered table-striped table-hover caption-top">
            <caption>Lista de Fabricantes: <b><?=$quantidade?></b></caption>
            <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th colspan="2">Operações</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                    foreach ($listaDeFabricantes as $fabricante) { ?>
                        <tr>
                            <td><?=$fabricante["id"]?></td>
                            <td><?=$fabricante["nome"]?></td>
                            <!-- Link DINÂMICO
                            A URL do href precisa de parâmetro com dados
                            dinâmicos (no caso, o ID de cada fabricante) -->
                            <td><a class="btn btn-primary" href="atualizar.php?id=<?=$fabricante["id"]?>"><i class="bi bi-pencil"></i> Editar</a></td>
                            <td><a class="excluir btn btn-primary" href="apagar.php?id=<?=$fabricante["id"]?>"><i class="bi bi-trash"></i> Excluir</a></td>
                        </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    </main>
    <script src="../js/confirmacao.js"></script>
</body>
</html>