<?php
    include('./php/login_action.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>

    <form action="index.php" method="post">
        <div class="container login-form">
            <h2>Login</h2>
            <label for="">Username</label>
            <input type="text" name="username" id="username">
            <label for="">Password</label>
            <input type="password" name="pwd" id="pwd">

            <div class="alert">
                <input type="button" value="Login sucessfull." id="sucess" class="done" style="display: none;">
                <input type="button" value="Please input information." id="input_information" class="warning" style="display: none;">
                <input type="button" value="Username or password is incorrect." id="password_is_incorrect" class="warning" style="display: none;">
            </div>

            <input type="submit" value="Login" class="btn-green" name="submit" id="submit">
            <a href="./register.php">Need account?</a>
        </div>
    </form>
</body>

<script>

    var text1 = document.getElementById('username');
    var text2 = document.getElementById('pwd');    

    var input_information = document.getElementById('input_information');
    var password_is_incorrect = document.getElementById('password_is_incorrect');
    var sucessfull = document.getElementById('sucess');

    var result = "<?php echo $result_log; ?>";

    text1.addEventListener("focus", logKey);
    text2.addEventListener("focus", logKey);

    function logKey() {
        input_information.style.display='none';
        password_is_incorrect.style.display='none';
        sucessfull.style.display='none';
    }

    input_information.style.display='none';
    password_is_incorrect.style.display='none';
    sucessfull.style.display='none';

    if (result == "no_information"){
        input_information.style.display='block';
    }
    if (result == "incorrect"){
        password_is_incorrect.style.display='block';
    }
    if (result == "sucess"){
            sucessfull.style.display='block';
    }
            
</script>

</html>
