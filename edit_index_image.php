<?php
session_start();
include "level/level_a.php";


$head = <<<EOT
<!---head 內容加在裡面-->

<!---head 內容加在裡面-->
EOT;

include "template_top.php";
$id = $_GET['image_id'];//商品ID
?>

<?php
/*
狀態
0=>啟用中
2=>未啟用

*/
include "link.php";
$rows= "";
//echo $_GET['pid'];
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM `index_image` WHERE `id` = " . $_GET['image_id'] . "")) {
    while ($row = mysqli_fetch_row($result)) {
        $path = $row[1];
        $update = $row[2];
        $state = $row[3];
        $start = $row[4];
        $end = $row[5];
    }
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結

$start=str_replace(" ", "T", $start);
$end=str_replace(" ", "T", $end);
?>
<script>
$(function() { //網頁完成後才會載入
    $('.price_change').keyup(function() {
        var price = $('#price').val();
        var discount = $('#discount').val();
        var new_d_price = Math.floor(price * discount);
        $("#d_price").val(new_d_price);
    });
});
</script>

<div class="col-md-10 mx-auto col-lg-5">
    <div class="p-5 mb-4 bg-light rounded-3">
        <h3 class="display-4 fw-bold lh-1">修改輪撥圖資料</h3>
        <div class="container-fluid py-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" name="form1" id="form1"
                action="./edit_index_image_inf.php" method="POST" enctype='multipart/form-data'>

                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="image_id" id="image_id" readonly="readonly"
                        value="<?php echo $id ?>">
                    <label for="floatingInput">圖片ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="image_start_time"type="datetime-local" step="1" name="image_start_time" 
                        value="<?php echo $start ?>">
                    <label for="floatingInput">開始時間</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="image_end_time" step="1" type="datetime-local" name="image_end_time"
                         value="<?php echo $end ?>">
                    <label for="floatingInput">結束時間</label>
                </div>
               
                <br>
                <div class="mb-3">
                    <h4>目前狀態</h4>
                    <input type="radio" name="state" value="0" <?php if($state == 0) echo "checked" ?>>啟用中
                    <input type="radio" name="state" value="2" <?php if($state == 2) echo "checked" ?>>未啟用
                </div>
                <div class="mb-3">
                    <h4>更新圖片</h4>
                    <input type='file' accept=".png,.jpg" name="item_photo" id="item_photo">
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="image_type" size="20" readonly="readonly"
                        value="<?php echo $update ?>">
                    <label for="floatingInput">上次更新時間</label>
                </div>
                <button class="btn btn-primary btn-lg px-4 me-md-2" type="submit">送出</button>
                <a href="./shop_set.php" class="btn btn-warning btn-lg px-4">取消</a>
            </form>

        </div>
    </div>

</div>

<?php
include "template_buttom.php";
?>