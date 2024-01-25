<?php
session_start();
require_once 'db_connection.php';

if ($_SESSION['user_role'] !== 'admin') {
    header('Location: dashboard.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$_SESSION['user_id'] = $user_id;

require_once 'db_connection.php';

$message = '';
$emails = [];

// Obter os emails dos usuários cadastrados
$sql = "SELECT email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $emails[] = $row['email'];
    }
}

// Processar o formulário de envio de e-mail
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Configurações do servidor SMTP
    $smtpHost = 'mail.pgmonitor.com.br';
    $smtpPort = 465;
    $smtpUsername = 'promocao@pgmonitor.com.br';
    $smtpPassword = 'x[staDXzjpa_';

    // Função para enviar e-mail
    function enviarEmail($to, $subject, $htmlMessage, $smtpHost, $smtpPort, $smtpUsername, $smtpPassword) {
        // Configurar as informações do e-mail
        $headers = "From: $smtpUsername" . "\r\n";
        $headers .= "Reply-To: $smtpUsername" . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Enviar o e-mail
        $result = mail($to, $subject, $htmlMessage, $headers);

        return $result;
    }

    $subject = $_POST['subject'];
    $textMessage = $_POST['message']; // Mantenha o campo de mensagem em texto simples para compatibilidade

    $htmlMessage = $_POST['html_message']; // Adicione o campo de mensagem em HTML

    // Enviar e-mail para cada usuário individualmente
    if (isset($_POST['individual'])) {
        if (isset($_POST['selected_emails'])) {
            $selectedEmails = (array) $_POST['selected_emails'];
            foreach ($selectedEmails as $email) {
                enviarEmail($email, $subject, $htmlMessage, $smtpHost, $smtpPort, $smtpUsername, $smtpPassword);
            }

            $message = 'E-mails individuais enviados com sucesso.';
        } else {
            $message = 'Nenhum usuário selecionado.';
        }
    }

    // Enviar e-mail para todos os usuários em um único envio
    if (isset($_POST['todos'])) {
        $to = implode(',', $emails);
        enviarEmail($to, $subject, $htmlMessage, $smtpHost, $smtpPort, $smtpUsername, $smtpPassword);

        $message = 'E-mail para todos os usuários enviado com sucesso.';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enviar E-mail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <script>
        function setTemplate() {
            var template = document.getElementById("template").value;
            var html_message = document.getElementById("html_message");

            switch (template) {
                case "modelo1":
                    html_message.value = `<!DOCTYPE html>
<html>
<head>
    <center><img src="https://pgmonitor.com.br/imagem/logo-pg.png" alt="Imagem Boxs Win" style="width: 250px; height: auto;"></center>
    <title>Lançamento Surpresa de Nova Plataforma do Grupo Wingdas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div style="font-family: Arial, sans-serif; text-align: center;">
    <h1 style="color: #0066cc;">⭐NOVO LANÇAMENTO⭐</h1>
    <hr style="border: 1px solid #0066cc; max-width: 250px; margin: 30px auto;">
     <h2 style="color: #0066cc; margin-top: 20px;">PLATAFORMA NOVA:</h2>
    <h2 style="color: #0066cc;">🎰  Winzada777 🎰</h2>

    <p><strong>CÓDIGO:</strong> Z7N5SZ</p>
    <p><strong>LINK DA SORTE:</strong> <a href="https://app.winzada777.com/?invite=Z7N5SZ#/home">ACESSE AGORA</a></p>

    <p style="font-size: 18px;">100% TESTADA E APROVADA!</p>
    <p style="font-size: 18px;">DEPÓSITO, SAQUES, JOGOS E CLARO: TÁ PAGANDO DEMAAIS 💲</p>

    <p style="font-size: 18px; color: #cc3300;">A REGRA É CLARA: PLATAFORMA NOVA PAGA MUUUUITO NOS PRIMEIROS DIAS, CORRE E APROVEITAAA 🤩</p>

    <p style="font-size: 18px;">LEMBRE DE SEGUIR AS RECOMENDAÇÕES DO GRUPO CLICANDO <a href="https://chat.whatsapp.com/JG3AGHLgkZhAZP54sgWzix">AQUI</a> 👍</p>
</div>
</body>
</html>`;
                    break;

                case "modelo2":
                    html_message.value = `<!DOCTYPE html>
<html>
<head>
    <center><img src="https://pgmonitor.com.br/imagem/logo-pg.png" alt="Imagem Boxs Win" style="width: 250px; height: auto;"></center>
    <title>Lançamento Surpresa de Nova Plataforma do Grupo Wingdas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div style="font-family: Arial, sans-serif; text-align: center;">
    <h1 style="color: #0066cc;">⭐NOVO LANÇAMENTO⭐</h1>
    <hr style="border: 1px solid #0066cc; max-width: 250px; margin: 30px auto;">
    <!-- Conteúdo do Modelo 2 ... -->
</div>
</body>
</html>`;
                    break;

                default:
                    // Modelo Padrão (ou nenhum modelo selecionado)
                    html_message.value = "";
            }
        }
    </script>
</head>
<body>
<?php include 'menu.php'; ?>
<div class="container">
    <h2>Enviar E-mail</h2>
    <form action="enviar_email.php" method="POST" onsubmit="return confirmarEnvioEmail()">
    <!-- Adicione a lista suspensa para selecionar o modelo -->
        <div class="mb-3">
            <label for="template" class="form-label">Escolha o modelo:</label>
            <select class="form-control" id="template" name="template" onchange="setTemplate()">
                <option value="default">Modelo Padrão</option>
                <option value="modelo1">Modelo Nova Plataforma</option>
                <option value="modelo2">Modelo PG MONITOR</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Assunto:</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Mensagem (Texto Simples):</label>
            <textarea class="form-control" id="message" name="message" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label for="html_message" class="form-label">Mensagem (HTML):</label>
            <textarea class="form-control" id="html_message" name="html_message" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="individual" name="individual">
                <label class="form-check-label" for="individual">Enviar e-mail para cada usuário individualmente</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="todos" name="todos">
                <label class="form-check-label" for="todos">Enviar e-mail para todos os usuários</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="searchInput" class="form-label">Pesquisar e selecionar usuários:</label>
            <input type="text" class="form-control" id="searchInput" oninput="filterEmails()" placeholder="Digite o email">
            <div id="emailList" class="dropdown-menu" style="display: none;"></div>
        </div>
        <div class="mb-3">
            <label class="form-label">Emails selecionados:</label>
            <div id="tokenInputList" class="token-input-list" onclick="focusSearchInput()"></div>
            <input type="hidden" id="selectedEmailsInput" name="selected_emails" value="">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Enviar E-mail</button>
        </div>
        <?php if (!empty($message)) : ?>
            <div class="alert alert-success"><?php echo $message; ?></div>
        <?php endif; ?>
    </form>
</div>

<script>
    var selectedEmails = [];

    function toggleSelectedEmail(email) {
        var index = selectedEmails.indexOf(email);

        if (index > -1) {
            selectedEmails.splice(index, 1);
        } else {
            selectedEmails.push(email);
            document.getElementById('emailList').style.display = 'none'; // Ocultar a lista de emails ao selecionar um email
        }

        updateSelectedEmailsInput();
        updateTokenInputList();

        document.getElementById('searchInput').value = ''; // Limpar o campo de pesquisa após selecionar um email
    }

    function confirmarEnvioEmail() {
        // Pergunta ao usuário se tem certeza de enviar o email
        var confirmacao = confirm('Tem certeza de que deseja enviar o email agora?');

        // Se o usuário confirmar, retorna true (continua com o envio do email)
        // Caso contrário, retorna false (cancela o envio do email)
        return confirmacao;
    }

    function updateTokenInputList() {
        var tokenInputList = document.getElementById("tokenInputList");
        tokenInputList.innerHTML = "";

        selectedEmails.forEach(function (email) {
            var item = document.createElement("div");
            item.classList.add("token-input-item");

            var text = document.createTextNode(email);
            item.appendChild(text);

            var removeButton = document.createElement("span");
            removeButton.classList.add("token-input-remove");
            removeButton.innerHTML = "&times;";
            removeButton.setAttribute("onclick", "removeTokenInput(this, '" + email + "')");

            item.appendChild(removeButton);
            tokenInputList.appendChild(item);
        });

        updateSelectedEmailsInput(); // Adicione essa linha para atualizar o valor do input hidden
    }

    function updateSelectedEmailsInput() {
        var selectedEmailsInput = document.getElementById("selectedEmailsInput");
        selectedEmailsInput.value = selectedEmails.join(",");
    }

    function filterEmails() {
        var input = document.getElementById("searchInput");
        var filter = input.value.toLowerCase();
        var emailList = document.getElementById("emailList");
        emailList.innerHTML = "";

        if (filter.length === 0) {
            emailList.style.display = "none";
            return;
        }

        var filteredEmails = <?php echo json_encode($emails); ?>.filter(function (email) {
            return email.toLowerCase().indexOf(filter) !== -1;
        });

        filteredEmails.forEach(function (email) {
            var item = document.createElement("label");
            item.classList.add("dropdown-item");

            var checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.name = "selected_emails[]";
            checkbox.value = email;
            checkbox.onchange = function () {
                toggleSelectedEmail(email);
            };

            if (selectedEmails.includes(email)) {
                checkbox.checked = true;
            }

            item.appendChild(checkbox);

            var text = document.createTextNode(email);
            item.appendChild(text);

            emailList.appendChild(item);
        });

        emailList.style.display = filteredEmails.length > 0 ? "block" : "none";
    }

    function focusSearchInput() {
        var searchInput = document.getElementById("searchInput");
        searchInput.focus();
    }
</script>
</body>
</html>
