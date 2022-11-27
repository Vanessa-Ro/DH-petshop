<?php

$username = "root";
$password = "";

try {
    $con = new PDO('mysql:host=localhost;dbname=dh_petshop', $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (Exception $e) {
    die("Não foi possível estabelecer uma conexão com o banco de dados: " . $e->getMessage());
  } 

?>