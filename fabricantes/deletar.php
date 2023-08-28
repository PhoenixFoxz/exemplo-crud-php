<?php 
require_once "../src/funcoes_fabricantes.php";
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
deletarFabricantes($conexao, $id);
header("location:visualizar.php");
