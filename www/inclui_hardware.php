<?php

	session_start();	

	include_once("conexao.php");
	
	
	

	$modeloequipamento = filter_input(INPUT_POST, 'modelo_equipamento', FILTER_SANITIZE_STRING);

	$marcaequipamento = filter_input(INPUT_POST, 'marca_equipamento', FILTER_SANITIZE_STRING);

	$serie = filter_input(INPUT_POST, 'serie', FILTER_SANITIZE_STRING);
	$patrimonio = filter_input(INPUT_POST, 'patrimonio', FILTER_SANITIZE_STRING);

	$datacompra = filter_input(INPUT_POST, 'data_compra', FILTER_SANITIZE_STRING);
	

	$datavencimento= filter_input(INPUT_POST, 'data_vencimento', FILTER_SANITIZE_STRING);


	$dataaviso = filter_input(INPUT_POST, 'data_aviso', FILTER_SANITIZE_STRING);


   $emailfixo = filter_input(INPUT_POST, 'email_fixo', FILTER_SANITIZE_STRING);

   $emailopcional= filter_input(INPUT_POST, 'email_opcional', FILTER_SANITIZE_STRING);
   
   $descricao= filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
  
  $result_hardware = "INSERT INTO `hardware` (modelo_equipamento, marca_equipamento, serie, patrimonio, data_compra, data_vencimento, data_aviso, email, email_opcional, descricao_equipamento) VALUES ('$modeloequipamento', '$marcaequipamento', '$serie', '$patrimonio', '$datacompra', '$datavencimento', '$dataaviso', '$emailfixo', '$emailopcional', '$descricao')";
		$resultado_hardware = mysqli_query($conn, $result_hardware);
	if(mysqli_insert_id($conn)){



			$_SESSION['msg'] = "<p style='color:green;'>Item foi cadastrado com suscesso.</p>";

		header("Location: cadastrar_hardware.php");

			}else{

			$_SESSION['msg'] = "<p style='color:red;'>Item não foi cadastrado</p>";

		header("Location: cadastrar_hardware.php");
	

	}

?>
