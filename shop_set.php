<?php
session_start();
include "level/level_a.php";

$head = <<<EOT
<!---head 內容加在裡面-->

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

<script src="//code.jquery.com/jquery-3.3.1.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="./js/shop_set.js"></script>

<!---head 內容加在裡面-->
EOT;

include "template_top.php";

?>
<!--
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
-->
<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">

        <h2 class="display-4 fw-bold lh-1">首頁輪播圖</h2>
        <div class="col-md-3"></div>
        <div class="text-center">
        <a href='./add_index_image.php' class='btn btn-primary btn-lg px-4 me-md-2'>新增圖片</a>
            <table id="example3" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">輪撥圖序號</th>
                        <th class="text-center">圖片預覽</th>
                        <th class="text-center">更新時間</th>
                        <th class="text-center">目前狀態</th>
                        <th class="text-center">活動開始時間</th>
                        <th class="text-center">活動結束時間</th>
                        <th class="text-center">啟用/隱藏</th>
                        <th class="text-center">更換</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-md-3"></div>
    </div>



    <?php
include "template_buttom.php";
?>