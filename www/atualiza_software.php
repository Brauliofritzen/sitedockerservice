<?php

	session_start();	

	include_once("conexao.php");
	
	
	

	$nomesoftware = mysqli_real_escape_string($conn, $_POST['nome_software']);

	$marcasoftware = mysqli_real_escape_string($conn, $_POST['marca_software']);

	$numerolicenca = mysqli_real_escape_string($conn, $_POST['numero_licenca']);
	
	$datacompra = mysqli_real_escape_string($conn, $_POST['data_compra']);
	

	$datavencimento= mysqli_real_escape_string($conn, $_POST['data_vencimento']);


	$dataaviso = mysqli_real_escape_string($conn, $_POST['data_aviso']);


   $emailfixo = mysqli_real_escape_string($conn, $_POST['email']);

   $emailopcional= mysqli_real_escape_string($conn, $_POST['email_opcional']);
   
   $descricao= mysqli_real_escape_string($conn, $_POST['descricao']);
   $idsoftware= mysqli_real_escape_string($conn, $_POST['id_software']);
  
  


  $result_lista= "UPDATE software SET nome_software='$nomesoftware', marca_software='$marcasoftware', numero_licenca='$numerolicenca', data_compra='$datacompra', data_vencimento='$datavencimento', data_aviso='$dataaviso', email='$emailfixo', email_opcional='$emailopcional', descricao='$descricao' WHERE id_software='$idsoftware'";

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
					alert(\"Equipamento alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=itens_software.php'>
				<script type=\"text/javascript\">
					alert(\"Equipamento não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
