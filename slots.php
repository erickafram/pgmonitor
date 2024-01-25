<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" />
<!--==================== Estratégias ====================-->
<section id="estrategias">
    <div class="container">
        <div class="alert alert-primary" role="alert">
            Desvendando o Potencial Lucrativo dos Slots com Análise de Tendências do Bitcoin e Algoritmos Avançados!<p>
            Descubra o RTP (Retorno ao Jogador): A Chave para Maximizar seus Ganhos nos Slots.
            Aumente suas Chances de Vitória com Porcentagens de <b>Pagamento Mais Altas!</b>
        </div>
        <?php include 'script_widget.php'; ?> </br>
    </div>
    <div id="tendencias">
        <div class="game-section">
            <div class="game-column">
                <img src="imagem_site/01.webp" alt="Fortune Tiger">
                <div class="progress-bar">
                    <div class="progress" style="width: 70%;"></div>
                    <span class="progress-percentage">70%</span>
                </div>
                <span class="alert-message" style="display: none;"></span> <!-- Elemento para exibir a mensagem de alerta -->
                <!-- USUARIO NAO LOGADO BOTÃO -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="strategy-button"><a href="login.php" style="color: white;"><i class="fas fa-barcode"></i> Escanear</a></button>
                <?php endif; ?>
                <!-- USUARIO LOGADO BOTÃO -->
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'user' || $_SESSION['user_role'] === 'gold')): ?>
                    <button class="strategy-button" onclick="location.href = 'dashboard.php';"> <i class="fas fa-barcode"></i> Escanear </button>
                    <button class="strategy-button-testar"> <a href="https://m.pgsoft-games.com/126/index.html?ot=82b8b0f88e17ae53611e6dd7f167bc38&btt=2&__refer=m.pg-redirect.com&or=static.pgsoft-games.com"
                                                               style="color: white; text-decoration: none;" target="_blank"> <i class="fas fa-gamepad"></i> Demo</a> </button>
                <?php endif; ?>
            </div>


            <div class="game-column">
                <img src="imagem_site/02.webp" alt="Fortune OX">
                <div class="progress-bar">
                    <div class="progress" style="width: 70%;"></div>
                    <span class="progress-percentage">70%</span>
                </div>
                <span class="alert-message" style="display: none;"></span> <!-- Elemento para exibir a mensagem de alerta -->
                <!-- USUARIO NAO LOGADO BOTÃO -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="strategy-button"><a href="login.php" style="color: white;"><i class="fas fa-barcode"></i> Escanear</a></button>
                <?php endif; ?>
                <!-- USUARIO LOGADO BOTÃO -->
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'user' || $_SESSION['user_role'] === 'gold')): ?>
                    <button class="strategy-button" onclick="location.href = 'dashboard.php';"> <i class="fas fa-barcode"></i> Escanear </button>
                    <button class="strategy-button-testar"> <a href="https://m.pgsoft-games.com/98/index.html?ot=82b8b0f88e17ae53611e6dd7f167bc38&btt=2&__refer=m.pg-redirect.com&or=static.pgsoft-games.com"
                                                               style="color: white; text-decoration: none;" target="_blank"> <i class="fas fa-gamepad"></i> Demo</a> </button>
                <?php endif; ?>
            </div>

            <div class="game-column">
                <img src="imagem_site/03.jpg" alt="Fortune Rabbit">
                <div class="progress-bar">
                    <div class="progress" style="width: 70%;"></div>
                    <span class="progress-percentage">70%</span>
                </div>
                <span class="alert-message" style="display: none;"></span> <!-- Elemento para exibir a mensagem de alerta -->
                <!-- USUARIO NAO LOGADO BOTÃO -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="strategy-button"><a href="login.php" style="color: white;"><i class="fas fa-barcode"></i> Escanear</a></button>
                <?php endif; ?>
                <!-- USUARIO LOGADO BOTÃO -->
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'user' || $_SESSION['user_role'] === 'gold')): ?>
                    <button class="strategy-button" onclick="location.href = 'dashboard.php';"> <i class="fas fa-barcode"></i> Escanear </button>
                    <button class="strategy-button-testar"> <a href="https://m.pgsoft-games.com/1543462/index.html?l=th&ot=ca7094186b309ee149c55c8822e7ecf2&btt=2&__refer=m.pg-redirect.net&or=static.pgsoft-games.com"
                                                               style="color: white; text-decoration: none;" target="_blank"> <i class="fas fa-gamepad"></i> Demo</a> </button>
                <?php endif; ?>
            </div>

            <div class="game-column">
                <img src="imagem_site/04.webp" alt="Fortune Mause">
                <div class="progress-bar">
                    <div class="progress" style="width: 70%;"></div>
                    <span class="progress-percentage">70%</span>
                </div>
                <span class="alert-message" style="display: none;"></span> <!-- Elemento para exibir a mensagem de alerta -->
                <!-- USUARIO NAO LOGADO BOTÃO -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="strategy-button"><a href="login.php" style="color: white;"><i class="fas fa-barcode"></i> Escanear</a></button>
                <?php endif; ?>
                <!-- USUARIO LOGADO BOTÃO -->
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'user' || $_SESSION['user_role'] === 'gold')): ?>
                    <button class="strategy-button" onclick="location.href = 'dashboard.php';"> <i class="fas fa-barcode"></i> Escanear </button>
                    <button class="strategy-button-testar"> <a href="https://m.pgsoft-games.com/68/index.html?ot=82b8b0f88e17ae53611e6dd7f167bc38&btt=2&__refer=m.pg-redirect.com&or=static.pgsoft-games.com"
                                                               style="color: white; text-decoration: none;" target="_blank"> <i class="fas fa-gamepad"></i> Demo</a> </button>
                <?php endif; ?>
            </div>
        </div>

        <div class="game-section">
            <div class="game-column">
                <img src="imagem_site/05.webp" alt="Ice Scape">
                <div class="progress-bar">
                    <div class="progress" style="width: 70%;"></div>
                    <span class="progress-percentage">70%</span>
                </div>
                <span class="alert-message" style="display: none;"></span> <!-- Elemento para exibir a mensagem de alerta -->
                <!-- USUARIO NAO LOGADO BOTÃO -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="strategy-button"><a href="login.php" style="color: white;"><i class="fas fa-barcode"></i> Escanear</a></button>
                <?php endif; ?>
                <!-- USUARIO LOGADO BOTÃO -->
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'user' || $_SESSION['user_role'] === 'gold')): ?>
                    <button class="strategy-button" onclick="location.href = 'dashboard.php';"> <i class="fas fa-barcode"></i> Escanear </button>
                    <button class="strategy-button-testar"> <a href="https://m.pgsoft-games.com/53/index.html?ot=82b8b0f88e17ae53611e6dd7f167bc38&btt=2&__refer=m.pg-redirect.com&or=static.pgsoft-games.com"
                                                               style="color: white; text-decoration: none;" target="_blank"> <i class="fas fa-gamepad"></i> Demo</a> </button>
                <?php endif; ?>
            </div>

            <div class="game-column">
                <img src="imagem_site/06.webp" alt="Genies Swishes">
                <div class="progress-bar">
                    <div class="progress" style="width: 70%;"></div>
                    <span class="progress-percentage">70%</span>
                </div>
                <span class="alert-message" style="display: none;"></span> <!-- Elemento para exibir a mensagem de alerta -->
                <!-- USUARIO NAO LOGADO BOTÃO -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="strategy-button"><a href="login.php" style="color: white;"><i class="fas fa-barcode"></i> Escanear</a></button>
                <?php endif; ?>
                <!-- USUARIO LOGADO BOTÃO -->
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'user' || $_SESSION['user_role'] === 'gold')): ?>
                    <button class="strategy-button" onclick="location.href = 'dashboard.php';"> <i class="fas fa-barcode"></i> Escanear </button>
                    <button class="strategy-button-testar"> <a href="https://m.pgsoft-games.com/85/index.html?ot=82b8b0f88e17ae53611e6dd7f167bc38&btt=2&__refer=m.pg-redirect.com&or=static.pgsoft-games.com"
                                                               style="color: white; text-decoration: none;" target="_blank"> <i class="fas fa-gamepad"></i> Demo</a> </button>
                <?php endif; ?>
            </div>

            <div class="game-column">
                <img src="imagem_site/07.webp" alt="Dragon Hatch">
                <div class="progress-bar">
                    <div class="progress" style="width: 70%;"></div>
                    <span class="progress-percentage">70%</span>
                </div>
                <span class="alert-message" style="display: none;"></span> <!-- Elemento para exibir a mensagem de alerta -->
                <!-- USUARIO NAO LOGADO BOTÃO -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="strategy-button"><a href="login.php" style="color: white;"><i class="fas fa-barcode"></i> Escanear</a></button>
                <?php endif; ?>
                <!-- USUARIO LOGADO BOTÃO -->
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'user' || $_SESSION['user_role'] === 'gold')): ?>
                    <button class="strategy-button" onclick="location.href = 'dashboard.php';"> <i class="fas fa-barcode"></i> Escanear </button>
                    <button class="strategy-button-testar"> <a href="https://m.pgsoft-games.com/57/index.html?ot=82b8b0f88e17ae53611e6dd7f167bc38&btt=2&__refer=m.pg-redirect.com&or=static.pgsoft-games.com"
                                                               style="color: white; text-decoration: none;" target="_blank"> <i class="fas fa-gamepad"></i> Demo</a> </button>
                <?php endif; ?>
            </div>

            <div class="game-column">
                <img src="imagem_site/08.webp" alt="Dragon Legend">
                <div class="progress-bar">
                    <div class="progress" style="width: 70%;"></div>
                    <span class="progress-percentage">70%</span>
                </div>
                <span class="alert-message" style="display: none;"></span> <!-- Elemento para exibir a mensagem de alerta -->
                <!-- USUARIO NAO LOGADO BOTÃO -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="strategy-button"><a href="login.php" style="color: white;"><i class="fas fa-barcode"></i> Escanear</a></button>
                <?php endif; ?>
                <!-- USUARIO LOGADO BOTÃO -->
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'user' || $_SESSION['user_role'] === 'gold')): ?>
                    <button class="strategy-button" onclick="location.href = 'dashboard.php';"> <i class="fas fa-barcode"></i> Escanear </button>
                    <button class="strategy-button-testar"> <a href="https://m.pgsoft-games.com/29/index.html?ot=82b8b0f88e17ae53611e6dd7f167bc38&btt=2&__refer=m.pg-redirect.com&or=static.pgsoft-games.com"
                                                               style="color: white; text-decoration: none;" target="_blank"> <i class="fas fa-gamepad"></i> Demo</a> </button>
                <?php endif; ?>
            </div>
        </div>

        <div class="game-section">
            <div class="game-column">
                <img src="imagem_site/jungle.webp" alt="Jungle">
                <div class="progress-bar">
                    <div class="progress" style="width: 70%;"></div>
                    <span class="progress-percentage">70%</span>
                </div>
                <span class="alert-message" style="display: none;"></span> <!-- Elemento para exibir a mensagem de alerta -->
                <!-- USUARIO NAO LOGADO BOTÃO -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="strategy-button"><a href="login.php" style="color: white;"><i class="fas fa-barcode"></i> Escanear</a></button>
                <?php endif; ?>
                <!-- USUARIO LOGADO BOTÃO -->
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'user' || $_SESSION['user_role'] === 'gold')): ?>
                    <button class="strategy-button" onclick="location.href = 'dashboard.php';"> <i class="fas fa-barcode"></i> Escanear </button>
                    <button class="strategy-button-testar"> <a href="https://m.pgsoft-games.com/40/index.html?ot=82b8b0f88e17ae53611e6dd7f167bc38&btt=2&__refer=m.pg-redirect.com&or=static.pgsoft-games.com"
                                                               style="color: white; text-decoration: none;" target="_blank"> <i class="fas fa-gamepad"></i> Demo</a> </button>
                <?php endif; ?>
            </div>

            <div class="game-column">
                <img src="imagem_site/10.webp" alt="Ganesha">
                <div class="progress-bar">
                    <div class="progress" style="width: 70%;"></div>
                    <span class="progress-percentage">70%</span>
                </div>
                <span class="alert-message" style="display: none;"></span> <!-- Elemento para exibir a mensagem de alerta -->
                <!-- USUARIO NAO LOGADO BOTÃO -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="strategy-button"><a href="login.php" style="color: white;"><i class="fas fa-barcode"></i> Escanear</a></button>
                <?php endif; ?>
                <!-- USUARIO LOGADO BOTÃO -->
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'user' || $_SESSION['user_role'] === 'gold')): ?>
                    <button class="strategy-button" onclick="location.href = 'dashboard.php';"> <i class="fas fa-barcode"></i> Escanear </button>
                    <button class="strategy-button-testar"> <a href="https://m.pgsoft-games.com/42/index.html?ot=82b8b0f88e17ae53611e6dd7f167bc38&btt=2&__refer=m.pg-redirect.com&or=static.pgsoft-games.com"
                                                               style="color: white; text-decoration: none;" target="_blank"> <i class="fas fa-gamepad"></i> Demo</a> </button>
                <?php endif; ?>
            </div>

            <div class="game-column">
                <img src="imagem_site/11.webp" alt="Dragon Tiger">
                <div class="progress-bar">
                    <div class="progress" style="width: 70%;"></div>
                    <span class="progress-percentage">70%</span>
                </div>
                <span class="alert-message" style="display: none;"></span> <!-- Elemento para exibir a mensagem de alerta -->
                <!-- USUARIO NAO LOGADO BOTÃO -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="strategy-button"><a href="login.php" style="color: white;"><i class="fas fa-barcode"></i> Escanear</a></button>
                <?php endif; ?>
                <!-- USUARIO LOGADO BOTÃO -->
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'user' || $_SESSION['user_role'] === 'gold')): ?>
                    <button class="strategy-button" onclick="location.href = 'dashboard.php';"> <i class="fas fa-barcode"></i> Escanear </button>
                    <button class="strategy-button-testar"> <a href="https://m.pgsoft-games.com/63/index.html?l=th&ot=ca7094186b309ee149c55c8822e7ecf2&btt=2&__refer=m.pg-redirect.net&or=static.pgsoft-games.com"
                                                               style="color: white; text-decoration: none;" target="_blank"> <i class="fas fa-gamepad"></i> Demo</a> </button>
                <?php endif; ?>
            </div>

            <div class="game-column">
                <img src="imagem_site/12.webp" alt="Wild Bandito">
                <div class="progress-bar">
                    <div class="progress" style="width: 70%;"></div>
                    <span class="progress-percentage">70%</span>
                </div>
                <span class="alert-message" style="display: none;"></span> <!-- Elemento para exibir a mensagem de alerta -->
                <!-- USUARIO NAO LOGADO BOTÃO -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="strategy-button"><a href="login.php" style="color: white;"><i class="fas fa-barcode"></i> Escanear</a></button>
                <?php endif; ?>
                <!-- USUARIO LOGADO BOTÃO -->
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'user' || $_SESSION['user_role'] === 'gold')): ?>
                    <button class="strategy-button" onclick="location.href = 'dashboard.php';"> <i class="fas fa-barcode"></i> Escanear </button>
                    <button class="strategy-button-testar"> <a href="https://m.pgsoft-games.com/104/index.html?ot=82b8b0f88e17ae53611e6dd7f167bc38&btt=2&__refer=m.pg-redirect.com&or=static.pgsoft-games.com"
                                                               style="color: white; text-decoration: none;" target="_blank"> <i class="fas fa-gamepad"></i> Demo</a> </button>
                <?php endif; ?>
            </div>
        </div>

        <div class="game-section">
            <div class="game-column">
                <img src="imagem_site/BihiniParadise.jpg" alt="Bihini Paradise">
                <div class="progress-bar">
                    <div class="progress" style="width: 70%;"></div>
                    <span class="progress-percentage">70%</span>
                </div>
                <span class="alert-message" style="display: none;"></span> <!-- Elemento para exibir a mensagem de alerta -->
                <!-- USUARIO NAO LOGADO BOTÃO -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="strategy-button"><a href="login.php" style="color: white;"><i class="fas fa-barcode"></i> Escanear</a></button>
                <?php endif; ?>
                <!-- USUARIO LOGADO BOTÃO -->
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'user' || $_SESSION['user_role'] === 'gold')): ?>
                    <button class="strategy-button" onclick="location.href = 'dashboard.php';"> <i class="fas fa-barcode"></i> Escanear </button>
                    <button class="strategy-button-testar"> <a href="https://m.pgsoft-games.com/69/index.html?ot=82b8b0f88e17ae53611e6dd7f167bc38&btt=2&__refer=m.pg-redirect.com&or=static.pgsoft-games.com"
                                                               style="color: white; text-decoration: none;" target="_blank"> <i class="fas fa-gamepad"></i> Demo</a> </button>
                <?php endif; ?>
            </div>

            <div class="game-column">
                <img src="imagem_site/LuckyNeko.png" alt="Lucky Neko">
                <div class="progress-bar">
                    <div class="progress" style="width: 70%;"></div>
                    <span class="progress-percentage">70%</span>
                </div>
                <span class="alert-message" style="display: none;"></span> <!-- Elemento para exibir a mensagem de alerta -->
                <!-- USUARIO NAO LOGADO BOTÃO -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="strategy-button"><a href="login.php" style="color: white;"><i class="fas fa-barcode"></i> Escanear</a></button>
                <?php endif; ?>
                <!-- USUARIO LOGADO BOTÃO -->
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'user' || $_SESSION['user_role'] === 'gold')): ?>
                    <button class="strategy-button" onclick="location.href = 'dashboard.php';"> <i class="fas fa-barcode"></i> Escanear </button>
                    <button class="strategy-button-testar"> <a href="https://m.pgsoft-games.com/89/index.html?ot=82b8b0f88e17ae53611e6dd7f167bc38&btt=2&__refer=m.pg-redirect.com&or=static.pgsoft-games.com"
                                                               style="color: white; text-decoration: none;" target="_blank"> <i class="fas fa-gamepad"></i> Demo</a> </button>
                <?php endif; ?>
            </div>

            <div class="game-column">
                <img src="imagem_site/GaneshaFortune.png" alt="Ganesha Fortune">
                <div class="progress-bar">
                    <div class="progress" style="width: 70%;"></div>
                    <span class="progress-percentage">70%</span>
                </div>
                <span class="alert-message" style="display: none;"></span> <!-- Elemento para exibir a mensagem de alerta -->
                <!-- USUARIO NAO LOGADO BOTÃO -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="strategy-button"><a href="login.php" style="color: white;"><i class="fas fa-barcode"></i> Escanear</a></button>
                <?php endif; ?>
                <!-- USUARIO LOGADO BOTÃO -->
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'user' || $_SESSION['user_role'] === 'gold')): ?>
                    <button class="strategy-button" onclick="location.href = 'dashboard.php';"> <i class="fas fa-barcode"></i> Escanear </button>
                    <button class="strategy-button-testar"> <a href="https://m.pgsoft-games.com/75/index.html?ot=82b8b0f88e17ae53611e6dd7f167bc38&btt=2&__refer=m.pg-redirect.com&or=static.pgsoft-games.com"
                                                               style="color: white; text-decoration: none;" target="_blank"> <i class="fas fa-gamepad"></i> Demo</a> </button>
                <?php endif; ?>
            </div>

            <div class="game-column">
                <img src="imagem_site/PiggyGold.png" alt="Piggy Gold">
                <div class="progress-bar">
                    <div class="progress" style="width: 70%;"></div>
                    <span class="progress-percentage">70%</span>
                </div>
                <span class="alert-message" style="display: none;"></span> <!-- Elemento para exibir a mensagem de alerta -->
                <!-- USUARIO NAO LOGADO BOTÃO -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="strategy-button"><a href="login.php" style="color: white;"><i class="fas fa-barcode"></i> Escanear</a></button>
                <?php endif; ?>
                <!-- USUARIO LOGADO BOTÃO -->
                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'user' || $_SESSION['user_role'] === 'gold')): ?>
                    <button class="strategy-button" onclick="location.href = 'dashboard.php';"> <i class="fas fa-barcode"></i> Escanear </button>
                    <button class="strategy-button-testar"> <a href="https://m.pgsoft-games.com/39/index.html?ot=82b8b0f88e17ae53611e6dd7f167bc38&btt=2&__refer=m.pg-redirect.com&or=static.pgsoft-games.com&__hv=1f9e10b9"
                                                               style="color: white; text-decoration: none;" target="_blank"> <i class="fas fa-gamepad"></i> Demo</a> </button>
                <?php endif; ?>
            </div>
        </div>

