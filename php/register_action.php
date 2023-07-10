<?php
require_once('connection.php');
$result_log = "";
if (isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    $confirm_password = $_POST['confirm_pwd'];
    $email = $_POST['email'];
    
    if(empty($fullname) || empty($username) || empty($password) || empty($email)){
        $result_log = 'input_information';
    }else{
        if($password != $confirm_password){
            $result_log = 'password_not_match';
        }else{
            $sql = "SELECT * FROM tb_user WHERE user_name = '$username'";
            $result = $connect->query($sql);
            $row = mysqli_fetch_assoc($result);
            if ($row){
                $result_log ='same_account';
            }else{
                $sql = "INSERT INTO tb_user (full_name, user_name, pwd, email) VALUES ($fullname, $username, $password, $email)";
                $connect->query($sql);
                $result_log = 'sucess';
            }
            
        }
    }
}
?>