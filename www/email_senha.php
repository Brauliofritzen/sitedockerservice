<?php
session_start();

	include_once("conexao.php");
	 $email = $_POST['email']; 
	 

	$result_confusu = "SELECT * FROM usuario WHERE email = '$email'";
			
		        $resultado_conf = mysqli_query($conn, $result_confusu);
		   while($row_con = mysqli_fetch_assoc($resultado_conf)){
			$nome= $row_con['nome'];
			$email= $row_con['email'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
		
	</head>

	<body> <?php
if(isset ($nome) > 0 )
				{
				     
        $to = $email ; 
        $subject = "Contato";
        $email_body = "\n\nNome: $nome\n\nemail: $email\n\nmensagem: 'Segue link para reset da senha http://localhost/redefinir_senha.php'";
        $headers = "From: contato@fritzenweb.com.br\n";
        
    
        mail($to,$subject,$email_body,$headers);
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=recuperar_senha.php'>
				<script type=\"text/javascript\">
					alert(\"Email enviado com sucesso.\");
				</script>
			";	

				}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=recuperar_senha.php'>
				<script type=\"text/javascript\">
					alert(\"Email não localizado, favor conferir.\");
				</script>
			";	
		}
		?>
	</body>
</html>
