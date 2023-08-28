<?php 

require_once "../src/funcoes_fabricantes.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$fabricante = lerUmFabricante($conexao, $id);

if(isset($_POST['apagar'])){
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    deletarFabricantes($conexao, $id);
    header("location:visualizar.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes | Deletar</title>
</head>
<body>
    <a href="../index.php">Home</a>
    <h1>Fabricantes | Deletar</h1>
    <hr>
    <p>Deseja deletar o Fabricante <?=$fabricante["nome"]?>?</p>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?=$fabricante['id']?>">
        <p>
            <label for="nome">Nome:</label>
            <input require value="<?=$fabricante['nome']?>" type="text" name="nome" id="nome">
        </p>
        <button type="submit" name="apagar">Excluir Fabricante</button>
    </form>

    <hr>
    <p><a href="visualizar.php">Voltar</a></p>
</body>
</html>