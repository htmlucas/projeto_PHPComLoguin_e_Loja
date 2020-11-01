<?php
require 'conexao.php';
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    // forma 1
		$stmt = $conn->prepare("SELECT * FROM login WHERE id=:id;");
		$stmt->bindParam(':id', $_GET['id']);
		$stmt->execute();
		$result = $stmt->fetch();
    }
catch(PDOException $e)
    {
    echo "Opss... Erro no servidor: " . $e->getMessage();
    }
	?>
<!DOCTYPE html>
<html>
	<head>
		<title>Aula 1 - PDO - Cadastro</title>
	</head>
	<body>
		<h1>Cadastro de Usuário</h1>
		
		<form action="alterar.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $result['id']; ?>">
			Nome: <input type="text" name="nomeuser" value="<?php echo $result['nome']; ?>"><br>
			User: <input type="text" name="user" value="<?php echo $result['user']; ?>"><br>
			Email: <input type="text" name="email" value="<?php echo $result['email']; ?>"><br>
            Senha: <input type="text" name="senha" value="<?php echo $result['senha']; ?>"><br>
			<input type="submit" value="Alterar">
		</form>
	</body>
</html>