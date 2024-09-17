<?php
session_start();
include "level/level_a.php";

$head = <<<EOT
<!---head 內容加在裡面-->

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

<script src="//code.jquery.com/jquery-3.3.1.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="./js/order_set.js" crossorigin="anonymous"></script>
<!---head 內容加在裡面-->
EOT;

include "template_top.php";

?>
<!--
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
-->

<div class="container my-5">
    <div class="row p-4 pb-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <h2 class="display-4 fw-bold lh-1">訂單管理</h2>
        <div class="col-md-3"></div>
        <div class="text-center">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">訂單編號</th>
                        <th class="text-center">下單時間</th>
                        <th class="text-center">收件人</th>
                        <th class="text-center">收件地址</th>
                        <th class="text-center">收件人電話</th>
                        <th class="text-center">商品(項/個)數</th>
                        <th class="text-center">總金額</th>
                        <th class="text-center">訂單狀態</th>
                        <th class="text-center">狀態按鈕</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-md-3"></div>
    </div>
    <?php
include "template_buttom.php";
?>