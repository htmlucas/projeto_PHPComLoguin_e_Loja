<?php
//Inicia Sessão
   session_start();
//Chama as variaveis de conexão
    require 'conexao.php';

//Verifica se veio do formulario de login
	if(isset($_POST['usuario'])){
//Define variaveis para o login
        $usuario =$_POST ['usuario']; 
        $senha=$_POST ['senha'];
//Conecta com o banco
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// Exibe erros
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $selectusuario = $conn->query("SELECT id, usuario, senha, nome, sobrenome,type, email FROM login WHERE usuario='$usuario' and senha='$senha' ");
        if (!$result = $selectusuario->fetchAll()){
            echo "Usuario ou senha inválidos";
            exit;
        }
        $login = $result[0];
		if($_POST['usuario'] == $login[usuario] && $_POST['senha'] == $login[senha]){
            $_SESSION['id'] = $login[id];
			$_SESSION['nome'] = $login[nome];
            $_SESSION['sobrenome'] = $login[sobrenome];
            $_SESSION['usuario'] = $login[usuario];
            $_SESSION['email'] = $login[email];
            $_SESSION['senha'] = $login[senha];
            $_SESSION['senha'] = $login[sexo];
            $_SESSION['type'] = $login[type];
			header('Location: user.php');
		} else{
			echo 'Usuário ou senha inválidos';
		}
	} 
?>