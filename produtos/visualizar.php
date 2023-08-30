<?php 
require_once "../src/funcoes_produtos.php";
require_once "../src/funcoes_utilitarias.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$listaDeProdutos = lerProdutos($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Visualização</title>
    <style>
        * { box-sizing: border-box; }

        .produtos {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            width: 80%;
            margin: auto;
        }

        .produto {
            background-color: aliceblue;
            padding: 1rem;
            width: 49%;
            box-shadow: black 0 0 10px;
        }
    </style>
</head>
<body>
<a href="../index.php">Home</a>
    <h1>Produtos | SELECT</h1>
    <hr>
    <h2>Lendo e carregando todos os produtos.</h2>
    <p>
        <a href="inserir.php">Inserir novo produto</a>
    </p>
    <div class="produtos">
<?php
foreach ($listaDeProdutos as $produto){
?>
        <article class="produto">
            <h3> <?=$produto['produto']?> </h3>
            <h4> <?=$produto['fabricante']?> </h4>
            <p><b>Preço:</b> <?=formatarPreco($produto['preco'])?> </p>
            <p><b>Quantidade:</b> <?=$produto['quantidade']?> </p>
            <p><b>Total:
            <!-- 1) Fazer a conta diretamente e passar o resultado pra formatação do preço -->   
            </b><?=formatarPreco($produto['preco'] * $produto['quantidade'])?></p>
            <p><b>Total:
            <!-- 2) Fazer a conta direto na query SQL e pegar o resultado (coluna total) - além de passar pra formatação -->
            </b><?=formatarPreco($produto['total'])?></p>

            <p><b>Total:
            <!-- 3) Fazer uma função de cálculo e pegar o resultado dela já calculado e formatado -->
            </b><?=calcularTotal($produto['preco'], $produto['quantidade'])?></p>
            <p><b>Descrição:</b> <?=$produto['descricao']?> </p>

            <hr>
            <p>
                <a href="atualizar.php?id=<?=$produto['id']?>">Editar</a> | <a href="deletar.php?id=<?=$produto['id']?>">Excluir</a>
            </p>
        </article>
<?php
}
?>
    </div>
</body>
</html>