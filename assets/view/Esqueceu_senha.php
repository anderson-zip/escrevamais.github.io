<?php
  session_start();
  if(isset($_SESSION['usuario'])){
    session_destroy();
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/mdb.css">
        <link rel="stylesheet" href="css/style2.css">
        <title>Escreva Mais</title>
    </head>
    <body>
    <header class="lib"> 
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
            <div class="container">
              <a class="navbar-brand" href=""><img src="../images/logo.png" style="max-width: 130px;" alt="Responsive image"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php#banner1">Início<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="index.php#Quem_sou">Quem sou</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="index.php#planos">Planos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="index.php#contato">Contato</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Entrar</a>
                  </li>
                  <?php 
                  if(isset($_SESSION['usuario'])){ ?>
                    <li class="nav-item">
                      <a class="nav-link" href="perfil.php">Perfil</a>
                    </li>
                 <?php } ?> 
                </ul>
              </div> 
            </div>     
          </nav>
        </div> 
      </header>
        <section > 
        <script type="text/javascript" >
                        function recup(){ 
                         var email_recup = $("input[name=email_recup]").val();
                         $.ajaxSetup({
                           beforeSend: function() {
                              $('#resultado2').html("<img width='100' src='../images/carregando.gif' />");
                            }
                         });
                         if(email_recup != ''){
                            
                            $.post("../controller/Mudanca_de_email.php",{email_recup: email_recup},function(data){
                              $("#resultado2").html(data);
                              limparInput();
                          });
                          return false;
                         
                        }
                      }
                      function limparInput(){
                          $("#form_login :input").each(function() {
                            $(this).val('');
                           
                          });
                        }
            </script>
            <div class="container login-container" >
                <div class="row  justify-content-center">
                
                    <div class="col-md-6 login-form-1">
                      <div class="row justify-content-center">
                      <div id="resultado2"></div>
                      <img width="100" src="../images/cara.png">
                      </div>
                        <h3>Recuperar senha</h3>
                        <form onsubmit="return recup()" id="form_login" method="POST"  style="padding-top: 10px !important;" class="needs-validation" novalidate>
                            <label>Informe o e-mail cadastrado!</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bor"><img width="20" src="../images/interface.png"></div>
                                  </div>
                                <input type="email" name="email_recup" class="form-control bor" placeholder="exemplo@exemplo.com" required/>
                                <div class="invalid-feedback">
                                  Por favor, Informe um e-mail válido!
                                </div>
                                <div class="valid-feedback"> 
                                  Tudo Certo!
                                </div>
                            </div>                           
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btnSubmit" >Recuperar</button>
                            </div>
                            
                        </form>
                    </div>
                  
                </div>
            </div> 
            <script>
              // Example starter JavaScript for disabling form submissions if there are invalid fields
              (function() {
                'use strict';
                window.addEventListener('load', function() {
                  // Fetch all the forms we want to apply custom Bootstrap validation styles to
                  var forms = document.getElementsByClassName('needs-validation');
                  // Loop over them and prevent submission
                  var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                      if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                      }
                      form.classList.add('was-validated');
                    }, false);
                  });
                }, false);
              })();
              </script> 
        </section>
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
            <div class="col"> 
              <label><a>Início</a></label><br>
              <label><a>Quem sou</a></label><br>
              <label><a>Planos</a></label><br>      
            </div>  
            <div class="col">
              <label><a>Entrar</a></label><br> 
              <label><a>Contato</a></label><br>    
            </div>  
            <div class="col-md-4">
                <label>Custa nossa página no facebook</label><a style="padding-left: 10px;"><img width="30" src="../images/facebook.png"></a><br> 
                <label style="padding-left: 27%;">Siga no instagram</label><a style="padding-left: 10px;"><img width="30" src="../images/instagramk.png"></a><br>      
            </div>  
        </div>
      </div>

    </footer>









        
        <script src="js/jquery-3.5.1.min.js"></script>
       <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    </body>
</html>
