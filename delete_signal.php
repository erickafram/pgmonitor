<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

if ($_SESSION['user_role'] !== 'admin') {
    header('Location: dashboard.php');
    exit();
}

if (isset($_GET['signal_id'])) {
    $signal_id = $_GET['signal_id'];

    // Excluir o sinal do banco de dados
    $sqlDelete = "DELETE FROM signals WHERE id = $signal_id";
    if ($conn->query($sqlDelete) === true) {
        $_SESSION['notification'] = 'Sinal excluído com sucesso.';
    } else {
        $_SESSION['notification'] = 'Ocorreu um erro ao excluir o sinal.';
    }
}

header('Location: admin_signals.php');
exit();
?>
