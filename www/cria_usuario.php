<?php
session_start();
include_once("conexao.php");	
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$empresa = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
	$senha = (filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
	$confirmasenha = (filter_input(INPUT_POST, 'conf_senha', FILTER_SANITIZE_STRING));
	if (($senha !=$confirmasenha) or  ($senha == null)) {
		$_SESSION['msg'] = "<p style='color:red;'>Senhas não conferem</p>";
		header("Location: cadastrar.php");
		}
	elseif(strlen($senha) <8)	{
		$_SESSION['msg'] = "<p style='color:red;'>Senha com no minimo 8 caracteres</p>";
		header("Location: cadastrar.php");
		}
	else{
		$aprosenha=md5($senha);

		$result_usuario = "INSERT INTO usuario (nome, email, empresa, senha) VALUES ('$nome', '$email', '$empresa', '$aprosenha' )";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: login.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: cadastrar.php");
	}
	}
?>