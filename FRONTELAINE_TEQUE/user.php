<?php
//Inicia Sessão
	session_start();
    //Verifica Sessão
    if(!isset($_SESSION['nome'])){
        //Se não estiver logado, volta para o índice
        header('Location: index.php');
        exit;
    };
//Chama os dados para conexão do banco
    require 'conexao.php';
//Conexão para as mensagens quando administrador
	 try {
    //Conecta
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $selectmensagens = $conn->query("SELECT login.nome, login.sobrenome , mensagem.titulo, mensagem.conteudo, mensagem.telefone, login.email, mensagem.idmensagem FROM login, mensagem WHERE mensagem.idlogin = login.id;");
    $result = $selectmensagens->fetchAll();
}
catch(PDOException $e)
    {
    echo "Opss... Erro no servidor: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<title>Login Imperial</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="css/estilo.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="css/acordion.css">

<!--CSS-->
<div>
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
    background-image: url('img/cropped-cropped-sports_montage_-_chosen_concept_v9_carouselv3_rgb__1600x580_q85_crop_upscale11.jpg');
    min-height: 100%;
    background-position: center;
    background-size: cover;
}

</style>
</div>


<body>
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-topleft w3-padding-large w3-xlarge" style="position:relative;">
    <!--DROPDOWN-->
     <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn"><?php echo $_SESSION['nome']; ?></button>
          <div id="myDropdown" class="dropdown-content">
            <!--MODAL 1 -->
            <a href="#Perfil" onclick="document.getElementById('id01').style.display='block'">Perfil</a>
            <!--MODAL 2 -->
            <a href="#Editar" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Editar</a>
            <!--SAIR-->
            <a href="sair.php">Sair</a>
          </div>
    </div><!--FIM DO DROPDOWN-->
     <!--MODAL 3 -->
     <button style="width:auto;" onclick="window.location.href='../LOJA%20ATUALIZADA%2022-06/Loja/'">Loja</button>
     <button onclick="document.getElementById('id03').style.display='block'" style="width:auto;<?php if ($_SESSION['type'] == 'A'){echo 'visibility:hidden;display:none;';}   ?>" >Fale Conosco</button>
     <button onclick="document.getElementById('id04').style.display='block'" style="width:auto;<?php if ($_SESSION['type'] != 'A'){echo 'visibility:hidden;display:none;';}   ?>" >Mensagens</button>
     
      
<div id="id01" class="modal">
  <form class="modal-content animate" action="edita-perfil.php" enctype="multipart/form-data" method="POST">
    
    <div class="imgcontainerperfil">
        <img src="img/pode%20ser.jpg" class="capa">
        
    <span onclick="document.getElementById('id01').style.display='none'" class="closeperfil" title="Close Modal">&times;</span>
    </div>
     <figure class="fotolegenda">
     
      <div class="imgthumb">
      
      <img src="<?php if(empty($_SESSION['img'])){echo 'img/aa.jpg';}else{echo "$_SESSION[IMG]";}?>"class="imguser">
      <div class="updatebox">
      <h4 class="update">Alterar Imagem</h4>
      </div>
      </div>
      <h3 class="nomeusuario"><?php  echo $_SESSION['nome'].' '.$_SESSION['sobrenome']; ?></h3>
      
    </figure>
      
    <div class="container">
    
        
    <input type="hidden" value="<?php $_SESSION['id']; ?>"> 
    
    </div>
  </form>
</div>
<div id="id02" class="modal">
  
  <form class="modal-content animate" action="edita-usuario.php" method="POST">
   
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo_preto.png" width="250px" height="auto;" alt="Avatar" >
    </div>
      <h1>Edite suas informações aqui</h1>
    <div class="container">
        <input type="hidden" value="<?php $_SESSION['id']; ?>"
      <label><h1>Nome</h1></label>
      <input type="text"  value="<?php echo $_SESSION['nome']; ?>" name="nome" required>
      
      <label><h1>Sobrenome</h1></label>
      <input type="text" value="<?php echo $_SESSION['sobrenome']; ?>"  name="sobrenome" required>
      
      
      <label><h1>Nome de Usuario</h1></label>
      <input type="text" value="<?php echo $_SESSION['usuario']; ?>"  name="usuario" required>
        
      <label><h1>Email</h1></label>
      <input type="email" value="<?php echo $_SESSION['email']; ?>"  name="email" required>
      
      <label><h1>Senha</h1></label>
      <input type="password" value="<?php echo $_SESSION['senha']; ?>"  name="senha" required>
      <div class="genero">
      <label><h1>Genero</h1></label>
      <h3>Masculino</h3>
      <input type="radio" name="sexo" value="M" required>
      
      <h3>Feminino</h3>
      <input type="radio" name="sexo" value="F" required>
      </div>
      <button type="submit">Salve</button>
      
    </div>
  </form>
