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
            $row = mysqli_fetch_assoc($result);
            if ($row){
                $result_log = 'sucess';
                header('Location:home.php');
                
            }else{
                $result_log = 'incorrect';
            }
    }   
}
?>