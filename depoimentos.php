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
    <title>Testimonials - Fortune Games</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <style>

        /* CSS styles here */
        .shadow-effect {
            background: #fff;
            padding: 20px;
            border-radius: 4px;
            text-align: center;
            border: 1px solid #ECECEC;
            box-shadow: 0 19px 38px rgba(0, 0, 0, 0.10), 0 15px 12px rgba(0, 0, 0, 0.02);
        }

        #customers-testimonials .shadow-effect p {
            font-family: inherit;
            font-size: 17px;
            line-height: 1.5;
            margin: 0 0 17px 0;
            font-weight: 300;
        }

        .testimonial-name {
            margin: -17px auto 0;
            display: table;
            width: auto;
            background: #3190E7;
            padding: 9px 35px;
            border-radius: 12px;
            text-align: center;
            color: #fff;
            box-shadow: 0 9px 18px rgba(0, 0, 0, 0.12), 0 5px 7px rgba(0, 0, 0, 0.05);
        }

        #customers-testimonials .item {
            text-align: center;
            padding: 50px;
            margin-bottom: 80px;
            opacity: .2;
            -webkit-transform: scale3d(0.8, 0.8, 1);
            transform: scale3d(0.8, 0.8, 1);
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        #customers-testimonials .owl-item.active.center .item {
            opacity: 1;
            -webkit-transform: scale3d(1.0, 1.0, 1);
            transform: scale3d(1.0, 1.0, 1);
        }

        .owl-carousel .owl-item img {
            transform-style: preserve-3d;
            max-width: 90px;
            margin: 0 auto 17px;
        }

        #customers-testimonials.owl-carousel .owl-dots .owl-dot.active span,
        #customers-testimonials.owl-carousel .owl-dots .owl-dot:hover span {
            background: #3190E7;
            transform: translate3d(0px, -50%, 0px) scale(0.7);
        }

        #customers-testimonials.owl-carousel .owl-dots {
            display: inline-block;
            width: 100%;
            text-align: center;
        }

        #customers-testimonials.owl-carousel .owl-dots .owl-dot {
            display: inline-block;
        }

        #customers-testimonials.owl-carousel .owl-dots .owl-dot span {
            background: #3190E7;
            display: inline-block;
            height: 20px;
            margin: 0 2px 5px;
            transform: translate3d(0px, -50%, 0px) scale(0.3);
            transform-origin: 50% 50% 0;
            transition: all 250ms ease-out 0s;
            width: 20px;
        }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>
    <!-- TESTIMONIALS -->
    <section class="testimonials">
        <div class="container" style="max-width: 1170px;"></div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="customers-testimonials" class="owl-carousel owl-theme">
                        <!-- TESTIMONIAL 1 -->
                        <div class="item">
                            <div class="shadow-effect">
                                <img class="img-circle" src="imagem/aluno01.jpg" alt="">
                                <p>Descobri o segredo para ganhar grandes prêmios nos jogos Fortune Tiger, Fortune Rabbit, Fortune Mouse, Piggy Gold e Fortune Ox com o sistema incrível oferecido por esta plataforma. Os sinais enviados diretamente para mim pelo robô inteligente são realmente eficazes e analisam as melhores oportunidades em tempo real. Estou muito satisfeito com os resultados!</p>
                            </div>
                            <div class="testimonial-name">Fernanda Silva</div>
                        </div>
                        <!-- END OF TESTIMONIAL 1 -->
                        <!-- TESTIMONIAL 2 -->
                        <div class="item">
                            <div class="shadow-effect">
                                <img class="img-circle" src="imagem/aluno05.jpg" alt="">
                                <p>O sistema oferecido por esta plataforma é simplesmente incrível! Graças a ele, pude conquistar ganhos expressivos nos jogos Fortune Tiger, Fortune Rabbit, Fortune Mouse, Piggy Gold e Fortune Ox. O robô inteligente analisa todas as melhores oportunidades e envia os sinais diretamente para mim. Estou muito feliz com os resultados obtidos.</p>
                            </div>
                            <div class="testimonial-name">Lucas Mendes</div>
                        </div>
                        <!-- END OF TESTIMONIAL 2 -->
                        <!-- TESTIMONIAL 3 -->
                        <div class="item">
                            <div class="shadow-effect">
                                <img class="img-circle" src="imagem/aluno02.jpg" alt="">
                                <p>Eu não poderia estar mais satisfeito com o sistema oferecido por esta plataforma. Os ganhos nos jogos Fortune Tiger, Fortune Rabbit, Fortune Mouse, Piggy Gold e Fortune Ox aumentaram significativamente desde que comecei a usar o sistema. O robô inteligente é realmente eficiente e envia os sinais de forma precisa. Recomendo a todos!</p>
                            </div>
                            <div class="testimonial-name">Carolina Santos</div>
                        </div>
                        <!-- END OF TESTIMONIAL 3 -->
                        <!-- TESTIMONIAL 4 -->
                        <div class="item">
                            <div class="shadow-effect">
                                <img class="img-circle" src="imagem/aluno06.jpg" alt="">
                                <p>Graças ao sistema oferecido por esta plataforma, finalmente encontrei o caminho para conquistar grandes ganhos nos jogos Fortune Tiger, Fortune Rabbit, Fortune Mouse, Piggy Gold e Fortune Ox. O robô inteligente é uma ferramenta incrível que envia sinais em tempo real, o que me permite aproveitar as melhores oportunidades. Estou muito satisfeito!</p>
                            </div>
                            <div class="testimonial-name">Ricardo Fernandes</div>
                        </div>
                        <!-- END OF TESTIMONIAL 4 -->
                        <!-- TESTIMONIAL 5 -->
                        <div class="item">
                            <div class="shadow-effect">
                                <img class="img-circle" src="imagem/aluno03.jpg" alt="">
                                <p>Eu recomendo fortemente o sistema oferecido por esta plataforma. Desde que comecei a usá-lo nos jogos Fortune Tiger, Fortune Rabbit, Fortune Mouse, Piggy Gold e Fortune Ox, meus ganhos aumentaram consideravelmente. O robô inteligente envia sinais de forma eficaz e analisa as melhores oportunidades em tempo real. Estou muito feliz com os resultados alcançados!</p>
                            </div>
                            <div class="testimonial-name">Maria Souza</div>
                        </div>
                        <!-- END OF TESTIMONIAL 5 -->
                    </div>
                </div>
            </div>
        </div>
    </section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        "use strict";
        // TESTIMONIALS CAROUSEL HOOK
        $('#customers-testimonials').owlCarousel({
            loop: true,
            center: true,
            items: 3,
            margin: 0,
            autoplay: true,
            dots: true,
            autoplayTimeout: 8500,
            smartSpeed: 450,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1170: {
                    items: 3
                }
            }
        });
    });
</script>
</body>
</html>
