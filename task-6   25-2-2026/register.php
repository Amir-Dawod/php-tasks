<?php session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Login Form</title>
    <link rel="stylesheet" href="style.css">
    <style>
        #error {
            background-color: #bc0d0d;
            padding: 10px;
            color: white;
            border-radius: 8px;
            margin: 10px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h2>Register</h2>
                <p>Sign in to your account</p>
            </div>

            <?php if (isset($_SESSION['error'])): ?>
                <div id="error"> <?= $_SESSION['error'] ?> </div>

                <?php unset($_SESSION['error']) ?>
            <?php endif; ?>

            <form action="handle.php" method="post" class="login-form" id="loginForm" validate>
                <div class="form-group">
                    <div class="input-wrapper">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-wrapper">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" name="email" autocomplete="email">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper password-wrapper">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" autocomplete="current-password">
                        <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                            <span class="eye-icon"></span>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-wrapper ">
                        <label for="phone">phone</label>
                        <input type="text" id="phone" name="phone" autocomplete="current-password">
                    </div>
                </div>

                <button type="submit" class="login-btn btn">
                    <span class="btn-text">Sign In</span>
                    <span class="btn-loader"></span>
                </button>
            </form>
            <script>
                let eyeButton = document.querySelector(".eye-icon");
                let passwordInput = document.querySelector("#password");
                eyeButton.onclick = () => {
                    passwordInput.type = passwordInput.type == "password" ? "text" : "password";

                }
            </script>
</body>

</html>