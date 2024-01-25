<?php
session_start();
require_once 'db_connection.php';

if ($_SESSION['user_role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Função para gerar as informações dos jogos e inserir no banco de dados
function gerarJogos($conn, $nomeJogo, $data, $horaInicial, $horaFinal, $intervaloMinutos, $plataforma, $link, $quantidade)
{
    $jogosInseridos = 0;

    $jogosDisponiveis = [
        'Fortune Tiger',
        'Fortune Ox',
        'Fortune Rabbit',
        'Fortune Mouse',
        'Piggy Gold',
        'Ice Scape',
        'Genies Swishes',
        'Dragon Hatch',
        'Dragon Legend',
        'Jungle',
        'Ganesha',
        'Dragon Tiger',
        'Wild Bandito',
        'Bihini Paradise',
        'Ganesha Fortune',
        'Piggy Gold'
    ];

    while ($jogosInseridos < $quantidade) {
        $time = date('H:i', strtotime($horaInicial));

        $normalRounds = rand(1, 8);
        $turboRounds = rand(1, min(8, 20 - $normalRounds - 10));
        $autoRounds = 10;

        $restante = 20 - ($normalRounds + $turboRounds + $autoRounds);

        if ($restante > 0) {
            $randType = rand(1, 2);
            if ($randType === 1) {
                $normalRounds += $restante;
            } else {
                $turboRounds += $restante;
            }
        }

        // Se $nomeJogo é uma string vazia, seleciona um jogo aleatório
        $nomeJogoUsar = $nomeJogo === '' ? $jogosDisponiveis[array_rand($jogosDisponiveis)] : $nomeJogo;

        $sql = "INSERT INTO signals (game_name, date, time, platform, link, normal_rounds, turbo_rounds, auto_rounds)
                VALUES ('$nomeJogoUsar', '$data', '$time', '$plataforma', '$link', $normalRounds, $turboRounds, $autoRounds)";

        if ($conn->query($sql) === TRUE) {
            $jogosInseridos++;
        }

        $horaInicial = date('H:i', strtotime($horaInicial . "+$intervaloMinutos minutes"));
        if ($horaInicial > $horaFinal) {
            break;
        }
    }

    echo "<div class='container alert alert-success' role='alert' style='margin-top:30px;'>Foram inseridos $jogosInseridos jogos no banco de dados.</div>";
}


// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os valores do formulário
    $nomeJogo = $_POST['game_name'];
    $data = $_POST['date'];
    $horaInicial = $_POST['start_time'];
    $horaFinal = $_POST['end_time'];
    $intervaloMinutos = $_POST['interval'];
    $plataforma = $_POST['platform'];
    $link = $_POST['link'];
    $quantidade = $_POST['quantity'];

    if ($nomeJogo === 'gerar_todos') {
        gerarJogos($conn, '', $data, $horaInicial, $horaFinal, $intervaloMinutos, $plataforma, $link, $quantidade);
    } else {
        gerarJogos($conn, $nomeJogo, $data, $horaInicial, $horaFinal, $intervaloMinutos, $plataforma, $link, $quantidade);
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'menu.php'; ?>
    <title>Gerar Jogos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // Função para atualizar o link da plataforma conforme a plataforma selecionada
        function updateLink() {
            var selectedPlatform = $("#platform").val();
            var link = "";
			
            if (selectedPlatform === "SambaWin") {
    link = "https://www.sambawin.com/c-4gHvQ9fp?lang=pt";
} else if (selectedPlatform === "Sun777") {
    link = "https://777004.sun777.com/register.html?referralCode=mdj3839";
} else if (selectedPlatform === "TitiWin") {
    link = "https://www.titiwin.com/?invite=5FTDN5";
} else if (selectedPlatform === "Ganhador.vip") {
    link = "https://ganhador.vip/#/?invite_code=F6KSBZ";
} else if (selectedPlatform === "Winzada777") {
    link = "https://app.winzada777.com/?invite=Z7N5SZ";
} else if (selectedPlatform === "Boxswin") {
    link = "https://www.boxswin.com/?code=ahdrvk";
} else if (selectedPlatform === "skkbet") {
    link = "https://www.skkbet.com/?code=OWEZJ";
}


            $("#link").val(link);
        }

        // Chamar a função quando a página carregar e quando a plataforma for alterada
        $(document).ready(function () {
            updateLink();
            $("#platform").change(updateLink);
        });
    </script>
</head>
<body>
<div class="container">
    <h2 class="mt-4">Gerar Jogos</h2>
    <?php if (isset($successMessage)): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $successMessage; ?>
        </div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label for="game_name" class="form-label">Nome do Jogo:</label>
            <select class="form-select" id="game_name" name="game_name" required>
                <option value="gerar_todos">Gerar para todos os jogos</option>
                <option value="Fortune Tiger">Fortune Tiger</option>
                <option value="Fortune Ox">Fortune Ox</option>
                <option value="Fortune Rabbit">Fortune Rabbit</option>
                <option value="Fortune Mouse">Fortune Mouse</option>
                <option value="Piggy Gold">Piggy Gold</option>
                <option value="Ice Scape">Ice Scape</option>
                <option value="Genies Swishes">Genies Swishes</option>
                <option value="Dragon Hatch">Dragon Hatch</option>
                <option value="Dragon Legend"">Dragon Legend"</option>
                <option value="Jungle">Jungle</option>
                <option value="Ganesha">Ganesha</option>
                <option value="Dragon Tiger">Dragon Tiger</option>
                <option value="Wild Bandito">Wild Bandito</option>
                <option value="Bihini Paradise">Bihini Paradise</option>
                <option value="Ganesha Fortune">Ganesha Fortune</option>
                <option value="Piggy Gold"">Piggy Gold"</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Data:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">Horário Inicial:</label>
            <input type="time" class="form-control" id="start_time" name="start_time" required>
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">Horário Final:</label>
            <input type="time" class="form-control" id="end_time" name="end_time" required>
        </div>
        <div class="mb-3">
            <label for="interval" class="form-label">Intervalo (em minutos):</label>
            <input type="number" class="form-control" id="interval" name="interval" required>
        </div>
        <div class="mb-3">
            <label for="platform" class="form-label">Plataforma:</label>
            <select class="form-select" id="platform" name="platform" required>
			    <option value="SambaWin">SambaWin</option>
                <option value="Sun777">Sun777</option>
                <option value="TitiWin">TitiWin</option>
                <option value="Ganhador.vip">Ganhador.vip</option>
                <option value="Winzada777">Winzada777</option>
                <option value="Boxswin">Boxswin</option>
                <option value="skkbet">skkbet</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link:</label>
            <input type="text" class="form-control" id="link" name="link" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantidade:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <button type="submit" class="btn btn-primary">Gerar Jogos</button>
    </form>
</div>
</body>
</html>