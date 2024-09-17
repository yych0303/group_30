<?php
session_start();
include "level/level_a.php";

include "link.php";
if ($result = mysqli_query($link, "SELECT * FROM forum")) {
      while ($row = mysqli_fetch_assoc($result)) {
        $a['data'][] = array($row['msn_id'], "<a href = './article.php?mid=".$row["msn_belong"]."'>".$row["msn_belong"]."</a>", $row["member_id"], $row["msn_name"], "<a href = './article.php?mid=".$row['msn_id']."'>".$row["msn_title"]."</a>", $row['msn_content'], $row["msn_date"]."-".$row["msn_time"], "<button class='btn_delete1 btn btn-danger btn-xs' id='btn_delete1' data-id='" . $row["msn_id"] . "'><i class='glyphicon glyphicon-pencil'></i>刪除</button>");
    }
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結

echo json_encode($a);
?>