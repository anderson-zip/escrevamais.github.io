<?php 

Class Funcoes{
    var $host="localhost", $user="root", $pass="", $banco="escrevamais";


    function Conectar(){
        $sql_conexao = mysqli_connect($this->host, $this->user, $this->pass);
        mysqli_select_db($sql_conexao, $this->banco); 
        if($sql_conexao){
            return $sql_conexao;
        }else{
            return false;
        }
    }

    function Verificar($email){
        
        $sql_verificar = "SELECT * from usuario WHERE email='$email'";
       $result =  mysqli_query($this->Conectar(), $sql_verificar);
        if(mysqli_num_rows($result) > 0){
            return true;
        }else{
            return false;
        }
       
            
    }

    function VerificarLogin($email,$senha,$conec){
        $sucesso = "sucesso";
        $falha = "falha";
        $sql_login = "SELECT * from usuario WHERE email='$email' AND senha='$senha'";
        $result_login = mysqli_query($conec, $sql_login);
        if(mysqli_num_rows($result_login)>0){
            return $sucesso;
        }else{
            return $falha;
        }
    }
    
    function Cadastrar_usuario($nome, $sobrenome, $motivo, $tel, $email, $senha, $con, $mes){
        $sucess = "<div class='alert alert-success alert-dismissible fade show' role='alert'> <strong>Bem vindo!</strong> Cadastrado com sucesso.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        $fail = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>ERRO!</strong> Não foi possível cadastrar no banco de dados verifique os dados informados.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
        $verificado = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Usuário já encontra-se cadastrado!</strong> Verifique os dados ou recupere a senha.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
        $ver = $this->Verificar($email);
        if( $ver == true){
            return $verificado;
        }else{
            $sql_cadastrar = "INSERT INTO usuario (nome, sobrenome, motivo, celular, email, senha, mes) VALUES ('$nome', '$sobrenome',
            '$motivo','$tel','$email','$senha','$mes')";
        
            if (mysqli_query($con, $sql_cadastrar)){
                return $sucess;
            }else{
                return $fail;
            }
            
        }    
   
    }
    
}