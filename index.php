<?php
//FORÇAR REDIRECIONAMENTO
//header("Location: lancamento.php");

//FORÇAR APAGAR COOKIES
if (isset($_COOKIE['PHPSESSID'])) {
    // Apaga o cookie atual
    setcookie('PHPSESSID', '', time() - 3600, '/');
}

?>
<?php // include 'popup_vagas_liberadas.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="PG MONITOR ">
    <meta property="og:description" content=" PG Monitor - Scanner IA para Slots">
    <meta property="og:image" content="https://pgmonitor.com.br/imagem/logo-pg.png>

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="https://assets.codepen.io/7773162/favicon.png" type="image/x-icon">

    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>


    <title>PG MONITOR - Ganhe Dinheiro em Slots com Inteligência Artificial</title>
</head>

<body>
<!--==================== HEADER ====================-->
<header class="header" id="header">
    <nav class="nav container">
        <a href="#" class="nav__logo">
            <img src="imagem/logomarca.png" alt="Logo PG Monitor" width="auto" height="auto">
        </a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="#home" class="nav__link active-link">Home</a>
                </li>
                <li class="nav__item">
                    <a href="#estrategias" class="nav__link">Tendências</a>
                </li>
                <li class="nav__item">
                    <a href="#sobre" class="nav__link">Sobre</a>
                </li>
                <li class="nav__item">
                    <a href="#faqs" class="nav__link">FAQs</a>
                </li>
                <!--
                <li class="nav__item">
                    <a href="#contact" class="nav__link">Contact Us</a>
                </li>
                -->
                <li class="nav__item">
                    <button class="nav__button custom-button" onclick="window.location.href='login.php'">Acessar</button>
                </li>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class="ri-close-line"></i>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="nav__toggle" id="nav-toggle">
            <i class="ri-menu-3-line"></i>
        </div>
    </nav>
</header>


