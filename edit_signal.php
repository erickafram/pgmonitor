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

$user_id = $_SESSION['user_id'];
$_SESSION['user_id'] = $user_id; // Adicionar esta linha para definir a variável $user_id

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário de edição
    $signal_id = $_POST['signal_id'];
    $game_name = $_POST['game_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $platform = $_POST['platform'];
    $link = $_POST['link'];
    $normal_rounds = $_POST['normal_rounds'];
    $turbo_rounds = $_POST['turbo_rounds'];
    $auto_rounds = $_POST['auto_rounds'];

    // Atualiza os dados do sinal no banco de dados
    $updateSql = "UPDATE signals SET game_name = '$game_name', date = '$date', time = '$time', platform = '$platform', link = '$link', normal_rounds = $normal_rounds, turbo_rounds = $turbo_rounds, auto_rounds = $auto_rounds WHERE id = $signal_id";
    if ($conn->query($updateSql) === TRUE) {
        echo "Sinal atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o sinal.";
    }
}

// Recupera o ID do sinal a ser editado a partir do parâmetro na URL
$signal_id = $_GET['signal_id'];

// Consulta o sinal no banco de dados
$sql = "SELECT * FROM signals WHERE id = $signal_id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $signal = $result->fetch_assoc();
} else {
    echo "Sinal não encontrado.";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Sinais - Editar Sinal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
</head>
<body>
<?php include 'menu.php'; ?>
<div class="container">
    <h2>Editar Sinal</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="game_name" class="form-label">Nome do Jogo</label>
            <select class="form-select" id="game_name" name="game_name" required>
                <option value="Fortune Tiger" <?php if ($signal['game_name'] === 'Fortune Tiger') echo 'selected'; ?>>Fortune Tiger</option>
                <option value="Fortune Rabbit" <?php if ($signal['game_name'] === 'Fortune Rabbit') echo 'selected'; ?>>Fortune Rabbit</option>
                <option value="Fortune Mouse" <?php if ($signal['game_name'] === 'Fortune Mouse') echo 'selected'; ?>>Fortune Mouse</option>
                <option value="Piggy Gold" <?php if ($signal['game_name'] === 'Piggy Gold') echo 'selected'; ?>>Piggy Gold</option>
                <option value="Fortune Ox" <?php if ($signal['game_name'] === 'Fortune Ox') echo 'selected'; ?>>Fortune Ox</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $signal['date']; ?>">
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Horários</label>
            <input type="text" class="form-control" id="time" name="time" value="<?php echo $signal['time']; ?>">
        </div>
        <div class="mb-3">
            <label for="platform" class="form-label">Plataforma</label>
            <input type="text" class="form-control" id="platform" name="platform" value="<?php echo $signal['platform']; ?>">
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control" id="link" name="link" value="<?php echo $signal['link']; ?>">
        </div>
        <div class="mb-3">
            <label for="normal_rounds" class="form-label">Rodadas Normais</label>
            <input type="text" class="form-control" id="normal_rounds" name="normal_rounds" value="<?php echo $signal['normal_rounds']; ?>">
        </div>
        <div class="mb-3">
            <label for="turbo_rounds" class="form-label">Rodadas Turbo</label>
            <input type="text" class="form-control" id="turbo_rounds" name="turbo_rounds" value="<?php echo $signal['turbo_rounds']; ?>">
        </div>
        <div class="mb-3">
            <label for="auto_rounds" class="form-label">Rodadas Automaticas</label>
            <input type="text" class="form-control" id="auto_rounds" name="auto_rounds" value="<?php echo $signal['auto_rounds']; ?>">
        </div>
        <input type="hidden" name="signal_id" value="<?php echo $signal['id']; ?>">
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
</body>
</html>
