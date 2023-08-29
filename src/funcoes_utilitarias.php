<?php 
 function formatarPreco(float $preco):string {
    $precoFormatado = "R$ ".number_format($preco, 2, ",", ".");

    return $precoFormatado;
 }