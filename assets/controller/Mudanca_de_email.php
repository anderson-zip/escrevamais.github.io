<?php 
include '../model/funcoes.php';

$fun = new Funcoes();
$con = $fun->Conectar();


$email_r = filter_input(INPUT_POST,'email_recup', FILTER_SANITIZE_EMAIL);

if($email_r != null){

    $email = $email_r;

    $sql_code = "SELECT senha FROM usuario WHERE email = '$email'";
    $sql_query = mysqli_query($con, $sql_code);
    


    if (mysqli_num_rows($sql_query) > 0){

        $numero_de_bytes = 4;

        $restultado_bytes = random_bytes($numero_de_bytes);
        $novasenha = bin2hex($restultado_bytes);

        $imagem_nome="../images/email.png";
        $arquivo=fopen($imagem_nome,'r');
        $contents = fread($arquivo, filesize($imagem_nome));
        $encoded_attach = chunk_split(base64_encode($contents));
        fclose($arquivo);
        $limitador = "_=======". date('YmdHms'). time() . "=======_";
        
        $mailheaders = "From: rivavi3e@gmail.com\r\n";
        $mailheaders .= "MIME-version: 1.0\r\n";
        $mailheaders .= "Content-type: multipart/related; boundary=\"$limitador\"\r\n";
        $cid = date('YmdHms').'.'.time();
        
        $texto="
        <html>
        <body>
        <img src=\"cid:$cid\">
        <font size=6><br />Olá!</font> <br /> Sua nova senha é: $novasenha,<br /> Para alterar basta digitar uma nova senha em seu perfil !!<br/>
        </body>
        </html>
        ";
        
        $msg_body = "--$limitador\r\n";
        $msg_body .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $msg_body .= "$texto\r\n";
        $msg_body .= "--$limitador\r\n";
        $msg_body .= "Content-type: image/jpeg; name=\"$imagem_nome\"\r\n";
        $msg_body .= "Content-Transfer-Encoding: base64\r\n";
        $msg_body .= "Content-ID: <$cid>\r\n";
        $msg_body .= "\n$encoded_attach\r\n";
        $msg_body .= "--$limitador--\r\n";
        
        if(mail($email,"Nova Senha!",$msg_body, $mailheaders)){
            $sql_code2 = "UPDATE usuario SET senha = '$novasenha' WHERE email = '$email' ";
            if(mysqli_query($con, $sql_code2)){
                echo  "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>Eba!</strong> Sua nova senha foi criada, verifique seu e-mail e caixa de spam!.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
            }else{
                echo  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ops!</strong> Não foi possível alterar a senha no banco de dados.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
            }

        }else{
            echo  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Ops!</strong> Sua senha foi criada, mas não foi possível enviar o e-mail, entre em contato com o suporte.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
        } 


    }else{
        echo  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Ops!</strong> O e-mail informado não encontra-se cadastrado!.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
    }

}
?>