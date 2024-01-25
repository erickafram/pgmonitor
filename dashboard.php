<?php
session_start();
require_once 'db_connection.php';

if ($_SESSION['user_role'] !== 'admin' && $_SESSION['user_role'] !== 'gold') {
    header('Location: dashboard_user.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$user_role = $_SESSION['user_role'];

$currentDateTime = date('Y-m-d H:i:s');
$limit = 5;
if ($user_role === 'user') {
    $limit = 5;
} else {
    $limit = PHP_INT_MAX;
}

$sqlUserSignals = "SELECT signal_id FROM user_signals WHERE user_id = $user_id";
$resultUserSignals = $conn->query($sqlUserSignals);

$userSignals = [];
if ($resultUserSignals->num_rows > 0) {
    while ($rowUserSignals = $resultUserSignals->fetch_assoc()) {
        $userSignals[] = $rowUserSignals['signal_id'];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>PG Monitor - Scanner IA para Slots - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <script src="https://co-in.io/pt/widget/pricelist.js?items=BTC" async></script>
    <style>
        .tabela {
            border: 1px solid #eee;
            padding: 10px;
        }
        .toast-container {
            position: fixed;
            bottom: 10px;
            right: 10px;
            z-index: 1000;
        }

        .piscando {
            animation: piscar 1s infinite;
        }

        @keyframes piscar {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }
        .progresso .progress {
            --bs-progress-bg: #ffffff !important;
        }
    </style>
    <script>
        var userSignals = <?php echo json_encode($userSignals); ?>;
        var isShowingMessage1 = true;
        var messagesInterval;

        function pegarSinal(signalId) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert("Sinal pegado!");
                    var row = document.getElementById("signalRow_" + signalId);
                    row.parentNode.removeChild(row);
                }
            };
            xhttp.open("POST", "add_user_signal.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("signalId=" + signalId);
        }

        function gerarMaisSinais() {
            var progressBar = document.getElementById('progressBar');
            progressBar.value = 0;
            progressBar.style.display = 'block';

            // Exibir a div de progresso
            document.querySelector('.progress').style.display = 'block';

            document.getElementById('gerarMaisSinaisMessage').innerText = 'Robô escaneando sinais em plataformas pagantes, aguarde...';
            document.getElementById('gerarMaisSinaisMessage').style.display = 'block';

            messagesInterval = setInterval(function() {
                if (isShowingMessage1) {
                    document.getElementById('gerarMaisSinaisMessage').innerText = 'Plataforma pagante indentificada...';
                } else {
                    document.getElementById('gerarMaisSinaisMessage').innerText = 'Processando seu sinal, por favor, aguarde...';
                }
                isShowingMessage1 = !isShowingMessage1;
            }, 5000);

            var progressValue = 0;
            var progressInterval = setInterval(function() {
                progressValue += 10;
                if (progressValue <= 100) {
                    progressBar.value = progressValue;
                } else {
                    clearInterval(progressInterval);
                }
            }, 1500);

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var signal = JSON.parse(this.responseText);
                    if (signal !== null) {
                        var newRow = document.createElement('tr');
                        newRow.id = "signalRow_" + signal.id;
                        newRow.innerHTML = `<td>${signal.game_name}</td>
    <td>${signal.date}</td>
    <td>${signal.time}</td>
    <td>${signal.normal_rounds}x</td>
    <td>${signal.turbo_rounds}x</td>
    <td>${signal.auto_rounds}x</td>
<td>
    <div class="progress" style="height: 18px;">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: ${signal.percentage}" aria-valuenow="78" aria-valuemin="78" aria-valuemax="91">
            ${signal.percentage}
        </div>
    </div>
</td>
    <td>${signal.platform}</td>
    <td><a href="#" onclick="openPopup('${signal.link}')">IR PARA PLATAFORMA</a></td>
    <td><button class="btn btn-primary  btn-sm" onclick="pegarSinal(${signal.id})">Pegar Sinal</button></td>`;
                        document.getElementById('signalsTableBody').appendChild(newRow);
                    }
                    clearInterval(messagesInterval);
                    clearInterval(progressInterval);
                    progressBar.style.display = 'none';
                    document.getElementById('gerarMaisSinaisMessage').classList.remove('piscando');
                    document.getElementById('gerarMaisSinaisButton').innerText = 'Scanner IA';
                    document.getElementById('gerarMaisSinaisMessage').innerText = signal !== null ? 'Sinal indentificado com sucesso.' : 'Não há sinais com alta assertividade disponíveis. Por favor, tente novamente em alguns segundos...';
                    setTimeout(function() {
                        document.getElementById('gerarMaisSinaisMessage').style.display = 'none';
                        document.getElementById('gerarMaisSinaisMessage').classList.add('piscando');
                    }, 3000);
                }
            };
            xhttp.open("GET", "get_more_signals.php?t=" + Date.now(), true); // Adiciona um parâmetro de tempo exclusivo
            xhttp.send();
        }

        function openPopup(link) {
            const width = 500;
            const height = 550;
            const left = (window.screen.width / 1.68) - (width / 2);
            const top = (window.screen.height / 2) - (height / 2);
            window.open(link, '_blank', `width=${width},height=${height},left=${left},top=${top}`);
        }

        function deleteCookies() {
            document.cookie.split(";").forEach(function(cookie) {
                var name = cookie.split("=")[0].trim();
                document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            });
            alert("Cookies apagados com sucesso!");
            location.reload(); // Atualiza a página automaticamente
        }

    </script>