<main class="main">

    <!--==================== HOME ====================-->
    <section class="home" id="home">
        <?php include 'notification_site.php'; ?>
        <div class="home__container container grid">
            <img src="imagem_site/select1.png" alt="" class="home__img">

            <div class="home__data">
                <h1 class="home__title">
                    PG MONITOR
                </h1>
                <p class="home__description">
                    Descubra o segredo para conquistar ganhos expressivos nos jogos Fortune Tiger, Fortune Rabbit,
                    Fortune Mouse, Piggy Gold e Fortune Ox! Nós temos um sistema comprovado que envia sinais diretamente
                    para você por meio de um robô inteligente que analisa em tempo real as melhores oportunidades nas
                    plataformas pagantes.
                </p>
                <a href="register.php" class="button button--flex">
                    Cadastre-se gratuitamente!  <i class="ri-arrow-right-down-line button__icon"></i>
                </a>
            </div>

            <div class="home__social">
                <span class="home__social-follow">Siga-nos</span>

                <div class="home__social-links">
                    <a href="https://chat.whatsapp.com/JG3AGHLgkZhAZP54sgWzix" target="_blank" class="home__social-link">
                        <i class="ri-whatsapp-fill"></i>
                    </a>
                    <a href="https://www.instagram.com/pg.monitor/" target="_blank" class="home__social-link">
                        <i class="ri-instagram-line"></i>
                    </a>
                    <a href="https://twitter.com/" target="_blank" class="home__social-link">
                        <i class="ri-twitter-fill"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <div class"slots-index">
    <?php include 'slots.php'; ?>
    </div>

    <!--==================== Nossos Parceiros ====================-->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section__title-center steps__title" style="color: black; font-size:30px;">
                    Nossos Parceiros
                </h2>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-3 text-center custom-column">
                <img src="imagem_site/parceiros/pgsoft.png" alt="PG Soft" class="img-thumbnail">
            </div>
            <div class="col-3 text-center custom-column">
                <img src="imagem_site/parceiros/bitcoin.png" alt="BITCOIN Casino" class="img-thumbnail">
            </div>
            <div class="col-3 text-center custom-column">
                <img src="imagem_site/parceiros/casino.png" alt="Casino Slots" class="img-thumbnail">
            </div>
            <div class="col-3 text-center custom-column">
                <img src="imagem_site/parceiros/vegas.png" alt="Vegas Shoot" class="img-thumbnail">
            </div>
        </div>
    </div>

    <!--==================== STEPS ====================-->
    <section class="steps section container" id="sobre">
        <div class="steps__bg">
            <h2 class="section__title-center steps__title">
                Maximizando seus Ganhos nas Plataformas Pagantes
            </h2>

            <div class="steps__container grid">
                <div class="steps__card">
                    <div class="steps__card-number">01</div>
                    <h3 class="steps__card-title"> Inscreva-se no Nosso PG Monitor</h3>
                    <p class="steps__card-description">
                        <li>Descubra o segredo para conquistar ganhos expressivos nos jogos</li>
                        <li>Cadastre-se em nosso sistema e obtenha acesso exclusivo aos sinais enviados diretamente para você.</li>
                        <li>Nosso robô inteligente analisa em tempo real as melhores oportunidades nas plataformas pagantes, garantindo que você esteja sempre um passo à frente.</li>
                    </p>
                </div>

                <div class="steps__card">
                    <div class="steps__card-number">02</div>
                    <h3 class="steps__card-title">Acompanhe os Sinais em Tempo Real</h3>
                    <p class="steps__card-description">
                        <li>Fique atento aos sinais enviados pelo nosso sistema em tempo real.</li>
                        <li>Nossos sinais são baseados em análises detalhadas e algoritmos avançados.</li>
                        <li>Siga as recomendações dos sinais e aproveite as vantagens do conhecimento especializado para aumentar suas chances de sucesso.</li>

                    </p>
                </div>

                <div class="steps__card">
                    <div class="steps__card-number">03</div>
                    <h3 class="steps__card-title">Aplique as Estratégias e Aproveite os Ganhos</h3>
                    <p class="steps__card-description">
                        <li>Utilize as estratégias fornecidas pelos sinais para tomar decisões informadas e maximizar seus ganhos nos jogos.</li>
                        <li>Siga as recomendações do nosso sistema e adapte suas jogadas de acordo com as tendências identificadas pelo robô inteligente.</li>
                        <li>Aproveite os ganhos expressivos que as melhores oportunidades podem proporcionar.</li>
                    </p>
                </div>
            </div>
        </div>
    </section>



    <!--==================== ABOUT ====================-->
    <!--  <section class="about section container" id="about">
        <div class="about__container grid">
            <img src="https://assets.codepen.io/7773162/about.png" alt="" class="about__img">

            <div class="about__data">
                <h2 class="section__title about__title">
                    Who we really are & <br> why choose us
                </h2>

                <p class="about__description">
                    We have over 4000+ unbiased reviews and our customers
                    trust our plant process and delivery service every time
                </p>

                <div class="about__details">
                    <p class="about__details-description">
                        <i class="ri-checkbox-fill about__details-icon"></i>
                        We always deliver on time.
                    </p>
                    <p class="about__details-description">
                        <i class="ri-checkbox-fill about__details-icon"></i>
                        We give you guides to protect and care for your plants.
                    </p>
                    <p class="about__details-description">
                        <i class="ri-checkbox-fill about__details-icon"></i>
                        We always come over for a check-up after sale.
                    </p>
                    <p class="about__details-description">
                        <i class="ri-checkbox-fill about__details-icon"></i>
                        100% money back guaranteed.
                    </p>
                </div>

                <a href="#" class="button--link button--flex">
                    Shop Now <i class="ri-arrow-right-down-line button__icon"></i>
                </a>
            </div>
        </div>
    </section> -->

    <!--==================== PLANOS ====================-->
    <!-- <section class="pricing-plans section" id="planos">
        <div class="pricing-card basic">
            <div class="heading">
                <h4>Básico</h4>
                <p>Plano Básico </p>
            </div>
            <p class="price">
                R$0
                <sub>/Mês</sub>
            </p>
            <ul class="features">
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong> Acesso aos sinais em</strong> tempo real
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>Análises e recomendações</strong> precisas
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>Suporte técnico </strong>por e-mail
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>1 MySQL</strong> database
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>5 email</strong> accounts
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>cPanel</strong> control panel
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>Free SSL</strong> certificate
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>24/7</strong> support
                </li>
            </ul>
            <button class="cta-btn">SELECT</button>
        </div>
        <div class="pricing-card standard">
            <div class="heading">
                <h4>STANDARD</h4>
                <p>for medium-sized businesses</p>
            </div>
            <p class="price">
                $5
                <sub>/month</sub>
            </p>
            <ul class="features">
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>Unlimited</strong> domain name
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>50 GB</strong> of disk space
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>500GB </strong>of bandwidth
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>10 MySQL</strong> database
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>50 email</strong> accounts
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>cPanel</strong> control panel
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>Free SSL</strong> certificate
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>24/7</strong> support
                </li>
            </ul>
            <button class="cta-btn">SELECT</button>
        </div>
        <div class="pricing-card premium">
            <div class="heading">
                <h4>PREMIUM</h4>
                <p>for small businesses</p>
            </div>
            <p class="price">
                $10
                <sub>/month</sub>
            </p>
            <ul class="features">
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>Unlimited</strong> domain name
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>100 GB</strong> of disk space
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>1TB </strong>of bandwidth
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>Unlimited MySQL</strong> database
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>Unlimited email</strong> accounts
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>cPanel</strong> control panel
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>Free SSL</strong> certificate
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>24/7 priority</strong> support
                </li>
                <li>
                    <i class="fa-solid fa-check"></i>
                    <strong>Advanced</strong> security features
                </li>
            </ul>
            <button class="cta-btn">SELECT</button>
        </div>
    </section> -->

    <!--==================== PRODUCTS ====================-->
    <!-- <section class="product section container" id="products">
        <h2 class="section__title-center">
            Check out our <br> products
        </h2>

        <p class="product__description">
            Here are some selected plants from our showroom, all are in excellent
            shape and has a long life span. Buy and enjoy best quality.
        </p>

        <div class="product__container grid">
            <article class="product__card">
                <div class="product__circle"></div>

                <img src="https://assets.codepen.io/7773162/product1_1.png" alt="" class="product__img">

                <h3 class="product__title">Cacti Plant</h3>
                <span class="product__price">$19.99</span>

                <button class="button--flex product__button">
                    <i class="ri-shopping-bag-line"></i>
                </button>
            </article>

            <article class="product__card">
                <div class="product__circle"></div>

                <img src="https://assets.codepen.io/7773162/product2_1.png" alt="" class="product__img">

                <h3 class="product__title">Cactus Plant</h3>
                <span class="product__price">$11.99</span>

                <button class="button--flex product__button">
                    <i class="ri-shopping-bag-line"></i>
                </button>
            </article>

            <article class="product__card">
                <div class="product__circle"></div>

                <img src="https://assets.codepen.io/7773162/product3_1.png" alt="" class="product__img">

                <h3 class="product__title">Aloe Vera Plant</h3>
                <span class="product__price">$7.99</span>

                <button class="button--flex product__button">
                    <i class="ri-shopping-bag-line"></i>
                </button>
            </article>

            <article class="product__card">
                <div class="product__circle"></div>

                <img src="https://assets.codepen.io/7773162/product4_1.png" alt="" class="product__img">

                <h3 class="product__title">Succulent Plant</h3>
                <span class="product__price">$5.99</span>

                <button class="button--flex product__button">
                    <i class="ri-shopping-bag-line"></i>
                </button>
            </article>

            <article class="product__card">
                <div class="product__circle"></div>

                <img src="https://assets.codepen.io/7773162/product5_1.png" alt="" class="product__img">

                <h3 class="product__title">Succulent Plant</h3>
                <span class="product__price">$10.99</span>

                <button class="button--flex product__button">
                    <i class="ri-shopping-bag-line"></i>
                </button>
            </article>

            <article class="product__card">
                <div class="product__circle"></div>

                <img src="https://assets.codepen.io/7773162/product6.png" alt="" class="product__img">

                <h3 class="product__title">Green Plant</h3>
                <span class="product__price">$8.99</span>

                <button class="button--flex product__button">
                    <i class="ri-shopping-bag-line"></i>
                </button>
            </article>
        </div>
    </section> -->


    <!--==================== QUESTIONS ====================-->
    <section class="questions section" id="faqs">
        <h2 class="section__title-center questions__title container">
            FAQ
        </h2>

        <div class="questions__container container grid">
            <div class="questions__group">
                <div class="questions__item">
                    <header class="questions__header">
                        <i class="ri-add-line questions__icon"></i>
                        <h3 class="questions__item-title">
                            O que é o PG Monitor desses jogos?
                        </h3>
                    </header>

                    <div class="questions__content">
                        <p class="questions__description">
                            O PG Monitor é um recurso que fornece informações sobre tendências, estratégias e
                            momentos oportunos para jogar os jogos Fortune Tiger, Fortune Rabbit, Fortune Mouse,
                            Piggy Gold e Fortune Ox. Os sinais ajudam os jogadores a tomar decisões informadas e
                            aumentar suas chances de sucesso.
                        </p>
                    </div>
                </div>

                <div class="questions__item">
                    <header class="questions__header">
                        <i class="ri-add-line questions__icon"></i>
                        <h3 class="questions__item-title">
                            Como os sinais são gerados?
                        </h3>
                    </header>

                    <div class="questions__content">
                        <p class="questions__description">
                            Os sinais são gerados usando análises de dados e algoritmos que levam em consideração as tendências
                            do Bitcoin e fatores algorítmicos dos slots. Essas análises fornecem insights sobre os jogos e
                            identificam momentos favoráveis para jogar.
                        </p>
                    </div>
                </div>

                <div class="questions__item">
                    <header class="questions__header">
                        <i class="ri-add-line questions__icon"></i>
                        <h3 class="questions__item-title">
                            Quais informações os sinais fornecem?
                        </h3>
                    </header>

                    <div class="questions__content">
                        <p class="questions__description">
                            Os sinais fornecem informações como o jogo específico (Fortune Tiger, Fortune Rabbit, Fortune
                            Mouse, Piggy Gold ou Fortune Ox), data e hora recomendadas para jogar, multiplicadores de
                            apostas (normal, turbo e auto), plataforma de jogo e link relacionado.
                        </p>
                    </div>
                </div>
            </div>

            <div class="questions__group">
                <div class="questions__item">
                    <header class="questions__header">
                        <i class="ri-add-line questions__icon"></i>
                        <h3 class="questions__item-title">
                            Como os jogadores podem usar os sinais?
                        </h3>
                    </header>

                    <div class="questions__content">
                        <p class="questions__description">
                            Os jogadores podem usar os sinais como uma referência ao decidir quando e como jogar os jogos
                            mencionados. Eles podem seguir as recomendações de data, hora e multiplicadores de apostas
                            para maximizar suas chances de ganhar.
                        </p>
                    </div>
                </div>

                <div class="questions__item">
                    <header class="questions__header">
                        <i class="ri-add-line questions__icon"></i>
                        <h3 class="questions__item-title">
                            Os sinais são atualizados regularmente?
                        </h3>
                    </header>

                    <div class="questions__content">
                        <p class="questions__description">
                            Sim, os sinais são atualizados regularmente à medida que novos dados e análises estão disponíveis.
                            Isso permite que os jogadores tenham acesso a informações atualizadas e relevantes para suas estratégias de jogo.
                        </p>
                    </div>
                </div>

                <div class="questions__item">
                    <header class="questions__header">
                        <i class="ri-add-line questions__icon"></i>
                        <h3 class="questions__item-title">
                            O PG Monitor é garantia de vitória?
                        </h3>
                    </header>

                    <div class="questions__content">
                        <p class="questions__description">
                            O PG Monitor fornece informações valiosas e melhora as chances de sucesso em até 99%.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==================== CONTACT ====================-->
    <section class="contact section container" id="contact">
        <div class="contact__container grid">
            <div class="contact__box">
                <h2 class="section__title">
                    Contato
                </h2>

                <div class="contact__data">
                    <div class="contact__information">
                        <h3 class="contact__subtitle">Redes Sociais</h3>
                        <span class="contact__description">
                        <a href="https://chat.whatsapp.com/JG3AGHLgkZhAZP54sgWzix" target="_blank" class="home__social-link">
                            <i class="ri-whatsapp-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/pg.monitor/" target="_blank" class="home__social-link">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="home__social-link">
                            <i class="ri-twitter-fill"></i>
                        </a>
                    </span>
                    </div>

                    <div class="contact__information">
                        <h3 class="contact__subtitle">E-mail</h3>
                        <span class="contact__description">
                        <i class="ri-mail-line contact__icon"></i>
                        suporte@pgmonitor.com.br
                    </span>
                    </div>
                </div>
            </div>

            <form action="" class="contact__form">
                <div class="contact__inputs">
                    <div class="contact__content">
                        <input type="email" placeholder=" " class="contact__input">
                        <label for="" class="contact__label">Email</label>
                    </div>

                    <div class="contact__content">
                        <input type="text" placeholder=" " class="contact__input">
                        <label for="" class="contact__label">Assunto</label>
                    </div>

                    <div class="contact__content contact__area">
                        <textarea name="message" placeholder=" " class="contact__input"></textarea>
                        <label for="" class="contact__label">Mensagem</label>
                    </div>
                </div>

                <button class="button button--flex" onclick="displayTemporaryMessage()">
                    Enviar Mensagem
                    <i class="ri-arrow-right-up-line button__icon"></i>
                </button>
            </form>
        </div>
    </section>
