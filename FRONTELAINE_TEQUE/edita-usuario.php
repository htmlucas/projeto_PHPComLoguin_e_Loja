<?php
//Chama os dados da conexão
require 'conexao.php';
//Inicia sessão
session_start();
if (!isset($_SESSION['nome']){
    header('Location: index.php');
}
 try {
    //Conecta com o banco
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Atribui erros
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare para prevenir hackers
    $stmt = $conn->prepare("UPDATE login SET nome=:nome, sobrenome=:sobrenome, usuario=:usuario, email=:email, senha=:senha, sexo=:sexo WHERE id=$_SESSION[id]");
    $stmt->bindParam(':nome', $_POST['nome']);
    $stmt->bindParam(':sobrenome', $_POST['sobrenome']);
    $stmt->bindParam(':usuario', $_POST['usuario']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':senha', $_POST['senha']);
    $stmt->bindParam(':sexo', $_POST['sexo']);
    //Verifica se executou e cria variaveis $_SESSION
    if($stmt->execute()){
        $_SESSION['nome'] = $_POST['nome'];
        $_SESSION['sobrenome'] = $_POST['usuario'];
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['senha'] = $_POST['senha'];
        $_SESSION['sexo'] = $_POST['sexo'];
        //Redireciona para o lugar dos usuarios
        header('Location:user.php');
    }
    }
catch(PDOException $e){
    echo "Opss... Erro no servidor: " . $e->getMessage();
    }
?>
