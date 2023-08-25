<?php 
// funcoes_fabricantes.php

// Importando o script de conexão
// require_once garante que a importação é feita somente uma vez.
require_once "conecta.php";

// Usada em fabricantes/visualizar.php
function lerFabricantes(PDO $conexao){
    $sql = "SELECT * FROM fabricantes ORDER BY nome";

    try {
        // Método prepare();
        // Faz uma preparação/pré-config do comando SQL e guarda em memória (variável consulta).
        $consulta = $conexao->prepare($sql);
    
        // Método execute();
        // Executa o comando SQL no bando de dados
        $consulta->execute();
        
        // Método fetchAll()
        // Buscar todos os dados da consulta como um array associativo.
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }    



    return $resultado;
} 


// Usada em fabricantes/inserir.php
function inserirFabricante(PDO $conexao, string $nomeDoFabricante){
    // :qualquerCoisa -> isso indica um "named parameter" (parâmetro nomeado)
    $sql = "INSERT INTO fabricantes(nome) VALUE (:nome)";

    try {
        $consulta = $conexao->prepare($sql);

        // bindValue() -> permite vincular o valor existente no parâmetro nomeado (:nome) à consulta que será executada. É necessário indicar qual é o parâmetro (:nome), de onde vem o valor ($nomeDoFabricante) e de  que tipo ele é (PDO::PARAM_STR) 
        $consulta->bindValue(":nome", $nomeDoFabricante, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
    }
}


