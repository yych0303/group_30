<?php
session_start();
include "level/level_m.php";

<?php
$bid=$_POST["bidno"];
$info = Array();

include "link.php";
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM `order_content` WHERE `order_num` = $bid")) {
    while ($row = mysqli_fetch_row($result)) {
        $info[] = $row[2]; 
    }
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結

foreach ($info as &$value) {
    include "link.php";
    $amt = $_POST["buy_value$value"];
    //echo $value . "-->" . $amt . "--";
    $sql = "UPDATE `order_content` SET `item_ amount`= $amt WHERE `item_id` = $value AND `order_num` = $bid"; // 指定SQL查詢字串
    if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
        $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
    else
        $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
    mysqli_close($link); // 關閉資料庫連結
}
?>

