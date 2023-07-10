<?php
    include('./php/register_action.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<form action="register.php" method="post">
        <div class="container rig-form">
            <h2>Register</h2>

            <div class="alert">
                <input type="button" value="Sucessfull signup." id="sucess" class="done" style="display: none;">
                <input type="button" value="Please input information." id="input_information" class="warning" style="display: none;">
                <input type="button" value="Password isn't match." id="password_not_match" class="warning" style="display: none;">
                <input type="button" value="This username is already in our database." id="" class="warning" style="display: none;">
            </div>

            <label for="">Full name</label>
            <input type="text" name="" id="fullname" name="fullname">
            <label for="">Username</label>
            <input type="text" name="" id="username" name="username">
            <label for="">Email</label>
            <input type="text" name="" id="email" name="email">
            <label for="">Password</label>
            <input type="password" id="pwd" value="" name="pwd">
            <label for="">Confirm Password</label>
            <input type="password" id="confirm_pwd" value="" name="confirm_pwd">
            <input type="submit" value="Register" class="btn-blue" onclick="register()" id="submit" name="submit">
            <a href="./index.php">Back</a>
        </div>
    </form>
    <script>
        
        function register(){
            var fullname = document.getElementById('fullname');
            var username = document.getElementById('username');
            var email = document.getElementById('email');
            var pwd = document.getElementById('pwd');
            var confirm_pwd = document.getElementById('confirm_pwd');
            var input_information = document.getElementById('input_information');
            var password_not_match = document.getElementById('password_not_match');

            input_information.style.display='none';
            password_not_match.style.display='none';
            

            if (fullname.value!="" && name.value!="" && email.value !="" && pwd.value!="" && confirm_pwd.value!="" ){
                
                if (pwd.value == confirm_pwd.value){
                    
                }else{
                    password_not_match.style.display='block';
                }
            }else{
                input_information.style.display='block';
            }
        }
    </script>
</body>
</html>
