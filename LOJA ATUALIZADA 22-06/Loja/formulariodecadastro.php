<?php 
session_start();
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
        <link href="https://fonts.googleapis.com/css?family=Mogra" rel="stylesheet">
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
         <section>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="up"></i></button>  
            
  
          <form class="modal-content animate" action="cadastraproduto.php" method="POST" enctype="multipart/form-data">
          
           <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
           
            <div class="imgcontainer">
              <img src="img/logo_preto.png" height="200px;" width="200px;" alt="Avatar" class="avatar">
            </div>

            <div id="container">
            <label><h1>Nome do Produto</h1></label>
              <input type="text" placeholder="Digite o nome do produto..." maxlength="20" name="NomeProduto" required>             
             
              <label><h1>Nome da Categoria</h1></label>
              <select name="CategoriaNome"> 
                <option value="Acessorios">Acessorios</option> 
                <option value="Alimentos">Alimentos</option> 
                <option value="Calcados">Calcados</option> 
                <option value="Equipamentos">Equipamentos</option>
                <option value="Vestuario">Vestuario</option>  
               </select>

              <label><h1>Cor do Produto</h1></label>
              <select name="CorProduto"> 
                <option value="Vermelho">Vermelho</option> 
                <option value="Cinza">Cinza</option> 
                <option value="Preto">Preto</option> 
                <option value="Azul">Azul</option>
                <option value="Laranja">Laranja</option>
                <option value="Branco">Branco</option>
                <option value="Verde">Verde</option>
                <option value="Amarelo">Amarelo</option>
                <option value="Roxo">Roxo</option>
                <option value="Marrom">Marrom</option>
                <option value="Bege">Bege</option>                 
               </select>
               
               <label><h1>Tamanho do Produto</h1></label>
              <select name="TamanhoProduto">
               <option value="PP">PP</option>  
                <option value="P">P</option> 
                <option value="M">M</option> 
                <option value="G">G</option> 
                <option value="GG">GG</option>
                <option value="EXGG">Extra GG</option>            
               </select>
               
 <!--            ------------------------ IMAGEM TA AQUI------------------------------------->
               <label><h1>Imagem do Produto</h1></label>
               <br>
                <input type="file" name="nomereal" id="nomereal" required><br>
                <br>
                
<!--                ACABO A IMAGEMMMMMMMMM-->

                <label><h1>Preço do Produto</h1></label>
              <input type="text" placeholder="Digite o preço do produto... como no exemplo: 49.00" name="PrecoProduto" maxlength="7" required>
              <br>
                <label><h1>Disponibilidade do Produto</h1></label>
              <input type="text" placeholder="Informe se o produto está disponível no estoque ou se está esgotado!" name="DisponibilidadeProduto" maxlength="20" required>
               <br>
                <label><h1>Quantidade de Produtos</h1></label>
              <input type="text" placeholder="Informe a quantidades de produtos disponiveis" name="QuantidadeProduto" maxlength="5" required>
              <br>
              <label><h1>Descrição dos Produtos</h1></label>
                 <textarea class="form-control" name="DescricaoProduto" placeholder="Digite Aqui ... " maxlength="250" required></textarea>   


              <input type="submit" class="button" value="Enviar">
            </div>
          </form>
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
