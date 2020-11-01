<?php
require 'conexao.php';
require './vendor/autoload.php';
require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
session_start();
if (isset($_SESSION['nome'])){
    echo "Você já está logado, apenas edite sua senha em (seu nome)>Editar".'<br>';
    exit;
}
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
     
    //Variaveis inseridas pelo usuario 
    $Usuario =$_POST['usuario'];
    $EmailUsuario = $_POST['email'];
     
    
    //Busca pelo usuario e email no banco de dados
    $verificausuario = $conn->query("SELECT usuario, email, id, nome FROM $tabelalogin WHERE usuario = '$Usuario' and email = '$EmailUsuario'");
    //Verifica se teve retorno
    if (!$result = $verificausuario->fetchAll()){
           echo "Usuario ou email incorretos";
           exit;
    }
     
    //Seleciona os dados do usuario e define variaveis
    $update =  $result[0];
    //RANDOM PARA NOVA SENHA COM 8 DIGITOS
    $NovaSenha =rand(10000000,99999999);
    $ID = $update['id'];
    $NomeUsuario = $update['nome'];
    //USUARIO E EMAIL JA SÃO VARIAVEIS MAIS ACIMA (lINHA 18)
     
    // Prepara e insere no banco de dados
    $stmt = $conn->prepare("UPDATE $tabelalogin SET senha ='$NovaSenha' WHERE id ='$ID' ");
    $stmt->execute();
    echo "Senha alterada com sucesso";
    }
catch(PDOException $e)
    {
    echo "Opss... Erro no servidor: " . $e->getMessage();
    }


//CÓDIGO DO PHPMAILER //CÓDIGO DO PHPMAILER //CÓDIGO DO PHPMAILER //CÓDIGO DO PHPMAILER //CÓDIGO DO PHPMAILER //CÓDIGO DO PHPMAILER //CÓDIGO DO PHPMAILER //CÓDIGO DO PHPMAILER//CÓDIGO DO PHPMAILER //CÓDIGO DO PHPMAILER //CÓDIGO DO PHPMAILER //CÓDIGO DO PHPMAILER //CÓDIGO DO PHPMAILER //CÓDIGO DO PHPMAILER //CÓDIGO DO PHPMAILER //CÓDIGO DO PHPMAILER 


$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      //Escolhe o SMTP
$mail->Host = 'smtp.gmail.com';                       // Especifica servidores SMTP principais e de backup
$mail->SMTPAuth = true;                               // Ativa autenticação SMTP 
$mail->Username = 'wladimir5002@gmail.com';           // Nome de usuario SMTP
$mail->Password = 'wladimir14';                       // Senha SMTP
$mail->SMTPSecure = 'ssl';                            // Ativa a encripitação, ssl sempre é aceito
$mail->Port = 465;                                    // A porta para conexçao

$mail->setFrom('wladimir5002@gmail.com', 'Imperial'); //QUEM ENVIA
$mail->addAddress("$EmailUsuario", 'Recuperação de senha');   // Para quem envia
$mail->addAddress("wladimir5002@gmail.com", 'Este cara trocou de senha');   // Envia pra mim também

$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // envia arquivos (Nome é opcional)
$mail->isHTML(true);                                  // Deixa o email no formato html



$mail->Subject = 'Recuperacao de senha';
$mail->Body    = "<h1>MOVA-SE Imperial</h1><br><h2>Olá $NomeUsuario</h2><br><h2> Você requisitou uma nova senha em nosso site e enviamos seu email para $EmailUsuario, sua nova senha é :$NovaSenha</h2>";
$mail->AltBody = 'Esta também é uma mensagem zuada';

if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo "Mensagem enviada para $EmailUsuario";
}
