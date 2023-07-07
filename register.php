<?php
include('./php/register_action.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<form action="./php/register_action.php" method="post">
        <div class="container rig-form">
            <h2>Register</h2>

            <div class="alert">
                <input type="button" value="Sucessfull signup." id="sucess" class="done" style="display: none;">
                <input type="button" value="Please input information." id="pii" class="warning" style="display: none;">
                <input type="button" value="Password isn't match." id="pim" class="warning" style="display: none;">
                <input type="button" value="This username is already in our database." id="" class="warning" style="display: none;">
            </div>

            <label for="">Full name</label>
            <input type="text" name="" id="fullname">
            <label for="">Username</label>
            <input type="text" name="" id="username">
            <label for="">Email</label>
            <input type="text" name="" id="email">
            <label for="">Password</label>
            <input type="password" id="pwd" value="">
            <label for="">Confirm Password</label>
            <input type="password" id="cpwd" value="">
            <input type="button" value="Register" class="btn-rig" onclick="register()" id="submit" name="submit">
            <a href="./index.php">Back</a>
        </div>
    </form>
    <!-- <script>
        
        function register(){
            var fullname = document.getElementById('fullname');
            var username = document.getElementById('username');
            var email = document.getElementById('email');
            var pwd = document.getElementById('pwd');
            var cpwd = document.getElementById('cpwd');
            var pii = document.getElementById('pii');
            var pim = document.getElementById('pim');

            pii.style.display='none';
            pim.style.display='none';

            if (fullname.value!="" && name.value!="" && email.value !="" && pwd.value!="" && cpwd.value!="" ){
                
                if (pwd.value == cpwd.value){
                    
                }else{
                    pim.style.display='block';
                }
            }else{
                pii.style.display='block';
            }

            
            
        }
        

    </script> -->
</body>
</html>