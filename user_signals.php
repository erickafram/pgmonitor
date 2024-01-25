<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Verificar se foi enviado um ID de sinal para exclusão
if (isset($_GET['delete_signal_id'])) {
    $delete_signal_id = $_GET['delete_signal_id'];
    // Excluir o sinal apenas se pertencer ao usuário logado
    $sqlDeleteSignal = "DELETE FROM user_signals WHERE user_id = $user_id AND id = $delete_signal_id";
    $conn->query($sqlDeleteSignal);
    header('Location: user_signals.php');
    exit();
}

$sql = "SELECT signals.*, user_signals.id AS user_signal_id FROM signals
        INNER JOIN user_signals ON signals.id = user_signals.signal_id
        WHERE user_signals.user_id = $user_id";
$result = $conn->query($sql);

$signals = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $signals[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Sinais - Meus Sinais</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
</head>
<body>
<?php include 'menu.php'; ?>
<div class="container">
    <h2>Meus Sinais</h2>
    <?php if (!empty($signals)): ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Nome do Jogo</th>
                    <th>Data</th>
                    <th>Horários</th>
                    <th>Normal</th>
                    <th>Turbo</th>
                    <th>Auto</th>
                    <th>Plataforma</th>
                    <th>Link</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($signals as $signal): ?>
                    <tr>
                        <td><?php echo $signal['game_name']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($signal['date'])); ?></td>
                        <td><?php echo $signal['time']; ?></td>
                        <td><?php echo $signal['normal_rounds']; ?>x</td>
                        <td><?php echo $signal['turbo_rounds']; ?>x</td>
                        <td><?php echo $signal['auto_rounds']; ?>x</td>
                        <td><?php echo $signal['platform']; ?></td>
                        <td><a href="#" onclick="openPopup('<?php echo $signal['link']; ?>')">IR PARA PLATAFORMA</a></td>
                        <td>
                            <a href="user_signals.php?delete_signal_id=<?php echo $signal['user_signal_id']; ?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'user'): ?>
            <p>A função de pegar sinais é exclusiva para usuários GOLD.</p>
        <?php else: ?>
            <p>Nenhum sinal encontrado.</p>
        <?php endif; ?>
    <?php endif; ?>
</div>
<script>
    function openPopup(link) {
        const width = 500;
        const height = 550;
        const left = (window.screen.width - width) - 1000;
        const top = (window.screen.height / 2) - (height / 2);
        window.open(link, '_blank', `width=${width},height=${height},left=${left},top=${top}`);
    }
</script>
</body>
</html>
