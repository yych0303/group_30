<?php
session_start();
include "level/level_m.php";

date_default_timezone_set('Asia/Taipei');
$uid=$_SESSION['userid'] ;
$por=$_POST['id'];
$amount=$_POST['amount'];
$today = date("YmdHis"); 
$hour = date("G");   // 時，例如 15
$minute = date("i"); // 分，例如 48
$second = date("s"); // 秒，例如 54
//$ordertime_num=$year.$month.$day.$hour.$minute.$second;
?>



<?php
include "link.php";
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM `order_inf` WHERE `member_id` LIKE $uid AND `order_state` = 0")) {
    while ($row = mysqli_fetch_row($result)) {
        $bid = $row[2];    
    }
    $num = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結

if($num == 0){
    $bid = $today;
    include "link.php";
    $sql = "insert into order_inf values('','$uid','$bid',NOW(),NOW(),'0','','','')"; // 指定SQL查詢字串
    if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
        $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
    else
        $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
    mysqli_close($link); // 關閉資料庫連結
}


?>

<?php
include "link.php";
$rows= "";
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM `order_content` WHERE `order_num` = $bid AND `item_id` = $por")) {
    while ($row = mysqli_fetch_row($result)) {
        $amount += $row[3];    
    }
    $num = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
if($num == 0){
    include "link.php";
    $sql = "insert into order_content values('','$bid','$por','$amount')"; // 指定SQL查詢字串

    if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
        $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
    else
        $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";

    mysqli_close($link); // 關閉資料庫連結
}
else{
    include "link.php";
    $sql = "UPDATE `order_content` SET `item_ amount`= $amount WHERE `order_num` = $bid AND `item_id` = $por"; // 指定SQL查詢字串

    if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
        $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
    else
        $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";

    mysqli_close($link); // 關閉資料庫連結
}






echo $msg;
exit;

?>