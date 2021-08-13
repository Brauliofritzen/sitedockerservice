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
		while($row_resultado = mysqli_fetch_assoc($resultado_usuario)){
			//$row_nome =  $row_resultado['nome'];
			//$row_email =  $row_resultado['email'];
			echo "Você está logado como: " .  $row_resultado['nome']. ". Seja Bem vindo! <br><br>";
			//echo "Você está logado como: " . $row_email. ". Seja Bem vindo! <br><br>";
	}
?>
<?php
	include_once("conexao.php");
		$usuario= "SELECT DISTINCT nome, email  FROM usuarios WHERE email ='$logado'";
		$retorno_usuario = mysqli_query($conn, $usuario);
		$row_usuario = mysqli_fetch_assoc($retorno_usuario);
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
			<title>Lista itens</title>
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
					<a href="itens.php">Lista</a><br><br>
						<h1><center>Insira novo Item</center></h1>
<?php
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
			unset($_SESSION['msg']);
	}
		
		
			
		
?>

		
			<form method="POST" action="insere.php">
			<table>
				<tr>
					<td width="20%">
						<label>Solicitante do cadastro: </label> 
					</td>
					
					<td width="20%">
							<input type="text" name="solic_cadastro" value="<?php echo  $row_usuario['nome']; ?>"disabled>
					</td>
					
					<td width="20%">
						<label>Email  de aviso: </label>
					</td>
					<td width="20%">
							<input type="text" name="email" value="<?php echo  $row_usuario['email'];?>"disabled>
					</td>
					
					<td width="20%">
						<label>Marca: </label>
					</td>
					<td width="20%">
							<input type="text" name="marca" placeholder="Marca do equipamento/software"><br><br>
					</td>
				</tr>
				
				<tr>
					<td width="20%">
						<label>Modelo: </label>
					</td>
					<td width="20%">
							<input type="text" name="modelo" placeholder="Modelo do equipamento/software">
					</td>
					
					<td width="20%">
						<label>Patrimônio: </label>
					</td>
					<td width="20%">
							<input type="int" name="patrimonio" placeholder="Patrimonio se tiver">
					</td>
					<td width="20%">
						<label>Numero de serie: </label>
					</td>
					<td width="20%">
							<input type="text" name="serie" placeholder="Serie do equipamento/software"><br><br>
					</td>
				</tr>
				
				<tr>
					<td width="20%">
						<label>Data da compra: </label>
					</td>
					<td width="20%">
							<input type="date ('dd/mm/aaaa')" name="datacomp" placeholder="dd/mm/aaaa">
					</td>
					<td width="20%">
						<label>Vencimento da garantia: </label>
					</td>
					<td width="20%">
							<input type="date ('dd/mm/aaaa')" name="datavenc"  placeholder="dd/mm/aaaa">
					</td>
					<td width="20%">
						<label>Data do aviso: </label>
					</td>
					<td width="20%">
							<input type="date ('dd/mm/aaaa')" name="dataaviso" placeholder="dd/mm/aaaa"><br><br>
					</td>
				</tr>
			</table>


		<div align="center"><input type="submit" value="Insere" id="entrar" name="entrar"><br><br>
		</form>
	</body>
</html>

