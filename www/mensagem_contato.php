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
                <?php
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];

      
        $to = 'contato@fritzenweb.com.br'; 
        $subject = "Contato";
        $email_body = "\n\nNome: $nome\n\nemail: $email\n\nmensagem: $mensagem";
        $headers = "From: $email\n";
        
    
        mail($to,$subject,$email_body,$headers);

            echo "A mensagem de e-mail foi enviada."
                        
            
                ?>
                    
                    
                    
             
            </div>
        </div>
    </div>



        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

        <script src="js/bootstrap.min.js"></script>

  </body>

</html>

	
    
                