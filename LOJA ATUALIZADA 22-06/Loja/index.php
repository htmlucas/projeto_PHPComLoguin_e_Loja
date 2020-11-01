<?php include_once("conexao.php");
session_start();
//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Selecionar todos os cursos da tabela
$result_produtos = "SELECT * FROM produtos";
$resultado_produtos = mysqli_query($conn, $result_produtos);

//Contar o total de cursos
$total_produtos = mysqli_num_rows($resultado_produtos);

//Seta a quantidade de cursos por pagina
$quantidade_pg = 6;

//calcular o número de pagina necessárias para apresentar os cursos
$num_pagina = ceil($total_produtos/$quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

//Selecionar os cursos a serem apresentado na página
$result_produtos = "SELECT * FROM produtos limit $incio, $quantidade_pg";
$resultado_produtos = mysqli_query($conn, $result_produtos);
$total_produtos = mysqli_num_rows($resultado_produtos);
?>

<!--IMAGEMMMMMMMMMMM-->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produtos";
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    // forma 1
		$select = $conn->query("SELECT ImagemProduto FROM produtos");
		 
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

	
	?>
	
	
	
	<?php
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
    }
catch(PDOException $e)
    {
    echo "Opss... Erro no servidor: " . $e->getMessage();
    }

	// localhost/apagar.php?id=5
	?>

<!DOCTYPE html>
<html>
    <head>
        <title>Loja - Imperial</title>
        
        <!-- define a viewport -->
        <meta name="viewport" content="width=device-width,initial-scale=1.0" >
        <meta charset="utf-8">
        
        <!-- adicionar CSS Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
            <li><a href="#home">Inicio</a></li>
            <li><a href="#sobre">Eventos</a></li>
            <li><a href="#gallery">Promoções</a></li>
            <li><a href="#contato">Patrocínios</a></li>
        </ul>
    </nav>
    
    <!--SIDENAV-->
     <div id="mySidenav" class="sidenav">
            <form class="form-inline" method="GET" action="pesquisar.php">
				<div class="form-group">
                    <input type="text" class="search" name="pesquisar" class="form-control" id="exampleInputName2" placeholder="Pesquisar...">
				</div>
            </form>  
               <a href="index.php">Home</a>
              <a href="categorias.php">Categorias</a>
               <?php if (isset($_SESSION['type']) and  ($_SESSION['type'] == 'A')){ echo '<a href="formulariodecadastro.php">Cadastro de Produtos</a>'; }?>
               <?php if (!isset($_SESSION['nome'])){ echo '<a href="../../FRONTELAINE_TEQUE/">Cadastro e/ou Login</a>';} ?>
              <a href="../../FRONTELAINE_TEQUE/">Voltar para a página inicial</a>
         
         </div>
      
       <!--CORPO DA LOJA-->
       <section>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="up"></i></button>
            <div class="container-fluid">
             <div class="row">
                <div class="col-xs-12 col-md-12">
                 <img class="banner" src="img/Sport-HD-Widescreen-Wallpapers.jpg" alt="">
                 </div>
             </div>
             </div>  
             
             <div class="container theme-showcase">
       <div class="page-header text-center">
           <h1>Produtos</h1>
       </div>
        <div class="row">
             <?php while($rows_produtos = mysqli_fetch_assoc($resultado_produtos)){ ?>
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="nomeproduto">
                        <h3><?php echo $rows_produtos['NomeProduto']; ?></h3>
                    </div>
                        <div class="generoprod">
                            <h6></h6><?php echo $rows_produtos['CategoriaProduto']; ?><h6>
                        </div>
                         <img class="imgproduto" src="imagens/<?php echo $rows_produtos['ImagemProduto'];?>"  alt="lascou">
                          <div class="caption text-center">
                            <p>A Partir de : <br><mark>R$<?php echo $rows_produtos['PrecoProduto'];?></mark></p>
                            <p><a href="#" class="btn btn-primary" role="button">Detalhes</a> <a href="#" class="btn btn-default" role="button">Comprar</a></p>
                            
                            <p><?php if (isset($_SESSION['type']) and  ($_SESSION['type'] == 'A')){ echo '<a href="alterarform.php?id='.$rows_produtos['idProdutos'].'" class="btn btn-warning" role="button">Editar</a>';}?>
                            
                            <?php if (isset($_SESSION['type']) and  ($_SESSION['type'] == 'A')){ echo '<a href="apagar.php?id='.$rows_produtos['idProdutos'].'" class="btn btn-danger" role="button">Excluir</a>';}?></p>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                 </div>
             <?php
				//Verificar a pagina anterior e posterior
				$pagina_anterior = $pagina - 1;
				$pagina_posterior = $pagina + 1;
			?>
			    <div class="text-center">
				<ul class="pagination">
					<li>
						<?php
						if($pagina_anterior != 0){ ?>
							<a href="index.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						<?php }else{ ?>
							<span aria-hidden="true">&laquo;</span>
					<?php }  ?>
					</li>
					<?php 
					//Apresentar a paginacao
					for($i = 1; $i < $num_pagina + 1; $i++){ ?>
						<li><a href="index.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>
					<li>
						<?php
						if($pagina_posterior <= $num_pagina){ ?>
							<a href="index.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
								<span aria-hidden="true">&raquo;</span>
							</a>
						<?php }else{ ?>
							<span aria-hidden="true">&raquo;</span>
					<?php }  ?>
					</li>
				</ul>
			
		</div>
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


