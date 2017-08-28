<?php
//error_reporting( E_ERROR );
$host = 'localhost'; // адрес сервера 
$database = 'shareandwin.ru'; // имя базы данных
$user = 'bulat'; // имя пользователя
$password = 'bulat'; // пароль
$db = mysql_connect($host,$user,$password);
$selected = mysql_select_db($database,$db);
mysql_query ("set character_set_results='utf8'");

mysql_query ("set collation_connection='utf8_general_ci'");

mysql_query ("SET NAMES utf8");

?>