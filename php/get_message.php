<?php
include("connection.php");
$id1 = $_POST['sender'];
$id2 = $_POST['receiver'];
$chatID = 0;
$sql = "SELECT *,MAX(id) as mid FROM tb_message WHERE (sender = $id1 and receiver = $id2) or (receiver = $id1 and sender = $id2) ORDER BY message_date";
$result_message = $connect->query($sql);
while($row_message = mysqli_fetch_assoc($result_message)){
    if ($row_message['sender']== $id1){
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