<?php
$current_page = 1;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="images/ico_forSite.png">

<title>Фотографии участников</title>
</head>
<body>


<?php
include "blocks/header.php";
require_once 'setting.php';
?>
<h2 class="title">Фотографии участников</h2>

<div class="block_galler">

    <div class="miniatures">
        <img src="images/competitions/1.jpg" />
        <span>Легенда №17</span>
    </div>
    <div class="miniatures">
        <img src="images/competitions/2.jpg" />
        <span></span>
    </div>
    <div class="miniatures">
        <img src="images/competitions/3.jpg" />
        <span></span>
    </div>

    <div class="clear"></div>
    <!--<div class="miniatures">
        <img src="images/competitions/5.jpeg" />
        <span></span>
    </div>

    <div class="miniatures">
        <img src="images/competitions/4.jpg" />
        <span></span>
    </div>-->


</div>

<?php
include "blocks/footer.php";
?>

</body>
</html>