<?php
session_start();
include "level/level_m.php";

$head = <<<EOT
<!---head 內容加在裡面-->
<script src="./js/cart.js" crossorigin="anonymous"></script>
<!---head 內容加在裡面-->
EOT;
include "template_top.php";

?>

<!---內容加在裡面-->
<?php
$sid = -1;
if(isset($_GET['sid']))
    $sid = $_GET['sid'];




$name = $_SESSION['name'];
$uid = $_SESSION['userid'];
$loc = "";
$tel = "";
include "link.php";
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM `member` WHERE `member_id` = $uid")) {
    while ($row = mysqli_fetch_row($result)) {
        $loc = $row[8];
        $tel = $row[7];    
    }
    $num = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結

include "link.php";
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM `order_inf` WHERE `member_id` = $uid AND `order_state` = 0")) {
    $num = 0;
    $arr_delbid = Array();
    while ($row = mysqli_fetch_row($result)) {
        if($num == 0)
            $bid = $row[2];
        else{
            $arr_delbid[] = $row[2];
        }
        $num++;
    }
    $num = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
if($num == 0){
    date_default_timezone_set('Asia/Taipei');
    $today = date("YmdHis"); 
    $hour = date("G");   // 時，例如 15
    $minute = date("i"); // 分，例如 48
    $second = date("s"); // 秒，例如 54
    //$ordertime_num=$year.$month.$day.$hour.$minute.$second;
    $bid = $today;
    include "link.php";
    $sql = "insert into order_inf values('','$uid','$bid',NOW(),NOW(),'0','','','')"; // 指定SQL查詢字串
    if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
        $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
    else
        $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
    mysqli_close($link); // 關閉資料庫連結
}
if($num > 1){
    foreach ($arr_delbid as &$Value) {
        include "link.php";
        $sql = "DELETE FROM `order_inf` WHERE `member_id` = $uid AND `order_state` = 0 AND `order_num` = $Value"; // 指定SQL查詢字串
        if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
            $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
        else
            $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";

        $sql = "UPDATE `order_content` SET `order_num` = $bid WHERE `order_num` = $Value"; // 指定SQL查詢字串
        if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
            $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
        else
            $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
        mysqli_close($link); // 關閉資料庫連結
        
    }
}

?>
<?php
include "link.php";
$rows= "";
$nums = 0;
$total = 0;
$today = date("YmdHis"); 
$hour = date("G");   // 時，例如 15
$minute = date("i"); // 分，例如 48
$second = date("s"); // 秒，例如 54
$timestamp=$today.$hour.$minute.$second;
if ($result = mysqli_query($link, "SELECT * FROM order_content a, item_list b WHERE a.item_id = b.item_id AND a.order_num = $bid")) {
    while ($row = mysqli_fetch_row($result)) {
        $price=  floor($row[8]*$row[9]);
        $img = $row[7]."?t=".$timestamp;
        $amount = $row[3];
        $ptl = $price*$amount;
        $total+=$ptl;
        $item_id=$row[4];
        $item_name=$row[6];
        $nums += $row[3];
        $chk = "";
        if($sid == $item_id)
            $chk = "checked = 'checked'";
        $rows .= '<tr><th scope="row"><input class="form-check-input flex-shrink-0" type="checkbox" '.$chk.' id = "buyList' . $item_id . '" name = "buyList[]" value="' . $item_id . '" style="font-size: 1.375em;"></th><td><a href="./detail.php?pid=' . $item_id . '"><img src="./images/item/' . $img . '" height="120" width="120"></a></td><td>' . $item_name . '</td><td>$' . $price . '<input type="hidden" id="item_price'. $item_id .'" value="' . $price . '"></td><td><input style = "width: 3em" type="number" min="1" name = "buy_value' . $item_id . '" id = "buy_value' . $item_id . '" value="' . $amount . '"> 個</td><td>$<span id = "buy_price_ptl' . $item_id . '">' . $ptl . '</span><input type="hidden" id = "buy_price' . $item_id . '" value="' . $ptl . '"></td><td><button type="button" class="btn btn-danger btn-xs" name="del' . $item_id . '">移除</button></td></tr>';
    }
    $num = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}

