<?php
session_start();
include "level/level_a.php";

if ($_SESSION["level"] < 8) 
	header("Location:login.php");
    $id=$_POST['item_id'];
include "link.php";
// 送出查詢的SQL指令
if(isset($_POST['item_id'])&&isset($_POST['item_type'])&&isset($_POST['item_neme'])&&isset($_POST['item_price'])&&isset($_POST['item_disc'])&&isset($_POST['item_title'])&&isset($_POST['item_inf'])){ 
    $sql_1 ="UPDATE `item_list` SET `item_name`='" . $_POST['item_neme'] . "',`item_price`='" . $_POST['item_price'] . "',`item_discount`='" . $_POST['item_disc'] . "',`item_state`='" . $_POST['state'] . "',`item_title`='" . $_POST['item_title'] . "',`item_inf`='" . $_POST['item_inf'] . "' WHERE `item_id` = '" . $id . "'";
    if ($result = mysqli_query($link, $sql_1)) // 送出查詢的SQL指令
        $msg = "<span style='color:#0000FF'>資料更新成功!</span>";
            else
        $msg = "<span style='color:#FF0000'>資料更新失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
    mysqli_close($link); // 關閉資料庫連結
}
move_uploaded_file($_FILES['item_photo']['tmp_name'],"./images/item/item_" . $id . ".jpg");
echo "./images/" . $id . ".png";
echo "原始檔案名稱：" . $_FILES['item_photo']['name'];
echo "<br>伺服器的暫存檔名：" . $_FILES['item_photo']['tmp_name'] ;
echo "<br>檔案大小：" . $_FILES['item_photo']['size'] ;
echo "<br>檔案的MIME格式：".$_FILES['item_photo']['type'];
echo "<br>上傳的錯誤代碼：".$_FILES['item_photo']['error'];
echo "<br>";  
header("Location:item_set.php");
?>