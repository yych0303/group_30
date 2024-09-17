<?php
/* input mid */
include "link.php";
$rows= "";
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM `forum` WHERE `msn_id` = $mid")) {
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
    include "link.php";
    if ($result = mysqli_query($link, "SELECT * FROM `forum` WHERE `msn_belong` = $mid")) {
        $req_num = mysqli_num_rows($result); //查詢結果筆數
        mysqli_free_result($result); // 釋放佔用的記憶體
    }
    mysqli_close($link); // 關閉資料庫連結

    ?>

<div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
    <div class="col p-lg-5 pt-lg-3">
        <h2 class=""><?php echo $m_title ?></h2>
        <h6 class=""><?php echo $m_date ?> <?php echo $m_time ?></h6>
        <h6 class=""><?php echo $m_name ?></h6>
    </div>
    <div class="col p-lg-5 pt-lg-3">
        <h6 class="">回覆數: <?php echo $req_num ?></h6>
        <div class="bd-example">
            <!-- <button type="button" class="btn btn-outline-danger">Like</button> -->
            <a href="./article.php?mid=<?php echo $mid ?>"><button type="button" class="btn btn-outline-success">查看文章</button></a>
        </div>
        
    </div>
    <div class="p-lg-5 pt-lg-3">
        <h5 class="">
            <pre><?php echo $m_content ?></pre>
        </h5>
    </div>
</div>

<div class="row p-4 pb-0 pe-lg-0 pt-lg-5 "></div>




<?php
}
?>