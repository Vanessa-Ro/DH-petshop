<?php

    include_once('../../conexao.php');
    session_start();

    $id = $_POST["agendamento"];

    try {
        $con->beginTransaction();
    
        $stmtDelete = $con->prepare("DELETE FROM pet_dono WHERE id_agendamento = :id_agendamento");
        
        $stmtDelete->bindParam(":id_agendamento", $id);
        $stmtDelete->execute();
        
        $delete = $con->prepare("DELETE FROM agendamento WHERE id_agendamento = :id_agendamento");

        $delete->bindParam(":id_agendamento", $id);
        $delete->execute();
    
        $con->commit();

        $cancelamento_sucesso = "O agendamento foi cancelado com sucesso!";
        $_SESSION['cancelamento_sucesso'] = $cancelamento_sucesso;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } catch (PDOException $e) {
        $con->rollback();
        echo "Erro: " . $e->getMessage();
    }

?>