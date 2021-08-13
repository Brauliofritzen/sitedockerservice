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
				$result_lista = "SELECT * FROM software WHERE email = '$logado'";

				
		        $resultado_lista = mysqli_query($conn, $result_lista);
		    
		        	 
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
				<h1 align="center">Software cadastrado</h1>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table id="lista" class="table">
						<thead>
							<tr>
								<th>Modelo equipamento</th>
								<th>Marca do equipamento</th>
								<th>Data vencimento</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
			          		<?php while($rows_lista = mysqli_fetch_assoc($resultado_lista)){ ?>

			          			
			          			
			          			<tr>
									<td><?php echo $rows_lista['nome_software']; ?></td>
									<td><?php echo $rows_lista['marca_software']; ?></td>
								

									<td><?php echo implode('/', array_reverse(explode('-', $rows_lista['data_vencimento']))); ?></td>
									
								
								<td>
									<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#viModal" data-whatever="<?php echo $rows_lista['id_software']; ?>" data-whatevernome="<?php echo $rows_lista['nome_software']; ?>" data-whatevermarca="<?php echo $rows_lista['marca_software']; ?>"data-whateverlicenca="<?php echo $rows_lista['numero_licenca']; ?>" data-whatevercompra="<?php echo $rows_lista['data_compra']; ?>" data-whatevervencimento="<?php echo $rows_lista['data_vencimento']; ?>" data-whateveraviso="<?php echo $rows_lista['data_aviso']; ?>" data-whateveremail="<?php echo $rows_lista['email']; ?>" data-whateveropcional="<?php echo $rows_lista['email_opcional']; ?>" data-whateverdescricao="<?php echo $rows_lista['descricao']; ?>">Visualizar</button>
																			
									<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edModal" data-whatever="<?php echo $rows_lista['id_software']; ?>" data-whatevernome="<?php echo $rows_lista['nome_software']; ?>" data-whatevermarca="<?php echo $rows_lista['marca_software']; ?>"data-whateverlicenca="<?php echo $rows_lista['numero_licenca']; ?>" data-whatevercompra="<?php echo $rows_lista['data_compra']; ?>" data-whatevervencimento="<?php echo $rows_lista['data_vencimento']; ?>" data-whateveraviso="<?php echo $rows_lista['data_aviso']; ?>" data-whateveremail="<?php echo $rows_lista['email']; ?>" data-whateveropcional="<?php echo $rows_lista['email_opcional']; ?>" data-whateverdescricao="<?php echo $rows_lista['descricao']; ?>">Editar</button>
									
									<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deModal" data-whatever="<?php echo $rows_lista['id_software']; ?>" data-whatevernome="<?php echo $rows_lista['nome_software']; ?>" data-whatevermarca="<?php echo $rows_lista['marca_software']; ?>">Deletar</button>
									
									
									

									



										
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
				<form method="POST" action="data_software.php" enctype="multipart/form-data"/>
				
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Nome do software:</label>
					<input name="nome_software" type="text" class="form-control" id="nome_software"/>
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Marca do software:</label>
					<input name="marca_software" type="text" class="form-control" id="marca_software"disabled/>
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Numero da licença:</label>
					<input name="numero_licenca" type="text" class="form-control" id="numero_licenca"disabled/>
				  </div>
				   <div class="form-group">
					<label for="recipient-name" class="control-label">Data compra:</label>
					<input name="data_compra" type="date" class="form-control" id="data_compra"disabled/>
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Data vencimento:</label>
					<input name="data_vencimento" type="date" class="form-control" id="data_vencimento"disabled/>
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Data aviso:</label>
					<input name="data_aviso" type="date" class="form-control" id="data_aviso" disabled/>
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Email principal:</label>
					<input name="email" type="text" class="form-control" id="email" disabled/>
				  </div>
				  <div class="form-group">
				  
					<label for="recipient-name" class="control-label">Email opcional:</label>
					<input name="email_opcional" type="text" class="form-control" id="email_opcional" disabled/> 
				  </div>
				 <div class="form-group">
					<label for="recipient-name" class="control-label">Descrição do software:</label>
					<input name="descricao" type="text" class="form-control" id="descricao"disabled/>
				  </div>
				<input name="id_software" type="hidden" class="form-control" id="id_software" value="">
				
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-secondary">Datas alteradas</button>
			
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
				<form method="POST" action="atualiza_software.php" enctype="multipart/form-data">
				
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Nome do software:</label>
					<input name="nome_software" type="text" class="form-control" id="nome_software">
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Marca do software:</label>
					<input name="marca_software" type="text" class="form-control" id="marca_software">
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Numero da licenca:</label>
					<input name="numero_licenca" type="text" class="form-control" id="numero_licenca">
				  </div>
				   <div class="form-group">
					<label for="recipient-name" class="control-label">Data compra:</label>
					<input name="data_compra" type="date" class="form-control" id="data_compra">
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Data vencimento:</label>
					<input name="data_vencimento" type="date" class="form-control" id="data_vencimento">
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Data aviso:</label>
					<input name="data_aviso" type="date" class="form-control" id="data_aviso">
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Email principal:</label>
					<input name="email" type="text" class="form-control" id="email">
				  </div>
				  <div class="form-group">
				  
					<label for="recipient-name" class="control-label">Email opcional:</label>
					<input name="email_opcional" type="text" class="form-control" id="email_opcional" > 
				  </div>
				 <div class="form-group">
					<label for="recipient-name" class="control-label">Descrição do software:</label>
					<input name="descricao" type="text" class="form-control" id="descricao">
				  </div>
				<input name="id_software" type="hidden" class="form-control" id="id_software" value="">
				
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
				<form method="POST" action="apagar_software.php" enctype="multipart/form-data">
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Nome do software:</label>
					<input name="nome_software" type="text" class="form-control" id="nome_software">
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Marca do software:</label>
					<input name="marca_software" type="text" class="form-control" id="marca_software">
				  </div>
				  <input name="id_software" type="hidden" class="form-control" id="id_software" value="">
				
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-danger">Deletar</button>
			 
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
		  var recipientmarca = button.data('whatevermarca')
		  var recipientlicenca = button.data('whateverlicenca')
		  var recipientcompra = button.data('whatevercompra')
		  var recipientvencimento = button.data('whatevervencimento')
		  var recipientaviso = button.data('whateveraviso')
		  var recipientemail = button.data('whateveremail')
		  var recipientopcional = button.data('whateveropcional')
		  var recipientdescricao = button.data('whateverdescricao')
		 var recipient = button.data('whatever')
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('#nome_software').val(recipientnome)
		  modal.find('#marca_software').val(recipientmarca)
		  modal.find('#numero_licenca').val(recipientlicenca)
		  modal.find('#data_compra').val(recipientcompra)
		  modal.find('#data_vencimento').val(recipientvencimento)
		  modal.find('#data_aviso').val(recipientaviso)
		  modal.find('#email').val(recipientemail)
		  modal.find('#email_opcional').val(recipientopcional)
		  modal.find('#descricao').val(recipientdescricao)
		  modal.find('#id_software').val(recipient)
		  
	
		})
		
		$('#edModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipientnome = button.data('whatevernome')
		  var recipientmarca = button.data('whatevermarca')
		  var recipientlicenca = button.data('whateverlicenca')
		  var recipientcompra = button.data('whatevercompra')
		  var recipientvencimento = button.data('whatevervencimento')
		  var recipientaviso = button.data('whateveraviso')
		  var recipientemail = button.data('whateveremail')
		  var recipientopcional = button.data('whateveropcional')
		  var recipientdescricao = button.data('whateverdescricao')
		 var recipient = button.data('whatever')
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('#nome_software').val(recipientnome)
		  modal.find('#marca_software').val(recipientmarca)
		  modal.find('#numero_licenca').val(recipientlicenca)
		  modal.find('#data_compra').val(recipientcompra)
		  modal.find('#data_vencimento').val(recipientvencimento)
		  modal.find('#data_aviso').val(recipientaviso)
		  modal.find('#email').val(recipientemail)
		  modal.find('#email_opcional').val(recipientopcional)
		  modal.find('#descricao').val(recipientdescricao)
		  modal.find('#id_software').val(recipient)
		  
	
		})
		$('#deModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipientnome = button.data('whatevernome')
		  var recipientmarca = button.data('whatevermarca')
		  
		 var recipient = button.data('whatever')
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('#nome_software').val(recipientnome)
		  modal.find('#marca_software').val(recipientmarca)
		  
		  modal.find('#id_software').val(recipient)
		  
	
		})

		
		
		
	</script>
  </body>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js|https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"></script>

  
  
<script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
  				<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
<script src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css
  "></script>

<script>

$(document).ready(function() {
    $('#lista').DataTable( {
	 language: {
"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
	 },
       responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }

    } );



  

});  
</script>
</html>

