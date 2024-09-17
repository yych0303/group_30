<?php
session_start();
include "level/level_a.php";

include "link.php";
$arr_sta = array('0' => '上架中', '3' => '缺貨中', '9' => '已下架');
if ($result = mysqli_query($link, "SELECT * FROM item_list")) {
      while ($row = mysqli_fetch_assoc($result)) {
        $pp=floor($row["item_price"]*$row["item_discount"]);
        $today = date("YmdHis"); 
        $hour = date("G");   // 時，例如 15
        $minute = date("i"); // 分，例如 48
        $second = date("s"); // 秒，例如 54
        $timestamp=$today.$hour.$minute.$second;
        $a['data'][] = array($row["item_id"], $row["item_type"], "<a href='detail.php?pid=" . $row["item_id"] . "'>" . $row['item_name'] . "</a>", $row["item_price"], $row["item_discount"],$pp,$arr_sta[$row["item_state"]],"<img src='./images/item/" . $row["item_photo"]  . "?t=" . $timestamp . "' height='75' width='75'>","<a href='edit_item.php?pid=" . $row['item_id'] . "' class='btn btn-warning btn-xs'><i class='glyphicon glyphicon-pencil'></i>修改</a> <br><button class='btn_delete1 btn btn-danger btn-xs' id='btn_delete1' data-id='" . $row["item_id"] . "'><i class='glyphicon glyphicon-pencil'></i>刪除</button>");
    }
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結

echo json_encode($a);
?>