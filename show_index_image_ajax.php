<?php
session_start();
include "level/level_a.php";

include "link.php";
$arr_state = array('0' => '啟用中', '2' => '未啟用');
if ($result = mysqli_query($link, "SELECT * FROM index_image")) {
      while ($row = mysqli_fetch_assoc($result)) {
        $today = date("YmdHis"); 
        $hour = date("G");   // 時，例如 15
        $minute = date("i"); // 分，例如 48
        $second = date("s"); // 秒，例如 54
        $timestamp=$today.$hour.$minute.$second;
        if($row["state"]==0){
        $a['data'][] = array($row["id"], "<img src='./images/index/" . $row["path"]  . "?t=" . $timestamp . "' height='250' width='250'>",$row["uptime"],$arr_state[$row["state"]],$row["start"],$row["end"],"<button class='btn_show btn btn-success btn-xs image_btn_show' id='btn_show' ><i class='glyphicon glyphicon-pencil'></i>隱藏</button>","<a href='edit_index_image.php?image_id=" . $row['id'] . "' class='btn btn-warning btn-xs'><i class='glyphicon glyphicon-pencil'></i>修改</a> <br><button class='image_btn_delete3 btn btn-danger btn-xs' id='image_btn_delete3' ><i class='glyphicon glyphicon-pencil'></i>刪除</button>");
        }else{
        $a['data'][] = array($row["id"], "<img src='./images/index/" . $row["path"]  . "?t=" . $timestamp . "' height='250' width='250'>",$row["uptime"],$arr_state[$row["state"]],$row["start"],$row["end"],"<button class='btn_show btn btn-success btn-xs image_btn_show' id='btn_show' ><i class='glyphicon glyphicon-pencil'></i>啟用</button>","<a href='edit_index_image.php?image_id=" . $row['id'] . "' class='btn btn-warning btn-xs'><i class='glyphicon glyphicon-pencil'></i>修改</a> <br><button class='image_btn_delete3 btn btn-danger btn-xs' id='image_btn_delete3' ><i class='glyphicon glyphicon-pencil'></i>刪除</button>");
        }
      }
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結

echo json_encode($a);
?>