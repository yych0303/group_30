<?php
session_start();
include "level/level_a.php";

$arr_billsta = array('-7' => '已退貨', '-5' => '訂單退貨申請中', '-3' => '訂單取消申請中', '-1' => '訂單取消', '0' => '訂單未成立', '1' => '訂單已下單', '3' => '訂單已發貨', '5' => '訂單已送達');

/*  
include "link.php";
if ($result = mysqli_query($link, "SELECT * FROM order_inf")) {
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
  */

$arraybid = array();
include "link.php";
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM `order_inf` WHERE order_state != 0")) {
    while ($Row = mysqli_fetch_row($result)) {
        $arraybid[] = $Row[2];
    }
    $Num = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結

foreach ($arraybid as &$value) {
    $bill_id = $value;
    
    include "bill_sta.php";
    /*include "link.php";
    if ($result = mysqli_query($link, "SELECT * FROM `item_list` a, `order_content` b WHERE a.item_id = b.item_id AND b.order_num = $value;")) {
        if ($row = mysqli_fetch_row($result)) {
            $pic = $row[3];
        }
        mysqli_free_result($result); // 釋放佔用的記憶體
    }
    mysqli_close($link); // 關閉資料庫連結
    */
    /* 
    in:
    $bill_id

    out:
    $date
    $tim
    $mname
    $loc
    $tel
    $state 
    $total
    $sta
    $num
    $nums
    */
    include("bill_buttons.php");//$btns
    $a['data'][] = array("<a href='bill.php?bid=$bill_id'>$bill_id</a>", $tim, $mname, $loc, $tel, $num."/".$nums, $total, $sta, $btns);

}


echo json_encode($a);
?>