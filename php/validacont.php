<?php

$nome = $_POST["nome"];
$email= $_POST["email"];
$mensagem= $_POST["mensagem"];
$nome_erro = $email_erro = $mensagem_erro = "";

if(empty($nome) or strstr($nome," ")){
  $nome_erro = "Preencha o campo Nome! <br/><br/>";
  echo $nome_erro;
}

if(empty($email) or strstr($email," ")){
  $email_erro = "Preencha o campo E-mail! <br/><br/>";
  echo $email_erro;
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "E-mail inválido!"."<br>";
}

             
if(empty($mensagem) or strstr($mensagem," ")){
  $mensagem_erro = "Preencha o campo Mensagem! <br/><br/>";
  echo $mensagem_erro;
}  

?>