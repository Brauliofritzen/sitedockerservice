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
				$result_confi = "SELECT * FROM usuario WHERE email = '$logado'";

				
		        $resultado_conf = mysqli_query($conn, $result_confi);
		    
		        	 
	if(isset($_SESSION['msg'])){
		echo "<p>".$_SESSION['msg']."</p>";
			unset($_SESSION['msg']);
			
	}
		?>
			</div> 
		         </div>
		          </div>

		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1 align="center">Dados do usuário</h1>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Email</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
			          		<?php while($rows_con = mysqli_fetch_assoc($resultado_conf)){ ?>

			          			
			          			
			          			<tr>
									<td><?php echo $rows_con['nome']; ?></td>
									<td><?php echo $rows_con['email']; ?></td>
								

									
									
								
								<td>
									<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#viModal" data-whatever="<?php echo $rows_con['id']; ?>" data-whatevernome="<?php echo $rows_con['nome']; ?>"data-whateveremail="<?php echo $rows_con['email']; ?>" data-whateverempresa="<?php echo $rows_con['empresa']; ?>">Visualizar</button>
																			
									<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edModal" data-whatever="<?php echo $rows_con['id']; ?>" data-whatevernome="<?php echo $rows_con['nome']; ?>"data-whateveremail="<?php echo $rows_con['email']; ?>" data-whateverempresa="<?php echo $rows_con['empresa']; ?>">Editar</button>
									
									<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deModal" data-whatever="<?php echo $rows_con['id']; ?>" data-whatevernome="<?php echo $rows_con['nome']; ?>"data-whateveremail="<?php echo $rows_con['email']; ?>">Delete</button>
									<button type="button" class="btn btn-xs btn-secondary" data-toggle="modal" data-target="#reModal" data-whatever="<?php echo $rows_con['id']; ?>" data-whateveremail="<?php echo $rows_con['email']; ?>">Reset senha</button>
																	
								</td>
								</tr>
		<div class="modal fade" id="viModal" tabindex="-1" role="dialog" aria-labelledby="viModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="viModalLabel"></h4>
			  </div>
			  <div class="modal-body">
				
				
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Nome do usuário:</label>
					<input name="nome" type="text" class="form-control" id="nome"disabled/>
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Email:</label>
					<input name="email" type="email" class="form-control" id="email"disabled/>
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Empresa:</label>
					<input name="empresa" type="text" class="form-control" id="empresa"disabled/>
				  </div>
				 
				<input name="id" type="hidden" class="form-control" id="id" value="">
				
				<button type="button" class="btn btn-success" data-dismiss="modal">Sair</button>
				
			
				</form>
			  </div>
			  
			</div>
		  </div>
		</div>
							<?php } ?>
								</tbody>
						
								</table>
							</div> 
                     </div>
				</div>		
		 <div class="modal fade" id="edModal" tabindex="-1" role="dialog" aria-labelledby="edModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="edModalLabel"></h4>
			  </div>
			  <div class="modal-body">
				<form method="POST" action="atualiza_usuario.php" enctype="multipart/form-data">
				
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Nome do usuário:</label>
					<input name="nome" type="text" class="form-control" id="nome">
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Email:</label>
					<input name="email" type="email" class="form-control" id="email">
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Empresa:</label>
					<input name="empresa" type="text" class="form-control" id="empresa">
				  </div>
				  
				  
				<input name="id" type="hidden" class="form-control" id="id" value="">
				
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-danger">Alterar</button>
			
				</form>
			  </div>
			  
			</div>
		  </div>
		</div>

		 <div class="modal fade" id="deModal" tabindex="-1" role="dialog" aria-labelledby="deModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="edModalLabel"></h4>
			  </div>
			  <div class="modal-body">
				<form method="POST" action="apagar_usuario.php" enctype="multipart/form-data">
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Nome do usuário:</label>
					<input name="nome" type="text" class="form-control" id="nome">
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Email:</label>
					<input name="email" type="text" class="form-control" id="email">
				  </div>
				  <input name="id" type="hidden" class="form-control" id="id" value="">
				
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-danger">Deletar</button>
			 
				</form>
			  </div>
			  
			</div>
		  </div>
		</div>
			 <div class="modal fade" id="reModal" tabindex="-1" role="dialog" aria-labelledby="reModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="reModalLabel"></h4>
			  </div>
			  <div class="modal-body">
				<form method="POST" action="reset_senha.php" enctype="multipart/form-data">
					<div class="form-group">
					<label for="recipient-name" class="control-label">Email:</label>
					<input name="email" type="text" class="form-control" id="email">
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Senha:</label>
					<input name="senha" type="password" class="form-control" id="senha">
				  </div>
				   <div class="form-group">
					<label for="recipient-name" class="control-label">Confirma senha:</label>
					<input name="conf_senha" type="password" class="form-control" id="conf_senha">
				  </div>
				  <input name="id" type="hidden" class="form-control" id="id" value="">
				
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-danger">Confirmar</button>
			 
				</form>
			  </div>
			  
			</div>
		  </div>
		</div>

			 
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
	
		$('#viModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
	
		  var recipientnome = button.data('whatevernome')
		  var recipientemail = button.data('whateveremail')
		  var recipientempresa = button.data('whateverempresa')
		 var recipient = button.data('whatever')
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		
		  modal.find('#nome').val(recipientnome)
		  modal.find('#email').val(recipientemail)
		  modal.find('#empresa').val(recipientempresa)
		 
		  modal.find('#id').val(recipient)
		  
	
		})
		
		$('#edModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
	
		  var recipientnome = button.data('whatevernome')
		  var recipientemail = button.data('whateveremail')
		  var recipientempresa = button.data('whateverempresa')
		  
		 var recipient = button.data('whatever')
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		
		  modal.find('#nome').val(recipientnome)
		  modal.find('#email').val(recipientemail)
		  modal.find('#empresa').val(recipientempresa)
		 
		  modal.find('#id').val(recipient)
		  
	
		})
		$('#deModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
	
		  var recipientnome = button.data('whatevernome')
		  var recipientemail = button.data('whateveremail')
		  
		 var recipient = button.data('whatever')
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		
		  modal.find('#nome').val(recipientnome)
		  modal.find('#email').val(recipientemail)
		  
		  modal.find('#id').val(recipient)
		  
	
		})
		$('#reModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
	
		  
		 var recipientemail = button.data('whateveremail')
		 var recipient = button.data('whatever')
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		
		  modal.find('#email').val(recipientemail)
		  
		  modal.find('#id').val(recipient)
		  
	
		})

		
		
		
	</script>
  </body>
</html>

