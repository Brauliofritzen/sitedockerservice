<?php
	session_start();
	include_once("conexao.php");
$idsoftware= mysqli_real_escape_string($conn, $_POST['id_software']);
			$result_lista= "DELETE FROM software WHERE id_software='$idsoftware'";
				$resultado_lista = mysqli_query($conn, $result_lista); 
					?>
<!DOCTYPE html>
<html lang="pt-br">
	<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
		
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=itens_software.php'>
				<script type=\"text/javascript\">
					alert(\"Equipamento deletado com sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=itens_software.php'>
				<script type=\"text/javascript\">
					alert(\"Equipamento não foi deletado com sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
