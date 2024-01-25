<?php
session_start();
require_once 'db_connection.php';

if ($_SESSION['user_role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Fortune Calculadora </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <?php include 'menu.php'; ?>
</head>
<body>
<style>
    .form-control {
        margin-bottom: 18px;
    }
    .input-bloqueado {
        background-color: #f0f0f0; /* Cor de fundo cinza */
        pointer-events: none; /* Impede eventos de mouse, tornando-o efetivamente bloqueado */
        border: 1px solid #d7d7d7;
        padding: 0.375rem 0.75rem;
    }

</style>
<div class="container mt-5">
    <div class="alert alert-secondary">
        <h5>Probabilidades no Fortune Tiger Assinantes GOLD:</h5>
        <p>As probabilidades de ganhar no Fortune Tiger são determinadas pelos símbolos que você obtém em cada rodada. O jogo tem uma grade de 3x3 com nove casas, onde você pode formar diferentes combinações de pagamento.</p>
    </div>
    <h2>Fortune Calculadora</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="banca">Valor da Banca:</label>
            <input type="number" class="form-control" id="banca" name="banca" required>
        </div>
        <div class="form-group">
            <label for="valor_aposta">Valor da Rodada:</label>
            <select class="form-control" id="valor_aposta" name="valor_aposta" required>
                <!-- Opções para o valor da rodada -->
                <option value="0.50">R$ 0,40</option>
                <option value="1.00">R$ 0,80</option>
                <option value="1.50">R$ 1,20</option>
                <option value="2.00">R$ 1,60</option>
                <option value="2.50">R$ 2,40</option>
                <option value="3.00">R$ 2,80</option>
                <option value="3.50">R$ 3,20</option>
                <option value="4.00">R$ 3,60</option>
                <option value="4.50">R$ 4,00</option>
                <option value="5.00">R$ 8,00</option>
                <option value="10.00">R$ 12,00</option>
                <option value="15.00">R$ 15,00</option>
                <option value="20.00">R$ 16,00</option>
                <option value="25.00">R$ 20,00</option>
                <option value="30.00">R$ 24,00</option>
                <option value="35.00">R$ 28,00</option>
                <option value="40.00">R$ 30,00</option>
                <option value="45.00">R$ 32,00</option>
                <option value="50.00">R$ 36,00</option>
                <option value="100.00">R$ 40,00</option>
                <option value="150.00">R$ 45,00</option>
                <option value="200.00">R$ 50,00</option>
                <option value="250.00">R$ 60,00</option>
                <option value="300.00">R$ 75,00</option>
                <option value="350.00">R$ 90,00</option>
                <option value="400.00">R$ 105,00</option>
                <option value="450.00">R$ 120,00</option>
                <option value="500.00">R$ 135,00</option>
                <option value="500.00">R$ 150,00</option>
                <option value="500.00">R$ 200,00</option>
                <option value="500.00">R$ 250,00</option>
                <option value="500.00">R$ 300,00</option>
                <option value="500.00">R$ 350,00</option>
                <option value="500.00">R$ 400,00</option>
                <option value="500.00">R$ 450,00</option>
                <option value="500.00">R$ 500,00</option>
            </select>
        </div>
        <div class="form-group">
            <label for="quantidade_rodadas">Quantidade de Rodadas:</label>
            <input type="number" class="form-control form-control-plaintext input-bloqueado" id="quantidade_rodadas" name="quantidade_rodadas" readonly>
        </div>
        <button type="submit" class="btn btn-primary" name="calcular">Calcular</button>
        <button type="button" class="btn btn-primary" id="entendaCalculadora">Entenda a Calculadora</button>
    </form>


    <!-- The modal popup -->
    <div class="modal fade" id="popupEntendaCalculadora" tabindex="-1" role="dialog" aria-labelledby="popupEntendaCalculadoraLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popupEntendaCalculadoraLabel">Entenda a Calculadora</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary" role="alert" style="margin-top:10px;">
                        <h4>Bem-vindo ao Fortune Calculadora!</h4>
                        <p>O Fortune Calculadora é uma poderosa ferramenta que foi desenvolvida para ajudá-lo a compreender melhor o jogo Fortune Tiger e calcular suas probabilidades de ganhar e o ganho esperado em suas rodadas.</p>

                        <h5>Como funciona:</h5>
                        <p>1. Insira o valor da sua "Banca" - o montante que você pode investir nas rodadas do jogo.</p>
                        <p>2. Defina o "Valor da Rodada" - a quantia que você estará arriscando em cada jogada.</p>
                        <p>3. A calculadora determinará a quantidade de rodadas que você pode realizar com o dinheiro disponível na sua banca, para evitar exceder o saldo.</p>
                        <p>4. Clique em "Calcular" para obter os resultados das probabilidades de ganhar e o ganho esperado em suas rodadas.</p>

                        <h5>Probabilidades no Fortune Tiger:</h5>
                        <p>As probabilidades de ganhar no Fortune Tiger são determinadas pelos símbolos que você obtém em cada rodada. O jogo tem uma grade de 3x3 com nove casas, onde você pode formar diferentes combinações de pagamento.</p>

                        <h5>Combinações de Pagamento:</h5>
                        <p>Existem cinco combinações de pagamento no Fortune Tiger, incluindo linhas superiores, do meio e do fundo, além de duas diagonais. Para ganhar, os três símbolos precisam cair na mesma linha de pagamento.</p>

                        <h5>Símbolos e Pagamentos:</h5>
                        <p>Cada símbolo tem um pagamento associado. Os símbolos de menor valor são as tangerinas e fogos de artifício, seguidos por envelopes vermelhos, sacos de moedas de ouro e estatuetas de dragão de jade. O ouro sycee e o Fortune Tigre Selvagem são os símbolos mais valiosos, oferecendo os maiores pagamentos.</p>

                        <h5>Ganho Esperado:</h5>
                        <p>O ganho esperado é calculado com base na probabilidade de ganhar pelo menos uma vez em um determinado número de rodadas e nos pagamentos associados a cada símbolo. O Fortune Calculadora leva em conta as probabilidades e os valores das suas apostas para estimar quanto você pode esperar ganhar após um determinado número de rodadas.</p>

                        <p>Aproveite o Fortune Calculadora para tomar decisões mais informadas em suas apostas no jogo Fortune Tiger. Lembre-se de que o jogo é baseado na sorte, e essas estimativas não garantem resultados específicos. Divirta-se jogando de forma responsável e boa sorte!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Adicione os arquivos JavaScript do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script>
    function calcularRodadas() {
        var banca = parseInt(document.getElementById('banca').value);
        var valorAposta = parseFloat(document.getElementById('valor_aposta').value);

        if (isNaN(banca) || isNaN(valorAposta) || banca <= 0 || valorAposta <= 0) {
            document.getElementById('quantidade_rodadas').value = '';
            return;
        }

        var quantidadeRodadas = Math.floor(banca / valorAposta);
        document.getElementById('quantidade_rodadas').value = quantidadeRodadas;
    }

    document.getElementById('banca').addEventListener('input', calcularRodadas);
    document.getElementById('valor_aposta').addEventListener('input', calcularRodadas);

    document.getElementById('entendaCalculadora').addEventListener('click', function () {
        $('#popupEntendaCalculadora').modal('show');
    });
</script>

<?php
if (isset($_POST["calcular"])) {
    $banca = (float)$_POST["banca"];
    $valor_aposta = (float)$_POST["valor_aposta"];
    $quantidade_rodadas = (int)$_POST["quantidade_rodadas"];
    $probabilidade = 0.0220;

    // Verifica se a quantidade de rodadas multiplicada pelo valor da aposta é maior que a banca
    if ($quantidade_rodadas * $valor_aposta > $banca) {
        echo '<div class="mt-4 alert alert-danger">';
        echo '<p><strong>Erro:</strong> A quantidade de rodadas multiplicada pelo valor da aposta não pode ser maior que a banca.</p>';
        echo '</div>';
    } else {
        $probabilidade_total = 1 - (1 - $probabilidade) ** $quantidade_rodadas;
        $ganho_esperado = $probabilidade_total * $valor_aposta * 350 - ($quantidade_rodadas * $valor_aposta);

        // Define o ganho esperado mínimo como zero
        $ganho_esperado = max($ganho_esperado, 0);
        ?>
        <div class="container mt-5">
            <div class="mt-5 alert alert-success" style="margin-top:-20px !important;">
                <h4>Resultado das Probabilidades</h4>
                <p style="margin-bottom:2px;"><strong>Probabilidade do Tigre virar a carta entre <?php echo $quantidade_rodadas; ?> rodadas:</strong> <?php echo number_format($probabilidade_total * 100, 2); ?>%</p>
                <p><strong>Ganho esperado entre uma das <?php echo $quantidade_rodadas; ?> rodadas:</strong> R$<?php echo number_format($ganho_esperado, 2); ?></p>
                <strong style="color:#003c21;">Aprenda como multiplicar sua banca com <?php echo $banca; ?> Reais!</strong> <a href="vendas.php" target="_blank">Clique aqui</a>

            </div>
        </div>
        <?php
    }
}
?>
</body>
</html>
