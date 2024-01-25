<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$currentDateTime = date('Y-m-d H:i:s');

// Se existir um último sinal gerado armazenado em sessão
if (isset($_SESSION['last_generated_signal_id']) && !isset($_GET['refresh'])) {
    $lastGeneratedSignalId = $_SESSION['last_generated_signal_id'];
    $sql = "SELECT * FROM signals WHERE CONCAT(date, ' ', time) > '$currentDateTime' AND id NOT IN (SELECT signal_id FROM user_signals WHERE user_id = $user_id) AND id > $lastGeneratedSignalId LIMIT 3";
} else {
    $sql = "SELECT * FROM signals WHERE CONCAT(date, ' ', time) > '$currentDateTime' AND id NOT IN (SELECT signal_id FROM user_signals WHERE user_id = $user_id) ORDER BY id ASC LIMIT 3";
}

$result = $conn->query($sql);

$signalsArray = [];
if ($result->num_rows > 0) {
    while($signal = $result->fetch_assoc()) {
        // Armazenar o ID do último sinal gerado em sessão
        $_SESSION['last_generated_signal_id'] = $signal['id'];

        // Converter a data para o formato "d/m/Y"
        $signal['date'] = date('d/m/Y', strtotime($signal['date']));
        $currentHour = date('H');
        $percentage = '';

        if ($currentHour >= 0 && $currentHour <= 11) {
            $percentage = rand(50, 60) . '%';
        } elseif ($currentHour >= 12 && $currentHour <= 16) {
            $percentage = rand(61, 65) . '%';
        } elseif ($currentHour >= 17 && $currentHour <= 18) {
            $percentage = rand(66, 70) . '%';
        } else {
            $percentage = rand(71, 91) . '%';
        }

        $signal['percentage'] = $percentage;
        $signalsArray[] = $signal;
    }
}

echo json_encode($signalsArray);
$conn->close();
?>
