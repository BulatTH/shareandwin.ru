<?php
$current_page = -11;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="images/ico_forSite.png">

    <title>Регистрация в конкурсе</title>
</head>
<body>


<?php
include "blocks/header.php";
require_once 'setting.php';
?>
<h2 class="title">Регистрация в конкурсе</h2>
<?php

if (@empty($_SESSION['USER_LOGIN_IN'])){
    echo "<div class='no_Entry'><img src='images/no_entry.png'  alt='No entry' /></div>";
    exit();
}

$query = mysql_query("SELECT * FROM `competition` WHERE user_id = '$_SESSION[ID]'");
$row = mysql_fetch_array($query);

if ($row){
    echo '<div class="wrong_competition">Вы уже зарегистировались в этом конкурсе</div>';
    exit();
}

?>


<div class="block">
<?php
$last_n = @$_SESSION["LAST_NAME"];
$name = @$_SESSION["NAME"];
$email = @$_SESSION["EMAIL"];

?>
<!--    <div class="wrong_competition">Ошибка: Ошибка при добавлении картинки (размер картинки должен быть < 2мб)</div>-->

    <?php
        if (@$_POST["button"]){
            $ext = $_FILES['uploadfile']['type'];

            $ext_with_image = substr($ext,6);
            $img_max_size = 2048;
//            $img_size = $_FILES['uploadfile']['size'];
            $size = GetImageSize($_FILES['uploadfile']['tmp_name']);
            $min_width = 1366;
            $min_heigh = 768;
            if ($size[0]<$min_width and $size[1]<$min_heigh){
                echo '<div class="wrong_competition">Минимальные размеры изображения: 1366x768</div>';
            } else {
                if ($ext_with_image == 'png' or $ext_with_image == 'jpeg' or $ext_with_image == 'jpg'){
                    $img_name = $_SESSION['ID'] . md5($_SESSION['LOGIN']);
                    copy($_FILES['uploadfile']['tmp_name'], 'images/competitions/' . $img_name . '.' . $ext_with_image);

                    $result = mysql_query("INSERT INTO `competition`(`user_id`, `last_name`, `first_name`, `email`, `work_name`, `image_url`, `comment`) VALUES ('$_SESSION[ID]', '$_POST[last_name]', '$_POST[name]', '$_POST[email]', '$_POST[work_name]', '$img_name.$ext_with_image', '$_POST[comment]')");
                    //img_src = '$img_name.$ext_with_image'
                    if ($result == true){
                        echo '<div class="wrong_competition">Ваша работа отправлена</div>';
                    } else {
                        echo '<div class="wrong_competition">Ошибка при отправки работы</div>';
                    }

                } else {
                    echo '<div class="wrong_competition">Ошибка формата файла. Приемлемые форматы: png, jpg</div>';
                }
            }


        }

    ?>


    <div class="reg_competition">


        <form action="reg_competition.php" method="post" enctype="multipart/form-data">
            <p>Фамилия <span id="star">*</span></p>
            <input type="text"  name="last_name" autofocus value="<?php echo $last_n ?>" required/>

            <p>Имя <span id="star">*</span></p>
            <input type="text"  name="name" value="<?php echo $name ?>" required/>

            <p>e-mail <span id="star">*</span></p>
            <input type="email"  name="email" value="<?php echo $email ?>" required/>

            <p>Название работы <span id="star">*</span></p>
            <input type="text"  name="work_name" required/>

            <p>Загрузите файл <span id="star">*</span></p>
            <input type="file" name="uploadfile" id="uploadfile" required/>

            <p>Комментарий к фотографии</p>
            <input type="text"  name="comment"/>


            <input type="submit" value="Отправить" name="button" class="button"/>
        </form>

    </div>


</div>



<?php
include "blocks/footer.php";
?>

</body>
</html>