</div>
<!--FALE CONOSCO-->
<div id="id03" class="modal">


<!--  LOGO IMPERIAL-->
  <form class="modal-content animate" action="envia_mensagem.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo_preto.png" width="250px" height="auto;" alt="Avatar" >
    </div>

<!--IDLOGIN-->
    <input type="hidden" name="idlogin" value="<?php echo $_SESSION['id']; ?> ">

    <div class="container">
      <div class="form-group">

<!--Nome-->
  <label class="col-md-4 control-label" ><h1>Nome:</h1></label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="primeironome" value="<?php echo $_SESSION['nome']; ?>" class="form-control"  type="text" disabled>
    </div>
  </div>
<!-- SOBRENOME-->

  <label class="col-md-4 control-label" ><h1>Sobrenome:</h1></label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="ultimonome" value="<?php echo $_SESSION['sobrenome']; ?>" class="form-control"  type="text" disabled >
    </div>
  </div>

<!-- Email-->
  <label class="col-md-4 control-label"><h1>E-Mail:</h1></label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control"  type="text" disabled>
    </div>
  </div>

<!--Número-->
  <label class="col-md-4 control-label"><h1>Numero de telefone (Opcional):</h1></label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="telefone" placeholder="(12)99316-2602" class="form-control" maxlength="13" type="text" >
    </div>
  </div>
  
<!--TITULO-->

    <label  class="col-md-4 control-label"><h1>Titulo</h1></label>  
    <div class="input-group">
    <input name="titulo" placeholder="Sobre o que é esta mensagem?" class="form-control" maxlength="50" type="text" >
    </div>
    
<!-- CONTEUDO -->
    <label class="col-md-4 control-label"><h1>Digite aqui: </h1></label>
    
    <div class="input-group">
    <textarea class="form-control" name="conteudo" style="width:100%;height:200px;" maxlength="350" placeholder="Digite Aqui ... " required></textarea>
  </div>
</div>

<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" >Enviar <span class="glyphicon glyphicon-send"></span></button>
  </div>
   <div class="container" style="background-color:#f1f1f1">
      
    </div>
</div>
    </div>
  </form>
</div>
<!--MENSAGENS-->
<!--FALE CONOSCO-->
<div id="id04" class="modal">


<!--  LOGO IMPERIAL-->
  <form class="modal-content animate" action="" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo_preto.png" width="250px" height="auto;" onclick="css/css.css" alt="Avatar" >
    </div>
    <br>
    <h1 style="font-weight:400;font-weight: 400;margin-left: 20px;">Mensagens:</h1>
<nav>
   <?php
    $checagem = 1;
    //Foreach para exibir as mensagens
    foreach ($result as $row){ ?>
    <div class="item">
    	<input type="checkbox" id="<?php echo "check$checagem";  ?>">
        
		<label for="<?php echo "check$checagem";  ?>"><?php echo  $row['titulo']; ?><a href="apagar.php?idmensagem=<?php echo $row['idmensagem']; ?>"><img src="img/apagar.png" width="40px" height="40px;" alt="apagar" style="float:right;" ></a></label>
       <ul>
           <li><h3><?php echo  $row['nome'].' '.$row['sobrenome']; ?></h3><h4><?php echo $row['email'].'<br>'.$row['telefone'];?></h4></li>
           <li><h6><?php echo  $row['conteudo'];$checagem = $checagem+1; ?></h6></li>
       </ul>
    </div>
    <?php }  ?>
</nav>
<!--FIM DAS MENSAGENS-->
 </div>
</div>
  <div class="w3-display-middle">
    <center class="letrau" style="color:#fff;">Mova - se !</center>
   <hr class="w3-border-grey" style="margin:auto;width:100%;color:white;">
    <div><h1 class="letra w3-animate-top" style="color:white;">Imperial</h1>
  </div>
  
  </div>
</div>
 <script src="js/script.js"></script>
 <script src="java.js"></script>
 <script src="js/drop.js"></script>
</body>
</html>
