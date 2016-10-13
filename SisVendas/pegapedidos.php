<?php/* criando conexao com o banco */

$mysqllink = mysqli_connect("mysql.hostinger.com.br", "u748388735_hdasl", "#Banco2016", "u748388735_teste");

/* array para armazenar valores da pesquisa */

$array = array();

/* fazer consulta no banco com parametro passado no campo produto */

if ($parametro) {
    $dados = mysqli_query($mysqllink, "select * from pedidos where nome_Mercadoria like '' order by id");
    $total = mysqli_num_rows($dados);


    if ($total > 0) {

        while ($linha = mysqli_fetch_object($dados)) {


            $array[] = $linha;
        }
    }
    
    
echo json_encode($array);

?>