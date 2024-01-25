<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once 'db_connection.php';

$token = isset($_GET['token']) ? $_GET['token'] : '';

// Verificar se o token de redefinição de senha foi fornecido na URL
if (!empty($token)) {
    // Verificar se o token existe no banco de dados
    $sql = "SELECT * FROM users WHERE reset_token = '$token'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // Token válido, permitir que o usuário insira uma nova senha
        $_SESSION['reset_token'] = $token;
    } else {
        // Token inválido, redirecionar para página de erro
        header('Location: error.php');
        exit();
    }
} else {
    // Token não fornecido, redirecionar para página de erro
    header('Location: error.php');
    exit();
}

$message = '';

// Processar o formulário de nova senha
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];

    // Verificar se o token de redefinição de senha está presente na sessão
    if (isset($_SESSION['reset_token'])) {
        $token = $_SESSION['reset_token'];

        // Atualizar a senha do usuário no banco de dados
        $updateSql = "UPDATE users SET password = '$password', reset_token = NULL WHERE reset_token = '$token'";

        if ($conn->query($updateSql) === TRUE) {
            // Senha atualizada com sucesso, redirecionar para página de sucesso
            header('Location: sucesso.php');
            exit();
        } else {
            $message = 'Ocorreu um erro ao atualizar a senha. Por favor, tente novamente mais tarde.';
            exit();
        }
    } else {
        // Token não presente na sessão, redirecionar para página de erro
        header('Location: error.php');
        exit();
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Sinais - Redefinir Senha</title>
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
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            border-radius: 1rem;
            background-color: #f9f9f9 !important;
            margin-top: 3rem;
            padding: 5px;
            border: 1px solid #00ffd0a8;
            box-shadow: 0 0 5px #00ffd0a8;
        }

        .logo {
            width: 300px;
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
            padding: 5rem;
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
            margin-bottom: 5rem;
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
                <center><h2 class="fw-bold mb-2 text-uppercase">Redefinir Senha</h2></center>
                <p class="text-white-50 mb-5">Digite sua nova senha.</p>

                <?php if (!empty($message)): ?>
                    <div class="alert alert-danger"><?php echo $message; ?></div>
                <?php endif; ?>

                <form action="resetar_senha.php?token=<?php echo $token; ?>" method="POST">
                    <div class="form-outline form-white mb-4">
                        <label for="password" class="form-label">Nova Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Redefinir Senha</button>
                </form>

            </div>
            <div>
                <p class="mb-0">Lembrou sua senha? <a href="login.php" class="text-white-50 fw-bold">Faça login</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
