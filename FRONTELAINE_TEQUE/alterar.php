<?php
//Chama os dados da conexão
require 'conexao.php';
session_start();
if (!isset($_SESSION['nome']){
    header('Location: index.php');
}
 try {
     //Conexão
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Atualizar a tabela login e prepare para prevenir SqlInjector e bugs
    $stmt = $conn->prepare("UPDATE login SET nome=:nome, user=:user, email=:email, senha=:senha WHERE id=:id;");
    $stmt->bindParam(':nome', $_POST['nomeuser']);
    $stmt->bindParam(':user', $_POST['user']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':senha', $_POST['senha']);
	$stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
	
    echo "Usuário alterado com Sucesso!";
    }
catch(PDOException $e)
    {
    echo "Opss... Erro no servidor: " . $e->getMessage();
    }
?>
