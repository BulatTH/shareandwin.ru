<?php
$current_page = 0;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--    <meta http-equiv="refresh" content="10">-->
<link href="style.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" type="image/x-icon" href="images/ico_forSite.png">
<title>Главная страница</title>
</head>
<body>


<?php
include "blocks/header.php";
require_once 'setting.php';
?>

    <div id="imgWithTitle">
        <!-- <img src="images/ImageWithTitle.png"/> -->
        <img src="images/TheBattleforSevastopol3.png"/>
    </div>

    <div id="content">
        <H2>Косплей-конкурс <b>2017</b> уже начался!</H2>
        <div id="content_inside">
            <p>Участвуй & побеждай - это бесплатный & справедливый фотоконкурс. </p>
            <p>Любой человек может принять участие и это совершенно бесплатно! </p>
            <p>Фото, набравшее большее число голосов, побеждает.</p>
            <br>
            <p>Регистрируйте и присылайте  ваше фото в образе любимых героев российского или советского кино и получите приз – 15 000 рублей!</p>
        </div>

        <div id="forTable">
            <div id="update_timer">
            <table >
                <tr>
                    <th colspan="12"><span>До конца конкурса осталось:</span></th>
                </tr>
                <tr>
                    <?php
                        //echo '<div id="update_chat">';
                        $now = new DateTime("now");
                        // var_dump($now);

                        $future = new DateTime("2017-09-25 08:00:00"); //Дата окончаная конкурса


                        $interval = $now->diff($future);

                        $days = $interval->format("%R%a");
                        $days = substr($days , 1);
                        if (strlen($days)<3) {
                            echo "<th class='timer_backgr'><span class='time'>0</span> <img src='images/timer_background.png' alt=''/> </th>
                            <th class='timer_backgr'><span class='time'>$days[0]</span> <img src='images/timer_background.png' alt=''/> </th>
                            <th class='timer_backgr'><span class='time'>$days[1]</span> <img src='images/timer_background.png' alt=''/> </th>";
                        } else {
                            echo "<th class='timer_backgr'><span class='time'>$days[0]</span> <img src='images/timer_background.png' alt=''/> </th>
                            <th class='timer_backgr'><span class='time'>$days[1]</span> <img src='images/timer_background.png' alt=''/> </th>
                            <th class='timer_backgr'><span class='time'>$days[2]</span> <img src='images/timer_background.png' alt=''/> </th>";
                        }

                        $hours =  $interval->format("%R%H");
                        $hours = substr($hours, 1);

                        $minute =  $interval->format("%R%I");
                        $minute = substr($minute,1);

                        $second =  $interval->format("%R%S");
                        $second = substr($second, 1);

                        //echo '</div>';


                    ?>


                    <th class="timer_sign"> <img src="images/timer_sign.png" alt=""> </th>

                    <th class="timer_backgr"><span class="time"><?php echo $hours[0] ?></span> <img src="images/timer_background.png" alt=""/> </th>
                    <th class="timer_backgr"><span class="time"><?php echo $hours[1] ?></span> <img src="images/timer_background.png" alt=""/> </th>
                    <th class="timer_sign"> <img src="images/timer_sign.png" alt=""> </th>

                    <th class="timer_backgr"><span class="time"><?php echo $minute[0] ?></span> <img src="images/timer_background.png" alt=""/> </th>
                    <th class="timer_backgr"><span class="time"><?php echo $minute[1] ?></span> <img src="images/timer_background.png" alt=""/> </th>
                    <th class="timer_sign"> <img src="images/timer_sign.png" alt=""> </th>

                    <th class="timer_backgr"><span class="time"><?php echo $second[0] ?></span> <img src="images/timer_background.png" alt=""/> </th>
                    <th class="timer_backgr"><span class="time"><?php echo $second[1] ?></span> <img src="images/timer_background.png" alt=""/> </th>
                </tr>

                <tr>
                    <th colspan="3"><span>Дней</span></th>
                    <th></th>
                    <th colspan="2"><span>Часов</span></th>
                    <th></th>
                    <th colspan="2"><span>Минут</span></th>
                    <th></th>
                    <th colspan="2"><span>Секунд</span></th>

                </tr>
            </table>
            </div>
        </div>


        <div id="forTable2">
            <table>
                <tr>
                    <th colspan="4"><span>До конца конкурса осталось:</span></th>
                </tr>
                <tr>
                    <?php
                    $now = new DateTime("now");
                    $future = new DateTime("2017-09-25 08:00:00"); //Дата окончаная конкурс
                    $interval = $now->diff($future);
                    $days = $interval->format("%R%a");
                    $days = substr($days , 1);
                    $hours =  $interval->format("%R%H");
                    $hours = substr($hours, 1);
                    $minute =  $interval->format("%R%I");
                    $minute = substr($minute,1);
                    $second =  $interval->format("%R%S");
                    $second = substr($second, 1);
                    ?>
                    <th class="fortable2_th"><?php echo $days ?></th>
                    <th class="fortable2_th"><?php echo $hours ?></th>
                    <th class="fortable2_th"><?php echo $minute ?></th>
                    <th class="fortable2_th"><?php echo $second ?></th>
                </tr>
                <tr>
                    <th>Дней</th>
                    <th>Часов</th>
                    <th>Минут</th>
                    <th>Секунд</th>
                </tr>
            </table>
        </div>

        <?php
        if (@!empty($_SESSION['USER_LOGIN_IN'])){
            echo '<div id="take_part">
            <a href="reg_competition.php"><p>Принять участие в конкурсе</p></a>
        </div>';
        }
        ?>



    </div>

    <div id="prizes">
        <h2>Призы</h2>
        <table>
            <tr>
                <th><img src="images/Grand_prize_2.png" alt=""></th>
                <th><img src="images/1st-Place_ready.png"alt=""></th>
                <th><img src="images/2nd-Place_ready.png" alt=""></th>
                <th><img src="images/3rd-Place_ready.png" alt=""></th>
            </tr>

            <tr>
                <th><span>Приз: 15 000 рублей</span></th>
                <th><span>Приз: 12 000 рублей</span></th>
                <th><span>Приз: 10 000 рублей</span></th>
                <th><span>Приз: 5 000 рублей</span></th>

            </tr>
        </table>
    </div>

    <div id="sponsors">
        <h2>Спонсоры</h2>
        <div id="sponsors_inside">
            <p>Мы партнерствуем с несколькими потрясающими компаниями, которые дали нам замечательные денежные призы в этом году.</p>
        </div>
        <table>
            <tr>
                <th><img src="images/sponsors/Sponsor_1(2).png" alt=""></th>
                <th><img src="images/sponsors/Sponsor_2(2).png" alt=""></th>
                <th><img src="images/sponsors/Sponsor_3.png" alt=""></th>
                <th><img src="images/sponsors/Sponsor_4(2).png" alt=""></th>


            </tr>
        </table>
    </div>


    <div id="judges">
        <h2>Жюри</h2>
        <table>
            <tr>
                <th><img src="images/judges/Judges_1.png" alt=""></th>
                <th><img src="images/judges/Judges_2.png" alt=""></th>
                <th><img src="images/judges/Judges_2.png" alt=""></th>
            </tr>
            <tr>
                <th><span>Lena Meyer-Landrut</span></th>
                <th><span>Adam Levine</span></th>
                <th><span>Adam Levine</span></th>
            </tr>

        </table>

    </div>

<?php
include "blocks/footer.php";
?>

</body>
</html>