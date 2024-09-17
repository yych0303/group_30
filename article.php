<?php
session_start();
include "level/level_0.php";

$mid = $_GET["mid"];
/* $mid = $_GET["mid"]; */
include "link.php";
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
if($exist == 0){
    header("Location:forum.php");
}

$head = <<<EOT
<!---head 內容加在裡面-->
<script src="./js/Model.js"></script>
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!---head 內容加在裡面-->
EOT;
include "template_top.php";
?>

<!---內容加在裡面-->
<!-- Button trigger modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">回覆</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./forum_post.php" method="post">
                <input type="hidden" required="required" value="<?php echo $mid ?>" name="blmsn">
                <input type="hidden" required="required" value="title" name="title">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">匿名:</label>
                        <input type="text" class="form-control" required="required" name="nickname">
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

<?php


include "link.php";
if ($result = mysqli_query($link, "SELECT * FROM `forum` WHERE `msn_belong` = $mid")) {
    $req_num = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結

?>
<div class="container my-5">
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
                <!-- Button trigger modal -->
                <?php if (!isset($_SESSION["level"])||($_SESSION["level"] < 2)) { ?>
                    <a href="./login.php" class="btn btn-outline-success">回覆</a>
                <?php }else{ ?>
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">回覆</button>
                <?php } ?>
            </div>


        </div>
        <div class="p-lg-5 pt-lg-3">
            <h5 class="">
                <pre><?php echo $m_content ?></pre>
            </h5>
            <!-- <h6 class="">回復數: <?php echo $req_num ?></h6> -->
        </div>


        <?php
$arrayremid = array();
include "link.php";
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM `forum` WHERE `msn_belong` = $mid  ORDER BY `msn_id` DESC;")) {
    while ($Row = mysqli_fetch_row($result)) {
        $arrayremid[] = $Row[0];
    }
    $Num2 = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
?>

        <div>

            <ul class="list-group list-group-flush">
                <?php
foreach ($arrayremid as &$value) {
    $remid = $value;
    include("remsn.php"); 
}
?>

            </ul>

        </div>
    </div>
</div>
<!---內容加在裡面-->
<?php
include "template_buttom.php";
?>