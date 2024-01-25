<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico de Horas Pagantes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <style>
        .chart-container {
            position: relative;
            width: 100%;
            height: 400px;
            filter: blur(5px); /* Aplica o efeito de embaçamento no gráfico */
        }

        .chart-container canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
<div class="p-3 mb-2 bg-dark text-white">
    <div class="chart-container">
        <canvas id="chart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Dados fictícios para o gráfico
    const gameLabels = ['Fortune Tiger', 'Fortune Ox', 'Fortune Rabbit', 'Fortune Mouse'];
    const bestTimes = [
        [20, 30, 25, 35, 40, 30, 45, 50, 45, 40, 35, 30, 20, 10, 5, 15, 25, 30, 35, 40, 45, 50, 45, 40, 30, 20, 10],
        [10, 15, 20, 25, 30, 35, 40, 45, 50, 45, 40, 35, 30, 20, 10, 5, 15, 20, 25, 30, 35, 40, 45, 50, 45, 35, 25],
        [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 45, 40, 35, 25, 15, 10, 20, 30, 35, 40, 45, 50, 45, 40, 30, 20, 10],
        [15, 20, 25, 20, 15, 10, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 45, 40, 35, 30, 20, 15, 10, 5, 10, 15, 20]
    ];

    // Configurações iniciais do gráfico
    const config = {
        type: 'line',
        data: {
            labels: generateHourLabels(),
            datasets: []
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 50,
                    title: {
                        display: true,
                        text: 'Horas Pagantes'
                    }
                }
            }
        }
    };

    // Adiciona os dados de cada jogo ao gráfico
    for (let i = 0; i < gameLabels.length; i++) {
        const dataset = {
            label: gameLabels[i],
            data: bestTimes[i],
            borderColor: randomColor(),
            fill: false
        };
        config.data.datasets.push(dataset);
    }

    // Criação do gráfico inicial
    const ctx = document.getElementById('chart').getContext('2d');
    const chart = new Chart(ctx, config);

    // Função para gerar uma cor aleatória
    function randomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // Função para gerar os rótulos de hora
    function generateHourLabels() {
        const labels = [];
        for (let hour = 0; hour < 24; hour++) {
            const time = `${hour.toString().padStart(2, '0')}:00`;
            labels.push(time);
        }
        return labels;
    }

    // Função para atualizar o gráfico a cada hora
    function updateChart() {
        const currentHour = new Date().getHours();

        // Atualiza os dados do gráfico
        for (let i = 0; i < config.data.datasets.length; i++) {
            const dataset = config.data.datasets[i];

            // Verifica se é o jogo Fortune Tiger ou Fortune Ox
            if (i === 0 || i === 1) {
                // Aplica o crescimento entre as horas 18 e 23
                if (currentHour >= 18 && currentHour <= 23) {
                    const growthFactor = (currentHour - 17) * 5; // Fator de crescimento (5 minutos a mais a cada hora)
                    for (let j = 18; j <= currentHour; j++) {
                        dataset.data[j] = dataset.data[j - 1] + growthFactor;
                    }
                }
            }

            // Gera um novo valor aleatório para o último elemento do array
            dataset.data[dataset.data.length - 1] = Math.floor(Math.random() * 50);
        }

        // Atualiza o gráfico
        chart.update();
    }

    // Intervalo para atualizar o gráfico a cada hora
    setInterval(updateChart, 3600000); // 3600000 milissegundos = 1 hora
</script>
</body>
</html>
