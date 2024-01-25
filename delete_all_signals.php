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

// Excluir todos os sinais cadastrados
$sql = "DELETE FROM signals";
$result = $conn->query($sql);

$conn->close();

// Redirecionar de volta à página de sinais cadastrados
header('Location: admin_signals.php');
exit();
?>
