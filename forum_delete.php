<?php
session_start();
include "level/level_a.php";

$id = $_POST['id'];
include "link.php";
// 送出查詢的SQL指令
if($id != 0)
if ( $result = mysqli_query($link, "DELETE FROM `forum` WHERE `msn_id`=" . $id . " OR `msn_belong`=" . $id . "") ) {
    if( $row = mysqli_fetch_assoc($result) ) echo "此帳號已存在!";
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
?>