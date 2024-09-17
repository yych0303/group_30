<?php
session_start();
include "level/level_a.php";

include "link.php";
$arr_level = array('2' => '普通會員', '9' => '管理員');
if ($result = mysqli_query($link, "SELECT * FROM member")) {
      while ($row = mysqli_fetch_assoc($result)) {
          $a['data'][] = array($row["member_id"], $arr_level[$row["member_level"]], $row["member_account"], $row["member_name"], "<a href='mailto:" . $row["member_email"] . "'>" . $row["member_email"] . "</a>","<button class='m_btn_delete btn btn-danger btn-xs' id='m_btn_delete'><i class='glyphicon glyphicon-pencil'></i>刪除</button>");
    }
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結

echo json_encode($a);

?>