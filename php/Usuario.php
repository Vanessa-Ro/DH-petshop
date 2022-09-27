<?php

  class Usuario {
    private $id_usuario;
    private $nome;
    private $email;
    private $senha;

    public function __construct($id_usuario, $nome, $email, $senha) {
      $this->setIdUsuario($id_usuario);
      $this->setNome($nome);
      $this->setEmail($email);
      $this->setSenha($senha);
    }

    public function getIdUsuario(){
      return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario){
      $this->id_usuario = $id_usuario;
    }

    public function getNome(){
      return $this->nome;
    }

    public function setNome($nome){
      $this->nome = $nome;
    }

    public function getEmail(){
      return $this->email;
    }

    public function setEmail($email){
      $this->email = $email;
    }

    public function getSenha(){
      return $this->senha;
    }

    public function setSenha($senha){
      $this->senha = $senha;
    }        
  }

?>