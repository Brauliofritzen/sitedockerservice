<?php
	session_start();	
	include_once("conexao.php");	
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
		$senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
		$result_usuario = "SELECT * FROM usuario WHERE email = '$email' && senha = '$senha' LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
			if(isset ($resultado) > 0 )
				{
					$_SESSION['email'] = $email;
					$_SESSION['senha'] = $senha;
					header('location:index_usuario.php');
				}
					else{
						unset ($_SESSION['email']);
						unset ($_SESSION['senha']);
							$_SESSION['msg'] = "<p style='color:red;'>Usuario ou senha incorretos</p>";
						header('location:login.php');
				}
?>
