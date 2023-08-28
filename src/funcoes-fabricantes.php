<?php
    /* Importando o script de conexão
    require_once garante que a importação
    é feita somente uma vez. */
    require_once "conecta.php";

    // fabricantes/visualizar
    function lerFabricantes(PDO $conexao){
        $sql = "SELECT * FROM fabricantes ORDER BY nome";

        try {
            /* Método prepare():
            Faz uma preparação/pré-config do comando SQL e
            guarda em memória (variável consulta). */
            $consulta = $conexao->prepare($sql);
    
            /*  Método execute():
            Executa o comando SQL no banco de dados */
            $consulta->execute();
    
            /* Método fetchAll()
            Busca todos os dados da consulta como um array
            associativo. */
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }


        return $resultado;
    }; // fim lerFabricantes

    // fabricantes/inserir.php
    function inserirFabricante(PDO $conexao, string $nomeDoFabricante){
        /* :qualquerCoisa -> isso indica um "named parameter"
        (parâmetro nomeado) */
        $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";
        
        try {
            $consulta = $conexao->prepare($sql);

            /* bindValue() -> permite vincular o valor existente no
            parâmetro nomeado (:nome) à consulta que será executada.
            É necessário indicar qual é o parâmetro (:nome), de onde
            vem o valor ($nomeDoFabricante) e de que tipo ele é
            (PDO::PARAM_STR) */
            $consulta->bindValue(":nome", $nomeDoFabricante, PDO::PARAM_STR);

            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao inserir: ".$erro->getMessage());
        }
    }; // fim inserirFabricante

    // Usada em fabricantes/atualizar.php
    function lerUmFabricante(PDO $conexao, int $idFabricante){
        $sql = "SELECT * FROM fabricantes WHERE id = :id";

        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindValue(":id", $idFabricante, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro ao carregar: ".$erro->getMessage());
        };

        return $resultado;
    }; // fim lerUmFabricante

    /* Exercício: IMPLEMENTE A FUNÇÃO ABAIXO */
    function atualizarFabricante(PDO $conexao, string $nomeDoFabricante, int $idFabricante){
        $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";

        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindValue(":nome", $nomeDoFabricante, PDO::PARAM_STR);
            $consulta->bindValue(":id", $idFabricante, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao atualizar o nome: ").$erro->getMessage();
        }
    }; // fim atualizarFabricante

    // Função para apagar um fabricante
    function apagarFabricante(PDO $conexao, int $idFabricante){
        $sql = "DELETE FROM fabricantes WHERE id = :id";

        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindValue(":id", $idFabricante, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao apagar o fabricante: ").$erro->getMessage();
        }
    } // fim apagarFabricante
?>