<?php 
require_once "conecta.php";

function lerProdutos(PDO $conexao):array {
    // SQL DE SELECT

    // Versão 1 (dados somente da tabela produtos)
    //$sql = "SELECT nome, preco, quantidade, descricao FROM produtos ORDER BY nome";

    $sql = "SELECT 
    
    produtos.id, 
    produtos.nome produto, 
    produtos.preco, 
    produtos.quantidade, 
    produtos.descricao, 
    fabricantes.nome fabricante,
    (produtos.preco * produtos.quantidade) as total
    
    FROM produtos INNER JOIN fabricantes
    ON produtos.fabricante_id = fabricantes.id

    ORDER BY produto";

    // TRY/CATH
    try {
      $consulta = $conexao->prepare($sql);
      $consulta->execute();
      $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
      die("Erro ao carregar produtos: ".$erro->getMessage());
    }
    return $resultado;
}

function calcularTotal(float $valor, int $qtd):string {
  $total = $valor * $qtd;
  return formatarPreco($total);
}