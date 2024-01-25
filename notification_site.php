<!DOCTYPE html>
<html>
<head>
    <title>Random Notifications</title>
    <!-- Add any necessary meta tags, CSS links, or other resources here -->
</head>
<body>
<!-- Toast container -->
<div class="toast-container">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
        <div class="toast-header">
            <strong class="me-auto">Notificação</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <span class="notification-text"></span>
        </div>
    </div>
</div>

<script>
    // Array de nomes dos jogos
    var gameNames = ["Fortune Tiger", "Fortune Rabbit", "Fortune Mouse", "Piggy Gold", "Fortune Ox"];

    // Função para obter um nome de jogo aleatório
    function getRandomGameName() {
        var randomIndex = Math.floor(Math.random() * gameNames.length);
        return gameNames[randomIndex];
    }

    // Array de notificações
    var notifications = [
        "Usuário Fernando acabou de ganhar R$500 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Lia acabou de ganhar R$100 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário João obteve lucro de R$300 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Maria acabou de ganhar R$200 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Pedro obteve lucro de R$150 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Ana acabou de ganhar R$50 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Carlos obteve lucro de R$400 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Sofia acabou de ganhar R$250 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Marcelo obteve lucro de R$100 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Laura acabou de ganhar R$300 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário André obteve lucro de R$200 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Camila acabou de ganhar R$150 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Gabriel obteve lucro de R$50 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Letícia acabou de ganhar R$400 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Ricardo obteve lucro de R$250 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Fernanda acabou de ganhar R$100 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Tiago obteve lucro de R$300 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Amanda acabou de ganhar R$200 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Rafael obteve lucro de R$150 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Isabela acabou de ganhar R$50 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Lucas obteve lucro de R$400 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Luana acabou de ganhar R$250 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Gustavo obteve lucro de R$100 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Juliana acabou de ganhar R$300 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Matheus obteve lucro de R$200 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Júlia acabou de ganhar R$150 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário André obteve lucro de R$50 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Sophia acabou de ganhar R$400 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Miguel obteve lucro de R$250 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Carolina acabou de ganhar R$100 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Leonardo obteve lucro de R$300 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Beatriz acabou de ganhar R$200 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Joaquim obteve lucro de R$150 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Larissa acabou de ganhar R$50 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Rafaela obteve lucro de R$400 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Bruno acabou de ganhar R$250 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Gabriel obteve lucro de R$100 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Juliana acabou de ganhar R$300 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Marina obteve lucro de R$200 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Vinicius acabou de ganhar R$150 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Isabela obteve lucro de R$50 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Luiz acabou de ganhar R$400 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Camila obteve lucro de R$250 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Felipe acabou de ganhar R$100 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Amanda obteve lucro de R$300 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Pedro acabou de ganhar R$200 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Letícia obteve lucro de R$150 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Gustavo acabou de ganhar R$50 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Laura obteve lucro de R$400 com o sinal para o jogo " + getRandomGameName() + "!",
        "Usuário Rafael acabou de ganhar R$250 com o sinal para o jogo " + getRandomGameName() + "!"
    ];

    // Função para exibir notificações aleatórias somente entre 06h e 23h
    function showRandomNotification() {
        var now = new Date();
        var hour = now.getHours();

        // Verifica se a hora atual está entre 06h (6) e 23h (22)
        if (hour >= 6 && hour <= 22) {
            var randomIndex = Math.floor(Math.random() * notifications.length);
            var notification = notifications[randomIndex];

            var toast = document.querySelector('.toast');
            var notificationText = toast.querySelector('.notification-text');
            notificationText.textContent = notification;

            var toastInstance = new bootstrap.Toast(toast);
            toastInstance.show();
        }
    }

    // Chama a função para exibir a primeira notificação aleatória (se estiver no horário permitido)
    showRandomNotification();

    // Define um intervalo para exibir notificações aleatórias a cada 10 segundos (se estiver no horário permitido)
    setInterval(showRandomNotification, 10000);
</script>

<style>
    .toast-container {
        position: fixed;
        bottom: 20px;
        left: 20px;
        padding: 10px;
    }
</style>
</body>
</html>
