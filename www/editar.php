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
<?php
	include_once("conexao.php");
		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
		$result_lista = "SELECT * FROM lista WHERE id='$id' LIMIT 1";
		$resultado_lista = mysqli_query($conn, $result_lista);
		$row_lista = mysqli_fetch_assoc($resultado_lista);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
			<title>Editar</title>
	</head>
		<body bgcolor="#E0EEE0">
			<table align=center bgcolor="#EEE685">
				<tr>
					<th >
						<h> <font size="15">Fritzen WebSites</font></h>
					</th>
				</tr>
			</table>
&nbsp;
	<a href="itens.php">Lista</a>
		<h1><center>Editar Item</center></h1>
<?php
	if(isset($_SESSION['msg'])){
		echo "<p>".$_SESSION['msg']."</p>";
			unset($_SESSION['msg']);
			
	}
?>
	<form method="POST" action="alteracao.php">
		 <table>

			<tr>
				<td width="20%">
					<label>Solicitante do cadastro: </label>
				</td>
				<td width="20%">
						<input type="text" name="solic_cadastro" value="<?php echo $row_lista['solic_cadastro']; ?>"disabled>
				</td>
				<td width="20%">
					<label>Email de aviso: </label>
				</td>
				<td width="20%">
						<input type="text" name="email" value="<?php echo $row_lista['email']; ?>"disabled>
				</td>
				<td width="20%">
					<label>Marca: </label>
				</td>
				<td width="20%">
						<input type="text" name="marca" value="<?php echo $row_lista['marca']; ?>"><br><br>
				</td>
			</tr>
			<tr>
				<td width="20%">
					<label>Modelo: </label>
				</td>
				<td width="20%">
						<input type="text" name="modelo" value="<?php echo $row_lista['modelo']; ?>">
				</td>
				<td width="20%">
					<label>Patrimônio: </label>
				</td>
				<td width="20%">
						<input type="int" name="patrimonio" value="<?php echo $row_lista['patrimonio']; ?>">
				</td>
				<td width="20%">
					<label>Numero de serie: </label>
				</td>
				<td width="20%">
						<input type="text" name="serie" value="<?php echo $row_lista['serie']; ?>"><br><br>
				</td>
			</tr>
			<tr>
				<td width="20%">
					<label>Data da compra: </label>
				</td>
				<td width="20%">
						<input type="date ('dd/mm/aaaa')" name="datacomp" value="<?php 
							$datacomp=implode("/",array_reverse(explode("-",$row_lista['datacomp'])));
								echo $datacomp ; ?>">
				</td>
				<td width="20%">
					<label>Vencimento da garantia: </label>
				</td>
				<td width="20%">
						<input type="date ('dd/mm/aaaa')" name="datavenc"  value="<?php 
							$datavenc=implode("/",array_reverse(explode("-",$row_lista['datavenc'])));
								echo $datavenc; ?>">
				</td>
				<td width="20%">
					<label>Data do aviso: </label>
				</td>
				<td width="20%">
						<input type="date ('dd/mm/aaaa')" name="dataaviso" value="<?php
							$dataaviso=implode("/",array_reverse(explode("-",$row_lista['dataaviso'])));
								echo $dataaviso; ?>"><br><br>
				</td>
					<INPUT TYPE="hidden" NAME="id" VALUE="<?php echo $row_lista['id']; ?>">
			</tr>
		</table>
			<div align="center"><input type="submit" value="Editar"><br><br>
	</form>
</body>
</html>