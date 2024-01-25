<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $signal_id = $_POST['signalId'];

    // Verifica se o usuário já possui o sinal na tabela user_signals
    $checkSql = "SELECT * FROM user_signals WHERE user_id = $user_id AND signal_id = $signal_id";
    $checkResult = $conn->query($checkSql);
    if ($checkResult && $checkResult->num_rows > 0) {
        echo "Você já pegou esse sinal.";
        exit();
    }

    // Insere o sinal na tabela user_signals
    $insertSql = "INSERT INTO user_signals (user_id, signal_id) VALUES ($user_id, $signal_id)";
    if ($conn->query($insertSql) === TRUE) {
        echo "Sinal pegado com sucesso!";
    } else {
        echo "Erro ao pegar o sinal.";
    }
}

$conn->close();
?>
