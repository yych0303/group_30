<?php
session_start();
include "level/level_a.php";

$id = $_POST['t_id'];
$state = $_POST['sta'];
include "link.php";
// 送出查詢的SQL指令
if($state=="啟用中"){
if ( $result = mysqli_query($link, "UPDATE `index_image` SET `state`='2' WHERE `id`='" . $id . "'") ) {
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
}else{
    if ( $result = mysqli_query($link, "UPDATE `index_image` SET `state`='0' WHERE `id`='" . $id . "'") ) {
        mysqli_free_result($result); // 釋放佔用的記憶體
    }
}
?>