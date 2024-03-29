<?php

  class Agendamento{
    private $id_agendamento;
    private $horario;
    private $data;

    public function __construct($id_agendamento, $horario, $data) {
      $this->setIdAgendamento($id_agendamento);
      $this->setHorario($horario);
      $this->setData($data);
    }
    
    public function getIdAgendamento(){
      return $this->id_agendamento;
    }
    public function setIdAgendamento($id_agendamento){
      $this->id_agendamento = $id_agendamento;
    }

    public function getHorario(){
      return $this->horario;
    }
    public function setHorario($horario){
      $this->horario = $horario;
    }

    public function getData(){
      return $this->data;
    }
    public function setData($data){
      $this->data = $data;
    }
  }

  // $agendamento1 = new Agendamento(1, "17:00", "27/09/2022");
  // $agendamento2 = new Agendamento(2, "14:00", "28/10/2022");

  // $agendamentos = array($agendamento1, $agendamento2);

  // get agendamentos
  $sql = "SELECT agendamento.id_agendamento, agendamento.data_agendamento, agendamento.hora, servico.nome as nome_servico, pet.nome as nome_pet FROM agendamento 
  LEFT JOIN pet_dono 
  ON agendamento.id_agendamento = pet_dono.id_agendamento
  LEFT JOIN pet 
  ON pet_dono.id_pet = pet.id_pet
  RIGHT JOIN servico
  ON agendamento.id_servico = servico.id_servico
  WHERE pet_dono.id_dono = " . $_SESSION['usuario']['id_dono'];
  
  $stmtSelect = $con->prepare($sql);
  $stmtSelect->execute();
  
  $agendamentos = $stmtSelect->fetchAll();

?>