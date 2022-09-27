<?php

session_start();

$nome = $_POST["name"];
$idade= $_POST["age"];
$especie= $_POST["species"];
$raca= $_POST["breed"];

$_SESSION['nome'] = $nome;
$_SESSION['idade'] = $idade;
$_SESSION['especie'] = $especie;
$_SESSION['raca'] = $raca;

$nome_erro = $idade_erro = $especie_erro = $raca_erro = "";

if(empty(trim($nome))){
  $nome_erro = "Preencha o campo Nome do pet!";
  $_SESSION['nome_erro'] = $nome_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if(empty(trim($idade))){
  $idade_erro = "Preencha o campo Idade!";
  $_SESSION['idade_erro'] = $idade_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else if(!is_numeric($idade)){
    $idade_erro = "Campo Idade não numérico!";
    $_SESSION['idade_erro'] = $idade_erro;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

if(empty(trim($especie))){
  $especie_erro = "Preencha o campo Espécie!";
  $_SESSION['especie_erro'] = $especie_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if(empty(trim($raca))){
  $raca_erro = "Preencha o campo Raça!";
  $_SESSION['raca_erro'] = $raca_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}  

?>