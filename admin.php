<?php
session_start();
require_once 'db_connection.php';

if ($_SESSION['user_role'] !== 'admin') {
    header('Location: dashboard.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$_SESSION['user_id'] = $user_id; // Adicionar esta linha para definir a variável $user_id

// Verificar se o formulário de cadastro de sinal foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['game_name']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['platform']) && isset($_POST['link'])) {
    $game_name = $_POST['game_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $normal_rounds = $_POST['normal_rounds'];
    $turbo_rounds = $_POST['turbo_rounds'];
    $auto_rounds = $_POST['auto_rounds'];
    $platform = $_POST['platform'];
    $link = $_POST['link'];

    // Inserir o novo sinal no banco de dados
    $insertSql = "INSERT INTO signals (game_name, date, time, normal_rounds, turbo_rounds, auto_rounds, platform, link) 
                  VALUES ('$game_name', '$date', '$time', '$normal_rounds', '$turbo_rounds', '$auto_rounds', '$platform', '$link')";
    if ($conn->query($insertSql) === TRUE) {
        echo "Sinal cadastrado com sucesso.";
    } else {
        echo "Erro ao cadastrar o sinal: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Sinais - Administração</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
</head>
<body>
<?php include 'menu.php'; ?>
<div class="container">

    <h4>Cadastro de Sinais</h4>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="game_name" class="form-label">Nome do Jogo</label>
            <select class="form-select" id="game_name" name="game_name" required>
                <option value="Fortune Tiger">Fortune Tiger</option>
                <option value="Fortune Rabbit">Fortune Rabbit</option>
                <option value="Fortune Mouse">Fortune Mouse</option>
                <option value="Piggy Gold">Piggy Gold</option>
                <option value="Fortune Ox">Fortune Ox</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Horário</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <div class="mb-3">
            <label for="normal_rounds" class="form-label">Rodadas Normais</label>
            <input type="number" class="form-control" id="normal_rounds" name="normal_rounds" required>
        </div>
        <div class="mb-3">
            <label for="turbo_rounds" class="form-label">Rodadas Turbo</label>
            <input type="number" class="form-control" id="turbo_rounds" name="turbo_rounds" required>
        </div>
        <div class="mb-3">
            <label for="auto_rounds" class="form-label">Rodadas Automatica</label>
            <input type="number" class="form-control" id="auto_rounds" name="auto_rounds" required>
        </div>
        <div class="mb-3">
            <label for="platform" class="form-label">Plataforma</label>
            <input type="text" class="form-control" id="platform" name="platform" required value="Kfkfbet">
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control" id="link" name="link" required value="https://www.kfkfbet.com/?id=92338506">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar Sinal</button>
    </form>
</div>
</body>
</html>
