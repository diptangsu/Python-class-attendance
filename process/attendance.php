<?php include_once '../helpers/conn.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/calendar-style.css">
	<link rel="shortcut icon" href="../assets/images/python-icon.ico">
	<title>Attendance</title>
</head>
<body>
	<div class="container">
		<form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
			<label><b>Year</b></label>
			<select name="year"
			class="semi-square"
			onchange="this.form.submit()"
			required>
			<option value=""
			selected
			disabled
			hidden>Choose year
		</option>
		<option value="1">1ˢᵗ</option>
		<option value="2">2ⁿᵈ</option>
		<option value="3">3ʳᵈ</option>
	</select>
</form>
</div>

<?php
include 'calendar.php';

function getDates($studentID, $studentName)
{
	$days = Array();
	$atte = "select * from `attendance` where `student_id` = $studentID";
	$result = query($atte);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	if(count($data) > 0)
	{
		$date = $data[0]['date'];
		$timestamp = strtotime($date);
		$month = date("m", $timestamp);
		$days[0] = Array();
		$days[0]['month'] = $month;
		$days[0]['days'] = Array();
		$mon = 0;
		foreach ($data as $value) 
		{
			$date = $value['date'];
			$timestamp = strtotime($date);
			$month = date("m", $timestamp);
			$day = date("d-m-Y", $timestamp);
			if($days[$mon]['month'] != $month)
			{
				$mon++;
				$days[$mon] = Array();
				$days[$mon]['month'] = $month;
				$days[$mon]['days'] = Array();
			}
			array_push($days[$mon]['days'], $day);
		}
	}
	return $days;
}

$years = Array(
	1 => "1ˢᵗ",
	2 => "2ⁿᵈ",
	3 => "3ʳᵈ");
$allMonths = Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

if(count($_POST))
{
	$yr = $_POST['year'];
	echo "$years[$yr] Year<br>";
	$queryFirst = "select * from `students` where `year` = $yr";
	$result = query($queryFirst);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$n = count($data);
	echo "Students : $n<br>";

	foreach ($data as $student) {
		$days = getDates($student['id'], $student['name']);
		$name = $student['name'];
		echo $name;
		foreach($days as $months)
		{
			$month = $allMonths[intval($months['month']) - 1];
			$daysPresent = $months['days'];
			
			$calendar = generateCalendar($month, $daysPresent);
			
			echo '<div class="calendar">';
			echo $calendar;
			echo '</div>';
		}
		echo '<div class="clear"></div>';
	}
}
else
	echo "Please select a year<br>";
?>
</body>
</html>