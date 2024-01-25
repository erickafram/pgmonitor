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

$sql = "SELECT * FROM signals";
$result = $conn->query($sql);

$signals = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $signals[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Sinais - Sinais Cadastrados</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
</head>
<body>
<?php include 'menu.php'; ?>
<div class="container">
    <h2>Sinais Cadastrados</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Nome do Jogo</th>
            <th>Data</th>
            <th>Horários</th>
            <th>Plataforma</th>
            <th>Link</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($signals as $signal): ?>
            <tr>
                <td><?php echo $signal['game_name']; ?></td>
                <td><?php echo $signal['date']; ?></td>
                <td><?php echo $signal['time']; ?></td>
                <td><?php echo $signal['normal_rounds']; ?></td>
                <td><?php echo $signal['turbo_rounds']; ?></td>
                <td><?php echo $signal['platform']; ?></td>
                <td><?php echo $signal['link']; ?></td>
                <td>
                    <a href="edit_signal.php?signal_id=<?php echo $signal['id']; ?>" class="btn btn-primary">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
