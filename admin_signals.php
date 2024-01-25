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

$limit = 10; // Número de registros por página
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Página atual
$offset = ($page - 1) * $limit; // Offset para a consulta SQL

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Consulta SQL com paginacão e filtro de pesquisa
$sql = "SELECT * FROM signals WHERE game_name LIKE '%$searchTerm%' LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

$signals = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $signals[] = $row;
    }
}

// Total de registros para calcular o número de páginas
$sqlCount = "SELECT COUNT(*) AS total FROM signals WHERE game_name LIKE '%$searchTerm%'";
$resultCount = $conn->query($sqlCount);
$totalSignals = $resultCount->fetch_assoc()['total'];
$totalPages = ceil($totalSignals / $limit);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Sinais - Sinais Cadastrados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
</head>
<body>
<?php include 'menu.php'; ?>
<div class="container">
    <h2>Sinais Cadastrados</h2>
    <div class="mb-3">
        <form action="" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Pesquisar por nome do jogo" value="<?php echo $searchTerm; ?>">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </form>
    </div>
    <div class="mb-3">
        <button class="btn btn-danger" onclick="apagarSinais()">Apagar Todos</button>
    </div>
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
            <?php if (!empty($signals)): ?>
                <?php foreach ($signals as $signal): ?>
                    <tr>
                        <td><?php echo $signal['game_name']; ?></td>
                        <td><?php echo $signal['date']; ?></td>
                        <td><?php echo $signal['time']; ?></td>
                        <td><?php echo $signal['normal_rounds']; ?></td>
                        <td><?php echo $signal['turbo_rounds']; ?></td>
                        <td><?php echo $signal['auto_rounds']; ?></td>
                        <td><?php echo $signal['platform']; ?></td>
                        <td><?php echo $signal['link']; ?></td>
                        <td>
                            <a href="edit_signal.php?signal_id=<?php echo $signal['id']; ?>" class="btn btn-primary">Editar</a>
                            <a href="delete_signal.php?signal_id=<?php echo $signal['id']; ?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">Nenhum sinal cadastrado.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Navegação de página">
        <ul class="pagination justify-content-center">
            <?php if ($page > 1): ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo ($page - 1); ?>&search=<?php echo $searchTerm; ?>">Anterior</a></li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo $searchTerm; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
            <?php if ($page < $totalPages): ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 1); ?>&search=<?php echo $searchTerm; ?>">Próxima</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
<script>
    function apagarSinais() {
        if (confirm('Tem certeza de que deseja apagar todos os sinais cadastrados?')) {
            window.location.href = 'delete_all_signals.php';
        }
    }
</script>
</body>
</html>
