<!DOCTYPE html>
<html>
<head>
    <title>Popup Plataforma</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Estilos para a animação de dinheiro caindo */
        .cash-icon {
            position: absolute;
            width: 44px; /* Defina o tamanho da moeda de ouro */
            height: 44px; /* Defina o tamanho da moeda de ouro */
            animation: cash-fall linear infinite;
        }

        @keyframes cash-fall {
            0% {
                top: -50px;
                opacity: 0;
            }
            100% {
                top: 100%;
                opacity: 1;
            }
        }

        .progress {
            --bs-progress-bg: #d3d3d3;
        }

        .popup-content .progress {
            --bs-progress-bg: #e3e3e3 !important;
        }

        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .popup-content {
            max-width: 400px;
            padding: 2rem;
            text-align: center;
            background-color: #fff;
            border-radius: 0.5rem;
            z-index: 100; /* Adicione o z-index aqui */
        }

        .popup-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .popup-text {
            margin-bottom: 1rem;
        }

        .popup-countdown {
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .popup-close {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #8f0084;
            color: #fff;
            border-radius: 0.5rem;
            font-weight: bold;
            transition: 0.3s;
        }

        .popup-close:hover {
            background-color: #cc0066;
        }
    </style>
</head>
<body>
<!-- Popup para usuários de nível "user" -->
<div id="popup" class="popup">
    <div class="popup-content">
        <h2 class="popup-title">⭐NOVO LANÇAMENTO⭐</h2>
        <h2 class="popup-title">💎🍀 SambaWin 🍀💎</h2>
        <p class="popup-text">Alta taxa de pagamento no momento</p>
        <div class="alert alert-secondary" role="alert">
            DEPÓSITO MÍNIMO É R$ 20,00 REAIS!
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 82%">82%</div>
        </div><br>
        <a href="https://www.sambawin.com/c-4gHvQ9fp?lang=pt" target="_blank" class="button button--link">Conecte-se à Plataforma Pagante Agora!</a>
        <div id="countdown" class="popup-countdown"></div>
        <button class="popup-close" onclick="closePopup()">Fechar</button>
    </div>
</div>
<script>
    // Temporizador de 30 minutos
    var countdown = 1800; // 30 minutos em segundos
    var countdownElement = document.getElementById("countdown");

    function formatTime(time) {
        var minutes = Math.floor(time / 60);
        var seconds = time % 60;
        return ("0" + minutes).slice(-2) + ":" + ("0" + seconds).slice(-2);
    }

    function updateCountdown() {
        countdown--;
        countdownElement.innerHTML = formatTime(countdown);

        if (countdown <= 0) {
            closePopup();
        }
    }

    setInterval(updateCountdown, 1000);

    function closePopup() {
        var popup = document.getElementById("popup");
        popup.style.display = "none";
    }

    // Criação de ícones de dinheiro caindo
    function createCashIcons() {
        const cashContainer = document.createElement("div");
        cashContainer.className = "cash-container";

        for (let i = 0; i < 20; i++) { // Quantidade de ícones de dinheiro
            const cashIcon = document.createElement("img"); // Usar uma imagem ao invés de um emoji
            cashIcon.className = "cash-icon";
            cashIcon.src = "imagem_site/money.png"; // Substitua pelo caminho da imagem de moeda de ouro
            cashIcon.style.left = `${Math.random() * 100}%`;
            cashIcon.style.animationDuration = `${Math.random() * 2 + 1}s`; // Duração de animação aleatória
            cashContainer.appendChild(cashIcon);
        }

        document.getElementById("popup").appendChild(cashContainer);
    }

    createCashIcons();
</script>
</body>
</html>