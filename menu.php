<?php
function getNumberOfUserSignals($user_id) {
    require 'db_connection.php';

    $sql = "SELECT COUNT(*) as count FROM user_signals WHERE user_id = $user_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    return 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="PG MONITOR ">
    <meta property="og:description" content="PG MONITOR - Ganhe Dinheiro em Slots com Inteligência Artificial">
    <meta property="og:image" content="https://pgmonitor.com.br/imagem/logo-pg.png>
    <title>Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-JVEiJNEhWuh8djsXbk9tgn1AROGyBhwDqf5jwFwlvPlbzJQWQa1US1iH3r3w5h9y7tdkqFEVKKmv92a5Z9iR2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous">

    <style>
        .fab {
            color: #8f8f8f;
        }

        .nav-item {
            display: inline-block;
            margin-right: 0px;
        }

        @media (max-width: 768px) {
            .nav-item {
                display: block;
                margin-right: 0;
                margin-bottom: 10px;
            }
        }

        .bg-light {
            --bs-bg-opacity: 1;
            background-color: whitesmoke;
            border-bottom: 1px solid #eee;
        }

        .container {
            max-width: 968px !important;
        }

        /* Adiciona o estilo para o menu fixo */
        .fixed-top {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
        }

        body {
            padding-top: 56px; /* Altura do menu fixo */
        }

        /* Adiciona margem superior aos elementos abaixo do menu */
        .content {
            margin-top: 40px; /* Ajuste a altura conforme necessário */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top"> <!-- Adiciona a classe "fixed-top" -->
    <div class="container">
        <a class="navbar-brand" href="index_dashboard.php">
            <img src="imagem/logomarca.png" alt="Logo" class="logo-img" width="auto" height="auto">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'gold')): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">AI Scanner</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="dashboard.php">Todos os Slots</a></li>
                        <li><a class="dropdown-item" href="dashboard_por_slots.php">Por Slots</a></li>
                        <li><a class="dropdown-item" href="dashboard_user_3_sinais.php">Triplo Sinais</a></li>
                    </ul>
                </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'user'): ?>
                        <a class="nav-link" href="dashboard_user.php">AI Scanner</a>
                    <?php endif; ?>
                </li>

                <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'gold')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="user_signals.php">Meus Sinais <span class="badge bg-danger"><?php echo getNumberOfUserSignals($user_id); ?></span></a>
                    </li>
                <?php endif; ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Plataforma</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="plataforma_pagante.php">Pagante</a></li>
                        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                        <li><a class="dropdown-item" href="escanear_plataforma.php">Scanner</a></li>
                        <?php endif; ?>
                    </ul>
                </li>

                <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'user'): ?>

                    <li class="nav-item">
                        <a class="nav-link" href="depoimentos.php">Depoimentos</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="estrategias.php">Estratégias</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Probabilidades</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="probabilidades.php">Fortune Tiger</a></li>
                        <li><a class="dropdown-item" href="probabilidades_adm.php">Fortune ADM</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Minha Conta
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                            <li><a class="dropdown-item" href="sorteio.php">Cadastrar Sorteio</a></li>
                            <li><a class="dropdown-item" href="admin.php">Cadastrar Sinal</a></li>
                            <li><a class="dropdown-item" href="gerar_jogo.php">Gerar Sinal</a></li>
                            <li><a class="dropdown-item" href="gerar_jogos_principais.php">Gerar Sinal Principais Slots</a></li>
                            <li><a class="dropdown-item" href="admin_signals.php">Sinais Cadastrados</a></li>
                            <li><a class="dropdown-item" href="pending_users.php">Usuários Pendentes</a></li>
                            <li><a class="dropdown-item" href="usuarios.php">Lista Usuários</a></li>
                            <li><a class="dropdown-item" href="enviar_email.php">Enviar E-mail</a></li>
                            <div style="border: 1px solid #eee;"></div>
                        <?php endif; ?>
                        <li><a class="dropdown-item" href="user_signals.php">Meus Sinais <span class="badge bg-danger"><?php echo getNumberOfUserSignals($user_id); ?></span> </a></li>
                        <li><a class="dropdown-item" href="pdf/manual_pg_monitor.pdf" target="_blank">Manual</a></li>
                        <li><a class="dropdown-item" href="vendas.php">Assine</a></li>
                        <li><a class="dropdown-item" href="depoimentos.php">Depoimentos</a></li>
                        <li><a class="dropdown-item" href="suporte.php">Suporte</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>

                    </ul>
                </li>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.instagram.com/pg.monitor/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://chat.whatsapp.com/JG3AGHLgkZhAZP54sgWzix" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    </li>
                </ul>
            </ul>
        </div>
    </div>
</nav>

<div class="content">
    <!-- Conteúdo abaixo do menu -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
