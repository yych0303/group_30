<?php
/* 
input
$it_id
$it_img
$it_name
$it_sprice
$it_price
$timestamp

output
$it_info
$it_btns


        $it_id = $row[0];
        $it_img = $row[3];
        $it_name = $row[2];
        $it_sprice = $row[4];
        $it_price = floor($row[4]*$row[5]);
        $it_state = $row[6];
        include("item_frame.php");
        $rows.= $it_info . $it_btns;
*/
//include("item_frame.php");
//"<h6>已售出" . $amount . "</h6>"
$it_info = "";
$it_info .= "<div class='product '><img src='./images/item/$it_img?t=$timestamp' height='200' width='200'><br><span>" . $it_name . "</span><br><div class='colorred'>打折價:<s>" . $it_sprice . "</s>　" . $it_price . "";

$it_btns = "";
$it_btns .= "<div class='btn-group'>";
if(!isset($_SESSION['userid'])){
    $it_btns .="<a href='login.php' class='btn btn-sm btn-outline-secondary'>加入購物車</a>";
    $it_btns .="<a href='detail.php?pid=" . $it_id . "' class='btn btn-sm btn-outline-secondary'>查看詳情</a>";
    $it_btns .="<a href='login.php' class='btn btn-sm btn-outline-secondary'>直接購買</a>";
}
else if($_SESSION["level"] == 9){//admin
    $it_btns .="<a class='btn btn-sm btn-outline-secondary'>加入購物車</a>";
    $it_btns .="<a href='detail.php?pid=" . $it_id . "' class='btn btn-sm btn-outline-secondary'>查看詳情</a>";
    $it_btns .="<a class='btn btn-sm btn-outline-secondary'>直接購買</a>";
}
else{//member
    $it_btns .="<a class='btn btn-sm addcart btn-outline-secondary' data-id=" . $it_id . ">加入購物車</a><input type='hidden' class='amount' value='1'>";
    $it_btns .="<a href='detail.php?pid=" . $it_id . "' class='btn btn-sm btn-outline-secondary'>查看詳情</a>";
    $it_btns .="<a class='btn btn-sm nowbuy btn-outline-secondary'data-id=" . $it_id . ">直接購買</a><input type='hidden' class='amount' value='1'>";
}

if($it_state == 3){
    $it_info .= "<b> 缺貨中</b>";
    $it_btns = "";
    $it_btns .= "<div class='btn-group'>";
    $it_btns .="<a href='detail.php?pid=" . $it_id . "' class='btn btn-sm btn-outline-secondary'>查看詳情</a>";
}

$it_btns .= "</div></div></div>";
?>