</main>

<!--==================== FOOTER ====================-->
<!--
<footer class="footer section">
    <div class="footer__container container grid">
        <div class="footer__content">
            <a href="#" class="footer__logo">
                <i class="ri-leaf-line footer__logo-icon"></i> PG Monitor
            </a>

            <h3 class="footer__title">
                Assine a nossa newsletter<br> para ficar atualizado
            </h3>

            <div class="footer__subscribe">
                <input type="email" placeholder="Enter your email" class="footer__input">

                <button class="button button--flex footer__button">
                    Subscribe
                    <i class="ri-arrow-right-up-line button__icon"></i>
                </button>
            </div>
        </div>

        <div class="footer__content">
            <h3 class="footer__title">Nosso endereço</h3>

            <ul class="footer__data">
                <li class="footer__information">1234 - Peru</li>
                <li class="footer__information">La Libertad - 43210</li>
                <li class="footer__information">123-456-789</li>
            </ul>
        </div>

        <div class="footer__content">
            <h3 class="footer__title">Contact Us</h3>

            <ul class="footer__data">
                <li class="footer__information">+999 888 777</li>

                <div class="footer__social">
                    <a href="https://www.facebook.com/" class="footer__social-link">
                        <i class="ri-facebook-fill"></i>
                    </a>
                    <a href="https://www.instagram.com/" class="footer__social-link">
                        <i class="ri-instagram-line"></i>
                    </a>
                    <a href="https://twitter.com/" class="footer__social-link">
                        <i class="ri-twitter-fill"></i>
                    </a>
                </div>
            </ul>
        </div>

        <div class="footer__content">
            <h3 class="footer__title">
                We accept all credit cards
            </h3>

            <div class="footer__cards">
                <img src="https://assets.codepen.io/7773162/card1.png" alt="" class="footer__card">
                <img src="https://assets.codepen.io/7773162/card2.png" alt="" class="footer__card">
                <img src="https://assets.codepen.io/7773162/card3.png" alt="" class="footer__card">
                <img src="https://assets.codepen.io/7773162/card4.png" alt="" class="footer__card">
            </div>
             -->
