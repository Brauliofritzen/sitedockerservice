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
				$result_usuario ="SELECT COUNT(*) AS HM FROM hardware WHERE DATEDIFF (now(), data_vencimento)>90 AND email= '$logado'";
					$resultado_usuario = mysqli_query($conn, $result_usuario);
						while($row_resultado = mysqli_fetch_assoc($resultado_usuario)){
							$hm= $row_resultado ['HM'] ;
				}
				$result_usuario ="SELECT COUNT(*) AS SM FROM software WHERE DATEDIFF (now(), data_vencimento)>90 AND email= '$logado'";
					$resultado_usuario = mysqli_query($conn, $result_usuario);
						while($row_resultado = mysqli_fetch_assoc($resultado_usuario)){
							$sm= $row_resultado ['SM'] ;
						}
				$result_usuario ="SELECT COUNT(*) AS HE FROM hardware WHERE (data_vencimento BETWEEN CURDATE() -INTERVAL 90 DAY AND CURDATE()) AND email='$logado'";
					$resultado_usuario = mysqli_query($conn, $result_usuario);
						while($row_resultado = mysqli_fetch_assoc($resultado_usuario)){
							$he= $row_resultado ['HE'];
						}
				$result_usuario ="SELECT COUNT(*) AS SE FROM software WHERE (data_vencimento BETWEEN CURDATE() -INTERVAL 90 DAY AND CURDATE()) AND email='$logado'";
					$resultado_usuario = mysqli_query($conn, $result_usuario);
						while($row_resultado = mysqli_fetch_assoc($resultado_usuario)){
							$se= $row_resultado ['SE'] ;
						}
				$result_usuario ="SELECT COUNT(*) AS HB FROM hardware WHERE (data_vencimento BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 90 DAY )) AND email='$logado' ";
					$resultado_usuario = mysqli_query($conn, $result_usuario);
						while($row_resultado = mysqli_fetch_assoc($resultado_usuario)){
							$hb= $row_resultado ['HB'] ;
						}
				$result_usuario ="SELECT COUNT(*) AS SB FROM software WHERE (data_vencimento BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 90 DAY )) AND email='$logado' ";
					$resultado_usuario = mysqli_query($conn, $result_usuario);
						while($row_resultado = mysqli_fetch_assoc($resultado_usuario)){
							$sb= $row_resultado ['SB'] ;
						}
				$result_usuario ="SELECT COUNT(*) AS HA FROM hardware WHERE DATEDIFF (data_vencimento, now())>90 AND email= '$logado'";
					$resultado_usuario = mysqli_query($conn, $result_usuario);
						while($row_resultado = mysqli_fetch_assoc($resultado_usuario)){
							$ha= $row_resultado ['HA'] ;
						}
				$result_usuario ="SELECT COUNT(*) AS SA FROM software WHERE DATEDIFF (data_vencimento, now())>90 AND email= '$logado'";
					$resultado_usuario = mysqli_query($conn, $result_usuario);
						while($row_resultado = mysqli_fetch_assoc($resultado_usuario)){
							$sa= $row_resultado ['SA'] ;
						}
			?>
			
				<h2 class="text-center">Abaixo um resumo dos equipamentos e softwares cadastrados.<br><br></h2>
			<div class="row">
			<div class="span12" style="text-align:center; margin: 0 auto;">
				
						
						
					</div>
					</div>
					</div>
					</div>
					</div>
					<div id="grafico" align= "center" style="width: 1400px; "></div>
	
					
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

		<script src="js/bootstrap.min.js"></script>
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
         <script type="text/javascript">
      google.charts.load('current', {packages:['corechart']});
      google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Estado');
          data.addColumn('number', 'Hardware');
          data.addColumn('number', 'Software');
          data.addRows([


         
          ['Vencido + 3 meses', <?php echo $hm ?>, <?php echo $sm ?>],
          ['Vencido até 3 meses',<?php echo $he ?>, <?php echo $se ?>],
          ['Falta - 3 meses',<?php echo $hb ?>, <?php echo $sb ?>],		
          ['Em garantia + 3 meses',  <?php echo $ha ?>, <?php echo $sa ?>]
         
        ]);

          var options = {
           title: 'Resumo do estado das datas de vencimento',
           width7: 200,
           height: 500,
           colors:['#004411','#33b679'],
           bar: {groupWidth: '40%'},

        
          
        


         };

         var chart = new google.visualization.ColumnChart(document.getElementById('grafico'));
         chart.draw(data, options);

        
      };
    </script>

  </body>

</html>
