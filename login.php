<?php
session_start();
require_once 'db_connection.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];

        if ($user['approved'] === '0') {
            $message = 'Seu cadastro está pendente de aprovação pelo administrador. Por favor, aguarde 2 minutos.';
        } else {
            header('Location: index_dashboard.php');
            exit();
        }
    } else {
        $message = 'Credenciais inválidas. Tente novamente.';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title> PG Monitor - Scanner IA para Slots - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;
            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
        }

        body {
            background-color: #fff !important;
        }

        .login-container {
            display: flex;
            flex-direction: column; /* Alteração para empilhar elementos verticalmente */
            align-items: center; /* Centralizar horizontalmente */
            height: 100vh;
        }

        .login-card {
            border-radius: 1rem;
            background-color: #f9f9f9 !important;
            margin-top: 3rem;
            padding: 5px;
            border: 1px solid #e7e7e7;
            box-shadow: 0 0 5px #e7e7e7;
        }

        @media screen and (max-width: 767px) {
            .login-card {;
                margin: 40px 20px;
            }

            .logo{
                width: 200px !important;
                padding-top: 30px;
            }

            .login-card .card-body .mb-md-5 {
                margin-bottom: 0px !important;
            }
        }

        .logo{
            width: 260px;
            padding-top: 30px;
        }

        .login-card .logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-card .logo img {
            width: 200px;
        }

        .login-card .card-body {
            padding: 50px 100px;
        }

        .login-card .card-body .mb-md-5 {
            margin-bottom: 0rem;
        }

        .login-card .card-body h2 {
            font-weight: bold;
            margin-bottom: 2rem;
            text-transform: uppercase;
        }

        .login-card .card-body p {
            color: #000;
            margin-bottom: 1rem;
        }

        .text-white-50 {
            --bs-text-opacity: 1;
            color: rgb(0 0 0)!important;
        }

        .login-card .card-body .form-label {
            color: #000;
        }

        .login-card .card-body .form-control {
            background-color: #fff;
            color: #000;
        }

        .login-card .card-body .btn-primary {
            background-color: #6a11cb;
            border-color: #6a11cb;
            color: #fff;
            font-weight: bold;
        }

        .login-card .card-body .btn-secondary {
            background-color: #000;
            border-color: #000;
            color: #fff;
            font-weight: bold;
        }

        .login-card .card-body .alert {
            margin-bottom: 1rem;
        }

        .login-card .card-body .d-flex .text-white {
            color: #fff;
        }

        .login-card .card-body .d-flex .text-white i {
            margin-right: 1rem;
        }

        .login-card .card-body p.mb-0 a {
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="login-container">
    <div class="logo">
        <img src="imagem/logo-pg.png" alt="Logomarca" class="img-fluid">
    </div>
    <div class="login-card">
        <div class="card-body">
            <div class="mb-md-5">
                <center><h2 class="fw-bold mb-2 text-uppercase">Login</h2></center>
                <p class="text-white-50 mb-5">Por favor, digite seu login e senha!</p>

                <?php if (!empty($message)): ?>
                    <div class="alert alert-danger"><?php echo $message; ?></div>
                <?php elseif (!empty($approvalMessage)): ?>
                    <div class="alert alert-warning"><?php echo $approvalMessage; ?></div>
                <?php endif; ?>

                <form action="login.php" method="POST">
                    <div class="form-outline form-white mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Entrar</button>
                    <a href="index.php" class="btn btn-secondary">Voltar</a>
                </form>

            </div>
            <div>
                <p class="mb-0">Não tem uma conta? <a href="register.php" class="text-white-50 fw-bold">Registrar</a></p>
                <div style="padding-top:6px;"><center><p><a href="recuperar_senha.php" class="text-white-50 fw-bold" style="font-size:13px !important;">Esqueceu sua senha?</a></p></center></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
