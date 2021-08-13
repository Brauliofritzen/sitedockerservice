<?php
session_start();
	if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true) )
	{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
	    header('location:index.php');
    }
		$logado = $_SESSION['email'];
			include_once("../conexao.php");
		$result_usuario = "SELECT DISTINCT nome FROM usuarios WHERE email ='$logado'LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
			while($row_resultado = mysqli_fetch_assoc($resultado_usuario)){
				
	}

	


	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	

			$result_usulista= "update usuarios, lista set usuarios.nome='$nome', lista.solic_cadastro='$nome', usuarios.email='$email', lista.email='$email' where usuarios.email='$email' and lista.email='$email'";
					$resultado_usuario_lista = mysqli_query($conn, $result_usulista);
					if ($resultado_usuario_lista !=0){
						$_SESSION['msg'] = "<span style='color:green;'> Usuario editado com sucesso</span>";
							header("Location: usuario.php");
						}else{
						$_SESSION['msg'] = "<span style='color:red;'> Usuario foi editado com sucesso</span>";
					header("Location: usuario.php");
			}

	
?>