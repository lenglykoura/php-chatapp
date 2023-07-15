<?php
include('connection.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
if(isset($_POST['message'])){
    $sender = $_POST['sender'];
    $receiver =  $_POST['receiver'];
    $message = $_POST['message'];
    $date = date("Y-m-d h:i:sa");
    $sql = "INSERT INTO tb_message (message, message_date, sender, receiver) VALUES ('$message', '$date',$sender,$receiver)";
    $connect->query($sql);
}

?>