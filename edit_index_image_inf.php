<?php
session_start();
include "level/level_a.php";

if ($_SESSION["level"] < 8) 
	header("Location:login.php");
    $id=$_POST['image_id'];
include "link.php";
// 送出查詢的SQL指令
if(isset($_POST['image_id'])&&isset($_POST['image_type'])&&isset($_POST['image_start_time'])&&isset($_POST['image_start_time'])&&isset($_POST['image_end_time'])){ 

    $sql_1 ="UPDATE `index_image` SET `uptime`=NOW(),`state`='" . $_POST['state'] . "',`start`='" . str_replace("T", " ", $_POST['image_start_time']) . "',`end`='" . str_replace("T", " ", $_POST['image_end_time']) . "' WHERE `id` = '" . $id . "'";
    echo $sql_1;
    if ($result = mysqli_query($link, $sql_1)) // 送出查詢的SQL指令
        $msg = "<span style='color:#0000FF'>資料更新成功!</span>";
            else
        $msg = "<span style='color:#FF0000'>資料更新失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
    mysqli_close($link); // 關閉資料庫連結
}
move_uploaded_file($_FILES['item_photo']['tmp_name'],"./images/index/i_" . $id . ".jpg");
echo "<br>./images/" . $id . ".png";
echo "<br>原始檔案名稱：" . $_FILES['item_photo']['name'];
echo "<br>伺服器的暫存檔名：" . $_FILES['item_photo']['tmp_name'] ;
echo "<br>檔案大小：" . $_FILES['item_photo']['size'] ;
echo "<br>檔案的MIME格式：".$_FILES['item_photo']['type'];
echo "<br>上傳的錯誤代碼：".$_FILES['item_photo']['error'];
echo "<br>";  
header("Location:shop_set.php");
/*
include "template_top.php";
date_default_timezone_set("Asia/Taipei");
$today1 = date("Y-m-d",strtotime('+1 day'));
$today2 = date("H:i:s");
$today = $today1."T".$today2
?>

<input class="form-control" type="text"  name="item_title"  placeholder="item_title"
value="<?php echo str_replace("T", " ", $_POST['item_neme']) ?>">
<input class="form-control" type="text" name="item_title"  placeholder="item_title"
value="<?php echo substr($today, 0, -3)?>">
<input class="form-control" type="datetime-local" step="1" name="item_title" placeholder="item_title"
value="<?php echo $today ?>">
<?php
include "template_buttom.php";
*/
?>