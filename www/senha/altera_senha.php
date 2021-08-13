<?php
	session_start();	
	include_once("../conexao.php");	
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
		$senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
		$confirmasenha = md5(filter_input(INPUT_POST, 'confirmasenha', FILTER_SANITIZE_STRING));
	if (($senha != $confirmasenha) or  ($senha == null)) {
		$_SESSION['msg'] = "<p style='color:red;'>Senhas não conferem</p>";
		header("Location: troca_senha.php");
		}
	else{
		$aprosenha=md5($senha);
		$result_usuario = "UPDATE usuarios SET senha = '$senha' WHERE email = '$email'";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        			if(isset ($resultado_usuario) != 0 )
				{
					
					$_SESSION['msg'] = "<span style='color:green;'> Senha alterada com sucesso!</span>";
					header('location:../index.php');
				}
					else{
						unset ($_SESSION['email']);
					
							$_SESSION['msg'] = "<p style='color:red;'>Usuario não confere</p>";
						header('location:troca_senha.php');
				}
	}
?>
