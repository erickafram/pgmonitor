<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include 'menu.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <title>Formulário de Suporte</title>
</head>
<body>
<div class="container mt-5">
    <h1>Formulário de Suporte</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Assunto</label>
            <select class="form-select" id="subject" name="subject" required>
                <option value="">Selecione o Assunto</option>
                <option value="Suporte">Suporte</option>
                <option value="Vendas">Vendas</option>
                <option value="Liberação de Acesso">Liberação de Acesso</option>
                <option value="Outros">Outros</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Mensagem</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="attachment" class="form-label">Anexo (até 2 MB)</label>
            <input type="file" class="form-control" id="attachment" name="attachment">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Configurações do servidor SMTP
    $smtpHost = 'mail.pgmonitor.com.br';
    $smtpPort = 465;
    $smtpUsername = 'suporte@pgmonitor.com.br';
    $smtpPassword = '@@Pgmonitor@@23';

    // Cabeçalhos do e-mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Configurações adicionais
    $smtpOptions = "-f $smtpUsername";

    // Montar a mensagem do e-mail
    $emailContent = "Nome: $name\n";
    $emailContent .= "E-mail: $email\n\n";
    $emailContent .= "Assunto: $subject\n\n";
    $emailContent .= "Mensagem:\n$message";

    // Verificar se um arquivo foi enviado
    if (isset($_FILES['attachment'])) {
        $attachment = $_FILES['attachment'];
        $attachmentName = $attachment['name'];
        $attachmentTempName = $attachment['tmp_name'];
        $attachmentSize = $attachment['size'];

        // Verificar o tamanho do anexo (2 MB máximo)
        if ($attachmentSize <= 2 * 1024 * 1024) {
            // Ler o conteúdo do arquivo
            $attachmentContent = file_get_contents($attachmentTempName);

            // Gerar um identificador único para o anexo
            $attachmentId = md5(uniqid());

            // Adicionar o anexo ao e-mail
            $headers .= "Content-Type: application/octet-stream\r\n";
            $headers .= "Content-Disposition: attachment; filename=\"$attachmentName\"\r\n";
            $emailContent .= "\r\n";
            $emailContent .= $attachmentContent;
        } else {
            echo '
            <div class="container mt-5">
                <div class="alert alert-danger" role="alert">
                    O tamanho do anexo excede o limite de 2 MB. Por favor, selecione um arquivo menor.
                </div>
            </div>';
            exit();
        }
    }

    // Enviar o e-mail
    if (mail($smtpUsername, $subject, $emailContent, $headers, $smtpOptions)) {
        echo '
    <div class="container mt-5">
        <div class="alert alert-success" role="alert">
            E-mail enviado com sucesso!
        </div>
        <p>O PG MONITOR está à disposição para tirar qualquer dúvida através do nosso canal de suporte.</p>
    </div>';
    } else {
        echo '
    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            Erro ao enviar o e-mail. Por favor, tente novamente mais tarde.
        </div>
    </div>';
    }
}
?>

</body>
</html>
