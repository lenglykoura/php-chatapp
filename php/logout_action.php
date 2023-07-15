<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
unset($_SESSION["id"]);
header('location:../index.php');
die();


?>