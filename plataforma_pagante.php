<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Filtrar os sinais cujo horário ainda não venceu
$currentDateTime = date('Y-m-d H:i:s');
$sql = "SELECT * FROM signals WHERE CONCAT(date, ' ', time) > '$currentDateTime'";
$result = $conn->query($sql);

$platforms = [
    [
        'name' => 'Plataforma E',
        'paymentTimes' => ['16:00','17:00','18:00','19:00', '20:00', '21:00', '22:00', '23:00'],
    ],

    [
        'name' => 'Plataforma A',
        'paymentTimes' => ['16:00','17:00','18:00','19:00', '20:00', '21:00', '22:00', '23:00'],
    ],

    [
        'name' => 'Plataforma B',
        'paymentTimes' => ['16:00','17:00','18:00','19:00', '20:00', '21:00', '22:00', '23:00'],
    ],
    [
        'name' => 'Plataforma C',
        'paymentTimes' => ['16:00','17:00','18:00','19:00', '20:00', '21:00', '22:00', '23:00'],
    ],
    [
        'name' => 'Plataforma D',
        'paymentTimes' => ['16:00','17:00','18:00','19:00', '20:00', '21:00', '22:00', '23:00'],
    ]
];

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'menu.php'; ?>
    <title>Lista de Plataformas Pagantes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .platform-list {
            list-style: none;
            padding: 0;
        }
        .platform-list li {
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        .platform-name {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .progress-bar {
            height: 20px;
            position: relative;
        }
        .platform-link {
            display: inline-block;
            margin-top: 10px;
        }
        .progress-bar-text {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            color: #000;
            font-weight: bold;
            line-height: 15px;
            color:white;
        }
        .platform-chart {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 300px !important;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="alert alert-primary" role="alert" style="font-size:14px;">
        <div style="font-size: 19px; padding-bottom:5px; text-align: center;"> Plataformas Pagantes: Estatísticas e Horários - Pesquisa Robótica em Tempo Real </div>
        O PG MONITOR, sua ferramenta essencial para o sucesso nos jogos. Descubra as principais plataformas que estão pagando
        alto e conquiste lucros garantidos. Faça seu cadastro em algumas dessas casas, realize um depósito e comece a ganhar d
        inheiro agora mesmo. Com nosso sistema de pesquisa robótica em tempo real, você terá acesso às estatísticas atualizadas e
        aos horários mais favoráveis para jogar. Aproveite essa oportunidade única e alcance o sucesso nos seus jogos favoritos.
        Cadastre-se hoje mesmo e experimente a emoção de conquistar lucros incríveis!
    </div>

    <ul class="platform-list">
        <li>
            <div class="platform-name">Ganhador.vip</div>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success btn-lg btn-block" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 81%">
                    <span class="progress-bar-text">81%</span>
                </div>
            </div>
            <a href="https://ganhador.vip/#/?invite_code=F6KSBZ" class="platform-link" target="_blank">Acessar Plataforma</a>
            <div class="platform-chart">
                <canvas id="platformChartE"></canvas>
            </div>
        </li>

        <li>
            <div class="platform-name">Winzada777</div>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success btn-lg btn-block" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                    <span class="progress-bar-text">65%</span>
                </div>
            </div>
            <a href="https://app.winzada777.com/?invite=Z7N5SZ" class="platform-link" target="_blank">Acessar Plataforma</a>
            <div class="platform-chart">
                <canvas id="platformChartA"></canvas>
            </div>
        </li>

        <li>
            <div class="platform-name">Boxswin</div>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success btn-lg btn-block" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 62%">
                    <span class="progress-bar-text">62%</span>
                </div>
            </div>
            <a href="https://www.boxswin.com/?code=ahdrvk" class="platform-link" target="_blank">Acessar Plataforma</a>
            <div class="platform-chart">
                <canvas id="platformChartB"></canvas>
            </div>
        </li>

        <li>

            <div class="platform-name">Only777</div>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success btn-lg btn-block" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                    <span class="progress-bar-text">60%</span>
                </div>
            </div>
            <a href="https://app.only777.com/?invite=FXBWJU" class="platform-link" target="_blank">Acessar Plataforma</a>
            <div class="platform-chart">
                <canvas id="platformChartC"></canvas>
            </div>
        </li>

        <li>
            <div class="platform-name">Sambawin</div>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success btn-lg btn-block" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 58%">
                    <span class="progress-bar-text">58%</span>
                </div>
            </div>
            <a href="https://www.sambawin.com/c-4gHvQ9fp?lang=pt " class="platform-link" target="_blank">Acessar Plataforma</a>
            <div class="platform-chart">
                <canvas id="platformChartD"></canvas>
            </div>
        </li>
    </ul>
</div>

<script>
    var platforms = [

        {
            name: 'E',
            percentages: [35, 55, 68, 68, 54, 79, 68, 70, 78, 78, 78, 75, 75, 71, 73, 77, 71, 75, 72, 73, 68, 66, 71, 65]
        },

        {
            name: 'A',
            percentages: [30, 55, 58, 62, 44, 69, 58, 70, 71, 75, 78, 70, 75, 71, 73, 77, 71, 75, 72, 63, 58, 56, 61, 55]
        },
        {
            name: 'B',
            percentages: [23, 61, 43, 52, 34, 59, 48, 50, 51, 55, 58, 60, 65, 60, 62, 68, 60, 60, 60, 60, 65, 60, 60, 60]
        },
        {
            name: 'C',
            percentages: [20, 35, 37, 40, 48, 40, 42, 45, 50, 51, 40, 58, 60, 51, 48, 55, 60, 60, 60, 60, 55, 50, 40, 50]
        },
        {
            name: 'D',
            percentages: [36, 47, 48, 29, 45, 42, 43, 38, 40, 52, 50, 55, 50, 50, 55, 40, 30, 40, 30, 30, 50, 45, 50, 40]
        }
    ];

    platforms.forEach(function(platform) {
        var ctx = document.getElementById('platformChart' + platform.name).getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00','01:00','02:00','03:00','04:00','05:00','06:00','06:00','07:00'],
                datasets: [{
                    label: 'Melhor Horário de Pagamentos da Plataforma',
                    data: platform.percentages,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: true
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            stepSize: 10
                        }
                    }
                }
            }
        });
    });
</script>
<?php include 'notification_site.php'; ?>
</body>
</html>


