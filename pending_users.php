<?php
session_start();
require_once 'db_connection.php';

if ($_SESSION['user_role'] !== 'admin') {
    header('Location: dashboard.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$_SESSION['user_id'] = $user_id; // Adicionar esta linha para definir a variável $user_id

// Função para enviar o e-mail de confirmação
function sendApprovalEmail($toEmail)
{
    $subject = 'Aprovação de Usuário';

    // Construir o conteúdo HTML do e-mail
    $message = '<html><body>';
    $message .= '<h1>Seu usuário foi aprovado</h1>';
    $message .= '<p>Agora você pode fazer login no sistema.</p>';
    $message .= '<p><a href="https://www.pgmonitor.com.br">Acessar o sistema</a></p>';
    $message .= '</body></html>';

    $headers = "From: suporte@pgmonitor.com.br" . "\r\n";
    $headers .= "Reply-To: suporte@pgmonitor.com.br" . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";

    return mail($toEmail, $subject, $message, $headers);
}

// Verificar se um usuário foi aprovado ou rejeitado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id']) && isset($_POST['approval'])) {
    $user_id = $_POST['user_id'];
    $approval = $_POST['approval'];

    // Atualizar o status de aprovação do usuário no banco de dados
    $updateSql = "UPDATE users SET approved = '$approval' WHERE id = '$user_id'";
    if ($conn->query($updateSql) === TRUE) {
        $successMessage = "Status de aprovação atualizado com sucesso.";

        // Enviar e-mail de confirmação
        $userSql = "SELECT * FROM users WHERE id = '$user_id'";
        $userResult = $conn->query($userSql);
        if ($userResult->num_rows > 0) {
            $userRow = $userResult->fetch_assoc();
            $toEmail = $userRow['email'];
            if (sendApprovalEmail($toEmail)) {
                $successMessage .= " E-mail de confirmação enviado para o usuário.";
            } else {
                $errorMessage = "Erro ao enviar o e-mail de confirmação.";
            }
        }
    } else {
        $errorMessage = "Erro ao atualizar o status de aprovação: " . $conn->error;
    }
}

// Consultar os usuários pendentes de aprovação
$userSql = "SELECT * FROM users WHERE approved = '0'";
$userResult = $conn->query($userSql);

// Contar a quantidade de usuários pendentes
$numPendingUsers = $userResult->num_rows;

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Sinais - Usuários Pendentes de Aprovação</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
</head>
<body>
<?php include 'menu.php'; ?>
<div class="container">
    <h2>Sistema de Sinais - Administração</h2>
    <h3>Usuários Pendentes de Aprovação</h3>

    <!-- Mostrar quantidade de usuários pendentes -->
    <?php if ($numPendingUsers > 0): ?>
        <div class="alert alert-info" role="alert">
            <?php echo "Existem $numPendingUsers pessoas com aprovação pendente."; ?>
        </div>
    <?php endif; ?>

    <?php if (isset($successMessage)): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $successMessage; ?>
        </div>
    <?php endif; ?>
    <?php if (isset($errorMessage)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>
    <?php if ($userResult->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Nome Completo</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Aprovar/Reprovar</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($userRow = $userResult->fetch_assoc()): ?>
                    <tr>
                        <!-- <td><?php echo $userRow['id']; ?></td> -->
                        <td><?php echo $userRow['name']; ?></td>
                        <td><?php echo $userRow['email']; ?></td>
                        <td><?php echo $userRow['phone']; ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="user_id" value="<?php echo $userRow['id']; ?>">
                                <div class="btn-group" role="group" aria-label="Aprovar/Reprovar">
                                    <button type="submit" name="approval" value="1" class="btn btn-success">Aprovar</button>
                                    <button type="submit" name="approval" value="0" class="btn btn-danger">Reprovar</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p>Nenhum usuário pendente de aprovação encontrado.</p>
    <?php endif; ?>
</div>
</body>
</html>
