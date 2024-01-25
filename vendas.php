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

$signals = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $signals[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'menu.php'; ?>
    <title>Página de Vendas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <style>
        h3 {
            margin-bottom: 30px;
        }

        h4 {
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 20px;
        }

        .testimonial {
            margin-bottom: 40px;
            text-align: center;
        }

        .testimonial img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .payment-info {
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 40px;
            text-align: center;
        }

        .payment-info h4 {
            margin-bottom: 10px;
        }

        .payment-info p {
            margin-bottom: 10px;
        }

        .cta-button {
            margin-bottom: 50px;
        }

        .carousel-inner {
            position: relative;
            width: 100%;
            overflow: hidden;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<?php include 'notification_site.php'; ?>
<div class="container">
    <div class="text-center">
        <div class="payment-info">
            <img src="imagem_site/pix.png" alt="Forma de Pagamento Pix" style="width: 99px; height: 35px;">
            <h4>Forma de Pagamento via Pix:</h4>
            <p>Use o QR Code do Pix para pagar</p>
            <p>Abra o app com sua chave PIX cadastrada, escolha Pagar com Pix e escaneie o QR Code ou copie e cole o código.</p>
            <p>Por apenas R$ 69,99 por mês, aproveite todas as vantagens que a plataforma oferece.</p>

            <img src="imagem_site/qrcode-pix.png" alt="QR Code Pix" style="width: 200px; height: 200px;">
            <p></p>
            <button onclick="copyPixCode()" class="btn btn-sm btn-primary">Copiar Código PIX</button>
            <p id="pixCodeText" style="display: none;">00020126580014BR.GOV.BCB.PIX013620682071-6569-47b4-ae5b-50033846afda520400005303986540569.995802BR5924Erick Vinicius Rodrigues6007Goiania62070503***63049B36</p>
        </div>
        <h4>Liberar acesso:</h4>
        <a href="suporte.php" class="btn btn-primary cta-button">Fale com Suporte</a>
    </div>
    <h3 class="text-center mt-4">Descubra o segredo para conquistar ganhos expressivos nos jogos Fortune Tiger, Fortune Rabbit, Fortune Mouse, Piggy Gold e Fortune Ox!</h3>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="imagem/aluno1.jpg" class="d-block w-100" alt="Aluno 1">
                    </div>
                    <div class="carousel-item">
                        <img src="imagem/aluno2.jpg" class="d-block w-100" alt="Aluno 2">
                    </div>
                    <div class="carousel-item">
                        <img src="imagem/aluno3.jpg" class="d-block w-100" alt="Aluno 3">
                    </div>
                    <div class="carousel-item">
                        <img src="imagem/aluno4.jpg" class="d-block w-100" alt="Aluno 4">
                    </div>
                    <div class="carousel-item">
                        <img src="imagem/aluno5.jpg" class="d-block w-100" alt="Aluno 5">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-12 col-md-8">
            <div class="testimonial">
                <h4>Depoimentos de nossos clientes:</h4>
                <div class="row">
                    <div class="col-md-6">
                        <img src="imagem/aluno04.jpg" alt="Depoimento 1">
                        <p>"Desde que comecei a utilizar a plataforma, minha experiência nos jogos Fortune Tiger, Fortune Rabbit, Fortune Mouse, Piggy Gold e Fortune Ox mudou completamente. Os sinais enviados são incrivelmente precisos e me ajudaram a conquistar ganhos expressivos. Recomendo a todos!"</p>
                        <p><strong>Luciana Oliveira</strong></p>
                    </div>
                    <div class="col-md-6">
                        <img src="imagem/aluno07.jpg" alt="Depoimento 2">
                        <p>"Estou maravilhado com os resultados que obtive com a plataforma. Os sinais enviados pelo sistema são de altíssima qualidade e me proporcionaram ganhos consistentes nos jogos Fortune Tiger, Fortune Rabbit, Fortune Mouse, Piggy Gold e Fortune Ox. Agradeço pela oportunidade!"</p>
                        <p><strong>Gustavo Santos</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function copyPixCode() {
        var pixCodeTextElement = document.getElementById('pixCodeText');
        var pixCodeText = pixCodeTextElement.innerText;

        var textArea = document.createElement('textarea');
        textArea.value = pixCodeText;
        document.body.appendChild(textArea);

        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);

        alert('Código PIX copiado com sucesso!');
    }
</script>
</body>
</html>
