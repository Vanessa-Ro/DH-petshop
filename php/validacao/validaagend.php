<?php

include_once('../../conexao.php');

session_start();

$data = $_POST["date"];
$hora = $_POST["time"];
$date = date($_POST["date"]);
$now = date("Y-m-d");
$time = date($_POST["time"]);
$servico = $_POST["service"];
$pet = $_POST["pet"];

$valido = true;

$data_erro = $hora_erro = "";

// validação: data
if(empty($data) or strstr($data," ")){
  $data_erro = "Preencha o campo Data!";
  $_SESSION['data_erro'] = $data_erro;
  $valido = false;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else if($date < $now) { 
  $data_erro = "Data inválida!";
  $_SESSION['data_erro'] = $data_erro;
  $valido = false;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} 

// validação: hora
if(empty($hora) or strstr($hora," ")){
  $hora_erro = "Preencha o campo Horário!";
  $_SESSION['hora_erro'] = $hora_erro;
  $valido = false;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else if($time > '17:00' || $time < '09:00') { 
  $hora_erro = "Horário inválido! Horário de funcionamento: das 09:00 às 17:00.";
  $_SESSION['hora_erro'] = $hora_erro;
  $valido = false;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} 

// registro de agendamento
if($valido) {
  try {
    $con->beginTransaction();
  
    $stmtInsert = $con->prepare("INSERT INTO agendamento(data_agendamento, hora, id_servico) VALUES (:data_agendamento, :hora, :fk_servico)");
  
    $stmtInsert->bindParam(":data_agendamento", $date);
    $stmtInsert->bindParam(":hora", $hora);
    $stmtInsert->bindParam(":fk_servico", $servico);
    $stmtInsert->execute();

    $agendamento = $con->lastInsertId();

    $insert = $con->prepare("INSERT INTO pet_dono(id_dono, id_pet, id_agendamento) VALUES (:fk_dono, :fk_pet, :fk_agendamento)");
  
    $insert->bindParam(":fk_dono", $_SESSION['usuario']['id_dono']);
    $insert->bindParam(":fk_pet", $pet);
    $insert->bindParam(":fk_agendamento", $agendamento);
    $insert->execute();
  
    $con->commit();

    $agendamento_sucesso = "Horário marcado com sucesso!";
    $_SESSION['agendamento_sucesso'] = $agendamento_sucesso;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } catch (PDOException $e) {
    $con->rollback();
    echo "Erro: " . $e->getMessage();
  }
}

?>