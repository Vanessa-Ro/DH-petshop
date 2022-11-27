<?php

include_once('../../conexao.php');

session_start();

$nome = $_POST["name"];
$idade = $_POST["age"];
$especie = $_POST["species"];
$raca = $_POST["breed"];
$porte = $_POST["size"];

$_SESSION['nome'] = $nome;
$_SESSION['idade'] = $idade;
$_SESSION['especie'] = $especie;
$_SESSION['raca'] = $raca;

$valido = true;

$nome_erro = $idade_erro = $especie_erro = $raca_erro = $foto_erro ="";

if (empty(trim($nome))) {
  $nome_erro = "Preencha o campo Nome do pet!";
  $_SESSION['nome_erro'] = $nome_erro;
  $valido = false;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (empty(trim($idade))) {
  $idade_erro = "Preencha o campo Idade!";
  $_SESSION['idade_erro'] = $idade_erro;
  $valido = false;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else if (!is_numeric($idade)) {
  $idade_erro = "Campo Idade não numérico!";
  $_SESSION['idade_erro'] = $idade_erro;
  $valido = false;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (empty(trim($especie))) {
  $especie_erro = "Preencha o campo Espécie!";
  $_SESSION['especie_erro'] = $especie_erro;
  $valido = false;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (empty(trim($raca))) {
  $raca_erro = "Preencha o campo Raça!";
  $_SESSION['raca_erro'] = $raca_erro;
  $valido = false;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

// processa imagem
if(isset($_FILES['photo'])) {
  $img_name = $_FILES['photo']['name'];
  $img_size = $_FILES['photo']['size'];
  $tmp_name = $_FILES['photo']['tmp_name'];
  $error    = $_FILES['photo']['error'];

  if($error === 0) {
    if($img_size > 125000) {
      $foto_erro = "O arquivo é grande demais";
      $_SESSION['foto_erro'] = $foto_erro;
      $valido = false;
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else {
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);

      $allowed_exs = array("jpg", "jpeg", "png");

      if(in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true). "." .$img_ex_lc;
        $img_upload_path = "../uploads/" . $new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
      }
      else {
        $foto_erro = "Não é possível subir este tipo de arquivo";
        $_SESSION['foto_erro'] = $foto_erro;
        $valido = false;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
      }
    }
  }
  else {
    $foto_erro = "Falha no upload do arquivo";
    $_SESSION['foto_erro'] = $foto_erro;
    $valido = false;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
}

// cadastra pet
if($valido) {
  try {
    $con->beginTransaction();
  
    $stmtInsert = $con->prepare("INSERT INTO pet(nome, idade, porte, raca, especie, foto, fk_dono_id_dono) VALUES (:nome, :idade, :porte, :raca, :especie, :foto, :fk_dono)");
  
    $stmtInsert->bindParam(":nome", $nome);
    $stmtInsert->bindParam(":idade", $idade);
    $stmtInsert->bindParam(":porte", $porte);
    $stmtInsert->bindParam(":raca", $raca);
    $stmtInsert->bindParam(":especie", $especie);
    $stmtInsert->bindParam(":foto", $new_img_name);
    $stmtInsert->bindParam(":fk_dono", $_SESSION['usuario']['id_dono']);
    $stmtInsert->execute();
  
    $con->commit();

    $cad_sucesso = "Pet cadastrado com sucesso!";
    $_SESSION['cad_sucesso'] = $cad_sucesso;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } catch (PDOException $e) {
    $con->rollback();
    echo "Erro: " . $e->getMessage();
  }
}
