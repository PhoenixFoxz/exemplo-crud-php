<?php
require_once "../src/funcoes_fabricantes.php";
require_once "../src/funcoes_produtos.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$produto = lerUmProduto($conexao, $id);
$listaDeFabricantes = lerFabricantes($conexao);

if (isset($_POST['atualizar'])) {
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = filter_input(
        INPUT_POST,
        "preco",
        FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_FRACTION
    );

    $quantidade = filter_input(INPUT_POST, "qtd", FILTER_SANITIZE_NUMBER_INT);

    // Pegaremos o Value, ou seja, o valor do id do fabricante
    $fabricanteid = filter_input(INPUT_POST, "fabricante", FILTER_SANITIZE_NUMBER_INT);

    $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);

    // Teste
    //echo $nome, $preco, $quantidade, $fabricanteid, $descricao;

 /*    echo "<pre>";
    var_dump($produto);
echo "</pre>";
die(); */

    atualizarProduto(
        $conexao,
        $id,
        $preco,
        $nome,
        $descricao,
        $fabricanteid,
        $quantidade
    );

    header("location:visualizar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Atualizar</title>
</head>

<body>
    <a href="../index.php">Home</a>
    <h1>Produtos | UPDATE/SELECT</h1>
    <hr>
    <form action="" method="post">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" value="<?= $produto['nome'] ?>" name="nome" id="nome" required>
        </p>
        <p>
            <label for="preco">Preço:</label>
            <input type="number" min="10" max="10000" step="0.01" name="preco" id="preco" value="<?= $produto['preco'] ?>" required>
        </p>
        <p>
            <label for="qtd">Quantidade:</label>
            <input type="number" min="1" max="100" value="<?= $produto['quantidade'] ?>" name="qtd" id="qtd" required>
        </p>
        <p>
            <label for="fabricante">Fabricante:</label>
            <select name="fabricante" value="" id="fabricante" require>
                <option value=""></option>
                <?php foreach ($listaDeFabricantes as $fabricante) {
                    /* Lógica/Algoritmo da seleção do fabricante
                    Se a chave estrangeira for idêntica à chave primária, ou seja, se o id do fabricante do produto (coluna fabricante_id da tabela produtos)
                    for igual ao id do fabricante (coluna id da tabela fabricantes), então coloque o atributo "selected" no
                    <option> */
                ?>
                    <option <?php
                            // chave estrangeira  ===  chave primaria
                            if ($produto["fabricante_id"] === $fabricante["id"]) echo " selected ";
                            ?> value="<?= $fabricante['id'] ?>">
                        <?= $fabricante['nome'] ?>
                    </option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="descricao">Descrição:</label> <br>
            <textarea name="descricao" id="descricao" cols="30" rows="3"><?= $produto['descricao'] ?></textarea>
        </p>
        <button type="submit" name="atualizar">Atualizar produto</button>
    </form>
    <hr>
    <p><a href="visualizar.php">Voltar</a></p>

</body>

</html>