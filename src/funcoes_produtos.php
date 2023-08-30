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

function inserirProduto(
  PDO $conexao, string $nome, float $preco, int $quantidade, int $fabricanteid,string $descricao ):void {

    $sql = "INSERT INTO produtos(nome, preco, quantidade, descricao, fabricante_id) VALUES(:nome, :preco, :quantidade, :descricao, :fabricanteid)";

    try {
      $consulta = $conexao->prepare($sql);
      $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);

      // Ao trabal har com valores "quebrados" para os parâmetros nomeados, você deve usar a constante PARAM_STR. No momento, não há outra forma no PDO de lidar com valores deste tipo devido aos diferentes tipos de dados que cada Banco de Dados suporte.
      $consulta->bindValue(":preco", $preco, PDO::PARAM_STR);

      $consulta->bindValue(":quantidade", $quantidade, PDO::PARAM_INT);
      $consulta->bindValue(":descricao", $descricao, PDO::PARAM_STR);
      $consulta->bindValue(":fabricanteid", $fabricanteid, PDO::PARAM_INT);

      $consulta->execute();
    } catch (Exception $erro){
      die("Erro ao inserir: ".$erro->getMessage());
    }
}

function lerUmProduto(PDO $conexao, int $idProduto):array {
  $sql = "SELECT * FROM produtos WHERE id = :id";

  try {
      $consulta = $conexao->prepare($sql);
      $consulta->bindValue(":id", $idProduto, PDO::PARAM_INT);
      $consulta->execute();
      $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
  
  } catch (Exception $erro) {
      die("Erro ao carregar: ".$erro->getMessage());
  }

  return $resultado;
}