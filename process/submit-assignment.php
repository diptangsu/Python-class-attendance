<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Submit Assignment</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
	session_start();
	if(count($_SESSION) > 0)
	{
		$id = $_SESSION['id'];
		$name = $_SESSION['name'];
	}
	else
	{
		echo "ke daye bhai?<br>";
	}

	?>

</body>
</html>