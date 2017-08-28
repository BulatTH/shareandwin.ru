<?php
$current_page = 5;
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

        <h2 class="title">Вход в аккаунт</h2>
        <?php

        if (@$_POST["button"]){

            $_POST['password'] = md5($_POST['password']);
            $row = mysql_query("SELECT * FROM users WHERE Login = '$_POST[login]'");
            $myrow = mysql_fetch_array($row);

            if ($myrow['password'] == $_POST['password'])	 {
                if ($myrow['LastName']) $_SESSION['LAST_NAME'] = $myrow['LastName'];
                if ($myrow['Name']) $_SESSION['NAME'] = $myrow['Name'];
                if ($myrow['email']) $_SESSION['EMAIL'] = $myrow['email'];

                $_SESSION['ID'] = $myrow['id'];
                $_SESSION['LOGIN'] = $myrow['Login'];
                $_SESSION['PASSWORD'] = $myrow['Password'];
                $_SESSION['USER_LOGIN_IN'] = 1;
                $_SESSION['STATUS'] = $myrow['status'];
                exit(header('Location: profile.php'));
            } else {
                echo '<span id="wrong_pass">Не верный логин или пароль</span>';

            }

        }

        ?>
        <div class="reg_box">

            <div id="reg_text_left">

                <form action="enter.php" method="post">
                    <p>Введите логин <span id="star">*</span></p>
                    <input type="text"  name="login" autofocus />

                    <p>Введите пароль <span id="star">*</span></p>
                    <input type="password"  name="password" />

                    <input type="submit" value="Войти" name="button" class="button"/>
                </form>

            </div>
            <p>Вы не зареистрированы? <a href="register.php">Зарегистрироваться сейчас</a></p>
        </div>
    </div>

<?php
include "blocks/footer.php";
?>

</body>
</html>