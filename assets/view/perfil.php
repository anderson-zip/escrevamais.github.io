<?php 
  session_start();

  require_once '../model/funcoes.php';
  $func = new Funcoes();
  $email_user = $_SESSION['usuario'];  
  $con = $func->Conectar();

  $sql_usuario = "SELECT * from usuario WHERE email = '$email_user' ";
  $result = mysqli_query($con, $sql_usuario);

  while($row = mysqli_fetch_assoc($result)){
      $nome_user = $row['nome'];
      $sobrenome_user = $row['sobrenome'];
      $motivo_user = $row['motivo'];
      $celular = $row['celular'];
      
  }


  if(isset($_GET['deslogar'])){
    session_destroy();
    header("location:  index.php");
  }
  if(!isset($_SESSION['usuario'])){
      session_destroy();
      header("location: index.php");
  }





?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link rel="stylesheet" href="css/mdb.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Escreva Mais</title>
  </head>
  <body>
    <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top p-0 shadow">
                <div class="container">
                    <a class="navbar-brand" href=""><img src="../images/logo.png" style="max-width: 130px;" alt="Responsive image"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Início<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Suporte</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                <?php echo $nome_user; ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                                    <a class="dropdown-item" href="enviarredacao.php">Enviar Redação</a>
                                    <a class="dropdown-item" href="?deslogar">Sair</a>
                                </div>

                            </li>
                        </ul>
                    </div> 
                </div>     
            </nav>
    </header>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/mdb.js"></script>
  </body>
</html>