<?php 
  session_start();
  if(isset($_GET['deslogar'])){
    session_destroy();
    header("location:  index.php");
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
    <script type="text/javascript">
        
jQuery(document).ready(function($){
    $(".scroll").click(function(event){
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top}, 800);
    });
});
  </script>
    <header>
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top p-0">
          <div class="container">
            <a class="navbar-brand" href=""><img src="../images/logo.png" style="max-width: 130px;" alt="Responsive image"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link scroll" href="#banner1">Início<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link scroll" href="#Quem_sou">Quem sou</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link scroll" href="#planos">Planos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link scroll" href="#contato">Contato</a>
                </li>
                <?php 
                  if(!isset($_SESSION['usuario'])) { ?>
                    <li class="nav-item">
                      <a class="nav-link" href="login.php">Entrar</a>
                    </li>
                 <?php } ?>  
                 <?php 
                  if(isset($_SESSION['usuario'])){ ?>
                    <li class="nav-item">
                      <a class="nav-link" href="perfil.php">Perfil</a>
                    </li>
                 <?php } ?> 
                 <?php 
                  if(isset($_SESSION['usuario'])){ ?>
                    <li class="nav-item">
                      <a class="nav-link" href="?deslogar">Sair</a>
                    </li>
                 <?php } ?>    
              </ul>
            </div> 
          </div>     
        </nav>
      </div> 
    </header>
    <section id="banner1" class="meio">
      <img  src="../images/Banner.png" class="img-fluid banner" alt="Responsive image">
      <label>UMA INOVADORA PLATAFORMA EDUCACIONAL DE<br>
      CORREÇÃO DE REDAÇÕES</label>
    </section>
    <main>
        <section id="Quem_sou" class="section-1"> 
            <div class="container text-start">
            <h2 style = "font-family:Zapf-Chancery !important;">Quem Sou?</h2>
            <hr><br>
                <div class="row">
                    <div  class="col-md-4">
                        <div class="pray">
                            <img width="170" src="../images/imagens-prototipo/servletrecuperafoto-1.png" alt="pray">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="panel text-left">
                            
                            <p class="pt-4">
                            Sou Josegleide Elioterio, especialista em Leitura e Produção Textual na Escola
                             pela Universidade Estadual de Santa Cruz e também em Metodologia
                              do Ensino de Língua Portuguesa e Literatura pela Faculdade
                               Internacional de Curitiba. Possui graduação em Letras pela Universidade
                                Estadual de Santa Cruz. Tem experiência na área de Letras, com
                                 ênfase em Produção de Textos; Língua Portuguesa (e suas respectivas Literaturas)
                                  e Língua Espanhola ( e suas respectivas Literaturas).
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="planos" class="section-2">
          
              <div class="container cta-100">
              
                <div class="container">
                <h2 style = "font-family:Zapf-Chancery !important;">Planos</h2>
          <hr><br>
                  <div class="row blog">
                    <div class="col-md-12">
                      <div id="blogCarousel" class="carousel slide container-blog" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                          <li data-target="#blogCarousel" data-slide-to="1"></li>
                        </ol>
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <div class="row">
                              <div class="col-md-4" >
                                <div class="item-box-blog">
                                  <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Mensal Básico</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="https://cdn.pixabay.com/photo/2017/02/08/14/25/computer-2048983_960_720.jpg"> </figure>
                                  </div>
                                  <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                      <a href="#" tabindex="0">
                                        <h5>News Title</h5>
                                      </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                      <p><i class="fa fa-user-o"></i> Admin, <i class="fa fa-comments-o"></i> Comments(3)</p>
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                      <p>Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor.</p>
                                    </div>
                                    <div class="mt"> <a href="#" tabindex="0" class="btn bg-blue-ui white read">read more</a> </div>
                                    <!--Read More Button-->
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4" >
                                <div class="item-box-blog">
                                  <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Augu 01</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="https://cdn.pixabay.com/photo/2017/02/08/14/25/computer-2048983_960_720.jpg"> </figure>
                                  </div>
                                  <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                      <a href="#" tabindex="0">
                                        <h5>News Title</h5>
                                      </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                      <p><i class="fa fa-user-o"></i> Admin, <i class="fa fa-comments-o"></i> Comments(3)</p>
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                      <p>Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor.</p>
                                    </div>
                                    <div class="mt"> <a href="#" tabindex="0" class="btn bg-blue-ui white read">read more</a> </div>
                                    <!--Read More Button-->
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4" >
                                <div class="item-box-blog">
                                  <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Augu 01</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="https://cdn.pixabay.com/photo/2017/02/08/14/25/computer-2048983_960_720.jpg"> </figure>
                                  </div>
                                  <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                      <a href="#" tabindex="0">
                                        <h5>News Title</h5>
                                      </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                      <p><i class="fa fa-user-o"></i> Admin, <i class="fa fa-comments-o"></i> Comments(3)</p>
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                      <p>Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor.</p>
                                    </div>
                                    <div class="mt"> <a href="#" tabindex="0" class="btn bg-blue-ui white read">read more</a> </div>
                                    <!--Read More Button-->
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--.row-->
                          </div>
                          <!--.item-->
                          <div class="carousel-item ">
                            <div class="row">
                              <div class="col-md-4" >
                                <div class="item-box-blog">
                                  <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Augu 01</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="https://cdn.pixabay.com/photo/2017/02/08/14/25/computer-2048983_960_720.jpg"> </figure>
                                  </div>
                                  <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                      <a href="#" tabindex="0">
                                        <h5>News Title</h5>
                                      </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                      <p><i class="fa fa-user-o"></i> Admin, <i class="fa fa-comments-o"></i> Comments(3)</p>
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                      <p>Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor.</p>
                                    </div>
                                    <div class="mt"> <a href="#" tabindex="0" class="btn bg-blue-ui white read">read more</a> </div>
                                    <!--Read More Button-->
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4" >
                                <div class="item-box-blog">
                                  <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Augu 01</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="https://cdn.pixabay.com/photo/2017/02/08/14/25/computer-2048983_960_720.jpg"> </figure>
                                  </div>
                                  <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                      <a href="#" tabindex="0">
                                        <h5>News Title</h5>
                                      </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                      <p><i class="fa fa-user-o"></i> Admin, <i class="fa fa-comments-o"></i> Comments(3)</p>
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                      <p>Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor.</p>
                                    </div>
                                    <div class="mt"> <a href="#" tabindex="0" class="btn bg-blue-ui white read">read more</a> </div>
                                    <!--Read More Button-->
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4" >
                                <div class="item-box-blog">
                                  <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Augu 01</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="https://cdn.pixabay.com/photo/2017/02/08/14/25/computer-2048983_960_720.jpg"> </figure>
                                  </div>
                                  <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                      <a href="#" tabindex="0">
                                        <h5>News Title</h5>
                                      </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                      <p><i class="fa fa-user-o"></i> Admin, <i class="fa fa-comments-o"></i> Comments(3)</p>
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                      <p>Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor.</p>
                                    </div>
                                     <div class="mt"> <a href="#" tabindex="0" class="btn bg-blue-ui white read">read more</a> </div>
                                    <!--Read More Button-->
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--.row-->
                          </div>
                          <!--.item-->
                        </div>
                        <!--.carousel-inner-->
                      </div>
                      <!--.Carousel-->
                    </div>
                  </div>
                </div>
            </div>
            <!-- fim lista de planos -->
        </section>
        
        <section id="contato" class="section-3">
            <div class="container">
            <h2 style="padding-left: 20px;font-family:Zapf-Chancery !important;">Contato</h2>
          <hr><br>
            </div>
            <!-- Default form contact -->
          <div class="row justify-content-center" >  
            <form class="border border-light p-5 col-md-9" style="margin-bottom:5%;background-color: rgba(255,255,255,0.8);border-radius:5px;" action="#!">

              <p class="h4 mb-4 text-start">TEM ALGUMA DÚVIDA?</p>

              <!-- Name -->
              <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Nome *" required>

              <!-- Email -->
              <input type="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail *" required>

              <!-- Subject -->
              <label>Assunto *</label>
              <select class="browser-default custom-select mb-4" required>
                  <option value="" >Escolha uma opção</option>
                  <option value="1" selected>Feedback</option>
                  <option value="2">Reportar uma falha</option>
              </select>

              <!-- Message -->
              <div class="form-group">
                  <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Escreva aqui a sua menssagem *" required></textarea>
              </div>
              <!-- Send button -->
              <button class="btnContato" type="submit">Enviar</button>

            </form>
          </div>
          <!-- Default form contact -->
        </section>
    </main>
    <!-- Footer -->
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
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
  </body>
</html>