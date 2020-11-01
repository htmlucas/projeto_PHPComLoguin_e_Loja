<?php
session_start();
require 'conexao.php';
//Verifica se usuario é administrador
 if (!isset($_SESSION['type']) or $_SESSION['type']!='A'){
     echo "Você não é um administrador";
     //Sai do código
     exit;
 }
 try {
     //Conecta com o banco
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Deleta da tabela quando a id é a que vem do GET
    $stmt = $conn->prepare("DELETE FROM $tabelamensagem WHERE idmensagem=:id");
    $stmt->bindParam(':id', $_GET['idmensagem']);
    $stmt->execute();
	
	
    echo "Mensagem apagada com Sucesso!".'<br>';
    header('Location: user.php');
    }

//Salva o erro na variavel $e
catch(PDOException $e){
    echo "Opss... Erro no servidor: " . $e->getMessage();
    }

	?>

