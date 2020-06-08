<?php

// NOTE: Be sure to uncomment the following line in your php.ini file.
// ;extension=php_openssl.dll

// These properties are used for optional headers (see below).
// define("CLIENT_ID", "<Client ID from Previous Response Goes Here>");
// define("CLIENT_IP", "999.999.999.999");
// define("CLIENT_LOCATION", "+90.0000000000000;long: 00.0000000000000;re:100.000000000000");

$host = 'https://api.cognitive.microsoft.com';
$path = '/bing/v7.0/spellcheck?';
$params = 'mkt=pt-br&mode=proof';

$input = $_POST['texto'];
$titulo = $_POST['titulo_red'];
$count = 0;

if(isset($_GET['texto'])){
    $input = $_GET['texto'];
}

$data = array (
    'text' => urlencode ($input)
);

// NOTE: Replace this example key with a valid subscription key.
$key = '6e8403f4d6cc41248bdd90c3fa635cd5';

// The following headers are optional, but it is recommended
// that they are treated as required. These headers will assist the service
// with returning more accurate results.
//'X-Search-Location' => CLIENT_LOCATION
//'X-MSEdge-ClientID' => CLIENT_ID
//'X-MSEdge-ClientIP' => CLIENT_IP

$headers = "Content-type: application/x-www-form-urlencoded\r\n" .
    "Ocp-Apim-Subscription-Key: $key\r\n";

// NOTE: Use the key 'http' even if you are making an HTTPS request. See:
// https://php.net/manual/en/function.stream-context-create.php
$options = array (
    'http' => array (
        'header' => $headers,
        'method' => 'POST',
        'content' => http_build_query ($data)
    )
);
$context  = stream_context_create ($options);
$result = file_get_contents ($host . $path . $params, false, $context);

if ($result === FALSE) {
    /* Handle error */
}
$Palavras_Certas = array();
$Palavras_Erradas = array();
//$json = json_encode(json_decode($result), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
$json = json_decode($result);

//echo " Palavras Acertadas: \n";
$tamanho = sizeof($json->flaggedTokens);

for($i=0; $i < $tamanho; $i++){
    $Palavras_Certas[$i] = $json->flaggedTokens[$i]->suggestions[0]->suggestion;
}

/*while($json->flaggedTokens[$i] <= $tamanho){
  
    //echo "\n{$json->flaggedTokens[$i]->suggestions[0]->suggestion},";
    $Palavras_Certas[$i] = $json->flaggedTokens[$i]->suggestions[0]->suggestion;
    $i++;
}*/

for($j=0; $j < $tamanho; $j++){
    $Palavras_Erradas[$j] = $json->flaggedTokens[$j]->token;
}


/*while($json->flaggedTokens[$i]!= null){
    //echo "\n{$json->flaggedTokens[$i]->token},";
    $Palavras_Erradas[$i] = $json->flaggedTokens[$i]->token;
    $i++;
}*/

 //var_dump($Palavras_Certas);

//echo "Palavras que estavam erradas!\n";
//echo var_dump($Palavras_Erradas);

$corpo_red = implode(",",$Palavras_Erradas);

$email_assunto = "Redação - Escreva Mais";
if($titulo != null){
    $email_conteudo = "{$titulo} \n";
    $email_conteudo .= "{$input}\n";
    $email_conteudo .= "Palavras Erradas: {$corpo_red}\n";
    
}else{
    $email_conteudo = "{$input} \n";
    $email_conteudo .= "Palavras Erradas: {$corpo_red}\n";
}
$cabecalho = "From: rivavi3e@gmail.com";

$destinatario = "andersoncamp255@gmail.com";

if(mail($destinatario,$email_assunto,$email_conteudo,$cabecalho)){
    ?> 
        <script>
            alert("Redação enviada com sucesso confira seu feedback!!");
        </script>
    <?php
}else{
    ?> 
    <script>
        alert("Infelizmente Não foi possivel enviar a redação verifique seu e-mail");
    </script>
<?php } ?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../view/css/style.css">
        <link rel="stylesheet" href="../view/css/style2.css">
        <link rel="stylesheet" href="../view/css/mdb.css">
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
                    <a class="nav-link" href="../view/index.php">Início<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Quem sou</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contato</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.html">Entrar</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="perfil.php">Perfil</a>
                  </li>
                </ul>
              </div> 
            </div>     
          </nav>
        </div> 
      </header>
        <section> 
            <div class="container login-container" >
                
                <div class="row" >
                    <div class="col-md-4 login-form-1 ">
                        <h4>Palavras Erradas</h4>
                       <div style="overflow: scroll !important; height: 400px; "> 
                        <?php
                         
                        foreach($Palavras_Erradas as $value){
                            echo $value;
                            $count= $count + 0.5;
                            
                           ?> <hr/> <?php 
                        }
                        ?>
                       </div>
                       
                    </div>
                    <div class="col-md-4 login-form-1 ">
                        <h4>Possível Correção</h4> 
                        <div style="overflow: scroll !important; height: 400px; ">
                        <?php 
                        foreach($Palavras_Certas as $value2){
                            echo $value2;
                            ?> <hr/> <?php
                        } ?>
                        </div>
                    </div>
                    <div class="col-md-4 login-form-1">
                        <h4>Pontuação retirada</h4>
                        <h3><?php 
                            if($count >= 10){
                                print "10";
                            }else{
                                echo $count;
                            }
                            
                        ?></h3>
                        <hr/>
                        <h6>*Cada erro é retirado 0,5 pontos</h6><br>
                         <?php
                                if($count >= 10){ ?>
                                    <div class="alert alert-danger" role="alert">
                                    <?php print"A quantidade de erros foi igual ou 
                       superior a nota máxima da redação :("; ?>

                                    </div>
                               <?php }  
                         
                         ?>     
                        </div>
                    </div>
                    
                </div>
                    
            </div>
          
          
            
        </section>
        <footer class="page-footer font-small special-color-dark pt-4">

        <!-- Footer Elements -->
        <div class="container">

        <!-- Social buttons -->
        <ul class="list-unstyled list-inline text-center">
            <li class="list-inline-item">
            <a class="btn-floating btn-fb mx-1" href="#">
                <i class="fab fa-facebook-f"> </i>
            </a>
            </li>
            <li class="list-inline-item">
            <a class="btn-floating btn-tw mx-1" href="#">
                <i class="fab fa-twitter"> </i>
            </a>
            </li>
            <li class="list-inline-item">
            <a class="btn-floating btn-gplus mx-1" href="#">
                <i class="fab fa-google-plus-g"> </i>
            </a>
            </li>
        </ul>
        <!-- Social buttons -->

        </div>
        <!-- Footer Elements -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
        </div>
        <!-- Copyright -->

        </footer>                           









        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../view/js/mdb.js"></script>
    </body>
</html>