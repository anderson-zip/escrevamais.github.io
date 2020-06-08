<?php
  session_start();
  if(!isset($_SESSION['usuario'])){
    session_destroy();
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
        <link rel="stylesheet" href="css/mdb.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style2.css">
        <title>Escreva Mais</title>
    </head>
    <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-0 shadow">
          <div class="container">
            <a class="navbar-brand" href="index.html"><img src="../images/logo.png" style="max-width: 130px;" class="img-fluid" alt="Responsive image"></a>
            <button class="navbar-toggler botao" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarText">
                <ul class="navbar-nav ml-auto" >
                  <li class="nav-item">
                    <a class="nav-link" href="perfil.php">Início</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Quem sou</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Planos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contato</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="perfil.php">Perfil</a>
                  </li>
                </ul>
            </div>
          </div>
        </nav>
      </header>
      <main>
        <section > 
            <div class="container login-container">
                <div class="row">
                    <div class="col-md-12 login-form-1">
                        <h3>Escreva aqui sua redação</h3>
                        <form class="form2" method="post" action="../controller/proc.php">
                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-12">
                                <label>Título da redação*</label>
                              <div class="form-group">
                                <input type="text" name="titulo_red" id="first_name" class="form-control input-lg" tabindex="1">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-12">
                                Corpo da Redação*
                              <div class="form-group">
                                <textarea  id="teste" onkeypress="getLenght" name="texto" class="form-control" minlength="1200" rows="15" required=""></textarea>
                              </div>
                            </div>
                          </div>
                          - A redação deve conter no mínimo 15 linhas.<br>
                          - O título é opcional.
                                <hr/>
                          <div class="row">
                          <div class="col-xs-6 col-md-6"><input type="submit" value="Anexar em PDF" class="btn btn-primary btn-block btn-lg btnSubmit2" tabindex="7"></div>
                            <div class="col-xs-6 col-md-6"><input type="submit" value="Enviar" class="btn btn-primary btn-block btn-lg btnSubmit" tabindex="7"></div>
                          </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </section>
      </main>
      <section>
      <footer class="page-footer font-small special-color-dark pt-4">
      <div class="container">
        <div class="row">
            <div class="col"> 
            <img src="../images/logo2.png">  
            </div>  
            <div class="col">
            <label>(71) 9 8701-6041</label><br>
            <label>Contatoescrevamais@gmail.com</label>       
            </div>
            <div class="col-md-2"> 
              <label><a>Início</a></label><br>
              <label><a>Quem sou</a></label><br>
              <label><a>Planos</a></label><br>      
            </div>  
            <div class="col">
              <label><a>Entrar</a></label><br> 
              <label><a>Contato</a></label><br>    
            </div>  
            <div class="col-md-3">
                <label>Custa nossa página no facebook</label><a style="padding-left: 10px;"><img width="30" src="../images/facebook.png"></a><br> 
                <label style="padding-left: 37%;">Siga no instagram</label><a style="padding-left: 10px;"><img width="30" src="../images/instagramk.png"></a><br>      
            </div>  
        </div>
      </div>

    </footer>
      </section>
      



        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>