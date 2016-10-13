<?php

$codigo_Produto = filter_input(INPUT_GET, "codigo_Produto");
$tipo_Mercadoria = filter_input(INPUT_GET, "tipo_Mercadoria");
$nome_Mercadoria = filter_input(INPUT_GET, "nome_Mercadoria");
$quantidade = filter_input(INPUT_GET, "quantidade");
$preco = filter_input(INPUT_GET, "preco");

 $link = mysqli_connect("mysql.hostinger.com.br", "u748388735_hdasl", "#Banco2016", "u748388735_teste");
//mysqli_select_db($mysqllink, "sistemaVendas");
if ($link) {

    $query = mysqli_query($link, "insert into produtos values ('','$codigo_Produto','$tipo_Mercadoria','$nome_Mercadoria','$quantidade','$preco');");

    if ($query){
        
        header ("Location: consulta.php");
        
    } else {
        
        die ("Erro: " .  mysqli_error($link));
        
    }
    
    
    
} else {die ("Erro: " .  mysqli_error($link));}
?>

