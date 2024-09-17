<?php
include "level/level_1.php";

$bid = $_GET['bid'];
$state = $_GET['state'];
$to = $_GET['to'];

/* 
-7已退貨
-5訂單退貨申請中>>-7 m5
-3訂單取消申請中>>-1 m3
-1訂單取消
0訂單未成立>>m1
1訂單已下單>>m-1 3
3訂單已發貨>>m-3 5
5訂單已送達>>m-5

*/
if($state == -1 || $state == -7){
    $url = $_SERVER['HTTP_REFERER'];
    header("Location:$url");
}
if (!in_array($to, array(1, 3, 5, -1, -3, -5, -7))){
    $url = $_SERVER['HTTP_REFERER'];
    header("Location:$url");
}

//level
session_start();
if ($_SESSION["level"] < 2) {
	header("Location:login.php");
}
if ($_SESSION["level"] != 9) {//level m

    if($to != -$state ){
        if($to != 0 || $state !=1){
            $url = $_SERVER['HTTP_REFERER'];
            header("Location:$url");
        }
    }

    $uid = $_SESSION['userid'];
    include "link.php";
    $rows= "";
    //echo $_GET['pid'];
    // // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
    if ($result = mysqli_query($link, "SELECT * FROM `order_inf` WHERE `member_id` = $uid AND `order_num` = $bid")) {
        while ($row = mysqli_fetch_row($result)) {
        }
        $num = mysqli_num_rows($result); //查詢結果筆數
        mysqli_free_result($result); // 釋放佔用的記憶體
    }
	if($num==0){
        $url = $_SERVER['HTTP_REFERER'];
        header("Location:$url");
    }
}

?>

<?php

include "link.php";
$rows= "";
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "UPDATE `order_inf` SET `order_state`= $to WHERE `order_num` = $bid")) {
    $msg = "<span style='color:#0000FF'>成功!</span>";
} else {
    $msg = "<span style='color:#FF0000'>失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
}

mysqli_close($link); // 關閉資料庫連結

$url = $_SERVER['HTTP_REFERER'];
header("Location:$url");
?>