</head>
<body>
<?php include 'menu.php'; ?>
<div class="container">
    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'user'): ?>
        <div class="alert alert-warning">
            Não limite seus resultados a apenas (5) sinais! Garanta acesso ilimitado a todos os sinais disponíveis.
            <a href="vendas.php">Assine agora</a> e amplie suas oportunidades de sucesso!
        </div>
    <?php endif; ?>
    <div class="alert alert-primary" role="alert">
        Desvendando o Potencial Lucrativo dos Slots com Análise de Tendências do Bitcoin e Algoritmos Avançados!
        Descubra o RTP (Retorno ao Jogador): A Chave para Maximizar seus Ganhos nos Slots. Aumente suas Chances de Vitória com Porcentagens de Pagamento Mais Altas!
    </div>
    <?php include 'script_widget.php'; ?>
    <br>
    <div class="tabela">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th class="small">Jogo</th>
                <th class="small">Data</th>
                <th class="small">Minuto</th>
                <th class="small">Normal</th>
                <th class="small">Turbo</th>
                <th class="small">Auto</th>
                <th class="small">Assertividade</th>
                <th class="small">Plataforma</th>
                <th class="small">Link</th>
                <th class="small">Ação</th>
            </tr>
            </thead>
            <tbody id="signalsTableBody">
            </tbody>
        </table>
    </div>
    <div class="progresso">
    <div class="progress" style="display: none;">
        <progress id="progressBar" value="0" max="100"></progress>
    </div>
    </div>
        <div id="gerarMaisSinaisMessage" class="piscando" style="display: none;">Aguarde enquanto o robô rastreia novos sinais em plataformas pagantes...</div>
    <button id="gerarMaisSinaisButton" class="btn btn-primary  btn-sm" onclick="gerarMaisSinais()">Scanner IA</button>
    <a href="user_signals.php" class="btn btn-primary  btn-sm">Meus Sinais</a>
    <button class="btn btn-danger  btn-sm" onclick="deleteCookies()">Apagar Cookies</button>
    </div>
    <div class="alert alert-danger" role="alert" style="margin-top:15px; font-size:13px;">
        Lembre-se de fazer no máximo 20 rodadas por slot, caso não ganhar em 20 rodadas, tente outro horário ou outro slot.
    </div>
    <?php include 'popup_plataforma.php'; ?>
    <?php include 'grafico_horario.php'; ?> <br>
    <?php include 'notification_site.php'; ?> <br>
</div>
<br>
<br>
<br>
<br>
<br>
</body>
</html>