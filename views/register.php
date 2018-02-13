<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/register.css">
    <link rel="shortcut icon" href="../assets/images/python-icon.ico" />
    <title>Sign Up</title>
</head>

<body>
    <div class="container">
        <img src="../assets/images/python-logo.png">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
        <div class="clear"></div>
        <?php include('../views/sub-views/header.php'); ?>
        <div class="sign-up-form">
            <h2>Sign Up</h2>
            Please fill up this form to create an account.<br>
            <form action="../process/registered.php" method="post">
                <label><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="name" class="semi-square" required>

                <label><b>Phone</b></label>
                <input type="text" placeholder="Enter Phone Number" name="phone" class="semi-square" required>

                <label><b>Year</b></label><br>
                <select name="year" class="semi-square" required>
                    <option value="" 
                            selected 
                            disabled 
                            hidden>Choose year
                    </option>
                    <option value="1">1ˢᵗ</option>
                    <option value="2">2ⁿᵈ</option>
                    <option value="3">3ʳᵈ</option>
                </select>
                <br><br>

                <label><b>Department</b></label><br>
                <select name="dept" class="semi-square" required>
                        <option value="" 
                                selected 
                                disabled 
                                hidden>Choose dept
                        </option>
                        <option value="cse">CSE</option>
                        <option value="ece">ECE</option>
                        <option value="it">IT</option>
                        <option value="ee">EE</option>
                        <option value="me">ME</option>
                        <option value="aeie">AEIE</option>
                        <option value="mca">MCA</option>
                    </select>
                <br><br>

                <label><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" class="semi-square" required>

                <label><b>Password</b></label> (Please use a simple password and not your facebook/email password.)
                <input type="password" placeholder="Enter Password" name="password" class="semi-square" required>

                <label><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="pswRepeat" class="semi-square" required>

                <button name="login" class="rounded" type="submit">
                        Sign Up
                </button>
            </form><br>
        </div>
    </div>
</body>

</html>
