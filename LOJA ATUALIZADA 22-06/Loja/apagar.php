<?php
session_start();
require 'conexao.php';
 if (!isset($_SESSION['type']) or $_SESSION['type']!='A'){
     echo "Você não é um administrador";
     exit;
 }
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
     
    }
catch(PDOException $e)
    {
    echo "Opss... Erro no servidor: " . $e->getMessage();
    }

// prepare sql and bind parameters
    $stmt = $conn->prepare("DELETE FROM produtos WHERE idProdutos=:id");
    $stmt->bindParam(':id', $_GET['id']);

    $stmt->execute();
?>

<a href="index.php">Voltar para a loja !</a>