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

    // prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE produtos SET NomeProduto=:nome,CategoriaProduto=:categoria,CorProduto=:cor,TamanhoProduto=:tamanho,PrecoProduto=:preco,DisponibilidadeProduto=:disponibilidade,QuantidadeProduto=:quantidade,DescricaoProduto=:descricao  WHERE idProdutos=:id;");
    $stmt->bindParam(':nome', $_POST['NomeProduto']);
    $stmt->bindParam(':categoria', $_POST['CategoriaProduto']);
    $stmt->bindParam(':cor', $_POST['CorProduto']);
     $stmt->bindParam(':tamanho', $_POST['TamanhoProduto']);
     $stmt->bindParam(':preco', $_POST['PrecoProduto']);
     $stmt->bindParam(':disponibilidade', $_POST['DisponibilidadeProduto']);
     $stmt->bindParam(':quantidade', $_POST['QuantidadeProduto']);
     $stmt->bindParam(':descricao', $_POST['DescricaoProduto']);
	$stmt->bindParam(':id', $_POST['idProdutos']);
    $stmt->execute();
	
    echo "Produto alterado com Sucesso!";
    }
catch(PDOException $e)
    {
    echo "Opss... Erro no servidor: " . $e->getMessage();
    }
?>
<a href="index.php">Voltar para a página inicial !</a>