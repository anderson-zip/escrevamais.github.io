<?php
session_start();
require_once '../model/funcoes.php';

$funcao = new Funcoes();

$conexao = $funcao->Conectar();

if(!$conexao){
    echo 'ERRO ao conectar com o banco de dados';
}

$email_login = filter_input(INPUT_POST, 'email_login', FILTER_SANITIZE_EMAIL);
$senha_login = filter_input(INPUT_POST, 'senha_login', FILTER_SANITIZE_STRING);
 
$nome = filter_input(INPUT_POST, 'primeiro_nome', FILTER_SANITIZE_STRING);
$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
$motivo = filter_input(INPUT_POST, 'motivo', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'celular');

$telefone2 = preg_replace("/[^0-9]/", "", $telefone);

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$mes = date('d/m/Y');

if($email_login == null && $senha_login == null){
    $comparacao = $funcao->Cadastrar_usuario($nome, $sobrenome, $motivo, $telefone2, $email, $senha, $conexao,$mes);


    $comparado =  "<div class='alert alert-success alert-dismissible fade show' role='alert'> <strong>Bem vindo!</strong> Cadastrado com sucesso.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

    if($comparacao === $comparado){
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
        <font size=6><br />Olá $nome!</font> <br /> Bem-vindo à comunidade Escreva+Mais,<br /> Obrigado por se cadastrar em nosso site!<br/>Fique à vontade para conferir os nossos planos e serviços. 
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
        
        mail($email,"Cadastro Realizado!",$msg_body, $mailheaders); 
    }
    echo $comparacao;
}

if($email_login != null && $senha_login != null){
    $verificacao = $funcao->VerificarLogin($email_login, $senha_login, $conexao);
    echo $verificacao;
    if($verificacao === "sucesso"){
        $_SESSION['usuario']= $email_login;
        unset($_SESSION['falha_login']);
        header("location: ../view/perfil.php"); 
        exit();
    }else{
        $_SESSION['falha_login'] = true;
        header('location: ../view/login.php');
    }
}