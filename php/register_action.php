<?php
session_start();
require_once('connection.php');
$result = "";

if (isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    $confirm_password = $_POST['confirm_pwd'];
    $email = $_POST['email'];
    
    // $fullname = 'admin';
    // $username = 'admin';
    // $password = '123';
    // $email = 'admin@gmail.com';

    $sql = "INSERT INTO tb_user (full_name, user_name, pwd, email) VALUES ($fullname, $username, $password, $email)";
    if(empty($fullname) || empty($username) || empty($password) || empty($email)){
        $result = 'no_information';
    }else{
        if($password != $confirm_password){
            $result = 'not_match';
        }else{
            
        }
    }
    // $connect->query($sql);
}
echo '
    <script>
            var input_information = document.getElementById("input_information");
            var password_not_match = document.getElementById("password_not_match");

            var result = "no_information";

            input_information.style.display="none";
            password_not_match.style.display="none";
            

            if (result == "no_information"){
                input_information.style.display="block";
            }else{
                if (result == "not_match"){
                    password_not_match.style.display="block";
                }else{
                    
                }
            }
    </script>
';



?>