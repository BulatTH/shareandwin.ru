<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Тестовая страница</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<!--
<script type="text/javascript">
	setInterval(function() {
$("#update_chat").load("test.php");
}, 1000);
</script>
	-->
	
<?php

/*
$now = new DateTime(); // текущее время на сервере
$date = DateTime::createFromFormat("Y-m-d H:i", '2014-09-12 23:59'); // задаем дату в любом формате
$interval = $now->diff($date); // получаем разницу в виде объекта DateInterval
echo $interval->y, "\n"; // кол-во лет
echo $interval->d, "\n"; // кол-во дней
echo $interval->h, "\n"; // кол-во часов
echo $interval->i, "\n"; // кол-во минут
*/



/*
$data = '01.01.2020';
        $time = strtotime($data);
        $today = time();
        $day = ($today - $time)/86400*-1;
        $day = floor($day);
	echo "До 1 января 2020 года осталось ".$day." дней.";
*/


echo '<div id="update_chat">';
$now = new DateTime("now");
// var_dump($now);
$future = new DateTime("2017-06-01 14:20:00");
$interval = $now->diff($future);

$days = $interval->format("%R%a");
$hours =  $interval->format("%R%H");
$minute =  $interval->format("%R%I");
$second =  $interval->format("%R%S");
echo '</div>';

?>


</body>
</html>

