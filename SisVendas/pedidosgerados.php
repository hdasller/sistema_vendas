<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sistema de Vendas</title>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src ="script_busca.js"></script>
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
                        <h1 align="center">Pedidos Gerados</h1>
                        <br>
                    </div>

                    <div class="list-group">

                        <div id="div1">

                            <a href="#" class="list-group-item active">
                                <table class=""><tr>
                                        <td width="290px">Número do pedido</td>
                                        <td width="290px">Nome do cliente</td>
                                        <td width="290px" id="qtdtotal" >Valor total</td>
                                        
                                    </tr>
                                </table>



                                <a class="list-group-item">
                                    <table><td align="center" width="870px">Nenhum pedido Gerado.</td></table>
                                    <a/>
                                    </div>   



                                   
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

