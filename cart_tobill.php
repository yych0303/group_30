<?php
session_start();
include "level/level_m.php";


if(!isset($_POST["buyList"])){
    header("Location:cart.php");
    exit;
}

date_default_timezone_set('Asia/Taipei');
$uid=$_SESSION['userid'] ;
$today = date("YmdHis"); 
$hour = date("G");   // 時，例如 15
$minute = date("i"); // 分，例如 48
$second = date("s"); // 秒，例如 54
//$ordertime_num=$year.$month.$day.$hour.$minute.$second;
?>
<?php

$bid=$_POST["bidno"];
$bname=$_POST["bname"];
$loc=$_POST["loc"];
$tel=$_POST["tel"];
$info=$_POST["buyList"];
//Echo(implode (",", $info));

$nbid = $today;
include "link.php";
$sql = "insert into order_inf values('','$uid','$nbid',NOW(),NOW(),'0','$bname','$loc','$tel')"; // 指定SQL查詢字串
if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
    $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
else
    $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
mysqli_close($link); // 關閉資料庫連結


foreach ($info as &$value) {
    include "link.php";
    $amt = $_POST["buy_value$value"];
    //echo $value . "-->" . $amt . "--";
    $sql = "UPDATE `order_content` SET `order_num` = $nbid,`item_ amount`= $amt WHERE `item_id` = $value AND `order_num` = $bid"; // 指定SQL查詢字串
    if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
        $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
    else
        $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
    mysqli_close($link); // 關閉資料庫連結
}

header("Location:bill.php?bid=$nbid");

?>

