<?php
if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'gold')):
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gráfico de Horas Pagantes</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    </head>
    <body>
    <div class="p-3 mb-2 bg-dark text-white">
        <h5>Gráfico de horas Pagantes por jogo</h5>
        <canvas id="chart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/1.0.2/chartjs-plugin-annotation.min.js"></script>
    <script>
        // Dados fictícios para o gráfico
        const gameLabels = ['Fortune Tiger', 'Fortune Ox', 'Fortune Rabbit', 'Fortune Mouse'];
        const bestTimes = [
            [40, 45, 45, 40, 40, 40, 45, 50, 55, 50, 30, 30, 50, 50, 55, 65, 65, 70, 75, 80, 80, 90, 95, 95],
            [20, 35, 20, 25, 30, 35, 40, 45, 50, 45, 40, 35, 30, 20, 30, 60, 60, 60, 65, 70, 70, 85, 80, 80],
            [5, 30, 15, 20, 25, 30, 35, 40, 45, 50, 45, 40, 35, 35, 35, 30, 60, 40, 55, 50, 55, 60, 75, 70],
            [15, 30, 35, 30, 25, 20, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 55, 50, 45, 40, 30, 55, 60, 55]
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
                animation: {
                    duration: 500, // Animation duration in milliseconds
                    easing: 'linear', // Animation easing function
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        title: {
                            display: true,
                            text: 'Horas Pagantes'
                        }
                    }
                },
                plugins: {
                    annotation: {
                        annotations: [
                            {
                                type: 'line',
                                mode: 'vertical',
                                scaleID: 'x',
                                value: new Date().getHours(),
                                borderColor: 'rgba(255, 255, 255, 0.8)',
                                borderWidth: 2,
                                label: {
                                    enabled: true,
                                    content: 'Now', // Label text
                                    position: 'top', // Label position
                                    backgroundColor: 'rgba(255, 255, 255, 0.8)', // Label background color
                                    font: {
                                        size: 12, // Label font size
                                    }
                                }
                            }
                        ]
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
<?php endif; ?>
