<?php
// Redirecionar para lancamento.php
//header("Location: lancamento.php");

session_start();
require_once 'db_connection.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Verifique se o usuário já está cadastrado
    $checkUserSql = "SELECT * FROM users WHERE email = '$email'";
    $checkUserResult = $conn->query($checkUserSql);
    if ($checkUserResult && $checkUserResult->num_rows > 0) {
        $message = "O email já está cadastrado. Por favor, tente novamente com um email diferente.";
    } else {
        // Insira o novo usuário com status de não aprovado
        $insertSql = "INSERT INTO users (name, email, phone, password, approved) VALUES ('$name', '$email', '$phone', '$password', '0')";
        if ($conn->query($insertSql) === TRUE) {
            //$message = "Cadastro realizado com sucesso! Aguarde a aprovação do administrador em até 2 minutos.";
            $message = "Lamentamos, mas todas as vagas estão preenchidas. Junte-se ao nosso grupo do WhatsApp para garantir sua vaga na próxima oportunidade! <a href='https://chat.whatsapp.com/JG3AGHLgkZhAZP54sgWzix'>Clique aqui</a> para entrar no grupo.";
        } else {
            $message = "Erro ao cadastrar o usuário: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Sinais - Cadastro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <style>
        .gradient-custom-3 {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }

        body {
            background-color: #fff !important;
        }

        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-card {
            border-radius: 1rem;
            background-color: #000 !important;
        }

        .register-card .card-body {
            padding: 5rem;
        }

        .register-card .card-body .mb-md-5 {
            margin-bottom: 3rem !important;
        }

        .register-card .card-body h3 {
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 2rem;
            text-align: center;
            color: #fff;
        }

        .register-card .card-body .form-label {
            color: #fff;
        }

        .register-card .card-body .form-control {
            background-color: #fff;
            color: #000;
        }

        .register-card .card-body .btn-primary {
            background-color: #6a11cb;
            border-color: #6a11cb;
            color: #fff;
            font-weight: bold;
        }

        .register-card .card-body .btn-secondary {
            background-color: #000;
            border-color: #000;
            color: #fff;
            font-weight: bold;
        }

        .register-card .card-body .alert {
            margin-bottom: 1rem;
        }

        .register-card .card-body .text-muted a {
            color: #fff;
            font-weight: bold;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="register-container">
    <div class="register-card">
        <div class="card-body">
            <h3 class="text-uppercase text-center mb-5">CRIE A SUA CONTA AQUI</h3>

            <?php if (!empty($message)): ?>
                <div class="alert alert-danger"><?php echo $message; ?></div>
            <?php endif; ?>

            <form action="register.php" method="POST">
                <div class="form-outline mb-4">
                    <label for="name" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="form-outline mb-4">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>

                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="d-flex justify-content-center mb-4">
                    <button type="submit" class="btn btn-primary me-2">Cadastrar</button>
                    <a href="index.php" class="btn btn-secondary ms-2">Voltar</a>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Já tem uma conta? <a href="login.php" class="fw-bold text-body"><u>Entre aqui</u></a></p>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(document).ready(function() {
        $('#phone').mask('(99) 9 9999-9999');
    });
</script>
</body>
</html>
