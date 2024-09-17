<?php
include "level/level_1.php";

include "link.php";
//$bill_id = $_GET["bid"];
//echo $_GET['pid'];
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
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

$date = "";
$mname = "";
$loc = "";
$tel = "";
$state = 0;
if ($result = mysqli_query($link, "SELECT * FROM order_inf WHERE order_num = " . $bill_id . "")) {
    while ($row = mysqli_fetch_row($result)) {
        $date = $row[3];
        $tim = $row[3] . " " . $row[4];
        $state = $row[5];
        $mname = $row[6];
        $loc = $row[7];
        $tel = $row[8];


        //$total += $row[3] * $row[8];
        //$nums += $row[3];
        //$rows .= "<a href='./detail.php?pid=". $row[4] ."' class='list-group-item list-group-item-action d-flex gap-3 py-3' aria-current='true'><img src='./images/item/". $row[7] ."' alt='twb' width='32' height='32' class='rounded-circle flex-shrink-0'><div class='d-flex gap-2 w-100 justify-content-between'><div> <h6 class='mb-0'>". $row[6] ."</h6><p class='mb-0 opacity-75'>". $row[8] ."元</p></div><small class='opacity-50 text-nowrap'>x". $row[3] ."</small></div></a>";
    }
    $num = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}



$total = 0;
$nums = 0;
$rows= "";
if($num == 0)$state = "-100";
else{
    //echo $_GET['pid'];
    // // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
    if ($result = mysqli_query($link, "SELECT * FROM order_content a, item_list b WHERE a.item_id = b.item_id AND a.order_num = " . $bill_id . "")) {
        while ($row = mysqli_fetch_row($result)) {
            $price = floor($row[8]*$row[9]);
            $total += $row[3] * $price;
            $nums += $row[3];
            $rows .= "<a href='./detail.php?pid=". $row[4] ."' class='list-group-item list-group-item-action d-flex gap-3 py-3' aria-current='true'><img src='./images/item/". $row[7] ."' alt='twb' width='32' height='32' class='rounded-circle flex-shrink-0'><div class='d-flex gap-2 w-100 justify-content-between'><div> <h6 class='mb-0'>". $row[6] ."</h6><p class='mb-0 opacity-75'>". $price ."元</p></div><small class='opacity-50 text-nowrap'>x". $row[3] ."</small></div></a>";
        }
        $num = mysqli_num_rows($result); //查詢結果筆數
        mysqli_free_result($result); // 釋放佔用的記憶體
    }
}
mysqli_close($link); // 關閉資料庫連結

/* 
-7已退貨>>0
-5訂單退貨申請中>>-7 5
-3訂單取消申請中>>-1 3
-1訂單取消>>0
0訂單未成立>>1
1訂單已下單>>-1 3
3訂單已發貨>>-3 5
5訂單已送達>>-5

*/
$sta = "";
$arr_billsta = array('-100' => '查無訂單','-7' => '已退貨', '-5' => '訂單退貨申請中', '-3' => '訂單取消申請中', '-1' => '訂單取消', '0' => '訂單未成立', '1' => '訂單已下單', '3' => '訂單已發貨', '5' => '訂單已送達');
$sta = $arr_billsta[$state];
?>