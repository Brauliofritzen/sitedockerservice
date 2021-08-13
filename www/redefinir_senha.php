<?php
session_start();
?>
<!doctype html>

<html lang="pt-br">

	<head>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="css/bootstrap.css">

		<link rel="stylesheet" href="css/personalizado.css">

		<title>FritzenWeb</title>

	</head>

	<body>	

	

		<header>

			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">

				<div class="container">

					<a class="navbar-brand" href="index.html">FritzenWeb</a>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">

						<span class="navbar-toggler-icon"></span>

					</button>

					<div class="collapse navbar-collapse" id="navbarCollapse">

						<ul class="navbar-nav mr-auto">

							<li class="nav-item">

								<a class="nav-link" href="login.php">Login </a>

							</li>

							<li class="nav-item">

								<a class="nav-link" href="sobre_empresa.html">Itens</a>

							</li>

							<li class="nav-item">

								<a class="nav-link" href="contato.php">Contato</a>

							</li>

						</ul>

					</div>

				</div>

			</nav>

		</header>
		<br><br>
		<body>
		<div class="container">
			<div class="form-signin" style="background: #42dea4;">
			<div class="col-md-12">
			<?php

					if(isset($_SESSION['msg'])){

						echo $_SESSION['msg'];

						unset($_SESSION['msg']);

					}

				?>
			
				<h2 class="text-center">Redefinir a senha</h2>
			<div class="row">
			<div class="span12" style="text-align:center; margin: 0 auto;">
				<form method="POST" action="reset.php".php">
				
					<input type="mail" name="email" placeholder="Digite o seu e-mail" class="form-control"><br>
					
					<input type="password" name="senha" placeholder="Digite a sua senha" class="form-control"><br>
					<input type="password" name="conf_senha" placeholder="Confirme a sua senha" class="form-control"><br>
					
					<input type="submit" name="btnsenha" value="Redefinir" class="btn btn-success btn-block"><br>
				
				
						
						
					</div>
					</div>
					</div>
					</div>
					</div>
					
					
					
				</form>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

		<script src="js/bootstrap.min.js"></script>

  </body>

</html>