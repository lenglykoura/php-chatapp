<?php
session_start();
include("connection.php");
$uid = $_SESSION['id'];
$time = time() - 10;
$html = '';
// $name = $_POST['fullname'];
$sql = '';
// if (!$name){
//     $sql = "SELECT * FROM tb_user WHERE id != $uid";
// }else{
//     $sql = "SELECT * FROM tb_user WHERE id != $uid and full_name like '%$name'";
// }
$sql = "SELECT * FROM tb_user WHERE id != $uid";
$res = mysqli_query($connect, $sql);
while($data = mysqli_fetch_assoc($res)){
    $status = "Offline";
    $color_status = "gray";
    if ($data['last_login'] > $time){
        $status = "Active";
        $color_status = "Green";
    }
    echo '
    <a href="#" style="width:100%;display:flex; justify-content: space-between; " class="other-user">
    <div class="content">
        <img src="./image/user.jpg" alt="" width="40px" height="40px">
        <div class="details">
        <span class="namel">'.$data["full_name"].'</span>
        <p class="usernamel">@'.$data["user_name"].'</p>
        </div>
    </div>
    <p class="username" style="color:'.$color_status.';" id="status_">'.$status.'</p>
</a>
    ';
}
// echo $html;

?>