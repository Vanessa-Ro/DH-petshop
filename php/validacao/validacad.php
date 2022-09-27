<?php

session_start();
require_once('cookie.php');

$id_usuario = 0;

$nome = $_POST["nome"];
$email= $_POST["email"];
$senha= $_POST["senha"];
$csenha= $_POST["csenha"];
$checkbox= $_POST["check"];

$_SESSION['nome'] = $nome;
$_SESSION['email'] = $email;
$_SESSION['senha'] = $senha;
$_SESSION['csenha'] = $csenha;
$_SESSION['checkbox'] = $checkbox;

$nome_erro = $email_erro = $senha_erro = $csenha_erro = "";

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

// validação: senha
if(empty(trim($senha)) or (strlen($senha) <=5 )){
  $senha_erro = "Preencha o campo Senha com no mínimo 6 caracteres!";
  $_SESSION['senha_erro'] = $senha_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else if ($senha == $csenha) {
  return true;  
} else{
  $senha_erro_dif = "As senhas não correspondem!";
  $_SESSION['senha_erro_dif'] = $senha_erro_dif;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}  

// validação: confirmação de senha
if(empty(trim($csenha))){
  $csenha_erro = "Preencha o campo Confirmar Senha!";
  $_SESSION['csenha_erro'] = $csenha_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}  

if ($nome_erro == "" && $email_erro == "" && $senha_erro == "" && $csenha_erro == "") {
  $usuario = new Usuario($id_usuario, $nome, $email, $senha);
  $id_usuario++;
}

?>