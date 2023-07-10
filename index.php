<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <form action="#">
        <div class="container login-form">
            <div class="alert">
                <input type="button" value="Login sucessfull." id="sucess" class="done" style="display: none;">
                <input type="button" value="Please input information." id="pii" class="warning" style="display: none;">
                <input type="button" value="Password is incorrect." id="pim" class="warning" style="display: none;">
                <input type="button" value="This username doesn't have in our database." id="" class="warning" style="display: none;">
            </div>
            <h2>Login</h2>
            <label for="">Username</label>
            <input type="text" name="" id="">
            <label for="">Password</label>
            <input type="password">
            <input type="submit" value="Login" class="btn-green" name="submit">
            <a href="./register.php">Need account?</a>
        </div>
    </form>


</body>
</html>
