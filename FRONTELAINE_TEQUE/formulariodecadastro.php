<!DOCTYPE html>
<html>
	<head>
		<title>Aula 1 - PDO - Cadastro</title>
	</head>
	<body>
		<h1>Cadastro de Usuário</h1>
		
		<form action="cadastra-usuario.php" method="POST">
			Nome: <input type="text" name="nomeuser"><br>
			User: <input type="text" name="user"><br>
			Email: <input type="text" name="email"><br>
            Senha: <input type="password" name="senha"><br>
        <input type="submit" value="Cadastrar">
		</form>
        <a href="exibe.php">Exibir Usuarios</a>
	</body>
</html>