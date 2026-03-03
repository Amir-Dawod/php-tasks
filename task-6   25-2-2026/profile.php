<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

        }

        .user-info {
            padding: 40px 25px;
            border: 3px solid #f6f6f6;
            border-radius: 8px;
            background: #f6f6f6;
            position: relative;

            p {
                text-align: center;
                font-size: 30px;
                font-weight: bold;
            }

            .btn-logout {
                display: block;
                width: fit-content;
                margin: 10px auto;
                padding: 15px;
                background: #2065dc;
                border-radius: 8px;
                text-decoration: none;
                color: #FFF;
                font-size: 20px;
            }

        }
    </style>
</head>

<body>
    <div class="user-info">
        <p> welcome back</p>
        <h2> name : <?= $_SESSION['user']['name'] ?></h2>
        <h2> email : <?= $_SESSION['user']['email'] ?></h2>
        <h2> phone : <?= $_SESSION['user']['phone'] ?></h2>
        <a class="btn-logout" href="logout.php">logout</a>

    </div>
</body>

</html>