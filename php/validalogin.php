<?php

require_once('cookie.php');

$email= $_POST["email"];
$senha = $_POST["senha"];

$email_erro = $senha_erro =  "";

if(empty($email) or strstr($email," ")){
  $email_erro = "Preencha o campo E-mail! <br/><br/>";
  echo $email_erro;
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "E-mail inválido!"."<br>";
}

if(empty($senha) or strstr($senha," ") or (strlen($senha) <=5 )){
  $senha_erro = "Preencha o campo Senha com no mínimo 6 caracteres! <br/><br/>";
  echo $senha_erro;
}

?>