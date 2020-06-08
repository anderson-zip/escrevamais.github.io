<?php 

Class Usuario{


    private $nome, $sobrenome, $motivo, $cel, $email, $senha;

    function getNome(){
        return $this->nome;
    }
   function getEmail(){
       return $this->email;
   }
   function getSobrenome(){
       return $this->sobrenome;
   }
   function getMotivo(){
       return $this->motivo;
   }
   function getCel(){
       return $this->cel;
   }
   function getSenha(){
       return $this->senha;
   }

   function setNome($nom){
       $this->nome = $nom;
   }
   function setEmail($email1){
       $this->email = $email1;
   }
   function setSobrenome($sobre){
       $this->sobrenome = $sobre;
   }
   function setMotivo($mot){
       $this->motivo = $mot;
   }
   function setCel($celu){
       $this->cel = $celu;
   }
   function setSenha($senh){
       $this->senha = $senh;
   }

}