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

								<a class="nav-link" href="login.php">Sair </a>

							</li>
							</li>
								<li class="nav-item">

								<a class="nav-link" href="index_usuario.php">Inicio</a>

							</li>
							<li class="nav-item">

							<div class="dropdown">

							<button class="btn btn-primary" type="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Itens
								 	</button>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							  <a class="dropdown-item active" href="itens_hardware.php">Hardware</a>
								<a class="dropdown-item active" href="itens_software.php">Sofware</a>
							 </div>
							 </li>

							
							<li class="nav-item">
							<div class="dropdown">
							  <button class="btn btn-primary" type="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Cadastro de itens
							  </button>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							  <a class="dropdown-item active" href="cadastrar_hardware.php">Hardware</a>
								<a class="dropdown-item active" href="cadastrar_software.php">Sofware</a>
								</li>
								</li>
								<li class="nav-item">

								<a class="nav-link" href="perfil.php">Perfil</a>

							</li>
							<li class="nav-item">

								<a class="nav-link" href="contato_cadastrado.php">Contato</a>

							</li>
								
							  </div>
</div>

						</ul>

					</div>

				</div>

			</nav>

		</header>
		<br><br>
		<body>
		<div class="container">
			<div class="form-signin" style="background: #42dea4;">
			<div class="col-md-12" style="text-align:center; margin: 0 auto;">
			<?php
			
		
				if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true) )
				{
				unset($_SESSION['email']);
				unset($_SESSION['senha']);
					header('location:login.php');
				}
					$logado = $_SESSION['email'];
						include_once("conexao.php");
					$result_usuario = "SELECT DISTINCT nome FROM usuario WHERE email ='$logado'";
					$resultado_usuario = mysqli_query($conn, $result_usuario);
						while($row_resultado = mysqli_fetch_assoc($resultado_usuario)){
							echo "Você está logado como: " . $row_resultado['nome']. ". Seja Bem vindo! <br><br>";
				}
			?>
			<?php
	if(isset($_SESSION['msg'])){
		echo "<p>".$_SESSION['msg']."</p>";
			unset($_SESSION['msg']);
			
	}
		?>
				<h2 class="text-center">Cadastro de software</h2>
		
			<div class="span12" style="text-align:center; margin: 0 auto;">
				
				<form method="POST" action="inclui_software.php">
				
					<div class="form-group row">
							  <label for="nome_software" class="col-3 col-form-label">Software</label>
							  <div class="col-9">
								<input type="text" name="nome_software" placeholder="Nome do software" class="form-control">
							  </div>
							</div>
							<div class="form-group row">
							  <label for="marca_software" class="col-3 col-form-label">Marca</label>
							  <div class="col-9">
								<input type="text" name="marca_software" placeholder="Fabricante do software" class="form-control">
							  </div>
							</div>
							<div class="form-group row">
							  <label for="numero_licenca" class="col-3 col-form-label">Licença</label>
							  <div class="col-9">
								<input type="text" name="numero_licenca" placeholder="Chave de licença" class="form-control">
							  </div>
							</div>
							<div class="form-group row">
							  <label for="data_compra" class="col-3 col-form-label">Data da compra</label>
							  <div class="col-9">
								<input type="date" name="data_compra" placeholder="Data da compra" class="form-control">
							  </div>
							</div>
							<div class="form-group row">
							  <label for="data_vencimento" class="col-3 col-form-label">Vencimento da licença</label>
							  <div class="col-9">
								<input type="date" name="data_vencimento" placeholder="Data de vencimento" class="form-control">
							  </div>
							</div>
							<div class="form-group row">
							  <label for="data_aviso" class="col-3 col-form-label">Data do aviso</label>
							  <div class="col-9">
								<input type="date" name="data_aviso" placeholder="Recebimento do aviso" class="form-control">
							  </div>
							</div>
								<div class="form-group row">
							  <label for="email_fixo" class="col-3 col-form-label">Email principal</label>
							  <div class="col-9">
								<input type="email" name="email_fixo" value="<?php echo $logado; ?>" class="form-control">
							  </div>
							</div>
							<div class="form-group row">
							  <label for="email_opcional" class="col-3 col-form-label">Email opcional</label>
							  <div class="col-9">
								<input type="email" name="email_opcional" placeholder="Email opcional" class="form-control">
							  </div>
							</div>
							<div class="form-group row">
							  <label for="descricao" class="col-3 col-form-label">Descrição do software</label>
							  <div class="col-9">
								<input type="text" name="descricao" placeholder="Breve descrição do software" class="form-control">
							  </div>
							</div>
							
					
					<input type="submit" name="btnLogin" value="Cadastrar" class="btn btn-success "><br><br>
					
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