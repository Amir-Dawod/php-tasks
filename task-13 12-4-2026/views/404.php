<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Page Not Found</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .error-box {
            text-align: center;
        }

        .error-code {
            font-size: 120px;
            font-weight: bold;
            animation: float 2s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .btn-home {
            margin-top: 20px;
            border-radius: 30px;
            padding: 10px 25px;
        }
    </style>
</head>

<body>

    <div class="error-box">
        <div class="error-code">404</div>
        <h2>Oops! Page Not Found</h2>
        <p>The page you're looking for doesn't exist or was moved.</p>

        <a href="index.php?page=home" class="btn btn-light btn-home">
            ⬅ Back to Home
        </a>
    </div>

</body>

</html>