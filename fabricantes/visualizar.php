<?php
    /* Importando as funções de manipulação de fabricantes */
    require_once "../src/funcoes-fabricantes.php"; 

    /* Guardando o retorno/resultado da função lerFabricantes */
    $dadosDeFabricantes = lerFabricantes($conexao);
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

        <table>
            <caption>Lista de Fabricantes</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th colspan="2">Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($dadosDeFabricantes as $dados) { ?>
                        <tr>
                            <td><?=$dados["id"]?></td>
                            <td><?=$dados["nome"]?></td>
                            <td><a href="">Editar</a></td>
                            <td><a href="">Excluir</a></td>
                        </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>