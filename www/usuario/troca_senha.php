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
		<title>Troca senha</title>

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
			<h1>Troca a senha</h1>
<?php
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		}

?>

	<form method="POST" action="altera_senha.php">
		<table>
			<tr>
				<td align="center">
			<label>E-mail: </label>
				</td>
			</tr>
			<tr>
				<td>
				<input type="text" name="email" value="<?php echo $row_usuario['email']; ?>"><br><br>
				</td>
			</tr>
			<tr>
				<td align="center">
			<label>Nova senha: </label>
				</td>
			</tr>
			<tr>
				<td>
				<input type="password" name="senha" placeholder="Digite a nova senha"><br><br>
				</td>
			</tr>
			<tr>
			<td align="center">
				<label>Confirma senha: </label>
				</td>
				</tr>
				<tr>
				<td>
				<input type="password" name="confirmasenha" placeholder="Repita a senha"><br><br>
			</td>
			</tr>
		</table>
						
			<input type="submit" value="Troca a senha"><br><br>
			&nbsp;
				&nbsp;
			
		</form>
	</body>
</html>
