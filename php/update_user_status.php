<?php
session_start();
require_once("connection.php");
$uid = $_SESSION['id'];
$time = time();
$res = mysqli_query($connect, "UPDATE tb_user SET last_login = $time WHERE id = $uid");

?>