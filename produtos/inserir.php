<?php 
require_once "../src/funcoes_fabricantes.php";

$listaDeFabricantes = lerFabricantes($conexao);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserção</title>
</head>
<body>
    <a href="../index.php">Home</a>
    <h1>Produtos | INSERT</h1>
    <hr>
    <form action="" method="post">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </p>
        <p>
            <label for="preco">Preço:</label>
            <input type="number" min="10" max="10000" step="0.01" name="preco" id="preco" required>
        </p>
        <p>
            <label for="qtd">Quantidade:</label>
            <input type="number" min="1" max="100" name="qtd" id="qtd" required>
        </p>
        <p>
            <label for="fabricante">Fabricante:</label>
            <select name="fabricante" id="fabricante" require>
                <option value=""></option>
<?php 
foreach($listaDeFabricantes as $fabricante){
?>
            <option value="<?=$fabricante['id']?>">
                <?=$fabricante['nome']?>
            </option>
<?php
}
?>
            </select>
        </p>
        <p>
            <label for="descricao">Descrição:</label> <br>
            <textarea name="descricao" id="descricao" cols="30" rows="3"></textarea>
        </p>
        <button type="submit" name="inserir">Inserir produto</button>
    </form>
    <hr>
    <p><a href="visualizar.php">Voltar</a></p>

</body>
</html>