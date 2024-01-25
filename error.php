<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Sinais - Erro</title>
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

        .error-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .error-card {
            border-radius: 1rem;
            background-color: #f9f9f9 !important;
            margin-top: 3rem;
            padding: 5px;
            border: 1px solid #00ffd0a8;
            box-shadow: 0 0 5px #00ffd0a8;
        }

        .error-card .card-body {
            padding: 5rem;
            text-align: center;
        }

        .error-card .card-body h2 {
            font-weight: bold;
            margin-bottom: 2rem;
            text-transform: uppercase;
        }

        .error-card .card-body p {
            color: #000;
            margin-bottom: 2rem;
        }

        .error-card .card-body .btn-primary {
            background-color: #6a11cb;
            border-color: #6a11cb;
            color: #fff;
            font-weight: bold;
        }

        .error-card .card-body .btn-primary:hover {
            background-color: #5907a1;
            border-color: #5907a1;
        }

        .error-card .card-body p.mb-0 a {
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="error-container">
    <div class="error-card">
        <div class="card-body">
            <h2 class="fw-bold mb-2 text-uppercase">Erro</h2>
            <p>Ocorreu um erro. Por favor, tente novamente mais tarde.</p>
            <a href="index.php" class="btn btn-primary">Voltar para a Página Inicial</a>
        </div>
    </div>
</div>
</body>
</html>
