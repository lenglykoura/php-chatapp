<?php
require_once('connection.php');
session_start();
$userdata;
$status = "null";
$time = time();
if (isset($_SESSION["id"])){
    $id = $_SESSION["id"];
    $sql = "SELECT * FROM tb_user WHERE id = $id";
    $result = $connect->query($sql);
    $row = mysqli_fetch_assoc($result);
}else{
    header('location:./index.php');
}
if (isset($_POST["submit-user"])){
    $userdata = "Hello";
}

?>