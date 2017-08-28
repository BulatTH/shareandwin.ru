<?php
// require_once 'setting.php';
session_start();
session_destroy();
exit(Header('Location: ../index.php'));
?>