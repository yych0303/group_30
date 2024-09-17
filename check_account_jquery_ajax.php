<?php
session_start();
include "level/level_0.php";

$user = $_POST['userid'];
include "link.php";
// 送出查詢的SQL指令
if ( $result = mysqli_query($link, "SELECT * FROM member where member_account='$user' ") ) {
    if( $row = mysqli_fetch_assoc($result) ) echo "此帳號已存在!";
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
?>