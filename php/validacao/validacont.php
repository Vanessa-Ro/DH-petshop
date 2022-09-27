<?php

session_start();

$nome = $_POST["nome"];
$email= $_POST["email"];
$mensagem= $_POST["mensagem"];

$_SESSION['nome'] = $nome;
$_SESSION['email'] = $email;
$_SESSION['mensagem'] = $mensagem;

$nome_erro = $email_erro = $mensagem_erro = "";

// validação: nome
if(empty(trim($nome))){
  $nome_erro = "Preencha o campo Nome!";
  $_SESSION['nome_erro'] = $nome_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

// validação: email
if(empty(trim($email))){
  $email_erro = "Preencha o campo E-mail!";
  $_SESSION['email_erro'] = $email_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $email_erro = "E-mail inválido!";
  $_SESSION['email_erro'] = $email_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

// validação: mensagem
if(empty(trim($mensagem))){
  $mensagem_erro = "Preencha o campo Mensagem!";
  $_SESSION['mensagem_erro'] = $mensagem_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}  

?>