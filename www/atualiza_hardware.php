<?php

	session_start();	

	include_once("conexao.php");
	
	
	

	$modeloequipamento = mysqli_real_escape_string($conn, $_POST['modelo_equipamento']);

	$marcaequipamento = mysqli_real_escape_string($conn, $_POST['marca_equipamento']);

	$serie = mysqli_real_escape_string($conn, $_POST['serie']);
	$patrimonio = mysqli_real_escape_string($conn, $_POST['patrimonio']);
	$datacompra = mysqli_real_escape_string($conn, $_POST['data_compra']);
	

	$datavencimento= mysqli_real_escape_string($conn, $_POST['data_vencimento']);


	$dataaviso = mysqli_real_escape_string($conn, $_POST['data_aviso']);


   $emailfixo = mysqli_real_escape_string($conn, $_POST['email']);

   $emailopcional= mysqli_real_escape_string($conn, $_POST['email_opcional']);
   
   $descricao= mysqli_real_escape_string($conn, $_POST['descricao_equipamento']);
   $idhardware= mysqli_real_escape_string($conn, $_POST['id_hardware']);
  
  


  $result_lista= "UPDATE hardware SET modelo_equipamento='$modeloequipamento', marca_equipamento='$marcaequipamento', serie='$serie', patrimonio='$patrimonio', data_compra='$datacompra', data_vencimento='$datavencimento', data_aviso='$dataaviso', email='$emailfixo', email_opcional='$emailopcional', descricao_equipamento='$descricao' WHERE id_hardware='$idhardware'";

			$resultado_lista = mysqli_query($conn, $result_lista);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
		
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=itens_hardware.php'>
				<script type=\"text/javascript\">
					alert(\"Equipamento alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=itens_hardware.php'>
				<script type=\"text/javascript\">
					alert(\"Equipamento não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