</div>
</div>
<p class="footer__copy">&#169; EIM. Todos os direitos reservados</p>
</footer>

<!--=============== SCROLL UP ===============-->
<a href="#" class="scrollup" id="scroll-up">
    <i class="ri-arrow-up-fill scrollup__icon"></i>
</a>
</body>
</html>


<style>

    .mt-5 {
        margin-top: 0 !important;
    }

    .mt-4 {
        margin-top: 0 !important;
        padding-bottom:20px;
    }

    .col-3 {
        flex: 0 0 auto;
        width: 17%;
    }
    /* Estilo para reduzir o espaçamento entre as colunas */
    .custom-column {
        padding: 5px; /* Ajuste o valor conforme necessário para reduzir o espaçamento */
    }

    .img-thumbnail {
        height: 100px;
        object-fit: cover;
        margin: 5px; /* Margem reduzida entre as imagens */
        padding:10px;
    }

    /* Estilo para alinhar verticalmente o conteúdo dentro das colunas */
    .d-flex {
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .game-column{
        height:325px !important;
    }

    /*=============== GOOGLE FONTS ===============*/
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

    /*=============== VARIABLES CSS ===============*/
    :root {
        --header-height: 3.5rem; /*56px*/

        /*========== Colors ==========*/
        /*Color mode HSL(hue, saturation, lightness)*/
        --hue: 152;
        --first-color: hsl(var(--hue), 24%, 32%);
        --first-color-alt: hsl(var(--hue), 24%, 28%);
        --first-color-light: hsl(var(--hue), 24%, 66%);
        --first-color-lighten: hsl(var(--hue), 24%, 92%);
        --title-color: hsl(var(--hue), 4%, 15%);
        --text-color: hsl(var(--hue), 4%, 35%);
        --text-color-light: hsl(var(--hue), 4%, 55%);
        --body-color: hsl(var(--hue), 0%, 100%);
        --container-color: #fff;

        /*========== Font and typography ==========*/
        /*.5rem = 8px | 1rem = 16px ...*/
        --body-font: "Poppins", sans-serif;
        --big-font-size: 2rem;
        --h1-font-size: 1.5rem;
        --h2-font-size: 1.25rem;
        --h3-font-size: 1rem;
        --normal-font-size: 0.938rem;
        --small-font-size: 0.813rem;
        --smaller-font-size: 0.75rem;

        /*========== Font weight ==========*/
        --font-medium: 500;
        --font-semi-bold: 600;

        /*========== Margenes Bottom ==========*/
        /*.5rem = 8px | 1rem = 16px ...*/
        --mb-0-5: 0.5rem;
        --mb-0-75: 0.75rem;
        --mb-1: 1rem;
        --mb-1-5: 1.5rem;
        --mb-2: 2rem;
        --mb-2-5: 2.5rem;

        /*========== z index ==========*/
        --z-tooltip: 10;
        --z-fixed: 100;
    }

    /* Responsive typography */
    @media screen and (min-width: 968px) {
        :root {
            --big-font-size: 3.5rem;
            --h1-font-size: 2.25rem;
            --h2-font-size: 1.5rem;
            --h3-font-size: 1.25rem;
            --normal-font-size: 1rem;
            --small-font-size: 0.875rem;
            --smaller-font-size: 0.813rem;
        }
    }

    /*=============== BASE ===============*/
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    html {
        scroll-behavior: smooth;
    }

    body,
    button,
    input,
    textarea {
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
    }

    body {
        margin: var(--header-height) 0 0 0;
        background-color: var(--body-color);
        color: var(--text-color);
        transition: 0.4s; /*For animation dark mode*/
    }

    button {
        cursor: pointer;
        border: none;
        outline: none;
    }

    h1,
    h2,
    h3 {
        color: var(--title-color);
        font-weight: var(--font-semi-bold);
    }

    ul {
        list-style: none;
    }

    a {
        text-decoration: none;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    /*=============== THEME ===============*/
    /*========== Variables Dark theme ==========*/
    body.dark-theme {
        --first-color-dark: hsl(var(--hue), 8%, 20%);
        --title-color: hsl(var(--hue), 4%, 95%);
        --text-color: hsl(var(--hue), 4%, 75%);
        --body-color: hsl(var(--hue), 8%, 12%);
        --container-color: hsl(var(--hue), 8%, 16%);
    }

    /*========== Button Dark/Light ==========*/
    .change-theme {
        color: var(--title-color);
        font-size: 1.15rem;
        cursor: pointer;
    }

    .nav__btns {
        display: inline-flex;
        align-items: center;
        column-gap: 1rem;
    }

    /*==========
    Color changes in some parts of
    the website, in dark theme
    ==========*/

    .dark-theme .steps__bg,
    .dark-theme .questions {
        background-color: var(--first-color-dark);
    }

    .dark-theme .product__circle,
    .dark-theme .footer__subscribe {
        background-color: var(--container-color);
    }

    .dark-theme .scroll-header {
        box-shadow: 0 1px 4px hsla(var(--hue), 4%, 4%, 0.3);
    }

    /*=============== REUSABLE CSS CLASSES ===============*/
    .section {
        padding: 5.5rem 0 1rem;
    }

    .nav__list {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .section__title,
    .section__title-center {
        font-size: var(--h2-font-size);
        margin-bottom: var(--mb-2);
        line-height: 140%;
    }

    .section__title-center {
        text-align: center;
    }

    .container {
        max-width: 968px;
        margin-left: var(--mb-1-5);
        margin-right: var(--mb-1-5);
    }

    .grid {
        display: grid;
    }

    .main {
        overflow: hidden; /*For animation*/
    }

    /*=============== HEADER ===============*/
    .header {
        width: 100%;
        background-color: var(--body-color);
        position: fixed;
        top: 0;
        left: 0;
        z-index: var(--z-fixed);
        transition: 0.4s;
        border-bottom: 1px solid #eee;
        box-shadow: 0 1px 4px hsla(var(--hue), 4%, 15%, 0.1);
    }

    /*=============== NAV ===============*/
    .nav {
        height: var(--header-height);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav__logo,
    .nav__toggle,
    .nav__close {
        color: var(--title-color);
    }

    .nav__logo {
        padding-left:10px;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: -1px;
        display: inline-flex;
        align-items: center;
        column-gap: 0.5rem;
        transition: 0.3s;
    }

    .nav__logo-icon {
        font-size: 1.15rem;
        color: var(--first-color);
    }

    .nav__logo:hover {
        color: var(--first-color);
    }

    .nav__toggle {
        display: inline-flex;
        font-size: 1.25rem;
        cursor: pointer;
        padding: 0 30px; /* Adicione o valor de padding desejado aqui */
    }


    @media screen and (max-width: 767px) {

        .img-thumbnail {
            width: auto;
            height: 60px;
            object-fit: cover;
            margin: 0px;
            padding: 4px;
        }

        .mt-4 {
            margin-top: 0 !important;
            padding-bottom: 20px;
            padding-right: 30px;
        }

        .col-3 {
            flex: 0 0 auto;
            width: 25%;
        }
        /* Estilo para reduzir o espaçamento entre as colunas */
        .custom-column {
            padding: 5px; /* Ajuste o valor conforme necessário para reduzir o espaçamento */
        }

        .game-column{
            height:250px !important;
        }

        .nav__menu {
            position: fixed;
            background-color: var(--container-color);
            width: 60%;
            height: 100%;
            top: 0;
            right: -100%;
            box-shadow: -2px 0 4px hsla(var(--hue), 24%, 15%, 0.1);
            padding: 4rem 0 0 1rem;
            border-radius: 1rem 0 0 1rem;
            transition: 0.3s;
            z-index: var(--z-fixed);
        }
    }

    .nav__close {
        font-size: 1.5rem;
        position: absolute;
        top: 1rem;
        right: 1.25rem;
        cursor: pointer;
    }

    .nav__list {
        display: flex;
        flex-direction: column;
        row-gap: 1.5rem;
        padding: 0;
    }

    .nav__link {
        color: var(--title-color);
        font-weight: var(--font-medium);
        transition: 0.3s;
    }

    .nav__link:hover {
        color: var(--first-color);
    }

    /* Show menu */
    .show-menu {
        right: 0;
    }

    /* Change background header */
    .scroll-header {
        box-shadow: 0 1px 4px hsla(var(--hue), 4%, 15%, 0.1);
    }

    /* Active link */
    .active-link {
        position: relative;
        color: var(--first-color);
    }

    .active-link::after {
        content: "";
        position: absolute;
        bottom: -0.5rem;
        left: 0;
        width: 50%;
        height: 2px;
        background-color: var(--first-color);
    }

    .home {
        display: flex;
        padding: 3.5rem 0 2rem;
        justify-content: center;
    }

    .home__container {
        position: relative;
        row-gap: 2rem;
    }

    .home__img {
        width: 200px;
        justify-self: center;
    }

    .home__title {
        font-size: var(--big-font-size);
        line-height: 140%;
        margin-bottom: var(--mb-1);
    }

    .home__description {
        margin-bottom: var(--mb-2-5);
    }

    .home__social {
        position: absolute;
        top: 2rem;
        right: -1rem;
        display: grid;
        justify-items: center;
        row-gap: 3.5rem;
    }

    .home__social-follow {
        font-weight: var(--font-medium);
        font-size: var(--smaller-font-size);
        color: var(--first-color);
        position: relative;
        transform: rotate(90deg);
    }

    .home__social-follow::after {
        content: "";
        position: absolute;
        width: 1rem;
        height: 2px;
        background-color: var(--first-color);
        right: -45%;
        top: 50%;
    }

    .home__social-links {
        display: inline-flex;
        flex-direction: column;
        row-gap: 0.25rem;
    }

    .home__social-link {
        font-size: 1rem;
        color: var(--first-color);
        transition: 0.3s;
    }

    .home__social-link:hover {
        transform: translateX(0.25rem);
    }

    /*=============== BUTTONS ===============*/
    .button {
        display: inline-block;
        background-color: #8f0084;
        color: #fff;
        padding: 1rem 1.75rem;
        border-radius: 0.5rem;
        font-weight: var(--font-medium);
        transition: 0.3s;
    }

    .button:hover {
        background-color: var(--first-color-alt);
    }

    .button__icon {
        transition: 0.3s;
    }

    .button:hover .button__icon {
        transform: translateX(0.25rem);
    }

    .button--flex {
        display: inline-flex;
        align-items: center;
        column-gap: 0.5rem;
    }

    .button--link {
        color: var(--first-color);
        font-weight: var(--font-medium);
    }

    .button--link:hover .button__icon {
        transform: translateX(0.25rem);
    }

    /*=============== ABOUT ===============*/
    .about__container {
        display: flex;
        row-gap: 2rem;
    }

    .about__img {
        width: 280px;
        justify-self: center;
    }

    .about__title {
        margin-bottom: var(--mb-1);
    }

    .about__description {
        margin-bottom: var(--mb-2);
    }

    .about__details {
        display: grid;
        row-gap: 1rem;
        margin-bottom: var(--mb-2-5);
    }

    .about__details-description {
        display: inline-flex;
        column-gap: 0.5rem;
        font-size: var(--small-font-size);
    }

    .about__details-icon {
        font-size: 1rem;
        color: var(--first-color);
        margin-top: 0.15rem;
    }

    /*=============== STEPS ===============*/
    .steps__bg {
        background-color: #8f0084;
        padding: 3rem 2rem 2rem;
        border-radius: 1rem;
    }


    .steps__container {
        gap: 2rem;
        padding-top: 1rem;
    }

    .steps__title {
        color: #fff;
    }

    .steps__card {
        background-color: var(--container-color);
        padding: 2.5rem 3rem 2rem 1.5rem;
        border-radius: 1rem;
    }

    .steps__card-number {
        display: inline-block;
        background-color: #8f0084;
        color: #fff;
        padding: 0.5rem 0.75rem;
        border-radius: 0.25rem;
        font-size: var(--h2-font-size);
        margin-bottom: var(--mb-1-5);
        transition: 0.3s;
    }

    .steps__card-title {
        font-size: var(--h3-font-size);
        margin-bottom: var(--mb-0-5);
    }

    .steps__card-description {
        font-size: var(--small-font-size);
    }

    .steps__card:hover .steps__card-number {
        transform: translateY(-0.25rem);
    }

    /*=============== PRODUCTS ===============*/
    .product__description {
        display: flex;
        text-align: center;
    }

    .product__container {
        padding: 3rem 0;
        grid-template-columns: repeat(2, 1fr);
        gap: 2.5rem 3rem;
    }

    .product__card {
        display: grid;
        position: relative;
    }

    .product__img {
        position: relative;
        width: 120px;
        justify-self: center;
        margin-bottom: var(--mb-0-75);
        transition: 0.3s;
    }

    .product__title,
    .product__price {
        font-size: var(--small-font-size);
        font-weight: var(--font-semi-bold);
        color: var(--title-color);
    }

    .product__title {
        margin-bottom: 0.25rem;
    }

    .product__button {
        position: absolute;
        right: 0;
        bottom: 0;
        background-color: var(--first-color);
        color: #fff;
        padding: 0.25rem;
        border-radius: 0.35rem;
        font-size: 1.15rem;
    }

    .product__button:hover {
        background-color: var(--first-color-alt);
    }

    .product__circle {
        width: 90px;
        height: 90px;
        background-color: var(--first-color-lighten);
        border-radius: 50%;
        position: absolute;
        top: 18%;
        left: 5%;
    }

    .product__card:hover .product__img {
        transform: translateY(-0.5rem);
    }

    /*=============== QUESTIONS ===============*/
    .questions {
        background-color: var(--first-color-lighten);
    }

    .questions__container {
        gap: 1.5rem;
        padding: 1.5rem 0;
    }

    .questions__group {
        display: grid;
        row-gap: 1.5rem;
    }

    .questions__item {
        background-color: var(--container-color);
        border-radius: 0.25rem;
    }

    .questions__item-title {
        font-size: var(--small-font-size);
        font-weight: var(--font-medium);
    }

    .questions__icon {
        font-size: 1.25rem;
        color: var(--title-color);
    }

    .questions__description {
        font-size: var(--smaller-font-size);
        padding: 0 1.25rem 1.25rem 2.5rem;
    }

    .questions__header {
        display: flex;
        align-items: center;
        column-gap: 0.5rem;
        padding: 0.75rem 0.5rem;
        cursor: pointer;
    }

    .questions__content {
        overflow: hidden;
        height: 0;
    }

    .questions__item,
    .questions__header,
    .questions__item-title,
    .questions__icon,
    .questions__description,
    .questions__content {
        transition: 0.3s;
    }

    .questions__item:hover {
        box-shadow: 0 2px 8px hsla(var(--hue), 4%, 15%, 0.15);
    }

    /*Rotate icon, change color of titles and background*/
    .accordion-open .questions__header,
    .accordion-open .questions__content {
        background-color: var(--first-color);
    }

    .accordion-open .questions__item-title,
    .accordion-open .questions__description,
    .accordion-open .questions__icon {
        color: #fff;
    }

    .accordion-open .questions__icon {
        transform: rotate(45deg);
    }

    /*=============== CONTACT ===============*/
    .contact__container {
        row-gap: 3.5rem;
    }

    .contact__data {
        display: grid;
        row-gap: 2rem;
    }

    .contact__subtitle {
        font-size: var(--normal-font-size);
        font-weight: var(--font-medium);
        color: var(--text-color);
        margin-bottom: var(--mb-0-5);
    }

    .contact__description {
        display: inline-flex;
        align-items: center;
        column-gap: 0.5rem;
        color: var(--title-color);
        font-weight: var(--font-medium);
    }

    .contact__icon {
        font-size: 1.25rem;
    }

    .contact__inputs {
        display: grid;
        row-gap: 2rem;
        margin-bottom: var(--mb-2-5);
    }

    .contact__content {
        position: relative;
        height: 3rem;
        border-bottom: 1px solid var(--text-color-light);
    }

    .contact__input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        padding: 1rem 1rem 1rem 0;
        background: none;

        color: var(--text-color);

        border: none;
        outline: none;
        z-index: 1;
    }

    .contact__label {
        position: absolute;
        top: 0.75rem;
        width: 100%;
        font-size: var(--small-font-size);
        color: var(--text-color-light);
        transition: 0.3s;
    }

    .contact__area {
        height: 7rem;
    }

    .contact__area textarea {
        resize: none;
    }

    /*Input focus move up label*/
    .contact__input:focus + .contact__label {
        top: -0.75rem;
        left: 0;
        font-size: var(--smaller-font-size);
        z-index: 10;
    }

    /*Input focus sticky top label*/
    .contact__input:not(:placeholder-shown).contact__input:not(:focus)
    + .contact__label {
        top: -0.75rem;
        font-size: var(--smaller-font-size);
        z-index: 10;
    }

    /*=============== FOOTER ===============*/
    .footer__container {
        row-gap: 3rem;
    }

    .footer__logo {
        display: inline-flex;
        align-items: center;
        column-gap: 0.5rem;
        color: var(--title-color);
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: -1px;
        margin-bottom: var(--mb-2-5);
        transition: 0.3s;
    }

    .footer__logo-icon {
        font-size: 1.15rem;
        color: var(--first-color);
    }

    .footer__logo:hover {
        color: var(--first-color);
    }

    .footer__title {
        font-size: var(--h3-font-size);
        margin-bottom: var(--mb-1-5);
    }

    .footer__subscribe {
        background-color: var(--first-color-lighten);
        padding: 0.75rem;
        display: flex;
        justify-content: space-between;
        border-radius: 0.5rem;
    }

    .footer__input {
        width: 70%;
        padding: 0 0.5rem;
        background: none;
        color: var(--text-color);
        border: none;
        outline: none;
    }

    .footer__button {
        padding: 1rem;
    }

    .footer__data {
        display: grid;
        row-gap: 0.75rem;
    }

    .footer__information {
        font-size: var(--small-font-size);
    }

    .footer__social {
        display: inline-flex;
        column-gap: 0.75rem;
    }

    .footer__social-link {
        font-size: 1rem;
        color: var(--text-color);
        transition: 0.3s;
    }

    .footer__social-link:hover {
        transform: translateY(-0.25rem);
    }

    .footer__cards {
        display: inline-flex;
        align-items: center;
        column-gap: 0.5rem;
    }
    .footer__card {
        width: 35px;
    }

    .footer__copy {
        text-align: center;
        font-size: var(--smaller-font-size);
        color: var(--text-color-light);
        margin: 5rem 0 1rem;
    }

    /*=============== SCROLL UP ===============*/
    .scrollup {
        position: fixed;
        background-color: var(--first-color);
        right: 1rem;
        bottom: -30%;
        display: inline-flex;
        padding: 0.5rem;
        border-radius: 0.25rem;
        z-index: var(--z-tooltip);
        opacity: 0.8;
        transition: 0.4s;
    }

    .scrollup__icon {
        font-size: 1rem;
        color: #fff;
    }

    .scrollup:hover {
        background-color: var(--first-color-alt);
        opacity: 1;
    }

    /* Show Scroll Up*/
    .show-scroll {
        bottom: 3rem;
    }

    /*=============== SCROLL BAR ===============*/
    ::-webkit-scrollbar {
        width: 0.6rem;
        background: hsl(var(--hue), 4%, 53%);
    }

    ::-webkit-scrollbar-thumb {
        background: hsl(var(--hue), 4%, 29%);
        border-radius: 0.5rem;
    }

    /*=============== BREAKPOINTS ===============*/
    /* For small devices */
    @media screen and (max-width: 320px) {
        .container {
            margin-left: var(--mb-1);
            margin-right: var(--mb-1);
        }

        .home__img {
            width: 180px;
        }
        .home__title {
            font-size: var(--h1-font-size);
        }

        .steps__bg {
            padding: 2rem 1rem;
        }
        .steps__card {
            padding: 1.5rem;
        }

        .product__container {
            grid-template-columns: 0.6fr;
            justify-content: center;
        }
    }

    /* For medium devices */
    @media screen and (min-width: 576px) {
        .steps__container {
            grid-template-columns: repeat(2, 1fr);
        }

        .product__description {
            padding: 0 4rem;
        }
        .product__container {
            grid-template-columns: repeat(2, 170px);
            justify-content: center;
            column-gap: 5rem;
        }

        .footer__subscribe {
            width: 400px;
        }
    }

    @media screen and (min-width: 767px) {
        body {
            margin: 0;
        }

        .nav {
            height: calc(var(--header-height) + 1.5rem);
            column-gap: 3rem;
        }
        .nav__toggle,
        .nav__close {
            display: none;
        }
        .nav__list {
            flex-direction: row;
            column-gap: 3rem;
        }
        .nav__menu {
            margin-left: auto;
        }

        .home__container,
        .about__container,
        .questions__container,
        .contact__container,
        .footer__container {
            grid-template-columns: repeat(2, 1fr);
        }

        .home {
            padding: 10rem 0 5rem;
        }
        .home__container {
            align-items: center;
        }
        .home__img {
            width: 280px;
            order: 1;
        }
        .home__social {
            top: 30%;
        }

        .questions__container {
            align-items: flex-start;
        }

        .footer__container {
            column-gap: 3rem;
        }
        .footer__subscribe {
            width: initial;
        }
    }

    /* For large devices */
    @media screen and (min-width: 992px) {
        .container {
            margin-left: auto;
            margin-right: auto;
        }

        .section {
            padding: 1rem 0 1rem;
        }
        .section__title,
        .section__title-center {
            font-size: var(--h1-font-size);
        }

        .home {
            padding: 8rem 0 5rem;
        }
        .home__img {
            width: 350px;
        }
        .home__description {
            padding-right: 7rem;
        }

        .about__img {
            width: 380px;
        }

        .steps__container {
            grid-template-columns: repeat(3, 1fr);
        }
        .steps__bg {
            padding: 3.5rem 2.5rem;
        }
        .steps__card-title {
            font-size: var(--normal-font-size);
        }

        .product__description {
            padding: 0 16rem;
        }
        .product__container {
            padding: 4rem 0;
            grid-template-columns: repeat(3, 185px);
            gap: 4rem 6rem;
        }
        .product__img {
            width: 160px;
        }
        .product__circle {
            width: 110px;
            height: 110px;
        }
        .product__title,
        .product__price {
            font-size: var(--normal-font-size);
        }

        .questions__container {
            padding: 1rem 0 4rem;
        }
        .questions__title {
            text-align: initial;
        }
        .questions__group {
            row-gap: 2rem;
        }
        .questions__header {
            padding: 1rem;
        }
        .questions__description {
            padding: 0 3.5rem 2.25rem 2.75rem;
        }

        .footer__logo {
            font-size: var(--h3-font-size);
        }
        .footer__container {
            grid-template-columns: 1fr 0.5fr 0.5fr 0.5fr;
        }
        .footer__copy {
            margin: 7rem 0 2rem;
        }
    }

    @media screen and (min-width: 1200px) {
        .home__social {
            right: -3rem;
            row-gap: 4.5rem;
        }
        .home__social-follow {
            font-size: var(--small-font-size);
        }
        .home__social-follow::after {
            width: 1.5rem;
            right: -60%;
        }
        .home__social-link {
            font-size: 1.15rem;
        }

        .about__container {
            column-gap: 7rem;
        }

        .scrollup {
            right: 3rem;
        }
    }

    .custom-button {
        background-color: #8f0084;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
    }

    .custom-button:hover {
        background-color: darkgreen;
        cursor: pointer;
    }

    .pricing-plans {
        gap: 32px;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: center;
        width: 100%;
        padding: 64px;
    }

    .pricing-card {
        --col: #e4e4e7;
        position: relative;
        min-width: 360px;
        padding: 32px;
        padding-bottom: 96px;
        border-radius: 4px;
        border: 1px solid #262626;
        background-color: #26262620;
        box-shadow: 0 0 32px transparent;
        text-align: center;
    }

    .pricing-card.basic {
        --col: #0891b2;
    }

    .pricing-card.standard {
        --col: #059669;
    }

    .pricing-card.premium {
        --col: #c026d3;
    }

    .pricing-card:hover {
        border-color: var(--col);
        background-color: #26262680;
        box-shadow: 0 0 32px #171717;
        transform: translateY(-16px) scale(1.02);
        transition: all 0.5s ease;
    }

    .pricing-card > *:not(:last-child) {
        margin-bottom: 32px;
    }

    .pricing-card .heading h4 {
        padding-bottom: 12px;
        color: var(--col);
        font-size: 24px;
        font-weight: normal;
    }

    .pricing-card .heading p {
        color: #a3a3a3;
        font-size: 14px;
        font-weight: lighter;
    }

    .pricing-card .price {
        position: relative;
        color: var(--col);
        font-size: 60px;
        font-weight: bold;
    }

    .pricing-card .price sub {
        position: absolute;
        bottom: 14px;
        color: #a3a3a3;
        font-size: 14px;
        font-weight: lighter;
    }

    .pricing-card .features li {
        padding-bottom: 16px;
        color: #a3a3a3;
        font-size: 16px;
        font-weight: lighter;
        text-align: left;
    }

    .pricing-card .features li i,
    .pricing-card .features li strong {
        color: #e4e4e7;
        font-size: 16px;
        text-align: left;
    }

    .pricing-card .features li strong {
        padding-left: 24px;
    }

    .pricing-card .cta-btn {
        position: absolute;
        bottom: 32px;
        left: 50%;
        transform: translateX(-50%);
        width: 200px;
        padding: 12px;
        border-radius: 4px;
        border: 1px solid var(--col);
        background-color: var(--col);
        color: #e4e4e7;
        font-size: 20px;
        font-weight: bold;
    }

    .pricing-card .cta-btn:active {
        background-color: transparent;
        color: var(--col);
        transition: all 0.3s ease;
    }

    section.pricing-plans {
        margin-top:80px;
        background-color: #000;
        color: #fff; /* Define a cor do texto para branco */
        padding: 50px; /* Ajuste o valor do preenchimento conforme necessário */
    }

    li{
        font-size:13px;
        padding:5px;
    }

    /* Estilos para a seção de estratégias no modo responsivo */
    @media (max-width: 768px) {
        #tendencias {
            display: flex;
            justify-content: center;
            padding: 0 0 10px;
        }
    }

</style>

<script>

    function displayTemporaryMessage() {
        alert("Desculpe, a função de envio de mensagens está temporariamente indisponível. Por favor, entre em contato conosco através do e-mail suporte@pgmonitor.com.br ou acesse o menu 'Suporte' se você estiver cadastrado no sistema para falar conosco.");
    }

    /*=============== SHOW MENU ===============*/
    const navMenu = document.getElementById("nav-menu"),
        navToggle = document.getElementById("nav-toggle"),
        navClose = document.getElementById("nav-close");

    /*===== MENU SHOW =====*/
    /* Validate if constant exists */
    if (navToggle) {
        navToggle.addEventListener("click", () => {
            navMenu.classList.add("show-menu");
        });
    }

    /*===== MENU HIDDEN =====*/
    /* Validate if constant exists */
    if (navClose) {
        navClose.addEventListener("click", () => {
            navMenu.classList.remove("show-menu");
        });
    }

    /*=============== REMOVE MENU MOBILE ===============*/
    const navLink = document.querySelectorAll(".nav__link");

    function linkAction() {
        const navMenu = document.getElementById("nav-menu");
        // When we click on each nav__link, we remove the show-menu class
        navMenu.classList.remove("show-menu");
    }
    navLink.forEach((n) => n.addEventListener("click", linkAction));

    /*=============== CHANGE BACKGROUND HEADER ===============*/
    function scrollHeader() {
        const header = document.getElementById("header");
        // When the scroll is greater than 80 viewport height, add the scroll-header class to the header tag
        if (this.scrollY >= 80) header.classList.add("scroll-header");
        else header.classList.remove("scroll-header");
    }
    window.addEventListener("scroll", scrollHeader);

    /*=============== QUESTIONS ACCORDION ===============*/
    const accordionItems = document.querySelectorAll(".questions__item");

    accordionItems.forEach((item) => {
        const accordionHeader = item.querySelector(".questions__header");

        accordionHeader.addEventListener("click", () => {
            const openItem = document.querySelector(".accordion-open");

            toggleItem(item);

            if (openItem && openItem !== item) {
                toggleItem(openItem);
            }
        });
    });

    const toggleItem = (item) => {
        const accordionContent = item.querySelector(".questions__content");

        if (item.classList.contains("accordion-open")) {
            accordionContent.removeAttribute("style");
            item.classList.remove("accordion-open");
        } else {
            accordionContent.style.height = accordionContent.scrollHeight + "px";
            item.classList.add("accordion-open");
        }
    };

    /*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
    const sections = document.querySelectorAll("section[id]");

    function scrollActive() {
        const scrollY = window.pageYOffset;

        sections.forEach((current) => {
            const sectionHeight = current.offsetHeight,
                sectionTop = current.offsetTop - 58,
                sectionId = current.getAttribute("id");

            const link = document.querySelector(".nav__menu a[href*=" + sectionId + "]");
            if (link) {
                if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                    link.classList.add("active-link");
                } else {
                    link.classList.remove("active-link");
                }
            }
        });
    }
    window.addEventListener("scroll", scrollActive);

    /*=============== SHOW SCROLL UP ===============*/
    function scrollUp() {
        const scrollUp = document.getElementById("scroll-up");
        // When the scroll is higher than 400 viewport height, add the show-scroll class to the a tag with the scroll-top class
        if (this.scrollY >= 400) scrollUp.classList.add("show-scroll");
        else scrollUp.classList.remove("show-scroll");
    }
    window.addEventListener("scroll", scrollUp);

    /*=============== DARK LIGHT THEME ===============*/
    const themeButton = document.getElementById("theme-button");
    const darkTheme = "dark-theme";
    const iconTheme = "ri-sun-line";

    // Previously selected topic (if user selected)
    const selectedTheme = localStorage.getItem("selected-theme");
    const selectedIcon = localStorage.getItem("selected-icon");

    // We obtain the current theme that the interface has by validating the dark-theme class
    const getCurrentTheme = () =>
        document.body.classList.contains(darkTheme) ? "dark" : "light";
    const getCurrentIcon = () =>
        themeButton.classList.contains(iconTheme) ? "ri-moon-line" : "ri-sun-line";

    // We validate if the user previously chose a topic
    if (selectedTheme) {
        // If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the dark
        document.body.classList[selectedTheme === "dark" ? "add" : "remove"](
            darkTheme
        );
        themeButton.classList[selectedIcon === "ri-moon-line" ? "add" : "remove"](
            iconTheme
        );
    }

    // Activate / deactivate the theme manually with the button
    themeButton.addEventListener("click", () => {
        // Add or remove the dark / icon theme
        document.body.classList.toggle(darkTheme);
        themeButton.classList.toggle(iconTheme);
        // We save the theme and the current icon that the user chose
        localStorage.setItem("selected-theme", getCurrentTheme());
        localStorage.setItem("selected-icon", getCurrentIcon());
    });

    /*=============== SCROLL REVEAL ANIMATION ===============*/
    const sr = ScrollReveal({
        origin: "top",
        distance: "60px",
        duration: 2500,
        delay: 400
        // reset: true
    });

    sr.reveal(`.home__data`);
    sr.reveal(`.home__img`, { delay: 500 });
    sr.reveal(`.home__social`, { delay: 600 });
    sr.reveal(`.about__img, .contact__box`, { origin: "left" });
    sr.reveal(`.about__data, .contact__form`, { origin: "right" });
    sr.reveal(`.steps__card, .product__card, .questions__group, .footer`, {
        interval: 100
    });

</script>