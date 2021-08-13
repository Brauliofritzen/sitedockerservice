<?php

	session_start();	

	include_once("conexao.php");
	
	
	

	$nome = mysqli_real_escape_string($conn, $_POST['nome']);

	$email = mysqli_real_escape_string($conn, $_POST['email']);

	$empresa = mysqli_real_escape_string($conn, $_POST['empresa']);
	
   $id= mysqli_real_escape_string($conn, $_POST['id']);
  
  


  $result_confusu= "UPDATE usuario SET nome='$nome', email='$email', empresa='$empresa' WHERE id='$id'";

			$resultado_conf = mysqli_query($conn, $result_confusu);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
		
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=perfil.php'>
				<script type=\"text/javascript\">
					alert(\"Usuario alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=perfil.php'>
				<script type=\"text/javascript\">
					alert(\"Usuario não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
