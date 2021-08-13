<?php
session_start();
	if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true) )
	{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
	    header('location:index.php');
    }
		$logado = $_SESSION['email'];
			include_once("../conexao.php");
		$result_usuario = "SELECT DISTINCT nome FROM usuarios WHERE email ='$logado'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
			while($row_resultado = mysqli_fetch_assoc($resultado_usuario)){
				echo "Você está logado como: " . $row_resultado['nome']. ". Seja Bem vindo! <br><br>";
	}
?>
<?php
			include_once("../conexao.php");
			$result_usuario = "SELECT * FROM usuarios where email='$logado' LIMIT 1";
			$resultado_usuario = mysqli_query($conn, $result_usuario);
			$row_usuario = mysqli_fetch_assoc($resultado_usuario)
			
		
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
			<title>Alterar dados do usuario</title>
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
			<center>
		<h1><center>Dados do usuario</center></h1>
<?php

	if(isset($_SESSION['msg'])){
		echo "<p>".$_SESSION['msg']."</p>";
				unset($_SESSION['msg']);
			}
			?>

<form method="POST" action="edicao_usuario.php">
		 <table>

			<tr>
				<td align="center">
					<label>Nome do usuario: </label>
				</td>
			</tr>
			<tr>
				<td>
						<input type="text" name="nome" value="<?php echo $row_usuario['nome']; ?>"><br><br>
				</td>
			</tr>
			<tr>
				<td align="center">
					<label>Email do usuario: </label>
				</td>
			</tr>
			<tr>
				<td>
						<input type="text" name="email" value="<?php echo $row_usuario['email']; ?>"><br><br>
				</td>
			</tr>
		</table>
		&nbsp;
			<input align="center" type="submit" value="Editar dados do usuario"><br><br>
			
			<a href="troca_senha.php">Alterar senha</a><br><br>
			<a href="../itens.php">Voltar para a pagina de itens</a><br>
	</form>
</body>
</html>