<!DOCTYPE html>
<html>
<head>
    <title>Popup Plataforma</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos para a animação de dinheiro caindo */
        .cash-icon {
            position: absolute;
            font-size: 24px;
            color: #FFD700;
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
            position: relative; /* Para que o botão de fechar (X) possa ser posicionado de forma absoluta */
        }

        .popup-title {
            font-size: 25px;
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
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.5rem;
            color: #fff;
            cursor: pointer;
            border: 1px solid #7e0075;
            padding: 0 6px;
            background-color: #8f0084;
        }

        .popup-close:hover {
            background-color: #cc0066;
        }

        /* Estilo para fazer o texto piscar */
        @keyframes blink {
            0%, 100% {
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
<!-- Popup para usuários de nível "user" -->
<div id="popup" class="popup">
    <div class="popup-content">
        <!-- Botão de fechar (X) -->
        <span class="popup-close" onclick="closePopup()">X</span>
        <h3 class="popup-title">⭐ APENAS  20 VAGAS DISPONÍVEIS! ⭐</h3>
        <p class="popup-text">Garanta agora mesmo a sua vaga gratuita:</p>
        <div class="alert alert-secondary" role="alert">
            <span style="animation: blink 1s linear infinite; font-weight: bold;">
                <span id="vagasDisponiveisText">Restam 5</span> Vagas disponíveis!</span>
            </span>
        </div>
        <button style="margin-top: 10px; padding: 10px 20px; font-size: 1.2rem; font-weight: bold; background-color: #8f0084; color: #fff; border-radius: 0.5rem; cursor: pointer;" onclick="redirectRegister()">FAZER INSCRIÇÃO AGORA</button>
    </div>
</div>
<script>

    function redirectRegister() {
        window.location.href = 'register.php';
    }
    function closePopup() {
        var popup = document.getElementById("popup");
        popup.style.display = "none";
    }

    // Variável para controlar o número de vagas disponíveis
    var vagasDisponiveis = 20;

    // Função para atualizar o contador de vagas disponíveis
    function updateVagasDisponiveis() {
        vagasDisponiveis--;
        var vagasElement = document.getElementById("vagasDisponiveis");
        vagasElement.innerText = vagasDisponiveis;

        var vagasTextElement = document.getElementById("vagasDisponiveisText");
        var vagasCountElement = document.getElementById("vagasDisponiveisCount");
        vagasTextElement.style.display = "inline"; // Exibir o texto "Vagas disponíveis!"
        vagasCountElement.innerText = vagasDisponiveis;

        if (vagasDisponiveis === 5) {
            vagasTextElement.style.display = "none"; // Ocultar o texto "Vagas disponíveis!" quando não houver mais vagas
            closePopup(); // Fechar o popup quando não houver mais vagas disponíveis
        }
    }

    // Função para atualizar o contador a cada 2 segundos
    setInterval(updateVagasDisponiveis, 4000);

    // Criação de ícones de dinheiro caindo
    function createCashIcons() {
        const cashContainer = document.createElement("div");
        cashContainer.className = "cash-container";

        for (let i = 0; i < 20; i++) { // Quantidade de ícones de dinheiro
            const cashIcon = document.createElement("div");
            cashIcon.className = "cash-icon";
            cashIcon.innerHTML = "💰"; // Ícone de dinheiro em formato de emoji (você pode substituir por uma imagem de ícone de dinheiro)
            cashIcon.style.left = `${Math.random() * 100}%`;
            cashIcon.style.animationDuration = `${Math.random() * 2 + 1}s`; // Duração de animação aleatória
            cashContainer.appendChild(cashIcon);
        }

        document.getElementById("popup").appendChild(cashContainer);
    }

    // Chama a função para criar os ícones de dinheiro caindo
    createCashIcons();
</script>
</body>
</html>
