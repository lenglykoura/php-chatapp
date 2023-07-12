<?php
require_once('connection.php');
$result_log = "";

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['pwd'];

    $sql = "SELECT * FROM tb_user WHERE user_name = '$username' and pwd = '$password' ";
    if(!$username || !$password){
        $result_log = 'no_information';
    }else{
            $result =  $connect->query($sql);
            $row = mysqli_fetch_array($result);
            if (is_array($row)){
                session_start();
                $_SESSION["id"] = $row['id'];
                
            }else{
                $result_log = 'incorrect';
            }
    }   
}
if (isset($_SESSION["id"])){
    $id = $_SESSION["id"];
    $time = time() +10;
    mysqli_query($connect,"UPDATE tb_user SET last_login = '.$time.' WHERE id = $id ");
    header("Location:./home.php");
    die();
}
?>