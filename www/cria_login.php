<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Login</title>

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
			<h1>Cadastrar Usuário</h1>
<?php
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		}

?>
		<form method="POST" action="processa.php">
		<table>
				<tr>
					<td align="center">
			<label>Nome: </label>
			</td>
			</tr>
			<tr>
			<td>
				<input type="text" name="nome" placeholder="Digite o nome completo"><br><br>
			</td>
		</tr>
		<tr>
			<td align="center">
			<label>E-mail: </label>
			</td>
			</tr>
			<tr>
			<td>
				<input type="email" name="email" placeholder="Digite o seu e-mail"><br><br>
			</td>
			</tr>
			<tr>
			<td align="center">
			<label>Senha: </label>
			</td>
			</tr>
			<tr>
			<td>
				<input type="password" name="senha" placeholder="Digite a senha"><br><br>
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
			
			<input type="submit" value="Cadastrar"><br><br>
			&nbsp;
				&nbsp;
			<a href="index.php">Votar para página de login</a>
		</form>
	</body>
</html>
