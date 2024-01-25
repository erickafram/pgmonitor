<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Verificar o papel do usuário
$user_role = $_SESSION['user_role'];

// Filtrar os sinais cujo horário ainda não venceu e que o usuário ainda não pegou
$currentDateTime = date('Y-m-d H:i:s');

// Verificar os sinais que o usuário já pegou no dia atual
$sqlUserSignalsCount = "SELECT COUNT(*) as count FROM user_signals WHERE user_id = $user_id AND DATE(date) = CURDATE()";
//$resultUserSignalsCount = $conn->query($sqlUserSignalsCount);
$userSignalsCount = 0;
//if ($resultUserSignalsCount && $resultUserSignalsCount->num_rows > 0) {
//$userSignalsCount = $resultUserSignalsCount->fetch_assoc()['count'];
//}

if ($user_role === 'user') {
    // Mostrar apenas 5 sinais para usuários com papel 'user'
    $sql = "SELECT * FROM signals WHERE CONCAT(date, ' ', time) > '$currentDateTime' AND id NOT IN (SELECT signal_id FROM user_signals WHERE user_id = $user_id) LIMIT 4";
} else {
    // Mostrar todos os sinais para os demais usuários
    $sql = "SELECT * FROM signals WHERE CONCAT(date, ' ', time) > '$currentDateTime'";
}
$result = $conn->query($sql);

$signals = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $signals[] = $row;
    }
}

$conn->close();
include 'menu.php';
?>
<br>
<br>
<div id="pagina-grafico">
    <?php // include 'grafico_plataforma_pagante.php'; ?>
</div>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <title>PG Monitor - Scanner IA para Slots - Index Dashboard</title>
    <style>
        .content {
            margin-top: 0px !important;
        }

        @media screen and (max-width: 767px) {
            .content {
                margin-top: 0px !important;
            }
            .h-value.visible {
                font-size: 12px;
            }
            .total-gain {
                font-size: 35px;
            }
        }
    </style>
</head>

<body>
<?php include 'tutorial.php'; ?>
<?php include 'slots.php'; ?>
<?php include 'notification_site.php'; ?>
<!--=============== SCROLL UP ===============-->
<a href="#" class="scrollup" id="scroll-up">
    <i class="ri-arrow-up-fill scrollup__icon"></i>
</a>
</body>
</html>