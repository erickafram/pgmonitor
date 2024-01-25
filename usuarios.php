<?php
session_start();
require_once 'db_connection.php';

if ($_SESSION['user_role'] !== 'admin') {
    header('Location: dashboard.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Handle form submission to update role
if (isset($_POST['update_role'])) {
    $user_id = $_POST['user_id'];
    $new_role = $_POST['new_role'];

    // Update the role in the database
    $sqlUpdateRole = "UPDATE users SET role = '$new_role' WHERE id = $user_id";
    if ($conn->query($sqlUpdateRole)) {
        // Redirect back to the same page after successful update
        header("Location: usuarios.php");
        exit();
    } else {
        echo "Error updating role: " . $conn->error;
    }
}

// Filtrar por função (role)
if (isset($_GET['role']) && in_array($_GET['role'], ['user', 'gold', 'admin'])) {
    $selected_role = $_GET['role'];
    $sqlRoleFilter = " AND role = '$selected_role'";
} else {
    $selected_role = 'all'; // Nenhum filtro selecionado
    $sqlRoleFilter = ''; // Filtro vazio para listar todos os usuários
}

// Definir quantidade de registros por página
$records_per_page = 10;

// Definir página atual, padrão é 1 se não estiver definida na URL
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Filtrar a pesquisa, se houver
$searchKeyword = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Obter o total de usuários cadastrados
$sqlTotalUsers = "SELECT COUNT(*) as total FROM users WHERE (name LIKE '%$searchKeyword%' OR email LIKE '%$searchKeyword%') $sqlRoleFilter";
$resultTotalUsers = $conn->query($sqlTotalUsers);
$totalUsers = $resultTotalUsers->fetch_assoc()['total'];

// Calcular o número total de páginas
$total_pages = ceil($totalUsers / $records_per_page);

// Calcular o índice inicial do registro para a página atual
$start_index = ($current_page - 1) * $records_per_page;

// Obter os usuários da página atual
$sqlUsers = "SELECT * FROM users WHERE (name LIKE '%$searchKeyword%' OR email LIKE '%$searchKeyword%') $sqlRoleFilter LIMIT $start_index, $records_per_page";
$resultUsers = $conn->query($sqlUsers);

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
</head>
<body>
<?php include 'menu.php'; ?>

<div class="container mt-5">
    <h2>Lista de Usuários</h2>
    <p>Total de Usuários Cadastrados: <?php echo $totalUsers; ?></p>
    <form class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Pesquisar por nome ou e-mail"
                   value="<?php echo $searchKeyword; ?>">
            <button class="btn btn-primary" type="submit">Pesquisar</button>
        </div>
    </form>

    <!-- Filtro por função (role) -->
    <form class="mb-3">
        <div class="input-group">
            <label class="input-group-text" for="filterRole">Filtrar por função:</label>
            <select class="form-select" name="role" id="filterRole">
                <option value="all" <?php echo ($selected_role === 'all') ? 'selected' : ''; ?>>Todos</option>
                <option value="user" <?php echo ($selected_role === 'user') ? 'selected' : ''; ?>>Usuário</option>
                <option value="gold" <?php echo ($selected_role === 'gold') ? 'selected' : ''; ?>>Gold</option>
                <option value="admin" <?php echo ($selected_role === 'admin') ? 'selected' : ''; ?>>Admin</option>
            </select>
            <button class="btn btn-primary" type="submit">Filtrar</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Função</th>
            <th>Aprovado</th>
            <th>Alterar Função</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($resultUsers->num_rows > 0) : ?>
            <?php while ($row = $resultUsers->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo ucfirst($row['role']); ?></td>
                    <td><?php echo $row['approved'] == 1 ? 'Sim' : 'Não'; ?></td>
                    <td>
                        <!-- Form to update the role -->
                        <form method="post">
                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                            <select name="new_role">
                                <option value="user">Usuário</option>
                                <option value="gold">Gold</option>
                                <option value="admin">Admin</option>
                            </select>
                            <button type="submit" name="update_role" class="btn btn-sm btn-primary">Alterar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan="6" class="text-center">Nenhum usuário encontrado.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <?php if ($total_pages > 1) : ?>
        <nav aria-label="Paginação">
            <ul class="pagination">
                <?php for ($page = 1; $page <= $total_pages; $page++) : ?>
                    <li class="page-item <?php echo ($page == $current_page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $page . (empty($searchKeyword) ? '' : '&search=' . $searchKeyword) . '&role=' . $selected_role; ?>">
                            <?php echo $page; ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>
</body>
</html>