</section>

<style>

    :root {
        --bs-progress-height: 20px;
    }

    .progress-bar {
        position: relative;
        height: var(--bs-progress-height);
        background-color: #eee;
        border-radius: 10px;
        overflow: hidden;
    }

    .progress-bar .progress {
        background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        background-size: var(--bs-progress-height) var(--bs-progress-height);
        animation: progress-animation 2s linear infinite;
    }

    @keyframes progress-animation {
        0% {
            background-position: 0 0;
        }
        100% {
            background-position: var(--bs-progress-height) 0;
        }
    }

    .progress-percentage {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: black;
        font-weight: bold;
    }


    .blink-animation {
        animation: blink 1s infinite;
    }

    @keyframes blink {
        0% {
            opacity: 1;
        }
        50% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    /*=============== ESTRATEGIAS ===============*/
    @media screen and (min-width: 992px) {
        #estrategias {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 auto;
            padding-bottom:30px;
        }
        .game-section {
            display: flex;
            justify-content: space-between;
        }

        .game-column {
            width: 25%;
            text-align: center;
            padding: 20px;
            border: 1px solid #eee;
            margin-bottom: 20px;
            height: 370px;
            position: relative; /* Isso é importante para a borda ser renderizada corretamente */
        }


        .game-column img {
            width: 100%;
            max-width: 200px;
            height: auto;
            border-radius: 10px;
        }


        .progress-bar {
            width: 100%;
            height: 20px;
            background-color: #eee;
            border-radius: 10px;
            margin: 10px 0;
            position: relative;
        }

        .progress {
            height: 100%;
            background-color: #007bff;
            border-radius: 10px;
            width: 0;
            position: relative;
        }

        .progress-percentage {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: black;
            font-weight: bold;
        }

        .strategy-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 46px;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 auto; /* Adiciona margem automática para centralizar */

        }

        .strategy-button .icon-text {
            margin-left: 8px; /* Espaçamento entre o ícone e o texto (altere conforme necessário) */
        }

        .strategy-button-testar {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 55px;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 auto;
            margin-top: 10px;

        }
    }


    @media screen and (max-width: 767px) {
        @media (max-width: 768px) {
            #tendencias {
                display: flex;
                justify-content: center;
                padding: 0 0 10px;
            }
        }

        .strategy-button-testar {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 18px;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 auto;
            margin-top: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        #estrategias {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .tendencias-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .game-section {
            display: block;
            width: 100%;
        }

        .game-column {
            text-align: center;
            padding: 10px 0px;
            border: 1px solid #eee;
            margin-bottom: 10px;
            height: 245px;
        }

        .game-column img {
            width: 90%;
            height: auto;
            border-radius: 10px;
        }
        .progress-bar {
            width: 100%;
            height: 20px;
            background-color: #eee;
            border-radius: 10px;
            margin: 10px 0;
            position: relative;
        }

        .progress {
            height: 100%;
            background-color: #007bff;
            border-radius: 10px;
            width: 0;
            position: relative;
        }

        .progress-percentage {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: black;
            font-weight: bold;
        }

        .strategy-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 10px;
            border-radius: 5px;
            cursor: pointer;
            display: block; /* Adiciona display block para alinhar horizontalmente */
            margin: 0 auto; /* Adiciona margem automática para centralizar */
        }

        .fas{
            display:none;
        }

    }

