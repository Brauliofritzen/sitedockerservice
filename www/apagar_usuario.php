<?php
	session_start();
	include_once("conexao.php");
$id= mysqli_real_escape_string($conn, $_POST['id']);
			$result_confusu= "DELETE FROM usuario WHERE id='$id'";
				$resultado_conf = mysqli_query($conn, $result_confusu); 
					?>
<!DOCTYPE html>
<html lang="pt-br">
	<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
		
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=login.php'>
				<script type=\"text/javascript\">
					alert(\"Usuario deletado com sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=perfil.php'>
				<script type=\"text/javascript\">
					alert(\"Usuario não foi deletado com sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
