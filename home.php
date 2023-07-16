<?php
include('./php/home_action.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$chat_name = "";
$chat_user = "";
$chat_time = "";
$log_status = "gray";
$time_ = time();
$time_log = time()-10;
$hide = "none";
$qid = "";
$side = "";
$border = "";
$chatID = 0;
if(isset($_POST['user_id'])){
    $hide = "block";
    $qid = $_POST['user_id'];
    $sql = "SELECT * FROM tb_user WHERE id = $qid";
    $user_result = $connect->query($sql);
    $user_row = mysqli_fetch_assoc($user_result);
    // print_r ($user_row) ;
    $chat_name = $user_row['full_name'];
    $chat_user = $user_row['user_name'];
    $user_log = $user_row['last_login'];

    if ($user_log > $time_log){
        $chat_time = "Active";
        $log_status = "Green";
    }else{
        $chat_time = "Offline";
        $log_status = "gray";
    }
}
// echo $date = date("Y-m-d h:i:sa");
// echo $sender = $_SESSION['id'];
// echo $receiver = $qid;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<script>
    // function myFunction(x) {
    //     if (x.matches) { // If media query matches
    //         document.style.display="none";
    //         // document.querySelectorAll("#get_post_id").addEventListener("click",()=>{
    //         //     alert('hi');
    //         // })
    //     }else{
    //         // alert("none");
    //     }
    //     }
    //     var x = window.matchMedia("(max-width: 414px)")
    //     myFunction(x) // Call listener function at run time
    //     x.addListener(myFunction)
</script>
<body>
    <div class="all">
        <div class="container chat-form" id="chat-form">
            <section class="users" id="user">
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
                <!-- <div class="search">
                    <input style="width: 100%;" type="text" placeholder="Enter name to search..." value="" id="search_text" name="search_text">
                </div> -->
                <div class="users-list" id="user_gird">
                    <?php
                    include("./php/connection.php");
                    $id = $_SESSION['id'];
                    $res = mysqli_query($connect, "SELECT * FROM tb_user WHERE id != $id");
                    while ($data = mysqli_fetch_assoc($res)) {
                        $uid = $data['id'];
                        $status = "Offline";
                        $color_status = "gray";
                        if ($data['last_login'] > $time_) {
                            $status = "Active";
                            $color_status = "Green";
                        }
                    ?>
                    <form action="home.php" method="post">
                        <button type="submit" name="user_id" value="<?= $uid;?>" style="width:100%;display:flex; justify-content: space-between; "  id="get_post_id" class="other-user">
                            <div class="content">
                                <img src="./image/user.jpg" alt="" width="40px" height="40px">
                                <div class="details">
                                    <span class="namel" name="username-data"><?php echo $data["full_name"] ?></span>
                                    <p id="uid" class="usernamel">@<?php echo $data["user_name"] ?></p>
                                </div>
                            </div>
                            <p class="username" style="color:<?php echo $color_status; ?>;" id="status_"><?php echo $status ?></p>
                        </button>
                    </form>
                    <?php
                    }
                    ?>
                </div>

            </section>
        </div>
        <div class="chat-box" style="display:<?php echo $hide;?>" id="chat-box">
            <div class="container chatbox-form">
                <section class="chat">
                    <header>
                        <div class="user-bar">
                            <div style="width: 50%; display: flex; align-items: center; justify-content: space-between;">
                                <div style="display: flex; align-items: center;">
                                    <img src="./image/user.jpg" alt="" width="50px" height="50px">
                                    <div class="details">
                                        <span class="name"><?php echo $chat_name;?></span>
                                        <p class="username">@<?php echo $chat_user; ?></p>
                                    </div>
                                </div>
                                <!-- <p class="active-status" style="color:<?php echo $log_status; ?>;"><?php echo $chat_time; ?></p> -->
                            </div>
                            <div style="width: 50%; text-align: right;">
                                <button style="height: 40px;" class="btn btn-blue" id="back-to-list">Back</button>
                            </div>
                            
                        </div>
                    </header>
                    <div class="list-message" >
                        <div style="width: 100%;" class="scroll-message" id="message_grid">
                        <?php
                        $sql = "SELECT *,MAX(id) as mid FROM tb_message WHERE (sender = $_SESSION[id] and receiver = $qid) or (receiver = $_SESSION[id] and sender = $qid) ORDER BY message_date AND MAX(ID) ";
                        $result_message = $connect->query($sql);
                        while($row_message = mysqli_fetch_assoc($result_message)){
                            if ($row_message['sender']== $_SESSION['id']){
                                $side = "right";
                                $border = "border-radius: 10px 10px 0px 10px;";
                            }else{
                                $side = "left";
                                $border = "border-radius: 10px 10px 10px 0;";
                            }
                            if ($row_message['mid'] > $chatID){
                                $chatID = $row_message['mid'];
                            }
                            
                            echo '
                            <br><div style="width:100%;text-align: '.$side.'; ">
                            <span class="msg" style="'.$border.';">
                                '.$row_message["message"].'
                                </span>
                            </div><br>
                            ';
                        };
                        ?>
                        </div>
                        
                    </div>      
                    <form method="post" action="" id="form">
                        <div class="message-list ">
                            <div class="message-text">
                                <input type="text" name="message" id="message"  placeholder="Type here">
                                <button type="button" id="send"  class="btn-blue">Send</button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.querySelector("#message").addEventListener("keypress",function(event){
            if(event.key=="Enter"){
                event.preventDefault();
                senderMessage();
                clearTextMessage();
            }
        })
        document.querySelector("#send").addEventListener("click",()=>{
            senderMessage();
            clearTextMessage();
        })
        function senderMessage(){
            var senderID = <?= $_SESSION['id']?>;
            var receiverID = <?= $qid?>;
            var messageData = "message="+$("input[name=message]").val()+"&sender="+senderID+"&receiver="+receiverID; 
            $.ajax({
                type: "post",
                url: "./php/send_message.php",
                data:messageData,
                success: function(response) {
                }
            })
        }
        function clearTextMessage(){
            document.getElementById('message').value = '';
        }   
    </script>
    <script>
        if (<?= $chatID?> )
        $(function () {
            var ChatDiv = $('.scroll-message');
            var height = ChatDiv[0].scrollHeight;
            ChatDiv.scrollTop(height);
        });
        document.querySelector("#back-to-list").addEventListener("click", ()=>{
            document.querySelector("#chat-box").style.display="none";
        })

        function getMessage(){
            var senderID = <?= $_SESSION['id']?>;
            var receiverID = <?= $qid?>;
            var id ="sender="+senderID+"&receiver="+receiverID; 
            $.ajax({
                type : "post",
                url: "./php/get_message.php",
                data : id,
                success: function(result_message) {
                    jQuery('#message_grid').html(result_message);
                }
            });
        }
        document.querySelector("#send").addEventListener("click",()=>{
            getMessage();
        })
        
        function updateUserStatus() {
            jQuery.ajax({
                url: "./php/update_user_status.php",
                success: function() {
                }
            });
        }
        function getUserStatus() {
            jQuery.ajax({
                url: "./php/get_user_status.php",
                success: function(res) {
                    jQuery('#user_gird').html(res);
                }
            });
        }
        setInterval(function() {
            updateUserStatus();
        }, 5000);
        setInterval(function() {
            getUserStatus();
        }, 1000);
        setInterval(function() {
            getMessage();
        }, 1000);

        // setInterval(function() {
        //     $(function () {
        //     var ChatDiv = $('.scroll-message');
        //     var height = ChatDiv[0].scrollHeight;
        //     ChatDiv.scrollTop(height);
        // });
        // }, 100);

    </script>


</body>

</html>