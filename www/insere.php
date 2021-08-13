<?php
session_start();

if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true) )
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
	header('location:lindex.php');
    }

 $logado = $_SESSION['email'];
	include_once("conexao.php");
		$result_usuario = "SELECT DISTINCT nome  FROM usuarios WHERE email ='$logado'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		while($row_resultado = mysqli_fetch_assoc($resultado_usuario));			


		$usuario= "SELECT DISTINCT nome, email  FROM usuarios WHERE email ='$logado'";
		$retorno_usuario = mysqli_query($conn, $usuario);
		$row_usuario = mysqli_fetch_assoc($retorno_usuario);


	$solic_cadastro = $row_usuario['nome']; 
	$email = $row_usuario['email'];
	$marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING);
	$modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);
	$serie = filter_input(INPUT_POST, 'serie', FILTER_SANITIZE_STRING);
	$patrimonio = filter_input(INPUT_POST, 'patrimonio', FILTER_SANITIZE_STRING);
	$datacomp= filter_input(INPUT_POST, 'datacomp', FILTER_SANITIZE_STRING);
	$datacomp=implode("-",array_reverse(explode("/",$datacomp)));
	$datavenc = filter_input(INPUT_POST, 'datavenc', FILTER_SANITIZE_STRING);
	$datavenc=implode("-",array_reverse(explode("/",$datavenc)));
	$dataaviso = filter_input(INPUT_POST, 'dataaviso', FILTER_SANITIZE_STRING);
	$dataaviso= implode("-",array_reverse(explode("/",$dataaviso)));
		$result_lista = "INSERT INTO lista (`solic_cadastro`, `email`, `marca`, `modelo`, `serie`, `patrimonio`, `datacomp`, `datavenc`, `dataaviso`) VALUES ('$solic_cadastro', '$email', '$marca', '$modelo', '$serie', '$patrimonio', '$datacomp', '$datavenc', '$dataaviso')";
			$resultado_lista = mysqli_query($conn, $result_lista);
				if ($resultado_lista !=0){
			$_SESSION['msg'] = "<p style='color:green;'>Item foi cadastrado com suscesso.</p>";
		header("Location: insere_item.php");
			}else{
			$_SESSION['msg'] = "<p style='color:red;'>Item não foi cadastrado</p>";
		header("Location: insere_item.php");
	}
?>
