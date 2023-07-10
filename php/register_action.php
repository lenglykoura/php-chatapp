<?php
include('connection.php');
$result;
if (isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    $email = $_POST['email'];

    $sql = "INSERT INTO tb_user (full_name, username, password, email) VALUES ($fullname, $username, $password, $email)";
    //insert data into database table users
    $connect->query($sql);
    $result = 'sucessfull';
}
function result_register(){
    return $result;
}


?>