<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sistema de Vendas</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            /* Remove the navbar's default margin-bottom and rounded borders */
            .navbar {
                margin-bottom: 0;
                border-radius: 0;
            }

            /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
            .row.content {height: 767px}

            /* Set gray background color and 100% height */
            .sidenav {
                padding-top: 20px;
                background-color: #f1f1f1;
                height: 100%;
            }

            /* Set black background color, white text and some padding */
            footer {
                background-color: #555;
                color: white;
                padding: 15px;
            }

            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }
                .row.content {height:auto;}
            }
        </style>

        <?php
        $parametro = filter_input(INPUT_GET, "parametro");
        $mysqllink = mysqli_connect("mysql.hostinger.com.br", "u748388735_hdasl", "#Banco2016", "u748388735_teste");
        mysqli_select_db($mysqllink, "sistemaVendas");
        if (mysqli_connect_error()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        if ($parametro) {
            $dados = mysqli_query($mysqllink, "select * from produtos where nome_Mercadoria like '$parametro%' order by nome_Mercadoria");

            //"select * from produtos where codigo_Produto like '$parametro%' order by codigo_Produto");
        } else {
            $dados = mysqli_query($mysqllink, "select * from produtos order by nome_Mercadoria");
            //  $dados = mysql_query("select * from produtos;");
        }


        //else {die("Erro:" .mysql_error($mysqllink));}
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        ?>

    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Logo</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="consulta.php">Home</a></li>
                        <li><a href="cadastro.html">Cadastrar Produtos</a></li>
                        <li><a href="consulta.php">Listar Produtos</a></li>
                        <li><a href="gerarpedidos.php">Gerar pedidos</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid text-center">
            <div class="row content">
                <div class="col-sm-2 sidenav">


                </div>
                <div class="col-sm-8 text-left">

                    <div>
                        <h1 align="center">Lista de produtos</h1>
                        <br>
                    </div>

                    <div class="list-group">

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="input-group custom-search-form">
                                            <input type="text" name="parametro"class="form-control" placeholder="Digite o código do produto">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </span>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>		

                        </form>

                        <a href="#" class="list-group-item active">
                            <table><tr>
                                    <td width="217px" allign="left">Código</td>
                                    <td width="217px" allign="left">Tipo de produto</td>
                                    <td width="217px" allign="left">Descrição</td>
                                    <td width="217px" id="qtdtotal" allign="left">Quantidade</td>
                                    <td width="217px"id="valortotaal" allign="left">Preço</td>
                                </tr>
                            </table></a>
<?php
if ($total) {
    do {
        ?>
                                <a  href="<?php echo "alterar_page.php?id=" . $linha['id'] . "&codigo_Produto=" . $linha['codigo_Produto'] . "&tipo_Mercadoria=" . $linha['tipo_Mercadoria'] . "&nome_Mercadoria=" . $linha['nome_Mercadoria'] . "&quantidade=" . $linha['quantidade'] . "&preco=" . $linha['preco'] ?>" class="list-group-item"><table>

                                        <tr>
                                            <td width="217px" allign="left"><?php echo $linha['codigo_Produto'] ?></td>
                                            <td width="217px" allign="left"><?php echo $linha['tipo_Mercadoria'] ?></td>
                                            <td width="217px" allign="left"><?php echo $linha['nome_Mercadoria'] ?></td>
                                            <td width="217px" allign="left"><?php echo $linha['quantidade'] ?></td>
                                            <td width="217px" allign="left"><?php echo $linha['preco'] ?></td>
                                        </tr>
                                    </table></a>

        <?php
    } while ($linha = mysqli_fetch_assoc($dados));

    mysqli_free_result($dados);
    mysqli_close($mysqllink);
}
?>


                    </div>


                </div>
                <div class="col-sm-2 sidenav">

                </div>
            </div>
        </div>

        <footer class="container-fluid text-center">
            <p>© 2016 Sistema de Vendas - By Henrique </p>
        </footer>

    </body>
</html>

