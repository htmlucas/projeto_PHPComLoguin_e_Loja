<?php
session_start();
    if(isset($_SESSION['nome'])){
        header('Location: user.php');
        die();
    }
    
?>
<!DOCTYPE html>
<html>
<title>Imperial</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="css/estilo.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="css.css">
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
<body>


<!-- The overlay -->
<div id="myNav" class="overlay">

  <!-- Button to close the overlay navigation -->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <!-- Overlay contente -->
  <div class="overlay-contente">
    <div class="container">
        <div class="row">
            Nós somos
        </div>
    </div>
  </div>

</div>



<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-topleft w3-padding-large w3-xlarge" style="position:relative">
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;float:right;">Login</button>
    <button style="width:auto;" onclick="window.location.href='../LOJA%20ATUALIZADA%2022-06/Loja/'">Loja</button>
    <button onclick="document.getElementById('id03').style.display='block'" style="width:auto;">Cadastro</button>
<div id="id01" class="modal">
  
  <form class="modal-content animate" method="POST" action="verificalogin.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo_preto.png" width="250px" height="auto;" alt="Avatar" >
    </div>

    <div class="container">
      <label><h1>Usuario</h1></label>
      <input type="text" placeholder="Digite seu usuario..." name="usuario" required>

      <label><h1>Senha</h1></label>
      <input type="password" placeholder="Digite sua senha..." name="senha" required>
        
      <button type="submit">Login</button>
    
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
      <span class="psw" onclick="document.getElementById('id02').style.display='block'">Esqueceu sua senha? <a href="#">Nova senha</a></span>
    </div>
  </form>
</div>
<div id="id03" class="modal">
  
  <form class="modal-content animate" action="cadastra-usuario.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo_preto.png" width="250px" height="auto;" alt="Avatar" >
    </div>
    <div class="container">
      <label><h1>Nome</h1></label>
      <input type="text" placeholder="Digite seu usuario..." maxlength="20" name="nome" required>
      <input type="hidden" value="U" placeholder="TIPO" maxlength="20" name="type" required>
      
      <label><h1>Sobrenome</h1></label>
      <input type="text" placeholder="Digite seu usuario..." maxlength="50" name="sobrenome" required>
      
      
      <label><h1>Nome de Usuario</h1></label>
      <input type="text" placeholder="Digite seu usuario..." maxlength="12" name="usuario" required>
        
      <label><h1>Email</h1></label>
      <input type="email" placeholder="Digite seu email" name="email" maxlength="60" required>
      
      <label><h1>Senha</h1></label>
      <input type="password" placeholder="Digite sua senha" maxlength="15" name="senha" required>
      
      <div class="genero">
      <label><h1>Genero</h1></label>
      <h3>Masculino</h3>
      <input type="radio" name="sexo" value="M">
      
      <h3>Feminino</h3>
      <input type="radio" name="sexo" value="F">
      </div>
      <button type="submit">Cadastrar</button>
      
    </div>
  </form>
</div>
<div id="id02" class="modal">
  
  <form class="modal-content animate" method="POST" action="novasenha.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo_preto.png" width="250px" height="auto;" alt="Avatar" >
    </div>

    <div class="container">
      <label><h1>Usuario</h1></label>
      <input type="text" placeholder="Digite seu usuario..." name="usuario" required>

      <label><h1>Email</h1></label>
      <input type="email" placeholder="Digite seu email..." name="email" required>
        
      <button type="submit">Enviar email</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <h4 style="color:grey;">Nota: Só enviaremos o email de recuperação de senha se o email inserido for o cadastrado anteriormente.</h4>
    </div>
  </form>
</div>
 <!--Cabou fale conosco-->
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
</body>
</html>