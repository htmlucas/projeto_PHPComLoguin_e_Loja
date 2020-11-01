<?php
require 'conexao.php';
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //VERIFICACAO DE USUARIO 
    $usuario =$_POST['usuario']; 
    $verificausuario = $conn->query("SELECT usuario FROM login WHERE usuario = '$usuario'");
    $verificacao = $verificausuario->FetchAll();
    if (!empty($verificacao[0])){
        echo "Este usuario ja foi cadastrado, por favor, escolha outro nome de usuario";
        exit;
    }
    //VERIFICACAO DE EMAIL
    $email =$_POST['email']; 
    $verificaemail = $conn->query("SELECT email FROM login WHERE email = '$email'");
    $verificacaoemail = $verificaemail->FetchAll();
    if (!empty($verificacaoemail[0])){
        echo "Este email ja foi cadastrado, por favor, insira um email válido";
        exit;
    }
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO $tabelalogin (id, nome, sobrenome, usuario, email, senha, sexo,type) VALUES (NULL, :nome,:sobrenome, :usuario, :email, :senha, :sexo, :type)");
    $stmt->bindParam(':nome', $_POST['nome']);
    $stmt->bindParam(':sobrenome', $_POST['sobrenome']);
    $stmt->bindParam(':usuario', $_POST['usuario']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':senha', $_POST['senha']);
    $stmt->bindParam(':sexo', $_POST['sexo']);
    $stmt->bindParam(':type', $_POST['type']);
    $stmt->execute();
    echo $_POST['type'];
    echo "Usuário cadastrado com Sucesso!";
    header('Location: index.php');
    }
catch(PDOException $e)
    {
    echo "Opss... Erro no servidor: " . $e->getMessage();
    }
?>
