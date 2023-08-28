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
</head>
<body>
    <header>
        <h1>Fabricantes | SELECT - <a href="../index.php">Home</a></h1>
        <hr>
    </header>
    <main>
        <h2>Lendo e carregando todos os fabricantes.</h2>
        <p><a href="inserir.php">Inserir novo fabricante</a></p>

        <?php if(isset($_GET["status"]) && $_GET["status"] === "sucesso"){ ?>
            <h2 style="color:blue">Fabricante atualizado com sucesso!</h2>
        <?php } elseif(isset($_GET["status"]) && $_GET["status"] === "apagado"){ ?>
            <h2 style="color:red">Fabricante apagado com sucesso!</h2>
        <?php } ?>

        <table>
            <caption>Lista de Fabricantes: <b><?=$quantidade?></b></caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th colspan="2">Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($listaDeFabricantes as $fabricante) { ?>
                        <tr>
                            <td><?=$fabricante["id"]?></td>
                            <td><?=$fabricante["nome"]?></td>
                            <!-- Link DINÂMICO
                            A URL do href precisa de parâmetro com dados
                            dinâmicos (no caso, o ID de cada fabricante) -->
                            <td><a href="atualizar.php?id=<?=$fabricante["id"]?>">Editar</a></td>
                            <td><a class="excluir" href="apagar.php?id=<?=$fabricante["id"]?>">Excluir</a></td>
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