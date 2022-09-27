<?php

session_start();

$data = $_POST["date"];
$hora= $_POST["time"];
$date = date($_POST["date"]);
$now = date("Y-m-d");
$time = date($_POST["time"]);

$data_erro = $hora_erro = "";

if(empty($data) or strstr($data," ")){
  $data_erro = "Preencha o campo Data!";
  $_SESSION['data_erro'] = $data_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else if($date < $now) { 
  $data_erro = "Data inválida!";
  $_SESSION['data_erro'] = $data_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} 

if(empty($hora) or strstr($hora," ")){
  $hora_erro = "Preencha o campo Horário!";
  $_SESSION['hora_erro'] = $hora_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else if($time > '17:00' || $time < '09:00') { 
  $hora_erro = "Horário inválido! Horário de funcionamento: das 09:00 às 17:00.";
  $_SESSION['hora_erro'] = $hora_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} 
?>