<?php
session_start();
require 'conexao.php';
 if (!isset($_SESSION['type']) or $_SESSION['type']!='A'){
     echo "Você não é um administrador";
     exit;
 }
//Envio de imagens ----------------------------------
$target_dir = "imagens/";
$nomearquivo = uniqid().basename($_FILES["nomereal"]["name"]);
$target_file = $target_dir.$nomearquivo;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["nomereal"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["nomereal"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["nomereal"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["nomereal"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

//------------------------------------------------------------------

 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO produtos (idProdutos,NomeProduto,CategoriaProduto,CorProduto ,TamanhoProduto,PrecoProduto,DisponibilidadeProduto,QuantidadeProduto,DescricaoProduto,ImagemProduto) VALUES (NULL, :nome, :categoria, :cor , :tamanho, :preco , :disponibilidade , :quantidade , :descricao, :nomereal)");
     $stmt->bindParam(':nome', $_POST['NomeProduto']);
     $stmt->bindParam(':categoria', $_POST['CategoriaNome']);
     $stmt->bindParam(':cor', $_POST['CorProduto']);
     $stmt->bindParam(':tamanho', $_POST['TamanhoProduto']);
     $stmt->bindParam(':preco', $_POST['PrecoProduto']);
     $stmt->bindParam(':disponibilidade', $_POST['DisponibilidadeProduto']);
     $stmt->bindParam(':quantidade', $_POST['QuantidadeProduto']);
     $stmt->bindParam(':descricao', $_POST['DescricaoProduto']);
     
     $stmt->bindParam(':nomereal',$nomearquivo);
     
     $stmt->execute();
    echo "Produto cadastrado com Sucesso!";
    }
catch(PDOException $e)
    {
    echo "Opss... Erro no servidor: " . $e->getMessage();
    }
?>
<html>
    <head></head>
    <body>
       <br>
        <a href="exibe.php">Clique aqui para visualizar o produto !</a>
    </body>
</html>
