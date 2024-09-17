<?php
session_start();
include "level/level_m.php";

$bid = 0;
$uid = 0;
$bid=$_POST["bidno"];
$iid = $_GET["iid"];
$uid = $_SESSION['userid'];

include "link.php";
if ($result = mysqli_query($link, "SELECT * FROM `order_inf` WHERE `order_state` = 0 AND `order_num` = $bid AND `member_id` = $uid")) {
    while ($row = mysqli_fetch_row($result)) {   
    }
    $num = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
if($num == 0){
    exit;
}

include "link.php";
$sql = "DELETE FROM `order_content` WHERE `order_num` = $bid AND `item_id` = $iid"; // 指定SQL查詢字串
if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
    $msg = "<span style='color:#0000FF'>資料刪除成功!</span>";
else
    $msg = "<span style='color:#FF0000'>資料刪除失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";

mysqli_close($link); // 關閉資料庫連結

exit;
?>