<?php
$current_page = -1;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="images/ico_forSite.png">

    <title>Уведомления</title>
</head>
<body>


<?php
include "blocks/header.php";
require_once 'setting.php';

$query = mysql_query("SELECT * FROM notice WHERE `id_user` =  '$_SESSION[ID]' and  `read` = 0");
$num_rows = mysql_num_rows( $query );

?>
<h2 class="title">Уведомления</h2>



<div id='notice_wrapper'>
    <div id='unread_notice_div'>Не прочитанных уведомлений: <b><?php echo $num_rows; ?></b></div>



    <?php
        //$_SESSION['ID'] = 1;

        if (@empty($_SESSION['USER_LOGIN_IN'])){
            echo "<div class='no_Entry'><img src='images/no_entry.png'  alt='No entry' /></div>";
            exit();

        }

        $query = mysql_query("SELECT * FROM notice WHERE `id_user` =  '$_SESSION[ID]'");

        while ($myrow = mysql_fetch_array($query)) {
            if ($myrow['read'] == 1) {
                $id_read = 'readed';
            } else {
                $id_read = 'not_readed';
                $update = mysql_query("UPDATE `notice` SET `read`= 1 WHERE `id` = '$myrow[id]'");
            }

            echo "<div class='notices' id='$id_read'>
        <h4>Дата: <span>$myrow[date]</span></h4>
        <h4>Текст уведомления: <span style='padding-bottom: 10px'>
                $myrow[text]
            </span></h4>
    </div>";
        }


    ?>



</div>


<!--
<p>Текст уведомления: $myrow[text]</p>
        <p>Дата: $myrow[date]</p>

-->

<div class="furniture">




</div>



<?php
include "blocks/footer.php";
?>

</body>
</html>