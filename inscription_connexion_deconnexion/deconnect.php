<?php
session_start();
$_SESSION=array();
session_destroy();
setcookie('pseudo', '');
setcookie('password', '');
header('Location: index.php');
?>
