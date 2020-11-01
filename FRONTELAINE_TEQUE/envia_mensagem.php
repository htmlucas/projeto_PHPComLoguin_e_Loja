<?php
require 'conexao.php';
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // prepare sql and bind parameters
    $telefone = str_replace("(", "", $_POST['telefone']);
    $_POST['telefone'] = str_replace(")", "", $telefone);
    $stmt = $conn->prepare("INSERT INTO $tabelamensagem (idmensagem, titulo, conteudo, idlogin, telefone) VALUES (NULL, :titulo,:conteudo, :idlogin, :telefone)");
    $stmt->bindParam(':titulo', $_POST['titulo']);
    $stmt->bindParam(':conteudo', $_POST['conteudo']);
    $stmt->bindParam(':idlogin', $_POST['idlogin']);
    $stmt->bindParam(':telefone', $_POST['telefone']);
    $stmt->execute();
    echo "Mensagem enviada com sucesso";
    echo '<br>';
    echo '<a href="user.php">Voltar para pagina inicial</a>';
    }
catch(PDOException $e)
    {
    echo "Opss... Erro no servidor: " . $e->getMessage();
    }
?>
