<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT signals.* FROM signals
        INNER JOIN user_signals ON signals.id = user_signals.signal_id
        WHERE user_signals.user_id = $user_id";
$result = $conn->query($sql);

$signals = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $signals[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("menu.php"); ?>
    <title>Lista de Jogos de Apostas Esportivas</title>
    <!-- Inclui o código Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
<section style="background-color: #eee;">
    <div class="container py-5" style="padding-top: 0px !important;">

    <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-xl-10">
                <p style="color: green; font-size:15px;"Desvendando os Segredos dos Jogos: Estratégias Testadas e Aprovadas</p>
                <p style="color: #003399; font-size:18px; font-weight: bold;">Aprenda a Dominar o Algoritmo dos Jogos e Tenha Vantagem</p>
                <p style="color: #000000; font-size:15px;">
                    As estratégias têm como objetivo ensinar o funcionamento do algoritmo dos jogos e demonstrar como utilizá-lo a
                    seu favor. Todas essas estratégias foram testadas e comprovadas como eficazes.
                </p>

                <div class="card shadow-0 border rounded-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-3 col-xl-4 mb-4 mb-lg-0">
                                <div class="bg-image hover-zoom ripple rounded ripple-surface" style="border: 1px solid rgba(0, 0, 0, 0.15);border-radius: 4px;">
                                    <img src="imagem/fortune_ox.jpg" class="w-100" width="200" height="250"
                                         class="w-100" />
                                    <a href="#!">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-xl-8 mb-4 mb-md-0">
                            <h5>1 - TOURO RESET</h5>
                                <div class="mt-1 mb-0 text-muted small">
                                    <span>Lucro: R$600 reais</span>
                                    <span class="text-primary"> • </span>
                                    <span>Investimento: até R$399,00 reais</span>
                                    <span class="text-primary"> • </span>
                                    <span>Rodadas testadas: 300 rodadas<br /></span>
                                </div>
                                <p class="mb-4 mb-md-0">
                                    O sistema Touro Reset foi desenvolvido com base na estratégia de rodadas, garantindo rentabilidade desde o início.
                                    Ele foi extensivamente testado com mais de 300 rodadas, proporcionando lucro desde o primeiro dia. Com esse sistema,
                                    você tem a oportunidade de ganhar dinheiro.
                                </p>
                                <div class="d-flex flex-column mt-4">
                                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'user'): ?>
                                        <button class="btn btn-danger btn-sm" type="button" onclick="window.open('vendas.php')"><i class="fas fa-lock"></i> TENHA ACESSO AGORA</button>
                                    <?php endif; ?>
                                    <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'gold')): ?>
                                        <button class="btn btn-primary btn-sm" type="button" onclick="window.open('pdf/touro_reset.pdf')"> <i class="fas fa-lock-open"></i> VISUALIZAR </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-xl-10">
                <div class="card shadow-0 border rounded-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-3 col-xl-4 mb-4 mb-lg-0">
                                <div class="bg-image hover-zoom ripple rounded ripple-surface" style="border: 1px solid rgba(0, 0, 0, 0.15);border-radius: 4px;padding:5px;">
                                    <img src="imagem/fortune_tiger.jpg" class="w-100" width="200" height="250"
                                         class="w-100" />
                                    <a href="#!">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-8 mb-4 mb-md-0">
                            <h5>2 - TIGER RESET</h5>
                                <div class="mt-1 mb-0 text-muted small">
                                    <span>Lucro: R$800 reais</span>
                                    <span class="text-primary"> • </span>
                                    <span>Investimento: até R$399,00 reais</span>
                                    <span class="text-primary"> • </span>
                                    <span>Rodadas testadas: 500 rodadas<br /></span>
                                </div>
                                <p class="mb-4 mb-md-0">
                                    O Tiger Reset System foi cuidadosamente criado com base em uma estratégia de rodadas, visando garantir
                                    rentabilidade desde o início. Com mais de 500 rodadas de testes rigorosos, esse sistema demonstrou consistentemente
                                    lucro desde o primeiro dia. Ao adotar o Tiger Reset System, você tem a oportunidade concreta de alcançar ganhos
                                    financeiros significativos.
                                </p>
                                <div class="d-flex flex-column mt-4">
                                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'user'): ?>
                                        <button class="btn btn-danger btn-sm" type="button" onclick="window.open('vendas.php')"><i class="fas fa-lock"></i> TENHA ACESSO AGORA</button>
                                    <?php endif; ?>
                                    <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'gold')): ?>
                                        <button class="btn btn-primary btn-sm" type="button" onclick="window.open('pdf/tiger_reset.pdf')"> <i class="fas fa-lock-open"></i> VISUALIZAR </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!--  <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-xl-10">
                <div class="card shadow-0 border rounded-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-3 col-xl-4 mb-4 mb-lg-0">
                                <div class="bg-image hover-zoom ripple rounded ripple-surface" style="border: 1px solid rgba(0, 0, 0, 0.15);border-radius: 4px;padding:5px;">
                                    <img src="image\in-play.png"
                                         class="w-100" />
                                    <a href="#!">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-8 mb-4 mb-md-0">
                                <h5>3 - Sistema de cantos</h5>
                                <div class="mt-1 mb-0 text-muted small">
                                    <span>Lucro: R$470 reais</span>
                                    <span class="text-primary"> • </span>
                                    <span>ROI:470 %</span>
                                    <span class="text-primary"> • </span>
                                    <span>Investimento: R$100 reais<br /></span>
                                    <span>Apostas testadas: 37 apostas<br /></span>
                                </div>
                                <p class="mb-4 mb-md-0">
                                    Neste sistema, vamos nos concentrar em apostas asiáticas no primeiro tempo. Vamos explorar os dados
                                    necessários para cumprir o nosso filtro e discutir como encontrar o valor e as probabilidades de 2.00
                                    ou mais ao apostarmos em cantos asiáticos no primeiro tempo. A tecnologia do Green Milionário e o
                                    Green X In-Play tornam mais fácil encontrar os valores e as chances certos para essas apostas.
                                </p>
                                <div class="d-flex flex-column mt-4">
                                    <?php if(isset($row['admin']) && ($row['admin'] == 1 || $row['admin'] == 2 )){  ?>
                                        <button class="btn btn-primary btn-sm" type="button" onclick="window.open('pdf/sistema_escanteios.pdf')"> <i class="fas fa-lock-open"></i> VISUALIZAR </button>
                                    <?php } ?>
                                    <?php if(isset($row['admin']) && ($row['admin'] == 0 )){ ?>
                                        <button class="btn btn-danger btn-sm" type="button" onclick="window.open('vendas.php')"><i class="fas fa-lock"></i> TENHA ACESSO AGORA</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-xl-10">
                <div class="card shadow-0 border rounded-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-3 col-xl-4 mb-4 mb-lg-0">
                                <div class="bg-image hover-zoom ripple rounded ripple-surface" style="border: 1px solid rgba(0, 0, 0, 0.15);border-radius: 4px;padding:5px;">
                                    <img src="image\cartoes.png"
                                         class="w-100" />
                                    <a href="#!">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                           <div class="col-md-6 col-lg-6 col-xl-8 mb-4 mb-md-0">
                                <h5>4 - Sistema de Cartões de Equipe</h5>
                                <div class="mt-1 mb-0 text-muted small">
                                    <span>Lucro: R$682  reais</span>
                                    <span class="text-primary"> • </span>
                                    <span>ROI:682 %</span>
                                    <span class="text-primary"> • </span>
                                    <span>Investimento: R$100 reais<br /></span>
                                    <span>Apostas testadas: 61 apostas<br /></span>
                                </div>
                                <p class="mb-4 mb-md-0">
                                    Focaremos no mercado de Cartões de Equipe ou de Pontos de Reserva de Equipe, dependendo da casa de aposta e
                                    do valor disponível. O primeiro é muito semelhante a fazer uma aposta em gols: você aposta na quantidade de
                                    cartões que uma equipe irá receber. Por exemplo: “Preston Receberá +1,5 Cartões”. Em geral, as probabilidades
                                    médias seriam aproximadamente 2,00 de acordo com as estatísticas relacionadas à equipe. Esse último é parecido
                                    com fazer uma aposta no resultado de um jogo. Você está prever quem irá ganhar mais pontos de reserva: 1, X ou 2.
                                </p>
                                <div class="d-flex flex-column mt-4">
                                    <button class="btn btn-danger btn-sm" type="button"><i class="fas fa-lock"></i> BLOQUEADO</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-xl-10">
                <div class="card shadow-0 border rounded-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-3 col-xl-4 mb-4 mb-lg-0">
                                <div class="bg-image hover-zoom ripple rounded ripple-surface" style="border: 1px solid rgba(0, 0, 0, 0.15);border-radius: 4px;padding:5px;">
                                    <img src="image\winner.png"
                                         class="w-100" />
                                    <a href="#!">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-8 mb-4 mb-md-0">
                                <h5>5 - 0-0 no Sistema de Apostas HT</h5>
                                <div class="mt-1 mb-0 text-muted small">
                                    <span>Lucro: R$848 reais</span>
                                    <span class="text-primary"> • </span>
                                    <span>ROI:848 %</span>
                                    <span class="text-primary"> • </span>
                                    <span>Investimento: R$100 reais<br /></span>
                                    <span>Apostas testadas: 105 apostas<br /></span>
                                </div>
                                <p class="mb-4 mb-md-0">
                                    Este é o quinto sistema de apostas do Green Milionário e, na verdade, um dos mais simples de seguir. Procuraremos
                                    uma única estatística por jogo e faremos todas as apostas no HT em jogos 0-0. O trabalho duro realmente foi feito
                                    para você. Siga este sistema e você verá resultados lucrativos a longo prazo, assim como nós.
                                </p>
                                <div class="d-flex flex-column mt-4">
                                    <button class="btn btn-danger btn-sm" type="button"><i class="fas fa-lock"></i> BLOQUEADO</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-xl-10">
                <div class="card shadow-0 border rounded-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-3 col-xl-4 mb-4 mb-lg-0">
                                <div class="bg-image hover-zoom ripple rounded ripple-surface" style="border: 1px solid rgba(0, 0, 0, 0.15);border-radius: 4px;padding:5px;">
                                    <img src="image\mls.png"
                                         class="w-100" />
                                    <a href="#!">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-8 mb-4 mb-md-0">
                                <h5>6 - Sistema MLS Home Advantage</h5>
                                <div class="mt-1 mb-0 text-muted small">
                                    <span>Lucro: 3653 reais</span>
                                    <span class="text-primary"> • </span>
                                    <span>ROI:183 %</span>
                                    <span class="text-primary"> • </span>
                                    <span>Investimento: 2000 reais<br /></span>
                                    <span>Apostas testadas: 1392 apostas<br /></span>
                                </div>
                                <p class="mb-4 mb-md-0">
                                    Compare com nossos outros programas, o Green Milionário opera como tipo de metodologia alternativa de ganhar dinheiro.
                                    Ele se foca na liga, porém demanda relativamente pouco conhecimento sobre futebol. Além disso, você não precisa ter um
                                    profundo entendimento sobre as equipes envolvidas ou o que está acontecendo a cada semana.
                                </p>
                                <div class="d-flex flex-column mt-4">
                                    <button class="btn btn-danger btn-sm" type="button"><i class="fas fa-lock"></i> BLOQUEADO</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-xl-10">
                <div class="card shadow-0 border rounded-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-3 col-xl-4 mb-4 mb-lg-0">
                                <div class="bg-image hover-zoom ripple rounded ripple-surface" style="border: 1px solid rgba(0, 0, 0, 0.15);border-radius: 4px;padding:5px;">
                                    <img src="image\xg3.png"
                                         class="w-100" />
                                    <a href="#!">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-8 mb-4 mb-md-0">
                                <h5>7 - Sistema Home xG Advantage</h5>
                                <div class="mt-1 mb-0 text-muted small">
                                    <span>Lucro: 1086 reais</span>
                                    <span class="text-primary"> • </span>
                                    <span>ROI:12 %</span>
                                    <span class="text-primary"> • </span>
                                    <span>Investimento: R$9400 reais<br /></span>
                                    <span>Apostas testadas: 94 apostas<br /></span>
                                </div>
                                <p class="mb-4 mb-md-0">
                                    Assim como no meu último sistema, este se apoia em colocar apostas nas equipas para obter resultados vantajosos em casa. No entanto,
                                    enquanto o último sistema envolveu apostas cegas para os favoritos em casa numa única liga, baseadas em um enorme viés histórico em casa,
                                    o meu novo sistema tem regras adicionais e pode ser aplicado a qualquer liga, embora nós nos limitamos, para agora, às cinco grandes ligas da Europa.
                                </p>
                                <div class="d-flex flex-column mt-4">
                                    <button class="btn btn-danger btn-sm" type="button"><i class="fas fa-lock"></i> BLOQUEADO</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


    </div>
</section>
</body>
</html>

<style>
    @media (max-width: 767.98px) { .border-sm-start-none { border-left: none !important; } }
    body {
        background-color: #eeeeee;
    }
    .border-sm-start-none {
        border-left: none !important;
    }
</style>