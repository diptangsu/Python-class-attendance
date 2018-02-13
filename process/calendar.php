<?php
$daysInWeek = Array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
$daysInMonth = Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
function getDayHeadings($month)
{
    global $daysInWeek;
    $calendar =
        '<caption>' . $month . '</caption>
	<thead>
	<tr>';

    foreach ($daysInWeek as $day) {
        if ($day == 'Sun')
            $calendar .= '<th class="sun">' . $day . '</th>';
        else
            $calendar .= '<th>' . $day . '</th>';
    }
    $calendar .=
        '</tr>
	</thead>';
    return $calendar;
}

function getDays($daysPresent)
{
    $allDays = Array();
    foreach ($daysPresent as $day_) {
        $d = intval(substr($day_, 0, 2));
        array_push($allDays, $d);
    }
    $n = count($allDays);
    $d = 0;

    global $daysInWeek, $daysInMonth;
    $timestamp = strtotime($daysPresent[0]);
    $month = date("m", $timestamp);
    $year = date("Y", $timestamp);
    $dayOne = "01-$month-$year";
    $timestamp = strtotime($dayOne);
    $dayOne = date("D", $timestamp);
    $dayNumber = array_search($dayOne, $daysInWeek);
    $max = $daysInMonth[intval($month) - 1];
    $calendar = '<tbody>';
    $i = -$dayNumber + 1;
    for ($weeks = 1; $i <= $max; $weeks++) {
        $calendar .= '<tr>';
        for ($day = 1; $day <= 7 and $i <= $max; $day++) {
            if ($i <= 0) {
                $calendar .= '<td></td>';
                $i++;
            } else {
                if ($day < 7) {
                    if ($d < $n and $i == $allDays[$d]) {
                        $calendar .= '<td class="present">' . $i++ . '</td>';
                        $d++;
                    } else
                        $calendar .= '<td>' . $i++ . '</td>';
                } else
                    $calendar .= '<td class="sun">' . $i++ . '</td>';
            }
        }
        $calendar .= '</tr>';
    }
    $calendar .= '</tbody>';
    return $calendar;
}

function generateCalendar($month, $daysPresent)
{
    $head = getDayHeadings($month);
    $days = getDays($daysPresent);
    $calendar = '<table>';
    $calendar .= $head;
    $calendar .= $days;
    $calendar .= '</table>';
    return $calendar;
}

?>