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
        <link rel="stylesheet" href="../view/css/style.css">
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
            <div class="container login-container">
                <div class="row">
                    <div class="col-md-12 login-form-1">
                      <script type="text/javascript" >
                        function insert(){ 
                         var nome = $("input[name=primeiro_nome]").val();
                         var sobrenome = $("input[name=sobrenome]").val();
                        // var motivo = $("input[name=motivo]").val();
                        var select = document.getElementById("motivo");
                        var motivo = select.options[select.selectedIndex].value;
                         var cel = $("input[name=celular]").val();
                         var email = $("input[name=email").val();
                         var senha = $("input[name=senha").val();
                         $.ajaxSetup({
                           beforeSend: function() {
                              $('#resultado').html("<img width='100' src='../images/carregando.gif' />");
                            }
                         });
                         if(nome != '' && sobrenome != '' && motivo != '' && cel != '' && email != '' && senha != ''){
                            
                            $.post("../controller/autentificacao.php",{primeiro_nome: nome,sobrenome: sobrenome,motivo: motivo,celular: cel,email: email,senha: senha},function(data){
                              $("#resultado").html(data);
                              /*document.getElementById('primeiro_nome').value='';
                              document.getElementById('sobrenome').value='';
                              document.getElementById('motivo').value='';
                              document.getElementById('telefone').value='';
                              document.getElementById('email').value='';
                              document.getElementById('password').value='';
                              document.getElementById('confirme_password').value=''; */ 
                              limparInput();
                          });
                          return false;
                          /*$.ajax({

                            type: 'POST',
                            dataType: 'html',
                            url: '../control/autentificacao.php',
                            beforeSend: function(){
                              $("#resultado").html("Carregando...");
                            },
                            data: {primeiro_nome: nome,sobrenome: sobrenome,motivo: motivo,celular: cel,email: email,senha: senha},
                            success: function(msg){
                              $("#resultado").html(msg);
                            }

                          });
                            limparInput();
                            return false; */
                         }
                         
                        }
                        function mascara(telefone){ 
                          if(telefone.value.length == 0)
                              telefone.value = '(' + telefone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
                          if(telefone.value.length == 3)
                              telefone.value = telefone.value + ') '; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) o script irá inserir mais um parênteses, fechando assim o código de área.
              
                          if(telefone.value.length == 10)
                              telefone.value = telefone.value + '-'; //quando o campo já tiver 8 caracteres, o script irá inserir um tracinho, para melhor visualização do telefone.
                
                        }
                        function limparInput(){
                          $("#form_cadastrar :input").each(function() {
                            $(this).val('');
                           
                          });
                        }
                   
                       </script>
                      <div id="resultado" ></div>
                        <h3>Realizar Cadastro</h3>
                        <form onsubmit="return insert()" id="form_cadastrar" method="POST" action="../controller/autentificacao.php" class="needs-validation form2" novalidate>
                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input maxlength="100" type="text" name="primeiro_nome" id="primeiro_nome" class="form-control input-lg" placeholder="Nome*" tabindex="1" required>
                                <div class="invalid-feedback">
                                  Por favor, Informe um nome!
                                </div>
                                <div class="valid-feedback"> 
                                  Tudo Certo!
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input maxlength="100" type="text" name="sobrenome" id="sobrenome" class="form-control input-lg" placeholder="Sobrenome*" tabindex="2" required> 
                                <div class="invalid-feedback">
                                  Por favor, Informe um sobrenome!
                                </div>
                                <div class="valid-feedback"> 
                                  Tudo Certo!
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <select id="motivo" name="motivo" class="custom-select" required>
                                  <option value="">Interesse em..*</option>
                                  <option value="Vestibular">Vestibular</option>
                                  <option value="Concurso">Concurso</option>
                                  <option value="Enem">Enem</option>
                                </select>
                                <div class="invalid-feedback">
                                  Por favor, Selecione uma opção!
                                </div>
                                <div class="valid-feedback"> 
                                  Tudo Certo!
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input placeholder="Celular*" onkeypress="mascara(this)" pattern="^(\([0-9]{2}\))\s([9]{1})?([0-9]{5})-([0-9]{4})$" type="text" name="celular" id="telefone" class="form-control input-lg"  tabindex="3" required>
                                <div class="invalid-feedback">
                                  Por favor, informe seu número de celular com DDD sem o 0 Ex: (71) 9 9999-9999 !
                                </div>
                                <div class="valid-feedback"> 
                                  Tudo Certo!
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <input maxlength="200" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="email" name="email" id="email" class="form-control input-lg" placeholder="E-mail*" tabindex="4" required>
                            <div class="invalid-feedback">
                              Por favor, um e-mail válido!
                            </div>
                            <div class="valid-feedback"> 
                              Tudo Certo!
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$" type="password" name="senha" id="password" class="form-control input-lg" placeholder="Senha*" tabindex="1" required>
                                <div class="invalid-feedback">
                                  Por favor, informe sua senha! Ela deverá conter no mínimo oito caracteres e máximo de 20, com pelo menos uma letra e um número
                                </div>
                                <div class="valid-feedback"> 
                                  Tudo Certo!
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="password" name="confirme_senha" id="confirme_password" class="form-control input-lg" placeholder="Confirme senha*" tabindex="1" required>
                                <div class="invalid-feedback">
                                  Senhas diferentes! confirme corretamente
                                </div>
                                <div class="valid-feedback"> 
                                  Tudo Certo!
                                </div>
                              </div>
                            </div>
                          </div>
                                <hr/>
                          <div class="row">
                            <div class="col-xs-6 col-md-6"><a style="background-color: rgba(0, 137, 123, 1); padding: 8px !important;" href="login.php" class="btn btn-primary btn-block btn-lg btnSubmit" tabindex="7" id="btn_cadastrar">Voltar</a></div>
                            <div  class="col-xs-6 col-md-6"><button style="float: right;" type="submit" class="btnContato" tabindex="7" id="btn_cadastrar">Cadastrar</button></div>
                          </div>
                            <div id="mol">

                            </div>
                        </form>
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

                  var password = document.getElementById("password");
                  var confirm_password = document.getElementById("confirme_password");

                  let regex = /"^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"/;


                  function validatePassword(){
                    if(password.value != confirm_password.value) {
                      confirm_password.setCustomValidity("Senhas diferentes!");
                    } else {
                      confirm_password.setCustomValidity('');
                    }
                  }

                  password.onchange = validatePassword;
                  confirm_password.onkeyup = validatePassword;
                
                  
                  </script>
            </div>
          
          
            
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
       <!---- <script src="js/script.js"></script> -->
        <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
      
    </body>
</html>