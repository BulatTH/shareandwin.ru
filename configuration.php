<?php
$current_page = -1;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="images/ico_forSite.png">

<title>Настройки аккаунта</title>
</head>
<body>


<?php
include "blocks/header.php";
require_once 'setting.php';
?>
<h2 class="title">Настройки</h2>
<?php
//$_SESSION['ID'] = 1;

if (@empty($_SESSION['USER_LOGIN_IN'])){
    echo "<div class='no_Entry'><img src='images/no_entry.png'  alt='No entry' /></div>";
    exit();
    
}

$query = mysql_query("SELECT * FROM users WHERE `id` =  '$_SESSION[ID]'");
$myrow = mysql_fetch_array($query);

$login = $myrow['login'];
$password = $myrow['password'];
$email = $myrow['email'];
$phone = $myrow['phone'];
$LastName = $myrow['LastName'];
$Name= $myrow['Name'];
$Patronymic = $myrow['Patronymic'];
?>

<div class="furniture">

</div>



<?php
include "blocks/footer.php";
?>

</body>
</html>