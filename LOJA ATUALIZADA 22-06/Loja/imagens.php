<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produtos";

//Envio de imagens
$extensao = strtolower(substr($_FILES['nomereal']['name'], -4));
$nome_temporario=$_FILES["nomereal"]["tmp_name"];
$novo_nome = md5(time()) . $extensao;
copy($nome_temporario,"imagens/$novo_nome");  
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     //prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO imagens VALUES (NULL, '$novo_nome')");
    if ($stmt->execute()){
        echo '<h1>Arquivo enviado com sucesso</h1>';
    }
    else{
        echo '<h1>Falha ao enviar arquivo</h1>';
    }
    

    }
catch(PDOException $e)
    {
    echo "Erou: " . $e->getMessage();
    }
?>