<?php

session_start();

$email= $_POST["email"];
$senha = $_POST["senha"];

$_SESSION['email'] = $email;
$_SESSION['senha'] = $senha;

$email_erro = $senha_erro =  "";

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

// validação: senha
if(empty(trim($senha)) or (strlen($senha) <=5 )){
  $senha_erro = "Preencha o campo Senha com no mínimo 6 caracteres!";
  $_SESSION['senha_erro'] = $senha_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if($email_erro == "" && $senha_erro == ""){
  $email = $this->getEmail();
  $senha = $this->getSenha();
}

?>