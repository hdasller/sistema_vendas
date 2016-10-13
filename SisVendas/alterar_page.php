<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
    .row.content {height: 450px}
    
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
$id = filter_input(INPUT_GET, "id");  
$codigo_Produto = filter_input(INPUT_GET, "codigo_Produto");
$tipo_Mercadoria = filter_input(INPUT_GET, "tipo_Mercadoria");
$nome_Mercadoria = filter_input(INPUT_GET, "nome_Mercadoria");
$quantidade = filter_input(INPUT_GET, "quantidade");
$preco = filter_input(INPUT_GET, "preco");
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
        <li class="active"><a href="#">Home</a></li>
        <li><a href="cadastro.html">Cadastrar Produtos</a></li>
        <li><a href="consulta.php">Listar Produtos</a></li>
        <li><a href="#">Gerar pedidos</a></li>
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
    
	
	<form action="alterar.php">
    
	<div>
	<h1 align="center">Alterar produto</h1>
	<br>
	</div>

	
	
	<div class="form-group">
            
      <label  for="id">ID:</label>
      
        <input type="number" class="form-control" name="id" value="<?php echo $id ?>" disabled>
      </div>
    
	    <div class="form-group">
            
      <label  for="codigo_Produto">Código do produto:</label>
      
        <input type="Text" class="form-control" name="codigo_Produto" value="<?php echo $codigo_Produto ?>">
      </div>
    
	    <div class="form-group">
      
            <label  for="tipo_Mercadoria">Tipo da Mercadoria:</label>
      
        <input type="Text" class="form-control" name="tipo_Mercadoria" placeholder="Tipo da mercadoria" value="<?php echo $tipo_Mercadoria ?>">
		  </div>
    
    <div class="form-group">
      <label  for="nome_Mercadoria">Nome da mercadoria</label>
      
        <input type="Text" class="form-control" name="nome_Mercadoria" placeholder="Nome da mercadoria" value="<?php echo $nome_Mercadoria ?>"></label>
      </div>
    
	    <div class="form-group">
      <label  for="quantidade">Quantidade</label>
      
        <input type="number" class="form-control" name="quantidade" placeholder="Quantidade" value="<?php echo $quantidade ?>"></label>
      </div>
   	  
	    <div class="form-group">
      <label  for="preco">Preço</label>
      
        <input type="number" class="form-control" name="preco" placeholder="Preço" value="<?php echo $preco ?>"></label>
      </div>
	  
   
   <div class="form-group">
       <input type="submit" value="Alterar">
			
      </div>
 
   
   
</form>
	
	
    </div>
    <div class="col-sm-2 sidenav">
     
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>

