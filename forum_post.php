<?php
session_start();
include "level/level_1.php";

date_default_timezone_set('Asia/Taipei');
$uid = $_SESSION['userid'] ;
/* input */
$nickname = $_POST['nickname']; 
$title = $_POST['title'];
$content=$_POST['content'];
$blmsn = $_POST['blmsn'];
$today = date("YmdHis"); 
$hour = date("G");   // 時，例如 15
$minute = date("i"); // 分，例如 48
$second = date("s"); // 秒，例如 54

//$ordertime_num=$year.$month.$day.$hour.$minute.$second;
include "link.php";
$sql = "insert into forum values('','$uid','$nickname','$title','$content','$blmsn','$today',NOW())"; // 指定SQL查詢字串

if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
    $msg = "<span style='color:#0000FF'>成功!</span>";
else
    $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";

mysqli_close($link); // 關閉資料庫連結

$url = $_SERVER['HTTP_REFERER'];
header("Location:$url");

?>