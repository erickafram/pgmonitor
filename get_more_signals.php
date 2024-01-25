<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Filtrar os sinais cujo horário ainda não venceu e que o usuário não tenha pego
$currentDateTime = date('Y-m-d H:i:s');

// Verificar se já existe um último sinal gerado armazenado em sessão
if (isset($_SESSION['last_generated_signal_id']) && !isset($_GET['refresh'])) {
    $lastGeneratedSignalId = $_SESSION['last_generated_signal_id'];

    // Selecionar o próximo sinal disponível após o último sinal gerado
    $sql = "SELECT * FROM signals WHERE CONCAT(date, ' ', time) > '$currentDateTime' AND id NOT IN (SELECT signal_id FROM user_signals WHERE user_id = $user_id) AND id > $lastGeneratedSignalId LIMIT 1";
} else {
    // Não há um último sinal gerado ou é uma atualização da página, selecionar o primeiro sinal disponível
    $sql = "SELECT * FROM signals WHERE CONCAT(date, ' ', time) > '$currentDateTime' AND id NOT IN (SELECT signal_id FROM user_signals WHERE user_id = $user_id) ORDER BY id ASC LIMIT 1";
}

$result = $conn->query($sql);

$signal = null;
if ($result->num_rows > 0) {
    $signal = $result->fetch_assoc();

    // Armazenar o ID do sinal gerado em sessão
    $_SESSION['last_generated_signal_id'] = $signal['id'];

    // Converter a data para o formato "d/m/Y"
    $signal['date'] = date('d/m/Y', strtotime($signal['date']));

    // Obter o horário atual
    $currentHour = date('H');
    $percentage = '';

    // Definir as porcentagens de acordo com os intervalos de horário
    if ($currentHour >= 0 && $currentHour <= 11) {
        // Das 00h até 11h: porcentagem de 50% a 60%
        $percentage = rand(50, 60) . '%';
    } elseif ($currentHour >= 12 && $currentHour <= 16) {
        // Das 12h01 até 16h: porcentagem de 61% a 65%
        $percentage = rand(61, 65) . '%';
    } elseif ($currentHour >= 17 && $currentHour <= 18) {
        // Das 16h01 até 18h: porcentagem de 66% a 70%
        $percentage = rand(66, 70) . '%';
    } elseif ($currentHour >= 19 && $currentHour <= 23) {
        // Das 18h01 até 23h59: porcentagem de 70% a 90%
        $percentage = rand(70, 90) . '%';
    }

    if ($percentage !== '') {
        // Definir a porcentagem para o sinal
        $signal['percentage'] = $percentage;
    } else {
        // Em caso de erro, definir uma porcentagem padrão
        $signal['percentage'] = '50%';
    }
}

$conn->close();

// Simulação de busca por 14 segundos (adicionei mais 1 segundo para dar um total de 15 segundos)
sleep(14);

// Retorna o sinal encontrado como resposta JSON
header('Content-Type: application/json');
echo json_encode($signal);
?>
