<?php
    require_once "../src/funcoes-fabricantes.php";
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $fabricante = lerUmFabricante($conexao, $id);

    if(isset($_POST["apagar"])){
        apagarFabricante($conexao, $id);
        header("location:visualizar.php?status=apagado");
    }

    if(isset($_POST["nao"])){
        header("location:visualizar.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Apagar</title>
    <style>
        a {
            text-decoration: none;
            color: #000;
        }
    </style>
</head>
<body>
    <header>
        <h1>Fabricantes - Apagar</h1>
        <hr>
    </header>
    <main>
        <form action="" method="post">
            <p>
                Você tem certeza que deseja apagar o fabricante <?=$fabricante["nome"]?>? <b>ATENÇÃO, CAMINHO SEM VOLTA!!!!!</b>
            </p>
            <p>
                <button type="submit" name="apagar">Sim</button>
                <button type="submit" name="nao">Não</button>
            </p>
        </form>
    </main>
</body>
</html>