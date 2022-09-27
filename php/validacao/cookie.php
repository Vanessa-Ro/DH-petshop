<?php

  $nome = $_POST["email"];
  $tempo = 30;
  $cookie = $_POST["check"];

  if(!empty($nome)){
    if($cookie){
      setcookie("permissao", "concedida", time() + $tempo, "/");
      if(!isset($_COOKIE[$nome])){
        setcookie("email", $nome, time() + $tempo, "/");
        
        header("Location: ../../login.php");
      } else {
        echo "cookie já existe<br><br>";
      }
    } else {
      header("Location: ../../login.php");
    }
  }

?>