<?php
session_start();
include "level/level_0.php";


$head = <<<EOT
<!---head 內容加在裡面-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!---head 內容加在裡面-->
EOT;
include "template_top.php";

?>

<?php
$arraymid = array();
include "link.php";
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM `forum` WHERE `msn_belong` = 0 ORDER BY `msn_id` DESC")) {
    while ($Row = mysqli_fetch_row($result)) {
        $arraymid[] = $Row[0];
    }
    $Num2 = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}

mysqli_close($link); // 關閉資料庫連結
?>
<!---內容加在裡面-->
<!-- Button trigger modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">發文</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./forum_post.php" method="post">
                <input type="hidden" required="required" value = "0" name="blmsn">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">匿名:</label>
                        <input type="text" class="form-control" required="required" name="nickname">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">標題:</label>
                        <input type="text" class="form-control" required="required" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">內文:</label>
                        <textarea class="form-control" required="required" name="content"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-success">送出</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Button trigger modal -->


<div class="container my-5">
    <h1 class="">折論壇
        
    <?php if (!isset($_SESSION["level"])||($_SESSION["level"] < 2)) { ?>
                    <a href="./login.php" class="btn btn-outline-success">我要發文</a>
                <?php }else{ ?>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">我要發文</button>
                <?php } ?>
    </h1>
    <!-- <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="col p-lg-5 pt-lg-3">
            <h2 class="">Title</h2>
            <h6 class="">2022-06-08 12:36</h6>
            <h6 class="">name</h6>
        </div>
        <div class="col p-lg-5 pt-lg-3">

            <h6 class="">回復數: 1234</h6>
        </div>
        <div class="p-lg-5 pt-lg-3">
            <h5 class="">conte111111111111111111111111111111111111111111111111111111111111111111111111111111111111nt
            </h5>
            <h5 class="">content</h5>
            <h5 class="">content</h5>
            <h5 class="">content</h5>
        </div>
    </div>
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 "></div> -->
    <?php
foreach ($arraymid as &$value) {
    $mid = $value;
    include("msn.php"); 
}
?>
</div>

<!---內容加在裡面-->
<?php
include "template_buttom.php";
?>