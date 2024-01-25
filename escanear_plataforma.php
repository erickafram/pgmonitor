<?php
session_start();
require_once 'db_connection.php';

if ($_SESSION['user_role'] !== 'admin') {
    header('Location: dashboard_user.php');
    exit();
}

$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Scanner Plataforma</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @media (max-width: 768px) {
            .fs-5 {
                font-size: 15px!important;
            }
        }

        .green {
            color: green;
        }

        .red {
            color: red;
        }

        .blink {
            animation: blink 1s linear infinite;
        }

        .blink-long {
            animation: blink-long 2s linear infinite;
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes blink-long {
            0% {
                opacity: 1;
            }
            25% {
                opacity: 0.5;
            }
            50% {
                opacity: 0;
            }
            75% {
                opacity: 0.5;
            }
            100% {
                opacity: 1;
            }
        }

        .progress-bar {
            width: 0%;
            transition: width 1s ease-in-out;
        }


    </style>
    <?php include 'menu.php'; ?>
</head>
<body>
<div class="container">
    <div class="alert alert-primary" role="alert">
        Todos os Slots PG<br>
        Plataforma: titiwin.
    </div>
    <div class="row">
        <div class="col-md-4">
            <h5 class="fs-5 fs-md-4">Apostadores Jogando: <span id="total-players">0</span></h5>
        </div>
        <div class="col-md-4">
            <h5 class="fs-5 fs-md-4">Porcentagem de Apostadores Ganhando: <span id="win-percentage" class="green">0%</span></h5>
        </div>
        <div class="col-md-4">
            <h5 class="fs-5 fs-md-4">Porcentagem de Apostadores Perdendo: <span id="loss-percentage" class="red">0%</span></h5>
        </div>
    </div>

    <div class="alert mt-4 alert-danger" id="danger-alert" style="display: none;">
        <span id="danger-message"></span>
    </div>
    <div class="alert mt-4 alert-success" id="success-alert" style="display: none;">
        <span id="success-message"></span>
    </div>
    <p id="connecting-message" style="display: none;" class="blink-long">Coletando Informações dos Slots da Plataforma titiwin Aguarde...</p>
    <div class="progress">
        <div class="progress-bar" id="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <p id="progress-text" class="mt-2"></p>
    <canvas id="chart"></canvas>
    <button id="start-button" class="btn btn-primary mt-4">Iniciar Escaneamento</button>
    <div id="scan-complete-message" class="alert alert-success mt-4" style="display: none;">
        Escaneamento completo! Gerando porcentagem por jogo, aguarde...
    </div>
    <canvas id="chart-games" style="display: none;"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script>
    // Função para gerar um número aleatório entre um intervalo
    function randomNumber(min, max) {
        return Math.random() * (max - min) + min;
    }

    // Dados iniciais
    var labels = [];
    var data = [];
    var totalPlayers = 0;
    var winCount = 0;

    // Variáveis de controle de tempo de exibição
    var winDisplayTime = 3000; // 3 segundos
    var lossDisplayTime = 2000; // 2 segundos

    // Variáveis para controle das mensagens
    var isWinning = false;
    var isLosing = false;

    // Configuração do gráfico
    var ctx = document.getElementById('chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Gráfico de porcentagem',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false // Adiciona a opção fill como false para exibir somente a linha do gráfico
            }]
        },
        options: {
            responsive: true,
            animation: {
                duration: 0
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100 // Define o valor máximo do eixo y como 100
                }
            }
        }
    });

    // Função para atualizar a quantidade de apostadores jogando
    function updateTotalPlayers() {
        var currentPlayers = parseInt(document.getElementById('total-players').textContent);
        var randomVariation = Math.floor(Math.random() * 10) - 5; // Variação aleatória entre -5 e 5
        var newPlayers = currentPlayers + randomVariation;
        newPlayers = Math.max(410, Math.min(1000, newPlayers)); // Limita o novo valor entre 300 e 900
        document.getElementById('total-players').textContent = newPlayers;
    }

    // Função para atualizar os dados do gráfico
    function updateChartData() {
        var randomValue = randomNumber(0, 100);
        labels.push(new Date().toLocaleTimeString());
        data.push(randomValue);
        if (labels.length > 10) {
            labels.shift();
            data.shift();
        }
        chart.data.datasets[0].data = data; // Atualiza os dados do gráfico
        chart.update();
    }

    // Função para calcular a porcentagem de apostadores ganhando com base no horário
    function calculateWinPercentage() {
        var currentHour = new Date().getHours();

        if (currentHour >= 8 && currentHour < 10) {
            return randomNumber(55, 68);
        } else if (currentHour >= 10 && currentHour < 12) {
            return randomNumber(62, 78);
        } else if (currentHour >= 12 && currentHour < 14) {
            return randomNumber(61, 80);
        } else if (currentHour >= 14 && currentHour < 16) {
            return randomNumber(60, 78);
        } else if (currentHour >= 16 && currentHour < 18) {
            return randomNumber(63, 78);
        } else if (currentHour >= 18 && currentHour < 20) {
            return randomNumber(67, 78);
        } else if (currentHour >= 20 && currentHour < 23) {
            return randomNumber(71, 78);
        } else if ((currentHour >= 23 && currentHour < 24) || (currentHour >= 0 && currentHour < 2)) {
            return randomNumber(60, 78);
        } else if (currentHour >= 2 && currentHour < 6) {
            return randomNumber(38, 51);
        } else if (currentHour >= 6 && currentHour < 8) {
            return randomNumber(40, 50);
        }

        return 0;
    }

    // Função para atualizar as estatísticas
    function updateStatistics() {
        var winPercentage = calculateWinPercentage(); // Obtém a porcentagem de apostadores ganhando
        var lossPercentage = Math.min(100 - winPercentage, 100); // Limita o valor máximo da porcentagem em 100
        document.getElementById('win-percentage').textContent = winPercentage.toFixed(2) + '%';
        document.getElementById('loss-percentage').textContent = lossPercentage.toFixed(2) + '%';

        // Adiciona classes CSS para mudar a cor da porcentagem
        document.getElementById('win-percentage').classList.toggle('green', winPercentage > 50);
        document.getElementById('loss-percentage').classList.toggle('red', lossPercentage > 50);

        // Exibe alerta com base na porcentagem
        var dangerAlert = document.getElementById('danger-alert');
        var successAlert = document.getElementById('success-alert');
        var dangerMessage = document.getElementById('danger-message');
        var successMessage = document.getElementById('success-message');

        if (winPercentage > 59) {
            if (!isWinning) {
                dangerAlert.style.display = 'none';
                successAlert.style.display = 'block';
                successMessage.innerHTML = 'Coletando Informações dos Slots da Plataforma titiwin Aguarde...';
                successMessage.classList.add('blink');
                isWinning = true;

                // Define um tempo de exibição maior para a porcentagem de ganho
                setTimeout(function () {
                    successMessage.classList.remove('blink');
                }, winDisplayTime);
            }
            isLosing = false;
        } else if (winPercentage >= 50 && winPercentage <= 59) {
            if (!isWinning) {
                dangerAlert.style.display = 'none';
                successAlert.style.display = 'block';
                successMessage.innerHTML = 'Coletando Informações dos Slots da Plataforma titiwin Aguarde...';
                successMessage.classList.add('blink');
                isWinning = true;

                // Define um tempo de exibição maior para a porcentagem de ganho
                setTimeout(function () {
                    successMessage.classList.remove('blink');
                }, winDisplayTime);
            }
            isLosing = false;
        } else {
            if (!isLosing) {
                successAlert.style.display = 'none';
                dangerAlert.style.display = 'block';
                dangerMessage.textContent = 'Slots em Alerta, excluindo.';
                dangerMessage.classList.add('blink');
                isLosing = true;

                // Define um tempo de exibição menor para a porcentagem de perda
                setTimeout(function () {
                    dangerMessage.classList.remove('blink');
                }, lossDisplayTime);
            }
            isWinning = false;
        }

        // Adiciona a porcentagem de ganho ao gráfico
        data[data.length - 1] = winPercentage;
        chart.data.datasets[0].data = data;
        chart.update();
    }

    // Função para simular uma nova pessoa jogando
    function simulatePlayer() {
        var variation = randomNumber(-10, 10);
        totalPlayers = Math.max(450, Math.min(totalPlayers + variation, 900));

        // Ajusta o valor de winCount para garantir que seja maior ou igual a metade do valor de totalPlayers
        winCount = Math.max(winCount, Math.floor(totalPlayers / 2));

        var hasWon = Math.random() < 0.5; // 50% de chance de ganhar
        if (hasWon) {
            winCount++;
        }
        updateChartData();
        updateStatistics();
    }

    // Função para animar a barra de progresso
    function animateProgressBar() {
        var progressBar = document.getElementById('progress-bar');
        var progressText = document.getElementById('progress-text');
        var width = 0;
        var increment = 100 / 120; // Incremento de 0.8333 para atingir 100% em 2 minutos (120 segundos)
        var interval = setInterval(function () {
            width += increment;
            progressBar.style.width = width + '%';
            progressBar.setAttribute('aria-valuenow', width);

            var percentage = Math.round(width);
            progressText.innerHTML = '<span>' + percentage + '%</span>' + '<br>Coletando Sinais do Slot Fortune Tiger...'; // Exibe a porcentagem e o texto dentro da barra de progresso

            if (percentage === 20) {
                progressText.innerHTML = '<span>' + percentage + '%</span>' + '<br>Coletando Sinais do Slot Fortune Rabbit...';
            } else if (percentage === 40) {
                progressText.innerHTML = '<span>' + percentage + '%</span>' + '<br>Coletando Sinais do Slot Fortune Mouse...';
            } else if (percentage === 60) {
                progressText.innerHTML = '<span>' + percentage + '%</span>' + '<br>Coletando Sinais do Piggy Gold...';
            } else if (percentage === 80) {
                progressText.innerHTML = '<span>' + percentage + '%</span>' + '<br>Coletando Sinais do Fortune Ox...';
            }

            if (width >= 100) {
                clearInterval(interval);
                showScanCompleteMessage();
            }
        }, 1000);
    }

    // Função para exibir a mensagem de escaneamento completo
    function showScanCompleteMessage() {
        var scanCompleteMessage = document.getElementById('scan-complete-message');
        scanCompleteMessage.style.display = 'block';

        // Gera a porcentagem dos jogos Fortune Tiger, Fortune Rabbit, Fortune Mouse, Piggy Gold e Fortune Ox
        var gamesData = [
            { game: 'Fortune Tiger', percentage: randomNumber(50, 90) },
            { game: 'Fortune Rabbit', percentage: randomNumber(40, 60) },
            { game: 'Fortune Mouse', percentage: randomNumber(40, 65) },
            { game: 'Piggy Gold', percentage: randomNumber(40, 65) },
            { game: 'Fortune Ox', percentage: randomNumber(50, 90) }
        ];

        // Configuração do gráfico dos jogos
        var ctxGames = document.getElementById('chart-games').getContext('2d');
        var chartGames = new Chart(ctxGames, {
            type: 'bar',
            data: {
                labels: gamesData.map(item => item.game),
                datasets: [{
                    label: 'Porcentagem dos Jogos',
                    data: gamesData.map(item => item.percentage),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                animation: {
                    duration: 0
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100 // Define o valor máximo do eixo y como 100
                    }
                }
            }
        });

        // Exibe o gráfico dos jogos
        var chartGamesCanvas = document.getElementById('chart-games');
        chartGamesCanvas.style.display = 'block';
    }

    // Ação do botão "Iniciar"
    document.getElementById('start-button').addEventListener('click', function() {
        var startButton = document.getElementById('start-button');
        startButton.style.display = 'none'; // Oculta o botão "Iniciar"

        var connectingMessage = document.getElementById('connecting-message');
        connectingMessage.style.display = 'block'; // Exibe a mensagem "Coletando Informações dos Slots da Plataforma// Aguarde..."
        connectingMessage.textContent = 'Conectando com o servidor da titiwin...';

        setTimeout(function() {
            connectingMessage.style.animation = 'blink 1s linear infinite'; // Inicia a animação da mensagem
            setTimeout(function() {
                connectingMessage.style.animation = ''; // Remove a animação após 5 segundos
                connectingMessage.textContent = 'Conectado!';
                setTimeout(function() {
                    connectingMessage.style.display = 'none'; // Oculta a mensagem de conexão
                    animateProgressBar(); // Inicia a animação da barra de progresso

                    // Atualiza o gráfico e simula um novo jogador a cada segundo
                    setInterval(function() {
                        simulatePlayer();
                    }, 2000);

                    // Atualiza a quantidade de jogadores a cada 8 segundos
                    setInterval(function() {
                        updateTotalPlayers();
                    }, 8000);
                }, 4000); // Atraso de 2 segundos após a mensagem de conexão
            }, 8000); // Mantém a mensagem piscando por 6 segundos
        }, 4000); // Atraso de 2 segundos antes de exibir a mensagem de conexão
    });
</script>
</body>
</html>
