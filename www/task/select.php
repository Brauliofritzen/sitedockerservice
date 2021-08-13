<?php
	
	include_once("../conexao.php");	
	include_once("class.phpmailer.php");
	include_once("class.smtp.php");
	    date_default_timezone_set('America/Sao_Paulo');
			$date = date('Y-m-d');
			    $result_select = "SELECT * FROM lista WHERE dataaviso='$date'";
				$resultado_selecao = mysqli_query($conn, $result_select);
				$selecao = mysqli_fetch_assoc($resultado_selecao);
           if($selecao != 0) {
		       $datacomp=implode("/",array_reverse(explode("-",$selecao['datacomp'])));
			   $datavenc=implode("/",array_reverse(explode("-",$selecao['datavenc'])));
		    	$dataaviso=implode("/",array_reverse(explode("-",$selecao['dataaviso'])));
					$mail = new PHPMailer();
					$mail->IsSMTP();
					$mail->Host = "br734.hostgator.com.br";
					$mail->SMTPSecure = "ssl";
					$mail->Port = 465;
					$mail->SMTPAuth = true;
					$mail->Username = "alerta@fritzenweb.com.br";
					$mail->Password = "@lerta123";
					$mail->From="alerta@fritzenweb.com.br";
					$mail->FromName="Vencendo a data";
					$mail->Subject = " Aviso de vencimento";
					$mail->Body = " Senhor(a) ". $selecao['solic_cadastro'] ." venho por meio deste lembrar que o equipamento/software da marca " . $selecao['marca'] .", modelo " . $selecao['modelo'] .  ", com patrimonio de numero " . $selecao['patrimonio'] . " e numero de serie" . $selecao['serie'] ." comprado no dia ". $datacomp  ." que a sua garantia/licença vence no dia ". $datavenc .".";
					$mail->AddAddress($selecao['email'] );
					if(!$mail->Send()) {
						$error = 'Mail error: '.$mail->ErrorInfo; 
							return false;
								} else {
									$error = 'Mensagem enviada!';
									return true;
								}
				}else{
					echo "enviar email";
		   			}		 
?>