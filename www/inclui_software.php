<?php

	session_start();	

	include_once("conexao.php");
	
	
	

	$nomesoftware = filter_input(INPUT_POST, 'nome_software', FILTER_SANITIZE_STRING);

	$marcasoftware = filter_input(INPUT_POST, 'marca_software', FILTER_SANITIZE_STRING);

	$numerolicenca = filter_input(INPUT_POST, 'numero_licenca', FILTER_SANITIZE_STRING);

	$datacompra = filter_input(INPUT_POST, 'data_compra', FILTER_SANITIZE_STRING);
	

	$datavencimento= filter_input(INPUT_POST, 'data_vencimento', FILTER_SANITIZE_STRING);


	$dataaviso = filter_input(INPUT_POST, 'data_aviso', FILTER_SANITIZE_STRING);


   $emailfixo = filter_input(INPUT_POST, 'email_fixo', FILTER_SANITIZE_STRING);

   $emailopcional= filter_input(INPUT_POST, 'email_opcional', FILTER_SANITIZE_STRING);
   
   $descricao= filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
  

 	$result_software = "INSERT INTO `software` (nome_software, marca_software, numero_licenca, data_compra, data_vencimento, data_aviso, email, email_opcional, descricao) VALUES ('$nomesoftware', '$marcasoftware', '$numerolicenca', '$datacompra', '$datavencimento', '$dataaviso', '$emailfixo', '$emailopcional', '$descricao')";
 	$resultado_software = mysqli_query($conn, $result_software);
	if(mysqli_insert_id($conn))

				{

			$_SESSION['msg'] = "<p style='color:green;'>Item foi cadastrado com suscesso.</p>";

		header("Location: cadastrar_software.php");

			}else{

			$_SESSION['msg'] = "<p style='color:red;'>Item não foi cadastrado</p>";

		header("Location: cadastrar_software.php");
	

	}

?>