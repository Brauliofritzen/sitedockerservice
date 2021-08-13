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
				$result_confusu = "SELECT * FROM usuario WHERE email = '$logado'";

				
		        $resultado_conf = mysqli_query($conn, $result_confusu);
		    
			
			
	if(isset($_SESSION['msg'])){
		echo "<p>".$_SESSION['msg']."</p>";
			unset($_SESSION['msg']);
			
	}
		?>
				<h2 class="text-center">Formulario de contado</h2>
			<div class="row">
			<div class="span12" style="text-align:center; margin: 0 auto;">

				<?php while($rows_con = mysqli_fetch_assoc($resultado_conf)){ ?>

				<form method="POST" action="mensagem_contato_cadastrado.php">

					<input type="text" name="nome" placeholder="<?php echo $rows_con['nome']; ?>" class="form-control"><br>
				
					<input type="mail" name="email" placeholder="<?php echo $rows_con['email']; ?>" class="form-control"><br>
					
					<textarea name="mensagem" placeholder="Digite sua mensagem"rows="4" cols="50"></textarea><br><br>
					
					
					<input type="submit" value="Enviar" class="btn btn-success"><br><br>
					
				
						
						
					
					
					
					
				</form>
				<?php } ?>
			</div>
		</div>
					</div>
					</div>
					</div>
					
			
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

		<script src="js/bootstrap.min.js"></script>

  </body>

</html>