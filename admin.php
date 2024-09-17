<?php
session_start();
include "level/level_a.php";

$head = <<<EOT
<!---head 內容加在裡面-->

<!---head 內容加在裡面-->
EOT;
include "template_top.php";

?>
<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1">管理員專區</h1>
            <p class="lead"><?php echo $_SESSION["name"] ?></p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                <a href="./member_show.php" class="btn btn-warning btn-lg px-4 me-md-2 fw-bold">會員資料檢閱</a>
                <a href="./add_admin.php" class="btn btn-warning btn-lg px-4 me-md-2 fw-bold">新增管理員</a>
                <a href="./order_set.php" class="btn btn-warning btn-lg px-4 me-md-2 fw-bold">訂單管理</a>
                <a href="./item_set.php" class="btn btn-warning btn-lg px-4 me-md-2 fw-bold">商品設定</a>
                <a href="./shop_set.php" class="btn btn-warning btn-lg px-4 me-md-2 fw-bold">首頁設定</a>
                <a href="./forum_set.php" class="btn btn-warning btn-lg px-4 me-md-2 fw-bold">論壇管理</a>
                <a href="./admin_edit_password.php" class="btn btn-warning btn-lg px-4 me-md-2 fw-bold">修改密碼</a>
                <a href="./admin_edit.php" class="btn btn-warning btn-lg px-4 me-md-2 fw-bold">修改管理員資料</a>
                <a href="./logout.php" class="btn btn-outline-secondary btn-lg px-4">登出</a>
            </div>
        </div>
        <div class="col-lg-3 offset-lg-1 p-0 overflow-hidden shadow-lg">

        </div>
    </div>
</div>

<?php
include "template_buttom.php";
?>