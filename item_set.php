<?php
session_start();
include "level/level_a.php";


$head = <<<EOT
<!---head 內容加在裡面-->

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

<script src="//code.jquery.com/jquery-3.3.1.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="./js/item_set.js" crossorigin="anonymous"></script>
<!---head 內容加在裡面-->
EOT;

include "template_top.php";

?>
<!--
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
-->

<div class="container my-5">
    <div class="row p-4 pb-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <h2 class="display-4 fw-bold lh-1">商品管理</h2>
        <div class="col-md-3"></div>
        <div class="text-center">
            <a href='./add_item.php' class='btn btn-primary btn-lg px-4 me-md-2'>新增商品</a>
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">商品ID</th>
                        <th class="text-center">商品類別</th>
                        <th class="text-center">商品名稱</th>
                        <th class="text-center">商品原價</th>
                        <th class="text-center">打折數</th>
                        <th class="text-center">商品售價</th>
                        <th class="text-center">商品狀態</th>
                        <th class="text-center">商品圖片</th>
                        <th class="text-center">修改/刪除</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-md-3"></div>
    </div>
    <?php
include "template_buttom.php";
?>