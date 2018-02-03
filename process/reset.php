<?php include_once '../helpers/conn.php' ?>
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

        <?php

        $str = "";
        
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if($password == $password2)
        {
        	$queryFindStudent = "select * from `students` where `email` = '$email' and `phone` = '$phone'";
        	$result = query($queryFindStudent);
        	$student = mysqli_fetch_all($result, MYSQLI_ASSOC);

        	$id = $student[0]['id'];

        	$queryUpdatePass = "update `students` set `password` = '$password' where `students`.`id` = $id;";
        	query($queryUpdatePass);

        	$str = "Your password has been reset.<br>Please
        			<a href=\"../views/login.php\">login</a>";
        }
        else
        	$str = "Your passwords don't match<br>
        			Please enter <a href=\"../views/forgot_password.php\">again</a><br>";

        echo "<div class=\"clear\"></div>
			<div class=\"output\">
			$str<br>
			</div>";
        ?>

    </div>
</body>
</html>