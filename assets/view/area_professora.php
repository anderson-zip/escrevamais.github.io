<?php 
require_once '../model/funcoes.php';

$funcao = new Funcoes();
$con = $funcao->Conectar();

$mes_1 = 0;
$mes_2 = 0;
$mes_3 = 0;
$mes_4 = 0;
$mes_5 = 0;
$mes_6 = 0;
$mes_7 = 0;
$mes_8 = 0;
$mes_9 = 0;
$mes_10 = 0;
$mes_11 = 0;
$mes_12 = 0;

$sql_qte_mes = "SELECT * from usuario";
$result = mysqli_query($con, $sql_qte_mes);

while($rows = mysqli_fetch_array($result)){
  $mes = $rows["mes"];
  
  $time = date('d-m-y', strtotime($mes));
 
  switch($time){
    case 1:
      $mes_1++;
    break;
    case 2:
      $mes_2++;
    break;
    case 3:
      $mes_3++;
    break;
    case 4:
      $mes_4++;
    break;
    case 5:
      $mes_5++;
    break;
    case 6:
      $mes_6++;
    break;
    case 7:
      $mes_7++;
    break;
    case 8:
      $mes_8++;
    break;
    case 9:
      $mes_9++;
    break;
    case 10:
      $mes_10++;
    break;
    case 11:
      $mes_11++;
    break;
    case 12:
      $mes_12++;
    break;
  }
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style2.css">
        <link rel="stylesheet" href="css/mdb.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
        <script src="js/script.js"></script>
        <title>Escreva Mais</title>
    </head>
    <body>
    <header class="lib">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light  p-0">
          <div class="container">
            <a class="navbar-brand" href=""><img src="../images/logo.png" style="max-width: 130px;" alt="Responsive image"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link scroll" href="index.php#banner1">Início<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link scroll" href="index.php#Quem_sou">Quem sou</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link scroll" href="index.php#planos">Planos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link scroll" href="index.php#contato">Contato</a>
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
        <section > 
            <div class="container login-container">
            
                <div class="row">
                  
                    <div class="col-md-2 login-form-1">
                    
                      <img src="../images/professora.gif" width="80" height="80" alt="..." class="img-thumbnail rounded-circle"> 
                      <h6>Josegleide</h6>
                        <!--<h3>Escreva aqui sua redação</h3>
                        <form class="form2" method="post" action="../control/proc.php">
                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-12">
                                <label>Título da redação</label>
                              <div class="form-group">
                                <input type="text" name="titulo_red" id="first_name" class="form-control input-lg" tabindex="1">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-12">
                                Corpo da Redação
                              <div class="form-group">
                                <textarea  id="teste" onkeypress="getLenght" name="texto" class="form-control" minlength="1200" rows="15" required=""></textarea>
                              </div>
                            </div>
                          </div>
                                <hr/>
                          <div class="row">
                            <div class="col-xs-6 col-md-6"><input type="submit" value="Anexar em PDF" class="btn btn-primary btn-block btn-lg btnSubmit2" tabindex="7"></div>
                            <div class="col-xs-6 col-md-6"><input type="submit" value="Enviar" class="btn btn-primary btn-block btn-lg btnSubmit" tabindex="7"></div>
                          </div>
                            
                        </form> -->

                    </div>
                    <div class="col-md-10 login-form-1 painel">
                    <h3 id="text_p">Painel de Controle</h3>
                      <div style="padding: 0px !important; float: left; width: 500px;"> 
                        <canvas id="myChart" style="position: relative; height:70vh; width:80vw"></canvas>
                      </div>
                          <script>
                          var ctx = document.getElementById('myChart').getContext('2d');
                          var myChart = new Chart(ctx, {
                              type: 'line',
                              data: {
                                  labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun','Jul','Ago','Set','Out','Nov',"Dez"],
                                  datasets: [{
                                      label: 'nº de alunos cadastrados em 2020',
                                      data: ['<?php echo $mes_1 ?>',
                                          '<?php echo $mes_2 ?>',
                                          '<?php echo $mes_3 ?>',
                                          '<?php echo $mes_4 ?>',
                                          '<?php echo $mes_5 ?>',
                                          '<?php echo $mes_6 ?>',
                                          '<?php echo $mes_7 ?>',
                                          '<?php echo $mes_8 ?>',
                                          '<?php echo $mes_9 ?>',
                                          '<?php echo $mes_10 ?>',
                                          '<?php echo $mes_11 ?>',
                                          '<?php echo $mes_12 ?>'],
                                      backgroundColor: [
                                          'rgba(255, 99, 132, 0.2)',
                                          'rgba(54, 162, 235, 0.2)',
                                          'rgba(255, 206, 86, 0.2)',
                                          'rgba(75, 192, 192, 0.2)',
                                          'rgba(153, 102, 255, 0.2)',
                                          'rgba(255, 159, 64, 0.2)',
                                          'rgba(255, 99, 132, 0.2)',
                                          'rgba(54, 162, 235, 0.2)',
                                          'rgba(255, 206, 86, 0.2)',
                                          'rgba(75, 192, 192, 0.2)',
                                          'rgba(153, 102, 255, 0.2)',
                                          'rgba(255, 159, 64, 0.2)'
                                      ],
                                      borderColor: [
                                          'rgba(255, 99, 132, 1)',
                                          'rgba(54, 162, 235, 1)',
                                          'rgba(255, 206, 86, 1)',
                                          'rgba(75, 192, 192, 1)',
                                          'rgba(153, 102, 255, 1)',
                                          'rgba(255, 159, 64, 1)',
                                          'rgba(255, 99, 132, 1)',
                                          'rgba(54, 162, 235, 1)',
                                          'rgba(255, 206, 86, 1)',
                                          'rgba(75, 192, 192, 1)',
                                          'rgba(153, 102, 255, 1)',
                                          'rgba(255, 159, 64, 1)'
                                      ],
                                      borderWidth: 1
                                  }]
                              },
                              options: {
                                  scales: {
                                      yAxes: [{
                                          ticks: {
                                              beginAtZero: true
                                          }
                                      }]
                                  }
                              }
                          });
                            </script>
                          
                      
                      
                        <div style="width: 300px; padding: 0px !important; float: right;">
                          <label style="padding-left: 70px;"> 3 Palavras mais erradas</label>
                              <canvas id="myChart2" width="300" height="200" ></canvas>
                       </div>      
                              <script>
                                var ctx = document.getElementById('myChart2').getContext('2d');
                                var myBarChart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                      datasets: [{
                                            data: [10, 20, 30],
                                            backgroundColor: ['rgba(22,30,80, 1)',
                                            'rgba(191,63,191, 1)',
                                            'rgba(211,211,58, 1)'],
                                        }],

                                        // These labels appear in the legend and in the tooltips when hovering different arcs
                                        labels: [
                                            'example',
                                            'example',
                                            'example'
                                        ]
                                            },
                                    options:{
                                          
                                      }
                                });
                              </script>
                        
                     
                    </div>
                    <div>
                      
                    </div>
                   
                </div>
                <div class="row" >
                <!-- Inicio dos cards -->  
                              
                <!--Fim dos cards  -->
                  <div class="col-md-12 login-form-1">
                  <div class="container">
        
       
        <div class="row">
          <script>
            
            
              function load_data()
                  {
                    $.ajax({
                      url:"../controller/pesquisa_aluno.php",
                      method:"POST",
                      success:function(data)
                      {
                        $('#user_data').html(data);
                      }
                    });
                    document.getElementById("filtro").style.display = "none";
                  }

                  function filtro_data(){
                    document.getElementById("filtro").style.display = "block";
                  }
              function  filtra_aluno(){
                 var campo_de_filtro = $("input[name=campo_de_filtro]").val();
                    $.ajax({
                      url:"../controller/pesquisa_aluno.php",
                      method:"POST",
                      data:{campo_de_filtro: campo_de_filtro},
                      success:function(data)
                      {
                        $('#user_data').html(data);
                      }
                    });
                    return false;
                  }
            
          </script>
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 ">
                <div class="card text-center shadow-lg p-3 mb-5 bg-white rounded" style="height: auto !important;padding: 10px !important;">
                    <a><div class="card-body" style="padding:0px !important;" onclick="load_data()">
                        <img  class="img-fluid" src="../images/aluna.png" width="120"><hr>                          
                        <h2 class="card-title display-1" style="font-size:3.0vmin; padding:0px !important;">Listar Alunos</h2>
                    </div></a>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 ">
                <div class="card text-center shadow-lg p-3 mb-5 bg-white rounded" style="height: auto !important;padding: 10px !important;">
                    <a><div class="card-body" style="padding:0px !important;">
                        <img  class="img-fluid" src="../images/pesquisa.png" width="120" onclick="filtro_data()"><hr>                           
                        <h2 class="card-title display-1" style="font-size:3.0vmin; padding:0px !important;">Filtrar Alunos</h2>
                    </div></a>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 ">
                <div class="card text-center shadow-lg p-3 mb-5 bg-white rounded" style="height: auto !important;padding: 10px !important;">
                    <a><div class="card-body" style="padding:0px !important;">
                        <img  class="img-fluid" src="../images/certificado.png" width="120" onclick="alertando()"><hr>                           
                        <h2 class="card-title display-1" style="font-size:3.0vmin; padding:0px !important;">Listar Alunos</h2>
                    </div></a>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 ">
                <div class="card text-center shadow-lg p-3 mb-5 bg-white rounded" style="height: auto !important;padding: 10px !important;">
                    <a><div class="card-body" style="padding:0px !important;">
                        <img  class="img-fluid" src="../images/ebook.png" width="120" onclick="alertando()"><hr>                           
                        <h2 class="card-title display-1" style="font-size:3.0vmin; padding:0px !important;">Listar Alunos</h2>
                    </div></a>
                </div>
            </div>

        </div>
        <div id="filtro">
          <form style="padding: 10px !important;">
        <div class="form-row align-items-center">
          <div class="col-10">
            <input type="text" name="campo_de_filtro" class="form-control" placeholder="Pesquise pelo nome do aluno">
          </div>
          <div class="col">
            <button type="submit" onsubmit="return filtra_aluno()" class="btn btn-primary p-2 btn-lg">Filtrar</button>
          </div>
        </div>
      </form>
        </div>
        <div class="table-responsive" id="user_data">

        </div>
        
    </div>
<hr>

                  </div>

            </div>
          
          
            
        </section>










        <script src="js/mdb.js"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
        <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>