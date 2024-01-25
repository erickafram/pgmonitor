<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

if ($_SESSION['user_role'] !== 'admin') {
    header('Location: dashboard.php');
    exit();
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'menu.php'; ?>
    <title>Sistema de Sorteio</title>
    <!-- Adicione o link para o arquivo CSS do Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <!-- Adicione o estilo CSS personalizado para animar os nomes -->
    <style>
        .animated-name {
            font-size: 24px;
            font-weight: bold;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .btn-primary{
            margin-top: 10px;
        }
        .form-group{
            padding-bottom:15px;
        }
    </style>
    <!-- Adicione o link para a biblioteca jQueryUI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Sistema de Sorteio</h1>
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <form id="sorteioForm">
                <div class="form-group">
                    <label for="sorteioName">Nome do Sorteio:</label>
                    <input type="text" class="form-control" id="sorteioName" name="sorteioName" required>
                </div>
                <div class="form-group">
                    <label for="participants">Digite os nomes dos participantes (um por linha):</label>
                    <textarea class="form-control" id="participants" name="participants" rows="6" required></textarea>
                </div>
                <div class="form-group">
                    <label for="seconds">Quantidade de segundos:</label>
                    <input type="number" class="form-control" id="seconds" name="seconds" required>
                </div>
                <button type="button" class="btn btn-primary btn-block" onclick="realizarSorteio()">Realizar Sorteio</button>
            </form>
            <div id="animatedResult" class="d-none">
                <h2 class="text-center" id="sorteioTitle"></h2>
                <div class="animated-name text-center" id="winnerName"></div>
            </div>
        </div>
    </div>
</div>

<!-- Adicione o link para o arquivo JS do Bootstrap, o jQuery e o jQueryUI -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.2.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
    // Defina o nome da pessoa a ser sorteada manualmente aqui
    const nomePessoaSorteada = "4810979";
    //const nomePessoaSorteada = null;

    function realizarSorteio() {
        const sorteioName = $("#sorteioName").val();
        const participants = $("#participants").val().split("\n").map(name => name.trim()).filter(name => name !== "");
        const seconds = parseInt($("#seconds").val());

        if (participants.length > 0 && seconds > 0) {
            $("#sorteioForm").hide();
            $("#animatedResult").removeClass("d-none");
            shuffleArray(participants); // Embaralha o array de participantes antes de iniciar a animação
            animateNames(sorteioName, participants, seconds);
        } else {
            alert("Preencha todos os campos corretamente.");
        }
    }

    function animateNames(sorteioName, participants, seconds) {
        const winnerNameElement = $("#winnerName");
        const sorteioTitleElement = $("#sorteioTitle");
        let currentIndex = -1;
        let animationInterval;
        const animationDuration = 100; // Tempo em milissegundos entre a mudança de nomes (ajuste conforme desejado)

        function showNextName() {
            currentIndex = (currentIndex + 1) % participants.length;
            winnerNameElement.text(participants[currentIndex]);
        }

        sorteioTitleElement.text("Sorteio: " + sorteioName);
        animationInterval = setInterval(showNextName, animationDuration);

        // Simula um tempo de espera antes de parar na animação
        setTimeout(function () {
            clearInterval(animationInterval);
            if (nomePessoaSorteada && nomePessoaSorteada.trim() !== "") {
                // Escolhe manualmente a pessoa sorteada
                winnerNameElement.text(nomePessoaSorteada).effect("pulsate", { times: 5 }, 1000);
            } else {
                // Escolhe aleatoriamente a pessoa sorteada
                winnerNameElement.text(participants[currentIndex]).effect("pulsate", { times: 5 }, 1000);
            }
        }, seconds * 1000);
    }

    // Função para embaralhar um array
    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }
</script>

</body>
</html>
