<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Reset Senha</title>

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
			<h1>Recuperar a senha</h1>

	<form method="POST" action="envia_link.php">
		<table>
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
		</table>

						
			<input type="submit" value="Reset"><br><br>
			&nbsp;
				&nbsp;
			
		</form>
	</body>
</html>
