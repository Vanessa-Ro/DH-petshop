<?php

  $nome = $_POST["email"];
  $tempo = 15;

  if(isset($_POST["checkbox"])) {
    $cookie = $_POST["checkbox"];
  }
  else {
    $cookie = false;
  }

  if(!empty($nome)){
    if($cookie){
      setcookie("permissao", "concedida", time() + $tempo, "/");
      if(!isset($_COOKIE[$nome])){
        setcookie("email", $nome, time() + $tempo, "/");
        
        // header("Location: ../../login.php");
      } else {
        echo "cookie já existe<br><br>";
      }
    } 
    // else {
    //   header('Location: validacad.php');
    //   // header("Location: ../../login.php");
    // }
  }

?>