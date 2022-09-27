<?php

  class Servico {
    private $id_servico;
    private $nome_servico;
    private $descr_servico;
    private $preco;
    
    public function __construct($id_servico, $nome_servico, $descr_servico, $preco) {
      $this->setIdServico($id_servico);
      $this->setNomeServico($nome_servico);
      $this->setDescrServico($descr_servico);
      $this->setPreco($preco);
    }
    
    public function getIdServico(){
      return $this->id_servico;
    }
    public function setIdServico($id_servico){
      $this->id_servico = $id_servico;
    }
    
    public function getNomeServico(){
      return $this->nome_servico;
    }
    public function setNomeServico($nome_servico){
      $this->nome_servico = $nome_servico;
    }
    
    public function getDescrServico(){
      return $this->descr_servico;
    }
    public function setDescrServico($descr_servico){
      $this->descr_servico = $descr_servico;
    }
    
    public function getPreco(){
      return $this->preco;
    }
    public function setPreco($preco){
      $this->preco = $preco;
    }
  }

  $banho = new Servico(1, "Banho completo", "Um banho completo para deixar seu pet cheiroso e feliz", "40,00");
  $tosa = new Servico(2, "Tosa", "Dar aquela aparada nos pelos para manter o charme", "40,00");
  $banho_e_tosa = new Servico(3, "Banho e tosa", "Dia de spa para o seu pet, com banho e tosa para dar um glow no visual", "60,00");
  $consulta = new Servico(4, "Consulta veterinária", "Fazer um checkup na saúde", "150,00");

  $servicos = array($banho, $tosa, $banho_e_tosa, $consulta);

?>