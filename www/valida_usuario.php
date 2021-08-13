<?php 

@session_start(); // Inicializa a sessão 

if (! isset($_SESSION["login"],$_SESSION["senha"])) 
echo "<script>window.location='index.php'</script>"; 
} 

?> 