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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link href="https://fonts.googleapis.com/css?family=Vibur" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Mogra" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">


        
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        <style>
.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    border-radius: 5px; /* 5px rounded corners */
    margin:25px 0px;
    width:auto;
}
.card:hover {
    box-shadow: 0 32px 36px 0 rgba(0,0,0,0.2);
}
/* Add rounded corners to the top left and the top right corner of the image */
.img {
    border-radius: 5px 5px 0 0;
    max-width: 100%;
}
            .nomecategoria{
                text-align: center;
            }
            .nomecategoria h4{
                    font-family: 'Yanone Kaffeesatz', sans-serif;
                    padding:30px 0px;
                    font-size:2.2em;
            }

</style>

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
             
             <div class="container">
                 <div class="row">
                    
                     <a href="vestuario.php">
                         <div class="col-xs-6 col-md-3">
                          <div class="card">
                              <img class="imgproduto" src="categorias/sebrae-t%C3%AAxtil.jpg" alt="Avatar" style="width:100%">
                              <div class="nomecategoria">
                                <h4><b>Vestuário</b></h4>
                                
                                
                              </div>
                            </div>
                          </div>
                      </a>
                      
                       <a href="calcados.php">
                         <div class="col-xs-6 col-md-3">
                          <div class="card">
                              <img class="imgproduto" src="categorias/vga-shutterstock-226903828.jpeg" alt="Avatar" style="width:100%">
                              <div class="nomecategoria">
                                <h4><b>Calçados</b></h4> 
                               
                              </div>
                            </div>
                          </div>
                      </a>
                      
                      <a href="equipamentos.php">
                         <div class="col-xs-6 col-md-3">
                          <div class="card">
                              <img class="imgproduto" src="categorias/Equipamentos-esportivos-e1465937192687.jpg" alt="Avatar" style="width:100%">
                              <div class="nomecategoria">
                                <h4><b>Equipamentos</b></h4> 
                               
                              </div>
                            </div>
                          </div>
                      </a>
                      
                       <a href="alimentos.php">
                         <div class="col-xs-6 col-md-3">
                          <div class="card">
                             <img class="imgproduto" src="categorias/suplemento.jpg" alt="Avatar" style="width:100%">
                              <div class="nomecategoria">
                                <h4><b>Alimentos</b></h4> 
                               
                              </div>
                            </div>
                          </div>
                      </a>
                      
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



