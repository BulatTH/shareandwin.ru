<?php
session_start();

$menu_array = array(
    '<a href="index.php"><li>Главная</li></a>',
    '<a href="#"><li>Фотографии участников</li></a>',
    '<a href="#"><li>Историческая справка</li></a>',
    '<a href="#"><li>Контакты</li></a>',
    '<a href="#"><li>Профиль</li></a>',
    '<a href="#"><li>Вход</li></a>');
?>

<div id="header">
    <div id="logo">
        <img id='logo_img' src="images/Logo.png" />
        <a href="#empty_place"><img src="images/Button_down_1.png" alt="but_down" width="50" id="but_down"/></a>
    </div>
    <div id="navigation_menu">
        <ul>
<?php
for ($i=0;$i<count($menu_array);$i++) {
    if ($current_page == $i) $active="active";
    else $active="";


    if (@empty($_SESSION['USER_LOGIN_IN'])){
        $enter_exit = '<a href="enter.php"><li id='.$active.'>Вход</li></a>';
    } else {
        $enter_exit = '<a href="blocks/exit.php"><li id="exit_btn">Выход</li></a>';
    }


    $menu_arr2 = array(
        '<a href="index.php" ><li id='.$active.'>Главная</li></a>',
        '<a href="gallery.php"><li id='.$active.'>Фотографии участников</li></a>',
        '<a href="history.php"><li id='.$active.'>Историческая справка</li></a>',
        '<a href="contacts.php"><li id='.$active.'>Контакты</li></a>',
        '<a href="profile.php"><li id='.$active.'>Профиль</li></a>',
        $enter_exit
    );
    echo $menu_arr2[$i];
}

?>
        </ul>
        <div class="clear_both"></div>
    </div>


</div>
<div id="empty_place"></div>