<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        $parametro = filter_input(INPUT_POST, "parametro");
        $mysqllink = mysql_connect("localhost:8085", "root", "");

        if ($parametro) {
            $dados = mysql_query("select * from produtos where like nome '$parametro%' order by codigo_Produto_");
        } else {
            $dados = mysql_query("select * from produtos order by codigo_Produto_");
            
        }
        
        $linha = mysql_fetch_assoc($dados);
        $total = mysql_num_rows($dados);
        
        ?>

    </body>
</html>
