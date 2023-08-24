<?php
    // conecta.php

    /* Script de conexão ao servidor de Banco de Dados */

    // Parâmetros
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "vendas";

    /* Configurações para conexão
    (API/Driver de conexão: PDO (PHP Data Object)) */
    try {
        // Instância/Objeto PDO para conexão
        $conexao = new PDO(
            "mysql:host=$servidor;dbname=$banco;charset=utf8",
            $usuario, $senha
        );
    
        // Habilitar a verificação e sinalização de erros (exceções)
        $conexao->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
    } catch(Exception $erro) {
        /* Exception é uma classe/tipo de dados
        voltado para tratamento de exceções (erros) */
        die("Azedou o pé do frango! :( ".$erro->getMessage());
    }

?>