<?php
$current_page = 3;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="style.css" type="text/css" rel="stylesheet"/>
    <link rel="shortcut icon" type="image/x-icon" href="images/ico_forSite.png">

    <title>Контанкты</title>
</head>
<body>


<?php
include "blocks/header.php";
require_once 'setting.php';
?>
<h2 class="title">Контакты</h2>
<div id="contacts-info">
    <table id="table1">
        <tr>
            <th>Жалобы и претензии</th>
            <th>Вопросы и консультация</th>
            <th>Для предложений</th>
        </tr>
        <tr id="emails">
            <th>claims@shareandwin.ru</th>
            <th>support@shareandwin.ru</th>
            <th>bulatxajrutdinoff@yandex.ru</th>
        </tr>
    </table>
    <div id="table2">
        <span id="title">Жалобы и претензии</span>
        <span id="email">claims@shareandwin.ru</span>
        <span id="title">Вопросы и консультация</span>
        <span id="email">support@shareandwin.ru</span>
        <span id="title">Для предложений</span>
        <span id="email">bulatxajrutdinoff@yandex.ru</span>

    </div>

    <table>
        <tr>
            <th>Телефон</th>
        </tr>
        <tr id="mobile">
            <th>8 987 228-29-15</th>
        </tr>
    </table>
</div>

<div id="maps">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3053.477343606116!2d52.272131188441584!3d54.900473812733814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x41605dea06e85221%3A0xf30069a400c0ca9b!2z0YPQuy4g0JzQuNGA0LAsIDgsINCQ0LvRjNC80LXRgtGM0LXQstGB0LosINCg0LXRgdC_LiDQotCw0YLQsNGA0YHRgtCw0L0sIDQyMzQ1Nw!5e0!3m2!1sru!2sru!4v1504511932178"
            width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<?php
include "blocks/footer.php";
?>

</body>
</html>