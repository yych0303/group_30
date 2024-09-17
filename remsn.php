<?php
/* input mid */
include "link.php";
$rows= "";
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM `forum` WHERE `msn_id` = $remid")) {
    while ($row = mysqli_fetch_row($result)) {
        $m_name = $row[2];
        $m_title = $row[3];
        $m_content = $row[4];
        $m_date = $row[6];
        $m_time = $row[7];
    }
    $exist = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
if($exist==1){
    ?>

<li class="list-group-item">
    <h5 class=""><?php echo $m_name ?></h5>
    <h6 class=""><?php echo $m_date ?> <?php echo $m_time ?></h6>
    <h5 class="">
        <?php echo $m_content ?>
    </h5>
</li>



<div class="row p-4 pb-0 pe-lg-0 pt-lg-5 "></div>

<?php
}
?>