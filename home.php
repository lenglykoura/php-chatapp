<?php
include('./php/home_action.php');
$time_ = time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    <form action="home.php" method="post">
    <div class="all">
    <div class="container chat-form">
        <section class="users">
            <header>
                <div class="content">
                    <img src="./image/user.jpg" alt="" width="50px" height="50px">
                    <div class="details">
                        <span class="name"><?php echo $row["full_name"] ?></span>
                        
                        <p class="username">@<?php echo $row["user_name"] ?></p>
                    </div>
                </div>
                <a href="./php/logout_action.php" class="btn btn-red">Logout</a>
            </header>
            <div class="search">
                <input type="text" placeholder="Enter name to search..." value="" id="search_text" name="search_text">
            </div>
            <!-- <p style="font-weight: bold;">Other Users</p> -->
            <div class="users-list" id="user_gird">
                <?php
                include("./php/connection.php");
                $id = $_SESSION['id'];
                $res = mysqli_query($connect, "SELECT * FROM tb_user WHERE id != $id");
                while($data = mysqli_fetch_assoc($res)){
                    $status = "Offline";
                    $color_status = "gray";
                    if ($data['last_login'] > $time_){
                        $status = "Active";
                        $color_status = "Green";
                    }
                    ?>
                    <a href="" style="width:100%;display:flex; justify-content: space-between; " class="other-user" name="submit-user">
                    <div class="content">
                        <img src="./image/user.jpg" alt="" width="40px" height="40px">
                        <div class="details">
                        <span class="namel" name="username-data"><?php echo $data["full_name"]?></span>
                        <p class="usernamel">@<?php echo $data["user_name"]?></p>
                        </div>
                    </div>
                    <p class="username" style="color:<?php echo $color_status; ?>;" id="status_"><?php echo $status?></p>
                </a>
                <?php

                }
                ?>
                
            </div>
        </section>
    </div>
    <div class="chat-box">
        <div class="container chatbox-form">
            <section class="chat">
                <header>
                    <div class="user-bar">
                        <div style="width: 50%; display: flex; align-items: center; justify-content: space-between;">
                        <div style="display: flex; align-items: center;">
                        <img src="./image/user.jpg" alt="" width="50px" height="50px">
                        <div class="details">
                            <span class="name"><?php $userdata ?></span>
                            <p class="username">@<?php echo $row["user_name"] ?></p>
                        </div>
                        </div>
                        
                        <p class="active-status"><?php echo $row["last_login"] ?></p>
                        </div>
                    </div>
                </header>
                <div style="height: 495px;"></div>
                <div class="message-list ">
                    <div class="message-text">
                        <input type="text" name="message" id="message" style="width: 94%;" placeholder="Type here">
                        <input type="submit" name="send" id="send" style="width: 5%;" value="Send" class="btn-blue" >
                    </div>
                </div>
            </section>
        </div>
    </div>
    </div>
    </form>
    
    <script>
       

        // function searchUser(){
        //     jQuery.ajax({
        //         url:"./php/search_user.php",
        //         success:function(res){
        //             jQuery('#user_gird').html(res);
        //         }
        //     });
        // }

        function updateUserStatus(){
            jQuery.ajax({
                url:"./php/update_user_status.php",
                success:function(){

                }
            });
        }
        function getUserStatus(){
            jQuery.ajax({
                url:"./php/get_user_status.php",
                success:function(res){
                    jQuery('#user_gird').html(res);
                }
            });
        }

        setInterval(function(){
            updateUserStatus();
        },5000);
        setInterval(function(){
            getUserStatus();
        },1000);
    </script>

</body>
</html>