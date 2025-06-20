<?php
session_start();
session_destroy();
header('location:Session_login.php');
die();
?>