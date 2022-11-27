<?php

session_start();
include_once('../../conexao.php');

$email= $_POST["email"];
$senha = $_POST["senha"];

$_SESSION['emaillogin'] = $email;
$_SESSION['senha'] = $senha;

$email_erro = $senha_erro = $login_erro = "";

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

// login
$senha = sha1($senha);

$sql = "SELECT * FROM dono WHERE email = '$email' AND senha = '$senha' LIMIT 1";

$stmtSelect = $con->prepare($sql);
$stmtSelect->execute();

$login = $stmtSelect->fetch();

if(empty($login)) {
  $login_erro = "Usuário e/ou senha incorretos.";
  $_SESSION['login_erro'] = $login_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
  $_SESSION['usuario'] = $login;
  header('Location: ../../pets.php');
}

?>