mysqli_close($link); // 關閉資料庫連結
?>
<div class="container my-5" >
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <form id="form_cart" action="./cart_tobill.php" method="post">
            <input type="hidden" name="bidno" value="<?php echo $bid ?>">
            <div class=" p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1">購物車</h1>
                <p class="lead"> </p>
                <?php if($num==0) echo "您的購物車為空"; ?>

                <div class="text-center">

                    <div class="table-md table-hover table-bordered scrollarea" style="padding: 3%;">
                        <div class="bd-example">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"></th>
                                        <th scope="col">商品名稱</th>
                                        <th scope="col">單位價格</th>
                                        <th scope="col">購買數量</th>
                                        <th scope="col">購買價格</th>
                                        <th scope="col">移除</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo $rows; ?>
                                    <!-- 
                                '<tr><th scope="row"><input class="form-check-input flex-shrink-0" type="checkbox" value="" style="font-size: 1.375em;"></th><td><img src="./images/'
                                '" height="120" width="120"></td><td>'
                                Transcend 創見】32GB JetRam DDR4 3200 桌上型記憶體 (JM3200HLE-32G)
                                '</td><td>$'
                                3388
                                '</td><td><input type="text" id="buy_value" value="1" size="2"> 個</td><td>$'
                                    3388
                                '</td><td><button type="button" class="btn btn-danger btn-xs" data-placement="right"title="移除">移除</button></td></tr>'

                             -->
                                    <!-- <tr>
                                <th scope="row">
                                    <input class="form-check-input flex-shrink-0" type="checkbox" value=""
                                        style="font-size: 1.375em;">
                                </th>
                                <td><a href="./detial.php?pid="><img src="./images/product_jetram.jpg" height="120" width="120"></a></td>
                                <td>【Transcend 創見】32GB JetRam DDR4 3200 桌上型記憶體 (JM3200HLE-32G)</td>
                                <td>$3388</td>
                                <td><input type="text" id="buy_value" value="1" size="2"> 個</td>
                                <td>$3388</td>
                                <td><button type="button" class="btn btn-danger btn-xs" data-placement="right"
                                        title="移除">移除</button>
                                </td>

                            </tr> -->
                                    <tr>
                                        <!-- <th scope="row">總計</th>
                                        <td colspan="3"><?php echo $num ?> 項商品</td>
                                        <td colspan="1"><?php echo $nums ?> 個商品</td>
                                        <td colspan="1">$<?php echo $total ?></td>
                                        <td colspan="1"></td> -->
                                        <th scope="row">總計</th>
                                        <td colspan="3"><span id="sum0"></span> 項商品</td>
                                        <td colspan="1"><span id="sum1"></span> 個商品</td>
                                        <td colspan="1">$<span id="sum2"></span></td>
                                        <td colspan="1"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-5 my-5 text-center">
                    <h2>訂單資訊</h2>
                    <div class="form-floating mb-3">
                        <input class="form-control" required="required" type="text" id="bname" name="bname" size="20"
                            value="<?php echo $name ?>" placeholder="www">
                        <label for="floatingInput">收件人<label for="bname" class="error"></label></label>
                        <span id="show_msg" style="color:red"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" required="required" type="text" name="loc" id="loc" size="20" value="<?php echo $loc ?>"
                            placeholder="loc">
                        <label for="floatingInput">收件地址<label for="loc" class="error"></label></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control"  required="required"  type="text" name="tel" id="tel" size="20" value="<?php echo $tel ?>"
                            placeholder="tel">
                        <label for="floatingInput">收件人電話<label for="tel" class="error"></label></label>
                    </div>

                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        
                        
                        <?php if($num != 0) echo '<button class="btn btn-primary btn-lg px-4 gap-3" type="submit">下單</button><a href="./cart_clean.php?bid= ' . $bid . '" class="btn btn-outline-secondary btn-lg px-4">清空購物車</a>'?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!---內容加在裡面-->
<?php
include "template_buttom.php";
?>