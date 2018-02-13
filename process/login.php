<?php include_once '../helpers/conn.php' ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="shortcut icon" href="../assets/images/python-icon.ico" />
    <title>Python Workshop</title>
</head>

<body>
    <div class="sea">
        <div class="circle-wrapper">
            <div class="bubble"></div>
            <div class="submarine-wrapper">
                <div class="submarine-body">
                    <div class="window"></div>
                    <div class="engine"></div>
                    <div class="light"></div>
                </div>
                <div class="helix"></div>
                <div class="hat">
                    <div class="leds-wrapper">
                        <div class="periscope"></div>
                        <div class="leds"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
		date_default_timezone_set("Asia/Kolkata");

		/*echo "<br>";
		echo "GET: ";
		print_r($_GET);
		echo "<br>POST: ";
		print_r($_POST);*/

		$email = $_GET['email'];
		$password = $_GET['password'];

		$studentQuery = "select * from `students` where `email` = '$email' and `password` = '$password'";

		$result = query($studentQuery);

		$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
		$str = "";
		if(count($data) != 0)
		{
			$studentID = $data[0]['id'];
			// print_r($data);

			$date = getdate();
			$day = $date['mday'];
			$month = $date['mon'];
			$year = $date['year'];
			$today = "$year/$month/$day";

			$time = date("H:i:s");
			$time = explode(":", $time);
			$hr = (int)$time[0];
			$min = (int)$time[1];

			// echo "$hr $min<br>";

			if($hr >= 0)
			{

				$queryAttendance = "insert into `attendance` (`student_id`, `date`) VALUES ('$studentID', '$today')";

				$queryAttendanceDone = "select * from `attendance` where `student_id` = $studentID and `date` = '$today'";
				
				$result = query($queryAttendanceDone);
				$done = mysqli_fetch_all($result, MYSQLI_ASSOC);
				if(!$done)
				{
					query($queryAttendance);
					$str = "We hope you enjoy today's class.<br>
					Your attendance has been taken.";
				}
				else
				{
					// print_r($done);
					$str = "Bhai how many times do you want to be present?<br>
						Bhai kitna baar attendance dega?<br>
						Bhai kotobar attendance dibi? <br>";
				}
			}
			else
			{
				$str = "Bhai akhon to class hocche na<br>";
			}
		}
		else
		{
			$str = "Bhai
					<a href=\"../views/register.php\">register</a> kor<br>
					Or maybe enter your email and password correctly.
					<a href=\"../views/login.php\">Login again</a>";
		}

		$display = 
				"<div class=\"output\">
					$str
				</div>
				";
		echo $display;

		?>

</body>

</html>
