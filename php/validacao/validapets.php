<?php

session_start();

$nome = $_POST["name"];
$idade = $_POST["age"];
$especie = $_POST["species"];
$raca = $_POST["breed"];
$porte = $_POST["size"];
$foto = $_POST["photo"];

$_SESSION['nome'] = $nome;
$_SESSION['idade'] = $idade;
$_SESSION['especie'] = $especie;
$_SESSION['raca'] = $raca;

$nome_erro = $idade_erro = $especie_erro = $raca_erro = "";

if (empty(trim($nome))) {
  $nome_erro = "Preencha o campo Nome do pet!";
  $_SESSION['nome_erro'] = $nome_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (empty(trim($idade))) {
  $idade_erro = "Preencha o campo Idade!";
  $_SESSION['idade_erro'] = $idade_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else if (!is_numeric($idade)) {
  $idade_erro = "Campo Idade não numérico!";
  $_SESSION['idade_erro'] = $idade_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (empty(trim($especie))) {
  $especie_erro = "Preencha o campo Espécie!";
  $_SESSION['especie_erro'] = $especie_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (empty(trim($raca))) {
  $raca_erro = "Preencha o campo Raça!";
  $_SESSION['raca_erro'] = $raca_erro;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

try {
  $con->beginTransaction();

  $stmtInsert = $con->prepare("INSERT INTO pet(nome, idade, porte, raca, especie, foto) VALUES (:nome, :idade, :porte, :raca, :especie, :foto)");

  $stmtInsert->bindParam(":nome", $nome);
  $stmtInsert->bindParam(":idade", $idade);
  $stmtInsert->bindParam(":porte", $porte);
  $stmtInsert->bindParam(":raca", $raca);
  $stmtInsert->bindParam(":especie", $especie);
  $stmtInsert->bindParam(":foto", $foto);
  $stmtInsert->execute();

  $con->commit();
} catch (PDOException $e) {
  $con->rollback();
  echo "Erro: " . $e->getMessage();
}
