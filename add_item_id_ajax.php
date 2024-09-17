<?php
session_start();
include "level/level_a.php";

$type1 = $_POST['type'];
include "link.php";
// 送出查詢的SQL指令
if ( $result = mysqli_query($link, "SELECT MAX(`item_id`) AS Max FROM item_list WHERE `item_type`='$type1'") ) {
    if( $row = mysqli_fetch_assoc($result) ) echo ($row["Max"]+1);
    mysqli_free_result($result); // 釋放佔用的記憶體   
}
mysqli_close($link); // 關閉資料庫連結
?>