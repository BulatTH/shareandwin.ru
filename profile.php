<?php
$current_page = 4;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="images/ico_forSite.png">

<title>Профиль</title>
</head>
<body>


<?php
include "blocks/header.php";
require_once 'setting.php';
?>
<h2 class="title">Профиль</h2>
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
$img_url = $myrow['url'];
if ($myrow['status'] == 1){
    $status = ' пользователь';
} elseif ($myrow['status'] == 2){
    $status = ' администратор';
} elseif ($myrow['status'] == 3){
    $status = ' член жюри';
}

$query = mysql_query("SELECT * FROM notice WHERE `id_user` =  '$_SESSION[ID]' and  `read` = 0");
$num_rows = mysql_num_rows( $query );
if ($num_rows > 9){
    $num_of_notice = "+";
} else {
    $num_of_notice = $num_rows;
}

?>

<div class="furniture">
    <div id="profile_img">
        <?php
            echo "<img src='$img_url' />";

            if ($myrow['status'] == 2){
                $right_ico_menu = "<th><a href='notice.php'><span id='notice_num'>$num_of_notice</span><img src='images/notice_ready(50x50).png'/></a></th> <!-- ЧИСЛО УВЕДОМЛЕНИЙ -->   <!--id='i-have-a-tooltip' data-description='Уведомлений: 9'-->
                <th><a href='configuration.php'><img src='images/configure.png'/></a></th>
                <th><a href='send_notice.php'><img src='images/write_notice.png'/></a></th>";
            } else {
                $right_ico_menu = "<th><a href='notice.php'><span id='notice_num'>$num_of_notice</span><img src='images/notice_ready(50x50).png'/></a></th> <!-- ЧИСЛО УВЕДОМЛЕНИЙ -->   <!--id='i-have-a-tooltip' data-description='Уведомлений: 9'-->
                <th><a href='configuration.php'><img src='images/configure.png'/></a></th>";
            }
        ?>


    </div>
    <div id="profile_settings">
        <table>
            <tr>
                <?php
                    echo $right_ico_menu;
                ?>
            </tr>
        </table>
    </div>

    <div class="profile_info">
        <?php
        if (@$_POST["save"]){
            $explode = explode(" ", $_POST["FIO"]);
            //    var_dump($explode);
            if (!empty($_POST["FIO"])){
                $query = mysql_query("UPDATE `users` SET `LastName` = '$explode[0]', `Name` = '$explode[1]', `Patronymic` = '$explode[2]' WHERE `id` =  '$_SESSION[ID]'");
            }

            if (!empty($_POST["email"])){
                $query = mysql_query("UPDATE `users` SET `email` = '$_POST[email]'WHERE `id` =  '$_SESSION[ID]'");
            }

            if (!empty($_POST["phone"])){
                $query = mysql_query("UPDATE `users` SET `phone` = '$_POST[phone]'WHERE `id` =  '$_SESSION[ID]'");
            }

            exit(Header("Location: profile.php"));

        }
        ?>
        <form action="profile.php" method="post">
            <?php
            if (!empty($LastName) and !empty($Name) and !empty($Patronymic)){
                echo "<input type='text' placeholder='ФИО' name='FIO' value='$LastName $Name $Patronymic' />";
            } else {
                echo "<input type='text' placeholder='ФИО' name='FIO' />";
            }

            if (!empty($email)){
                echo "<input type='email' placeholder='email' name='email' value='$email' />";
            } else {
                echo "<input type='email' placeholder='email' name='email' />";
            }

            if (!empty($phone)){
                echo "<input type='text' placeholder='Мобильный телефон' name='phone' maxlength='11' pattern='[0-9]{11,11}' title='Только цифры! Формат: 89*********' value='$phone' />";
            } else {
                echo "<input type='text' placeholder='Мобильный телефон' name='phone' maxlength='11' pattern='[0-9]{11,11}' title='Только цифры! Формат: 89*********' />";
            }

            echo "<input type='text' placeholder='ФИО' name='login' value='Логин: $login' disabled />";

            echo "<input type='text' placeholder='Статус' name='status' value='Статус: $status' disabled />";

            ?>

            <input type="submit" value="Сохранить" name="save" class="button" style="margin-top: 10px"/>
        </form>

    </div>

</div>



<?php
include "blocks/footer.php";
?>

</body>
</html>