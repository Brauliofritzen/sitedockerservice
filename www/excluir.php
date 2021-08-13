<?php
	session_start();
	include_once("conexao.php");
	
	
		//$cadastrador = filter_input(INPUT_POST, 'cadastrador', FILTER_SANITIZE_STRING);
		//$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		//$marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING);
		//$modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);
		//$serie = filter_input(INPUT_POST, 'serie', FILTER_SANITIZE_STRING);
		//$patrimonio = filter_input(INPUT_POST, 'patrimonio', FILTER_SANITIZE_STRING);
		//$datacomp= filter_input(INPUT_POST, 'datacomp', FILTER_SANITIZE_STRING);
		//$datacomp=implode("-",array_reverse(explode("/",$datacomp)));
		//$datavenc = filter_input(INPUT_POST, 'datavenc', FILTER_SANITIZE_STRING);
		//$datavenc=implode("-",array_reverse(explode("/",$datavenc)));
	//$dataaviso = filter_input(INPUT_POST, 'dataaviso', FILTER_SANITIZE_STRING);
		//$dataaviso= implode("-",array_reverse(explode("/",$dataaviso)));
		$id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
		
		
		//echo "Nome: $cadastrador <br>";
		//echo "E-mail: $email <br>";
	   // echo "Marca: $marca <br>";
		//echo "Modelo: $modelo<br>";
		//echo "Serie: $serie <br>";
		//echo "Patrimonio: $patrimonio <br>";
		//echo "Data da Compra: $datacomp <br>";
		//echo "Data do vencimento: $datavenc <br>";
		//echo "Data do aviso: $dataaviso <br>";
		//echo "Id: $id <br>";
		
			$result_lista= "DELETE FROM lista WHERE id='$id'";
				
				$resultado_lista = mysqli_query($conn, $result_lista); 
					if ($resultado_lista !=0){
						$_SESSION['msg'] = "<span style='color:green;'> Item excluído com sucesso</span>";
							header("Location: itens.php");

}else{
$_SESSION['msg'] = "<span style='color:red;'> item não foi excluído com sucesso</span>";

	header("Location: editar.php");

}

?>