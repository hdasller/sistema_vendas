<?php
        $id = filter_input(INPUT_GET, "id");
        $codigo_Produto = filter_input(INPUT_GET, "codigo_Produto");
        $tipo_Mercadoria = filter_input(INPUT_GET, "tipo_Mercadoria");
        $nome_Mercadoria = filter_input(INPUT_GET, "nome_Mercadoria");
        $quantidade = filter_input(INPUT_GET, "quantidade");
        $preco = filter_input(INPUT_GET, "preco");
        
       
        
        $link = mysqli_connect("mysql.hostinger.com.br", "u748388735_hdasl", "#Banco2016", "u748388735_teste");

        if ($link) {

            //$query = mysqli_query($link, "update produtos set codigo_Produto='$codigo_Produto' where id='$id';");
            $query = mysqli_query($link, "update produtos set codigo_Produto='$codigo_Produto', tipo_Mercadoria= '$tipo_Mercadoria',nome_Mercadoria='$nome_Mercadoria', quantidade='$quantidade',preco='$preco' where id='$id';");

            if ($query) {

                header("Location: consulta.php");
            } else {

                die("Erro: " . mysqli_error($link));
            }
        } else {
            die("Erro: " . mysqli_error($link));
        }



// put your code here
        ?>