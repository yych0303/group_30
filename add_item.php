<?php
session_start();
include "level/level_a.php";

$head = <<<EOT
<!---head 內容加在裡面-->
<script src="./js/add_item.js"></script>
<!---head 內容加在裡面-->
EOT;

include "template_top.php";

?>

<?php
/*
狀態
0=>上架中
3=>缺貨
9=>已下架

*/
?>

<div class="col-md-10 mx-auto col-lg-5">
    <div class="p-5 mb-4 bg-light rounded-3">
        <h3 class="display-4 fw-bold lh-1">新增商品資料</h3>
        <div class="container-fluid py-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" name="form1" id="form1" action=""
                method="POST" enctype='multipart/form-data'>
                <div class="form-floating mb-3">
                <h4>商品類別</h4>
                    <input type="radio" name="item_type" id="item_type" value="cpu">CPU
                    <input type="radio" name="item_type" id="item_type" value="主機板">主機板
                    <input type="radio" name="item_type" id="item_type" value="顯示卡">顯示卡
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="item_id" id="item_id" size="20" placeholder="item_id"
                        readonly="readonly" value="">
                    <label for="floatingInput">商品ID</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="item_neme" size="20" placeholder="item_neme" value="">
                    <label for="floatingInput">商品名稱</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control price_change" id="price" type="text" name="item_price" size="20"
                        placeholder="item_price" value="">
                    <label for="floatingInput">商品原價</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control price_change" id="discount" type="text" name="item_disc" size="20"
                        placeholder="item_disc" value="1.0">
                    <label for="floatingInput">商品折數</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" id="d_price" name="item_d_price" size="20"
                        placeholder="item_d_price" value="" readonly=" readonly">
                    <label for="floatingInput">商品售價</label>
                    <!--JS算-->
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="item_title" size="20" placeholder="item_title"
                        value="">
                    <label for="floatingInput">商品標題</label>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" name="item_inf" id="item_inf"
                        style="height: 200px"></textarea>
                    <label for="floatingTextarea2">商品說明</label>
                </div>
                <br>
                <div class="mb-3">
                    <h4>商品狀態</h4>
                    <input type="radio" name="state" value="0">上架中
                    <input type="radio" name="state" value="3">缺貨中
                    <input type="radio" name="state" value="9">已下架
                </div>
                <div class="mb-3">
                    <h4>更新商品圖片</h4>
                    <input type='file' accept=".png,.jpg" name="item_photo" id="item_photo">
                </div>
                <button class="btn btn-primary btn-lg px-4 me-md-2" type="submit">送出</button>
                <a href="./item_set.php" class="btn btn-warning btn-lg px-4">取消</a>
            </form>

        </div>
    </div>

</div>
<?php if(isset($_POST['item_price'])&&isset($_POST['item_neme'])&&isset($_POST['item_title'])){ 
    $id = $_POST['item_id'];
    $type = $_POST['item_type'];
    $neme = $_POST['item_neme'];
    $photo= "item_".$id.".jpg";
    $price = $_POST['item_price'];
    $discount = $_POST['item_disc'];
    $state = $_POST['state'];
    $title = $_POST['item_title'];
    $inf = $_POST['item_inf'];
    include "link.php";
    $sql = "insert into item_list values('$id','$type','$neme','$photo','$price','$discount','$state','$title','$inf')"; //SQL新增資料
    if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
        $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
    else
        $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
    mysqli_close($link); // 關閉資料庫連結
    move_uploaded_file($_FILES['item_photo']['tmp_name'],"./images/item/item_" . $id . ".jpg");
    $url = "item_set.php";
echo "<script type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>"; 
} ?>
<?php
include "template_buttom.php";
?>