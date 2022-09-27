<?php

$nome = $_POST["nome"];
$email= $_POST["email"];
$senha= $_POST["senha"];
$csenha= $_POST["csenha"];

$nome_erro = $email_erro = $senha_erro = $csenha_erro = "";

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


if(empty($senha) or strstr($senha," ") or (strlen($senha) <=5 )){
  $senha_erro = "Preencha o campo Senha com no mínimo 6 caracteres! <br/><br/>";
  echo $senha_erro;
} else if ($senha == $csenha) {
  return true;  
}

else{
  echo "As senhas não correspondem!"."<br>";
}  
       
if(empty($csenha) or strstr($csenha," ")){
  $csenha_erro = "Preencha o campo Confirmar Senha! <br/><br/>";
  echo $csenha_erro;
}  

?>