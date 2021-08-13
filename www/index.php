<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
			<title>Login</title>
	</head>
<body bgcolor="#E0EEE0">
	<table align=center bgcolor="#EEE685">
		<tr>
			<th >
				<h> <font size="15">Fritzen WebSites</font></h>
			</th>
		</tr>
	</table>
		<center>
		
		&nbsp;
			<center>
			<h1>Login</h1>
		
<?php
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
			unset($_SESSION['msg']);
	}
?>
<?php
	if(isset($_SESSION['msg'])){
		echo "<p>".$_SESSION['msg']."</p>";
				unset($_SESSION['msg']);
			}
?>

     <form method="POST" action="validador.php">
	 <table>
		<tr>
			<td align="center">
		<label>E-mail: </label>
			</td>
		</tr>
		<tr>
			<td>
			<input type="email" name="email" placeholder="Digite o seu e-mail"><br><br>.
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
	</table>
			<input type="submit" value="entrar" id="entrar" name="entrar"><br><br>
		&nbsp;
			<a href="cria_login.php">Cadastre-se</a><br><br>

			<a href="senha/reset_senha.php">Esqueceu a senha!</a>
		</form>
			<p> Este site foi pensado em facilitar o controle das garantias dos equipamentos de hardware e as licenças dos
			softwares de sua empresa. Por isso não se preocupe não avisamos quando o vencimento estiver próximo.
			</p>
			&nbsp;
			<p> Dúvidas ou maiores informações entre em contato pelo email</p> <a href="mailto:contato@fritzenweb.com.br">contato@fritzenweb.com.br</a>
			</p>
			
</body>
</html>
