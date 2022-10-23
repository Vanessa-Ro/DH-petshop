<?php

$username = "root";
$password = "";

try {
    $db = new PDO('mysql:host=localhost;dbname=dh_petshop', $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (Exception $e) {
    die("Não foi possível estabelecer uma conexão com o banco de dados: " . $e->getMessage());
  } 

?>