<?php 
if(isset($_POST["inserir"])){

    // Capturando o valor digitado do nome e sanitizando
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);

    // Pode ser assim também:
    //$nome = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);

    echo $nome; 
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Inserção</title>
</head>
<body>
    <a href="../index.php">Home</a>
    <h1>Fabricantes | INSERT</h1>
    <hr>
    <form action="" method="post">
        <p>
            <label for="nome">Nome:</label>
            <input require type="text" name="nome" id="nome">
        </p>
        <button type="submit" name="inserir">Inserir fabricantes</button>
    </form>
</body>
</html>