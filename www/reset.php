<?php
	session_start();	
	include_once("conexao.php");	
	$id= mysqli_real_escape_string($conn, $_POST['id']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$senha= mysqli_real_escape_string($conn, $_POST['senha']);
	$confsenha= mysqli_real_escape_string($conn, $_POST['conf_senha']);

	if (($senha !=$confsenha) or  ($senha == null)) {
		$_SESSION['msg'] = "<p style='color:red;'>Senhas não conferem</p>";
		header("Location: redefinir_senha.php");
		}
	elseif(strlen($senha) <8)	{
		$_SESSION['msg'] = "<p style='color:red;'>Senha com no minimo 8 caracteres</p>";
		header("Location: login.php");
		}
	else{
		$aprosenha=md5($senha);

		$result_confusu = "UPDATE usuario set senha = '$aprosenha' WHERE email= '$email'";
		$resultado_conf = mysqli_query($conn, $result_confusu);
	if(mysqli_affected_rows($conn) != 0){
		$_SESSION['msg'] = "<p style='color:green;'>Senha alterada com sucesso</p>";
	header("Location: login.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Senha não foi alterada, verifique os dados digitados.</p>";
	header("Location: redefinir_senha.php");
	}
	}

	
?>