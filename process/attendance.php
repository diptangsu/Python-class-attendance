<?php include_once 'helpers/conn.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/attendance.css">
	<link rel="shortcut icon" href="images/python-icon.ico">
	<title>Attendance</title>
</head>
<body>
	<?php
	echo "<br>";

	function printDates($studentID, $studentName)
	{
		$atte = "select * from `attendance` where `student_id` = $studentID";
		$result = query($atte);
		$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo "$studentName<br>";
		foreach ($data as $value)
		{
			// print_r($date);
			$date = $value['date'];
			$timestamp = strtotime($date);
			$day = date("l", $timestamp);
			echo "$date $day<br>";
		}
		echo "<br>";
	}

	$queryFirst = "select * from `students` where `year` = 3";
	$result = query($queryFirst);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	echo count($data);
	echo "<br>";
	echo "<pre>";
	foreach ($data as $student)
	{
		//print_r($student);
		printDates($student['id'], $student['name']);
	}
	echo "</pre>";

	?>
</body>
</html>