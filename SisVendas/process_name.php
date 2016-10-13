<?php

/* Este arquivo tem como objetivo fornecer informacoes do banco para um script utilizando o ajax */
/* recebendo valor do campo produto */

$parametro = filter_input(INPUT_POST, "produto");


/* array para armazenar valores da pesquisa */

$array = array();


/* criando conexao com o banco */

$mysqllink = mysqli_connect("mysql.hostinger.com.br", "u748388735_hdasl", "#Banco2016", "u748388735_teste");


/* fazer consulta no banco com parametro passado no campo produto */

if ($parametro) {
    $dados = mysqli_query($mysqllink, "select * from produtos where nome_Mercadoria like '$parametro%' order by nome_Mercadoria");
    $total = mysqli_num_rows($dados);


    if ($total > 0) {

        while ($linha = mysqli_fetch_object($dados)) {


            $array[] = $linha;
        }
    }
}
/*Passando via POST o valor encontrado*/

if (isset($_POST['produto'])) {
    if ($_POST['produto'] != null) {
       
        echo json_encode($array);
       
    }
}
?>