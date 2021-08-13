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

								<a class="nav-link" href="login.php">Sair</a>

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
				$idhardware= mysqli_real_escape_string($conn, $_POST['id_hardware']);
				
				$modelo = $_POST['modelo_equipamento'];
			
				$result_data= "SELECT distinct * from data_hardware WHERE recebe_id_hardware='$idhardware' GROUP BY recebe_data_hardware";

				
		        $resultado_data = mysqli_query($conn, $result_data);
		    
			
			
		        	 
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
				<h1 align="center">Ocorrência de alteração de data</h1>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table id="hardware" class="table">
						<thead>
							<tr>
								<th>Data em que foi alterado <?php echo $modelo; ?></th>
								<th>Data após da alteração</th>
								
							</tr>
						</thead>
						<tbody>
			          		<?php while($rows_data = mysqli_fetch_assoc($resultado_data)){ ?>

			          			
			          			
			          			<tr>
									<td><?php echo date('d/m/Y H:i:s',strtotime($rows_data['data_alteracao_hardware'])); ?></td>
									<td><?php echo implode('/', array_reverse(explode('-', $rows_data['recebe_data_hardware']))); ?></td>
								</tr>
								<?php } ?>
								</tbody>
								</table>
							</div>
									
									</div>
								</div>

									
		 



			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">


  
	
		
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
    $('#hardware').DataTable( {
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

