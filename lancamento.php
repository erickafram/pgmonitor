<!DOCTYPE html>
<html>
<head>
    <title>Lançamento PG MONITOR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Montserrat);
        body,
        html {
            display: block;
            padding: 0;
            margin: 0;
            width: 100%;
            position: relative;
            height: 100%;
        }

        body {
            font-family: "bebas_neuebold", "Arial", sans-serif;
        }

        section {
            position: relative;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, #fbb600, #da5900);
        }

        #beerCanvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
        }

        .coming_content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70%;
            margin: 0 auto;
            color: white;
            text-align: center;
            z-index: 101;
        }
        .coming_content h1 {
            font-size: 5.625em;
            margin: 0;
            letter-spacing: 2px;
            text-align: center;
            color: white;
        }
        .coming_content .separator_container {
            width: 100%;
            display: block;
            text-align: center;
            position: relative;
            margin: 12px 0;
        }
        .coming_content .separator_container:before, .coming_content .separator_container:after {
            display: table;
            content: "";
        }
        .coming_content .separator_container:after {
            clear: both;
        }
        .coming_content .separator {
            color: white;
            margin: 0 auto 1em;
            width: 11em;
        }
        .coming_content .line_separator svg {
            width: 30px;
            height: 20px;
        }
        .coming_content .line_separator:before, .coming_content .line_separator:after {
            display: block;
            width: 40%;
            content: " ";
            margin-top: 14px;
            border: 1px solid white;
        }
        .coming_content .line_separator:before {
            float: left;
        }
        .coming_content .line_separator:after {
            float: right;
        }
        .coming_content h3 {
            font-family: "Montserrat", sans-serif;
            letter-spacing: 2px;
            line-height: 2;
            font-size: 1em;
            font-weight: 400;
            text-align: center;
            margin: 0;
            width: 60%;
        }
        .coming_content h3 a {
            text-decoration: underline;
        }

        @media screen and (max-width: 767px) {
            .coming_content {
                width: 90%;
            }

            .coming_content h3 {
                width: 100%;
            }

            .coming_content h1 {
                font-size: 3.625em;
            }
        }

    </style>
</head>
<body>
<section>
    <canvas id='beerCanvas'></canvas>
    <div class="coming_content">
        <h1><span id="countdown"></span> </h1>
        <h2>20 Vagas Gratuitas</h2>
        <div class="separator_container">
            <div class="separator line_separator">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="320.864" height="320.864" viewBox="0 0 320.864 320.864"><path fill="#fff" d="M184.04 81.83c-1.89-5.1-3.46-28.63-3.926-55.05-.003-.1.107-.37.514-.37 2.092-.125 3.248-1.79 3.248-3.91V4c0-2.2-1.8-4-4-4H140.99c-2.2 0-4 1.8-4 4v18.5c0 2.123 1.06 3.77 3.152 3.89.673 0 .613.478.61.673-.463 26.677-2.035 49.67-3.925 54.77-11.12 29.993-35.884 27.39-35.884 63.393V273.96c0 49.536 24.92 47.044 59.49 46.82 34.57.224 59.49 2.716 59.49-46.82V145.226c0-36.002-24.764-33.4-35.883-63.394zm12.89 127.953c-5.845 8.89-31.005 30.02-36.458 30.02-5.338 0-30.727-21.21-36.532-30.02-2.907-4.41-4.97-9.277-4.627-15.678.605-11.325 9.866-20.678 21.208-20.678 11.66 0 18.45 12.44 19.915 12.44 1.675 0 8.755-12.44 19.914-12.44 11.34 0 20.6 9.353 21.206 20.678.342 6.4-1.713 11.247-4.627 15.678z"/></svg>
                </span>
            </div>
        </div>
        <center><h3> Lançamento Exclusivo com Apenas 20 Vagas Disponíveis - Não Perca Esta Oportunidade!</h3></center>
    </div>
</section>
<script>
    var canvas = document.getElementById('beerCanvas');
    var ctx = canvas.getContext('2d');
    var particles = [];
    var particleCount = 280;

    for (var i = 0; i < particleCount; i++) {
        particles.push(new particle());
    }

    function particle() {
        this.x = Math.random() * canvas.width;
        this.y = canvas.height + Math.random() * 300;
        this.speed = 1 + Math.random();
        this.radius = Math.random() * 3;
        this.opacity = (Math.random() * 100) / 1000;
    }

    function loop() {
        requestAnimationFrame(loop);
        draw();
    }

    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.globalCompositeOperation = 'lighter';
        for (var i = 0; i < particles.length; i++) {
            var p = particles[i];
            ctx.beginPath();
            ctx.fillStyle = 'rgba(255,255,255,' + p.opacity + ')';
            ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2, false);
            ctx.fill();
            p.y -= p.speed;
            if (p.y <= -10)
                particles[i] = new particle();
        }
    }
    loop();

    // Definir data de expiração para 1 hora e 15 minutos a partir da data e hora atual
    var targetTime = new Date().getTime() + 1 * 60 * 60 * 1000 + 15 * 60 * 1000;

    function updateCountdown() {
        var currentTime = new Date().getTime();
        var remainingTime = targetTime - currentTime;

        var hours = Math.floor(remainingTime / (1000 * 60 * 60));
        var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

        var countdownElement = document.getElementById("countdown");
        countdownElement.textContent = hours + "h " + minutes + "m " + seconds + "s";

        if (remainingTime <= 0) {
            clearInterval(countdownInterval);
            countdownElement.textContent = "Expirado";

            // Exibir botão "Registrar Agora" e quantidade de vagas disponíveis
            var vagasRestantesElement = document.getElementById("vagasRestantes");
            var vagasDisponiveisElement = document.getElementById("vagasDisponiveis");
            var registrarAgoraButton = document.createElement("button");
            registrarAgoraButton.textContent = "Registrar Agora";
            registrarAgoraButton.className = "btn btn-primary";
            registrarAgoraButton.onclick = function() {
                window.location.href = "registrar.php";
            };
            document.body.appendChild(registrarAgoraButton);

            // Definir quantidade de vagas disponíveis para 20
            vagasRestantesElement.textContent = "20";
            vagasDisponiveisElement.textContent = "Vagas Restantes:";
        }
    }

    updateCountdown(); // Inicializar o contador
    var countdownInterval = setInterval(updateCountdown, 1000); // Atualizar a cada segundo
</script>
</body>
</html>
