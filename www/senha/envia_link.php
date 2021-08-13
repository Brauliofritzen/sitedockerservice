<?php
		session_start();	
	?>

	<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Reset Senha</title>

	</head>
	<body  bgcolor="#E0EEE0">
		<table align=center bgcolor="#EEE685">
			<tr>
				<th >
				<h> <font size="15">Fritzen WebSites</font></h>
				</th>
			</tr>
		</table>
			&nbsp;
			<center>
			<h1>Recuperar a senha</h1>

	<?php
	include_once("../conexao.php");
	include_once("class.phpmailer.php");
	include_once("class.smtp.php");
				
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$result_usuario = "SELECT email FROM usuarios WHERE email = '$email'  LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
	
			if(isset ($resultado) > 0 )
				{
					$mail = new PHPMailer();
					$mail->IsSMTP();
					$mail->Host = "br734.hostgator.com.br";
					$mail->SMTPSecure = "ssl";
					$mail->Port = 465;
					$mail->SMTPAuth = true;
					$mail->Username = "alerta@fritzenweb.com.br";
					$mail->Password = "@lerta123";
					$mail->From="alerta@fritzenweb.com.br";
					$mail->FromName="Reset de senha";
					$mail->Subject = "Reset de senha";
					$mail->Body = " Senhor(a) favor clicar no link para redefinir a senha. <br> senha/troca_senha.php <br> ";
					$mail->AddAddress($resultado['email'] );
				
				if(!$mail->Send()) {

					
					echo "Verificar email incorreto ";
							return false;

								} else {

									echo "Verificar o seu email para alterar a senha ";

									return true;

								}

				

		   			}	else{

					echo "Verificar o email digidado";

		   			}		 
				?>
				

								

				
					
			
