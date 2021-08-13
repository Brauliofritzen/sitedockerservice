<?php
session_start();
	if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true) )
	{
		unset($_SESSION['email']);
		unset($_SESSION['senha']);
	    header('location:index.php');
    }
	 $logado = $_SESSION['email'];
	include_once("conexao.php");
	$result_usuario = "SELECT DISTINCT nome FROM usuarios WHERE email ='$logado'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
		while($row_resultado = mysqli_fetch_assoc($resultado_usuario)){
			echo "Você está logado como: " . $row_resultado['nome']. ". Seja Bem vindo! <br><br>";
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
			<title>listar dados do banco de dados</title>
	</head>
<body  bgcolor="#E0EEE0">
	<table align=center bgcolor="#EEE685">
		<tr>
			<th >
				<h> <font size="15">Fritzen WebSites</font></h>
			</th>
		</tr>
	</table>
&nbsp;
	<a href="insere_item.php">Inserir novo item</a>
		<h1><center>Lista de itens cadastrados</center></h1>
</body>
<?php
	if(isset($_SESSION['msg'])){
		echo "<p>".$_SESSION['msg']."</p>";
				unset($_SESSION['msg']);
			}
	$result_lista = "SELECT * FROM lista where email='$logado'";
	$resultado_lista = mysqli_query($conn, $result_lista);
		while($row_lista = mysqli_fetch_assoc($resultado_lista)){
			echo "Solicitande do cadastro: " . $row_lista['solic_cadastro'] . "<br>";
			echo "E-mail: " . $row_lista['email'] . "<br>";
			echo "Marca: " . $row_lista['marca'] . "<br>";
			echo "Modelo: " . $row_lista['modelo'] . "<br>";
			echo "Patrimonio: " . $row_lista['patrimonio'] . "<br>";
			echo "Numerio de serie: " . $row_lista['serie'] . "<br>";
				$datacomp=implode("/",array_reverse(explode("-",$row_lista['datacomp'])));
			echo "Data da compra: " . "$datacomp"."<br>";
				$datavenc=implode("/",array_reverse(explode("-",$row_lista['datavenc'])));
			echo "Data do vencimento da garantia: " . "$datavenc" . "<br>";
				$dataaviso=implode("/",array_reverse(explode("-",$row_lista['dataaviso'])));
			echo "Data do aviso: " . "$dataaviso" . "<br>";
			echo "<a href='editar.php?id=" . $row_lista['id'] . "'>Editar item</a><br><br>";
			echo "<a href='excluir.php?id=" . $row_lista['id'] . "'>Excluir item</a><hr>";
		}
?>
	<div align="center"><a href="usuario/usuario.php">Alterar dados do usuario/usuario</a><br><br>
	<div align="center"><a href="sair.php">Sair</a><br></div>

				
				