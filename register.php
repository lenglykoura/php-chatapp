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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
<form action="register.php" method="post">
        <div class="container rig-form">
            <h2>Register</h2>

            <label for="">Full name</label>
            <input type="text" id="fullname" name="fullname">
            <label for="">Username</label>
            <input type="text" id="username" name="username">
            <label for="">Email</label>
            <input type="text" id="email" name="email">
            <label for="">Password</label>
            <input type="password" id="pwd" name="pwd">
            <label for="">Confirm Password</label>
            <input type="password" id="confirm_pwd" name="confirm_pwd">

            <div class="alert">
                <input type="button" value="Sucessfull signup." id="sucess" class="done" style="display: none;">
                <input type="button" value="Please input information." id="input_information" class="warning" style="display: none;">
                <input type="button" value="Password isn't match." id="password_not_match" class="warning" style="display: none;">
                <input type="button" value="Username already used." id="already_have" class="warning" style="display: none;">
            </div>

            <input type="submit" value="Register" class="btn-blue" id="submit" name="submit">
            <a href="./index.php">Back</a>
        </div>
    </form>
    <script>
        var text1 =document.getElementById('fullname');
        var text2 =document.getElementById('username');
        var text3 =document.getElementById('email');
        var text4 =document.getElementById('pwd');
        var text5 =document.getElementById('confirm_pwd');

        var input_information = document.getElementById('input_information');
        var password_not_match = document.getElementById('password_not_match');
        var sucess = document.getElementById('sucess');
        var already_have = document.getElementById('already_have');

        var result = "<?php echo $result_log; ?>";

        text1.addEventListener("focus", logKey);
        text2.addEventListener("focus", logKey);
        text3.addEventListener("focus", logKey);
        text4.addEventListener("focus", logKey);
        text5.addEventListener("focus", logKey);

        function logKey() {
        input_information.style.display='none';
        password_not_match.style.display='none';
        sucess.style.display='none';
        already_have.style.display='none';
        }

        input_information.style.display='none';
        password_not_match.style.display='none';
        sucess.style.display='none';
        already_have.style.display='none';
        
        if (result == 'input_information'){
            input_information.style.display = 'block';
        }
        if (result == 'password_not_match'){
            password_not_match.style.display = 'block';
        }
        if (result == 'sucess'){
            sucess.style.display = 'block';
        }
        if (result == 'same_account'){
            already_have.style.display = 'block';
        }
    </script>
</body>
</html>
