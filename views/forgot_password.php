<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="shortcut icon" href="../assets/images/python-icon.ico" />
    <title>Password Reset</title>
</head>

<body>
    <div class="container">
        <img src="../assets/images/python-logo.png">
        <?php include('../views/sub-views/header.php'); ?>

        <h3>Please don't forget your password again<br> -_-
        </h3>
        <div class="clear"></div>
        <div class="login-form">
            <form action="../process/reset.php" method="post">
                <label><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label><b>Phone Number</b></label>
                <input type="text" placeholder="Enter Phone Number" name="phone" required>

                <label><b>New Password</b></label>
                <input type="password" placeholder="Enter New Password" name="password" required>

                <label><b>Re-enter Password</b></label>
                <input type="password" placeholder="Enter New Password" name="password2" required>

                <button name="reset" type="submit">
                    Reset
                </button>
            </form><br>
        </div>
    </div>
</body>

</html>
