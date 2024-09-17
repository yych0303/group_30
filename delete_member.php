<?php
session_start();
include "level/level_a.php";

$id = $_POST['t_id'];
include "link.php";
// 送出查詢的SQL指令
if ( $result = mysqli_query($link, "DELETE FROM `member` WHERE `member_id`='" . $id . "'") ) {
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
?>