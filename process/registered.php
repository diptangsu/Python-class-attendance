<?php include_once '../helpers/conn.php' ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../assets/css/registered.css">
	<link rel="shortcut icon" href="../assets/images/python-icon.ico" />
	<title>Register</title>
</head>
<body>
	<br><br><br><br>
	<div class="globe">
		<div class="bird">
			<div class="body">
				<div class="eye left"></div>
				<div class="eye right"></div>
				<div class="beak"><div></div></div>
				<div class="feet"></div>
				<div class="wire"></div>
			</div>
			<div class="hills"></div>
			<div class="cloud"></div>
			<div class="cloud small"></div>
		</div>
	</div>

	<?php
		// print_r($_GET);
		// print_r($_POST);

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$year = $_POST['year'];
	$dept = $_POST['dept'];
	$password = $_POST['password'];
	$pswRepeat = $_POST['pswRepeat'];

	$str = "";

	if($password == $pswRepeat)
	{

		$queryAlreadyRegistered = "select * from `students` where `email` = '$email'";

		$result = query($queryAlreadyRegistered);
		$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
		// print_r($data);
		// echo count($data);
		if (count($data) == 0)
		{	
			$queryInsert = "insert into `students` (`name`, `phone`, `email`, `year`, `dept`, `password`) values ('$name', '$phone', '$email', $year, '$dept', '$password')";

			if(!mysqli_query($con, $queryInsert))
				echo "ERROR: Unable to execute $queryInsert. " . mysqli_error($con);

			// $queryDisplay = "select * from `students`";
			// $result = query($queryDisplay);
			// $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
			// print_r($data);
			$str = "Thank you for registering.<br>
			<a href=\"../views/login.php\">Login</a> to give your attendance.<br>";
		}
		else
		{
			$str = "Bhai register korechish already.<br>
			<a href=\"../views/login.php\">Login</a> to give your attendance.<br>";
		}
	}
	else
	{
		$str = "Bhai thik kore password type kor.<br>
		Your passwords don't match.<br>
		Press the back button and enter correctly.";
	}
	$display = 
	"<div class=\"clear\"></div>
	<div class=\"output\">
	$str<br><br>
	And please try not to fall asleep.
	</div>
	";
	echo $display;

	?>

</body>
</html>
