<?php 
// Imoirtando as funções de manipulação de fabricantes
require_once "../src/funcoes_fabricantes.php";

// Guardando o retorno/resultado da função lerFabricantes
$listaDeFabricantes = lerFabricantes($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Visualização</title>
</head>
<body>
    <a href="../index.php">Home</a>
    <h1>Fabricantes | SELECT</h1>
    <hr>
    <h2>Lendo e carregando todos os fabricantes.</h2>
    <p>
        <a href="inserir.php">Inserir fabricantes</a>
    </p>
    <table>
        <caption>Lista de Fabricantes</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Operações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listaDeFabricantes as $listaDeFabricante){
            ?>
            <tr>
                <td><?=$listaDeFabricante["id"]?></td>
                <td><?=$listaDeFabricante["nome"]?></td>
                <td>
                    <a href="">Excluir</a> 
                    <a href="">Editar</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>