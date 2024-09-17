<?php
session_start();
include "level/level_a.php";
$head = <<<EOT
<!---head 內容加在裡面-->
<script src="./js/edit_item.js"></script>
<!---head 內容加在裡面-->
EOT;

include "template_top.php";
$id = $_GET['pid'];//商品ID
?>

<?php
/*
狀態
0=>上架中
3=>缺貨
9=>已下架

*/
include "link.php";
$rows= "";
//echo $_GET['pid'];
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM `item_list` WHERE `item_id` = " . $_GET['pid'] . "")) {
    while ($row = mysqli_fetch_row($result)) {
        $type = $row[1];
        $name = $row[2];
        $price = $row[4];
        $disc = $row[5];
        $state = $row[6];
        $title = $row[7];
        $d_price = floor($row[4]*$row[5]);
        $pic = $row[3];
        $text = $row[8];
        //$rows .= "<div class='product '><img src='./images/item/$row[3]" . "' height='200' width='200'><br><span>" . $row[2] . "</span><br><div class='colorred'>打折價:<s>8888</s>" . $row[4] . "<div class='btn-group'><button type='button' class='btn btn-sm btn-outline-secondary'>加入購物車</button><a href='detail.php?pid=" . $row[0] . "'><button type='button' class='btn btn-sm btn-outline-secondary'>查看詳情</button></a><button type='button' class='btn btn-sm btn-outline-secondary'>直接購買</button></div></div></div>";
    }
    $num = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
?>

<div class="col-md-10 mx-auto col-lg-5">
    <div class="p-5 mb-4 bg-light rounded-3">
        <h3 class="display-4 fw-bold lh-1">修改商品資料</h3>
        <div class="container-fluid py-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" name="form1" id="form1" action="./edit_item_inf.php"
                method="POST" enctype='multipart/form-data'>

                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="item_id" id="item_id" size="20" placeholder="item_id"
                    readonly="readonly" value="<?php echo $id ?>">
                    <label for="floatingInput">商品ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="item_type" size="20" placeholder="item_type"
                    readonly="readonly" value="<?php echo $type ?>">
                    <label for="floatingInput">商品類別</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="item_neme" size="20" placeholder="item_neme"
                        value="<?php echo $name ?>">
                    <label for="floatingInput">商品名稱</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control price_change" id="price" type="text" name="item_price" size="20"
                        placeholder="item_price" value="<?php echo $price ?>">
                    <label for="floatingInput">商品原價</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control price_change" id="discount" type="text" name="item_disc" size="20"
                        placeholder="item_disc" value="<?php echo $disc ?>">
                    <label for="floatingInput">商品折數</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" id="d_price" name="item_d_price" size="20"
                        placeholder="item_d_price" value="<?php echo $d_price ?>" readonly="readonly">
                    <label for="floatingInput">商品售價</label>
                    <!--JS算-->
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="item_title" size="20" placeholder="item_title"
                        value="<?php echo $title ?>">
                    <label for="floatingInput">商品標題</label>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" name="item_inf" id="item_inf"
                        style="height: 200px"><?php echo $text ?></textarea>
                    <label for="floatingTextarea2">商品說明</label>
                </div>
                <br>
                <div class="mb-3">
                    <h4>商品狀態</h4>
                    <input type="radio" name="state" value="0" <?php if($state == 0) echo "checked" ?>>上架中
                    <input type="radio" name="state" value="3" <?php if($state == 3) echo "checked" ?>>缺貨中
                    <input type="radio" name="state" value="9" <?php if($state == 9) echo "checked" ?>>已下架
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

<?php
include "template_buttom.php";
?>