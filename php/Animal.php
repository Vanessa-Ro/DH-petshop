<?php

  class Animal {
    private $nome;
    private $especie;
    private $idade;
    private $porte;
    private $raca;

    public function __construct($id_animal, $nome, $especie, $idade, $porte, $raca) {
      $this->setIdAnimal($id_animal);
      $this->setNome($nome);
      $this->setEspecie($especie);
      $this->setIdade($idade);
      $this->setPorte($porte);
      $this->setRaca($raca);
    }

    public function getIdAnimal(){
      return $this->id_animal;
    }

    public function setIdAnimal($id_animal){
      $this->id_animal = $id_animal;
    }

    public function getNome(){
      return $this->nome;
    }
    public function setNome($nome){
      $this->nome = $nome;
    }

    public function getEspecie(){
      return $this->especie;
    }
    public function setEspecie($especie){
      $this->especie = $especie;
    }

    public function getIdade(){
      return $this->idade;
    }
    public function setIdade($idade){
      $this->idade = $idade;
    }
    
    public function getPorte(){
      return $this->porte;
    }
    public function setPorte($porte){
      $this->porte = $porte;
    }  
    
    public function getRaca(){
      return $this->raca;
    }
    public function setRaca($raca){
      $this->raca = $raca;
    }  
  }

  $pet1 = new Animal(1, "Max", "Cachorrinho", "4", "Pequeno", "Auau");
  $pet2 = new Animal(2, "Bella", "Cachorrinha", "6", "Pequeno", "Auau");

  $pets = array($pet1, $pet2);

?>