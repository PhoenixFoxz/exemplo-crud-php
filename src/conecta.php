<?php 
// conecta.php

// Script de conexão ao servidor de Banco de Dados

// Parâmetros de acesso
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "vendas";

// Configurações para conexão (API/Driver de conexão: PDO (PHP Data Object)) 

try {

    // Instância / Objeto PDO psts conexão
    $conexao = new PDO(
        "mysql:host=$servidor;dbname=$banco;charset=utf8",
        $usuario, $senha
    );
    
    // Habilitar a verificação e sinalização de erros (exceções)
    $conexao->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
    // Ao acabar errando o código de alguma forma, esse comando acima explicará de forma mais clara qual foi o erro 

} catch(Exception $erro){
    // Exception é uma classe/tipo de dados voltado para tratamento de exceções(erros)
    die("Deu ruim: ".$erro->getMessage());

}
