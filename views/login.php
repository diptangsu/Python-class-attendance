<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="shortcut icon" href="../assets/images/python-icon.ico" />
    <title>Python Workshop</title>
</head>

<body>
    <div class="container">
        <img src="../assets/images/python-logo.png">
        <?php include('../views/sub-views/header.php'); ?>
        <h2>Login</h2>
        <div class="login-form">
            <form action="../process/login.php" method="get">
                <label><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                <button name="login" type="submit">
                    Login
                </button>
            </form><br>
            <a href="register.php" class="register-btn">
                Sign up
            </a> <br><br>
            <a href="forgot_password.php" class="register-btn">
                Forgot Password?
            </a>
        </div>
    </div>
</body>

</html>
