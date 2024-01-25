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

$gameName = $_GET['gameName'];
$gameName = $conn->real_escape_string($gameName);

// Get the list of generated game names from the session
$generatedGameNames = isset($_SESSION['generated_game_names']) ? $_SESSION['generated_game_names'] : [];

// Verificar se há um último sinal gerado na sessão
$lastGeneratedSignalId = isset($_SESSION['last_generated_signal_id']) ? $_SESSION['last_generated_signal_id'] : null;

// Selecionar todos os sinais disponíveis com base no nome do jogo e critérios de filtragem
$sql = "SELECT * FROM signals 
        WHERE CONCAT(date, ' ', time) > '$currentDateTime' 
        AND id NOT IN (SELECT signal_id FROM user_signals WHERE user_id = $user_id) 
        AND game_name LIKE '%$gameName%' 
        AND game_name NOT IN ('" . implode("','", $generatedGameNames) . "') 
        ORDER BY date ASC, time ASC"; // Order by date in ascending order, then time in ascending order

$result = $conn->query($sql);

$signals = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $signals[] = $row;
    }
}

$signal = null;
if (!empty($signals)) {
    if ($lastGeneratedSignalId && $lastGeneratedSignalId !== 'refresh') {
        $nextSignalIndex = 0;
        foreach ($signals as $index => $s) {
            if ($s['id'] == $lastGeneratedSignalId) {
                $nextSignalIndex = $index + 1;
                break;
            }
        }
        if ($nextSignalIndex < count($signals)) {
            $signal = $signals[$nextSignalIndex];
        } else {
            $signal = $signals[0];
        }
    } else {
        $signal = $signals[0];
    }

    // Add the generated game name to the list in session
    $generatedGameNames[] = $signal['game_name'];

    // Update the generated game names list in the session
    $_SESSION['generated_game_names'] = $generatedGameNames;

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
        $percentage = rand(50, 65) . '%';
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

sleep(14); // Simulação de busca por 14 segundos

// Retorna o sinal encontrado como resposta JSON
header('Content-Type: application/json');
echo json_encode($signal);

?>
