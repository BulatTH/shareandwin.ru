<?php
$current_page = -5;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="images/ico_forSite.png">

<title>Вход в аккаунт</title>
</head>
<body>
<?php
include "blocks/header.php";
require_once 'setting.php';
?>

    <div class="enter">
        <h2 class="title">Регистрация</h2>
        <div class="reg_box">

            <div id="reg_text_left">
                <?php
                if (@$_POST['button']){
                    $query = mysql_query("SELECT * FROM users");
                    $num_rows = mysql_num_rows( $query ); //Подсчет кол-ва строк в базе

                    $query = mysql_query("SELECT * FROM users");
                    $row = mysql_query("SELECT * FROM users");
                    if ($num_rows == 0) { //Если нет записей
                        if ($_POST["password"] == $_POST["repeat_password"]){

                            $_POST['password'] = md5($_POST['password']);

                            $result = mysql_query("INSERT INTO `users`(`id`, `login`, `password`) VALUES ('', '$_POST[login]', '$_POST[password]')");

                            if ($result == true){

                                echo '<h2 class="title">прошла успешно</h2><div class="success"><img src="images/check.png" alt=""></div>';
                                exit();
                            } else {
                                echo 'Что-то пошло не так...';
                            }
                        } else {
                            echo '<div class="success"><img src="images/error.png" alt=""><h2 class="title">Пароли не совпадают</h2></div>';
                        }


                    } else {
                        while ($myrow = mysql_fetch_array($row)){
                            if ($myrow['login'] == $_POST['login']){
                                //echo '<div class="div_error"><span>Ошибка при внесении в базу: такой логин уже существует</span></div>';
                                echo '<div class="success"><img src="images/error.png" alt="" style=""></div><h2 class="title" >Такой логин уже существует</h2>';

                                echo '<form action="register.php"><input class="button" type="submit" value="Назад к регистрации" /></form>';

                                exit();
                                break;
                            } }

                        if ($_POST["password"] == $_POST["repeat_password"]){

                            $_POST['password'] = md5($_POST['password']);

                            $result = mysql_query("INSERT INTO `users`(`id`, `login`, `password`) VALUES ('', '$_POST[login]', '$_POST[password]')");
                            if ($result == true){

                                echo '<h2 class="title">прошла успешно</h2><div class="success"><img src="images/check.png" alt=""></div>';
                                exit();
                            } else {
                                echo 'Что-то пошло не так...';
                            }
                        } else {
                            echo '<div class="success"><img src="images/error.png" alt=""><h2 class="title">Пароли не совпадают</h2></div>';
                        }

                    }


                }

                ?>


                <form action="register.php" method="post">
                    <p>Придумайте логин <span id="star">*</span></p>
                    <input type="text"  name="login" autofocus />

                    <p>Придумайте пароль <span id="star">*</span></p>
                    <input type="password"  name="password" />

                    <p>Повторите пароль <span id="star">*</span></p>
                    <input type="password"  name="repeat_password" />

                    <input type="submit" value="Регистрация" name="button" class="button"/>
                </form>

            </div>

        </div>
    </div>

<?php
include "blocks/footer.php";
?>

</body>
</html>