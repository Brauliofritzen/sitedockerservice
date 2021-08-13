<?php
session_start();
include_once("conexao.php");	
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$senha = (filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
	$confirmasenha = (filter_input(INPUT_POST, 'confirmasenha', FILTER_SANITIZE_STRING));
	if (($senha !=$confirmasenha) or  ($senha == null)) {
		$_SESSION['msg'] = "<p style='color:red;'>Senhas não conferem</p>";
		header("Location: cria_login.php");
		}
	else{
		$aprosenha=md5($senha);

		$result_usuario = "INSERT INTO usuarios (nome, email, senha, created) VALUES ('$nome', '$email', '$aprosenha' , NOW())";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: index.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: cria_login.php");
	}
	}
?>