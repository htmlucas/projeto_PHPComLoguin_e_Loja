<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produtos";
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    // forma 1
		$select = $conn->query("SELECT * FROM produtos");
		 
		$result = $select->fetchAll();
		 
		foreach($result as $row)
		{
		  
		}
		 
		// forma 2
		//$select = $pdo->query("SELECT id, titulo, descricao FROM produtos");
		 
		//while($row = $select->fetch(PDO::FETCH_OBJ)) {
		//	echo $row->id. '-'. $row->titulo. '<br />';
		//}
    }
catch(PDOException $e)
    {
    echo "Opss... Erro no servidor: " . $e->getMessage();
    }

	// localhost/apagar.php?id=5
	?>

<html>
    <head>
        <title>Loja - Imperial</title>
        
        <!-- define a viewport -->
        <meta name="viewport" content="width=device-width,initial-scale=1.0" >
        <meta charset="utf-8">
        
        <!-- adicionar CSS Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link href="https://fonts.googleapis.com/css?family=Vibur" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Mogra" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="css/style.css">

    </head>
    <body>    
      
        <header>
          <div class="container">
               <div class="row">
                    <div class="col-xs-6 col-md-1 col-md-offset-3 col-sm-6">
                        <img style="height:100px; width:100px; position:aboslute;" src="img/logo.png" alt="">
                    </div>
                    <div class="col-xs-6 col-md-4 col-sm-6">
                          <h1>Imperial</h1>
                    </div>
                    <div class="col-xs-0 col-md-4">
                        
                    </div>
                    
               </div>
           </div>
           
       </header>
       <!--MENU-->        
      <nav>
        <ul>
            <div id="menu" onclick="myFunction(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <li><a href="#home">Home</a></li>
            <li><a href="#sobre">Eventos</a></li>
            <li><a href="#gallery">Promoções</a></li>
            <li><a href="#contato">Patrocínios</a></li>
        </ul>
    </nav>
    
    <!--SIDENAV-->
     <div id="mySidenav" class="sidenav">
               <a href="index.php">Home</a>
              <a href="categorias.php">Categorias</a>
              <?php if (isset($_SESSION['type']) and  ($_SESSION['type'] == 'A')){ echo '<a href="formulariodecadastro.php">Cadastro de Produtos</a>'; }?>
               <?php if (!isset($_SESSION['nome'])){ echo '<a href="../../FRONTELAINE_TEQUE/">Cadastro e/ou Login</a>';} ?>
              <a href="../../FRONTELAINE_TEQUE/">Voltar para a página inicial</a>
         
         </div>
      
       <!--CORPO DA LOJA-->
       <section>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="up"></i></button>  
             
             <div class="container theme-showcase text-center">
       <div class="page-header">
           <h1>Produto Recém Cadastrado</h1>
       </div>
        <div class="row ">
          <div class="col-sm-6 col-md-12">
           <table border="1px" >
              <tr>
                  <th>Nome do Produto</th>
                  <th>Imagem do Produto</th>
                  <th>Cor do Produto</th>
                  <th>Tamanho do Produto</th>
                  <th>Disponibilidade do Produto</th>
                  <th>Quantidade de Produto</th>
                  <th>Descrição do Produto</th>
                  <th>Preco do Produto</th>
              </tr>
               <tr>
                   <td><h3><?php echo $row['NomeProduto'].'<br />'; ?></h3></td>
                   <td><?php echo '<img src="imagens/'. $row['ImagemProduto'].'" class="imgproduto" ><br>'; ?></td>
                   <td><h3><?php echo $row['CorProduto'].'<br />'; ?></h3></td>
                   <td><h3><?php echo $row['TamanhoProduto'].'<br />'; ?></h3></td>
                   <td><h3><?php echo $row['DisponibilidadeProduto'].'<br />'; ?></h3></td>
                   <td><h3><?php echo $row['QuantidadeProduto'].'<br />'; ?></h3></td>
                   <td><h3><?php echo $row['DescricaoProduto'].'<br />'; ?></h3></td>
                   <td><h3><?php echo $row['PrecoProduto'].'<br />'; ?></h3></td>
               </tr>
           </table>      
              </div>
              </div>
              </div>
              <div class="text-center">
              <a href="index.php">Clique aqui para voltar para a pagina inicial !</a>
              <?php echo '<a href="alterarform.php?id='.$row['idProdutos'].'">Editar</a><br />';?>
              <?php echo '<a href="apagar.php?id='.$row['idProdutos'].'">Excluir</a><br />'; ?>
              </div>
             
          
        <!--FOOTER-->      
       <footer>
             <div class="jumbotron text-center col-xs-12">
                      <h1>Imperial</h1>
                      <p>Todos os direitos reservados para Frontline Tech !</p> 
                    </div>
                <div class="container text-center">
                  <div class="row">
                <div class="col-sm-4">
                  <h3>Column 1</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-4">
                  <h3>Column 2</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-4">
                  <h3>Column 3</h3>        
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                  </div>
                  
              </div>
         
           
       </footer>    
       </section>
        
        <script src="js/script.js"></script>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>