</style>

<script>
    // Obtém todas as colunas de jogo
    const gameColumns = document.querySelectorAll('.game-column');

    // Função para atualizar a porcentagem e a cor da barra de progresso
    function updatePercentage(column, fixedPercentage) {
        const progress = column.querySelector('.progress');
        const percentage = column.querySelector('.progress-percentage');
        const button = column.querySelector('.strategy-button');

        // Atualiza a largura da barra de progresso e a porcentagem com o valor fixo
        progress.style.width = `${fixedPercentage}%`;
        percentage.textContent = `${fixedPercentage}%`;

        // Define a cor da barra com base na porcentagem
        if (fixedPercentage >= 0 && fixedPercentage <= 50) {
            progress.style.backgroundColor = 'red';
        } else if (fixedPercentage >= 51 && fixedPercentage <= 80) {
            progress.style.backgroundColor = 'orange';
        } else if (fixedPercentage >= 81 && fixedPercentage <= 98) {
            progress.style.backgroundColor = 'green';
        }

        // Verifica se a porcentagem está abaixo de 50% e exibe a mensagem de alerta
        const alertMessage = column.querySelector('.alert-message');
        if (fixedPercentage < 51) {
            alertMessage.textContent = 'SLOT EM ALERTA';
            alertMessage.style.display = 'block';
            alertMessage.classList.add('blink-animation');
            button.style.display = 'none'; // Oculta o botão "Escanear"
        } else {
            alertMessage.style.display = 'none';
            alertMessage.classList.remove('blink-animation');
            button.style.display = 'block'; // Exibe o botão "Escanear"
        }
    }

    // Define as porcentagens fixas para cada período do dia
    let fixedPercentages = [];
    const currentHour = new Date().getHours();
    const currentMinute = new Date().getMinutes();

    if (currentHour >= 6 && currentHour < 8 && currentMinute >= 1 && currentMinute <= 59) {
        fixedPercentages = [91, 92, 58, 52, 59, 65, 50, 47, 41, 43, 43, 58, 50, 60, 70, 89];
    } else if (currentHour >= 8 && currentHour < 10) {
        fixedPercentages = [89, 91, 75, 70, 80, 85, 80, 67, 51, 43, 23, 48, 60, 65, 75, 81];
    } else if (currentHour >= 10 && currentHour < 12) {
        fixedPercentages = [72, 70, 78, 82, 36, 69, 57, 63, 72, 54, 58, 61, 70, 70, 68, 80];
    } else if (currentHour >= 12 && currentHour < 14) {
        fixedPercentages = [70, 68, 81, 83, 46, 49, 87, 93, 72, 74, 71, 71, 59, 80, 85, 80];
    } else if (currentHour >= 14 && currentHour < 16) {
        fixedPercentages = [83, 80, 88, 78, 51, 58, 87, 93, 72, 74, 71, 71, 70, 70, 60, 69];
    } else if (currentHour >= 16 && currentHour < 20) {
        fixedPercentages = [80, 85, 68, 62, 46, 49, 87, 93, 72, 74, 75, 71, 60, 70, 70, 81];
    } else if (currentHour >= 20 && currentHour <= 23) {
        fixedPercentages = [91, 89, 65, 40, 50, 75, 60, 57, 51, 23, 23, 48, 80, 85, 80, 81];
    } else if (currentHour >= 0 && currentHour < 6 && currentMinute >= 1 && currentMinute <= 59) {
        fixedPercentages = [86, 80, 71, 74, 45, 65, 50, 47, 41, 43, 43, 58, 60, 65, 68, 75];
    } else {
        fixedPercentages = [80, 85, 68, 62, 46, 49, 87, 93, 72, 74, 71, 71, 70, 80, 81, 85];
    }

    // Itera sobre cada coluna de jogo
    gameColumns.forEach((column, index) => {
        // Atualiza a porcentagem com o valor fixo para cada jogo
        updatePercentage(column, fixedPercentages[index]);
    });
</script>
