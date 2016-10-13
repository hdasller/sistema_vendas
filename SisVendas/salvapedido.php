<?php

/* pegando valores dos campos do carrinho de compras */

$preco = filter_input(INPUT_POST, "preco");
$qtd = filter_input(INPUT_POST, "qtd");
$produto = filter_input(INPUT_POST, "produto");
$total = filter_input(INPUT_POST, "total");
$cliente = filter_input(INPUT_POST, "cliente");

/* criando conexao com o banco */

$mysqllink = mysqli_connect("mysql.hostinger.com.br", "u748388735_hdasl", "#Banco2016", "u748388735_teste");

if ($mysqllink) {

    $query = mysqli_query($mysqllink, "insert into pedidos values ('','$preco','$qtd','$produto','$total','$cliente');");

    if ($query) {

        header("Location: pedidosgerados.php");
    } else {

        die("Erro: " . mysqli_error($mysqllink));
    }
}

?>
    