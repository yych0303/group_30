<?php
session_start();
include "level/level_m.php";

$head = <<<EOT
<!---head 內容加在裡面-->

<!---head 內容加在裡面-->
EOT;
include "template_top.php";

?>
<?php
$uid = $_SESSION['userid'];
$Rows= "";
$today = date("YmdHis"); 
$hour = date("G");   // 時，例如 15
$minute = date("i"); // 分，例如 48
$second = date("s"); // 秒，例如 54
$timestamp=$today.$hour.$minute.$second;
$arraybid = array();
include "link.php";
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM `order_inf` WHERE `member_id` = $uid AND `order_state` NOT IN (5,0,-1,-7);")) {
    while ($Row = mysqli_fetch_row($result)) {
        $arraybid[] = $Row[2];
    }
    $Num = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}

mysqli_close($link); // 關閉資料庫連結
foreach ($arraybid as &$value) {
    $bill_id = $value;
    include "bill_sta.php";
    include "link.php";
    if ($result = mysqli_query($link, "SELECT * FROM `item_list` a, `order_content` b WHERE a.item_id = b.item_id AND b.order_num = $value;")) {
        if ($row = mysqli_fetch_row($result)) {
            $pic = $row[3]."?t=".$timestamp;
        }
        mysqli_free_result($result); // 釋放佔用的記憶體
    }
    mysqli_close($link); // 關閉資料庫連結
    $Rows.="<a href='./bill.php?bid=$bill_id' class='list-group-item list-group-item-action d-flex gap-3 py-3' aria-current='true'><img src='./images/item/$pic' alt='twbs' width='32' height='32' class='rounded-circle flex-shrink-0'><div class='d-flex gap-2 w-100 justify-content-between'><div><h6 class='mb-0'>共 $nums 個商品， $total 元</h6><p class='mb-0 opacity-75'>$sta</p></div><small class='opacity-50 text-nowrap'>$date</small></div></a>";                  
}


$Rows2= "";
$arraybid = array();
include "link.php";
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM `order_inf` WHERE `member_id` = $uid AND `order_state` IN (5,-1,-7);")) {
    while ($Row = mysqli_fetch_row($result)) {
        $arraybid[] = $Row[2];
    }
    $Num2 = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}

mysqli_close($link); // 關閉資料庫連結
foreach ($arraybid as &$value) {
    $bill_id = $value;
    include "bill_sta.php";
    include "link.php";
    if ($result = mysqli_query($link, "SELECT * FROM `item_list` a, `order_content` b WHERE a.item_id = b.item_id AND b.order_num = $value;")) {
        if ($row = mysqli_fetch_row($result)) {
            $pic = $row[3]."?t=".$timestamp;
        }
        mysqli_free_result($result); // 釋放佔用的記憶體
    }
    mysqli_close($link); // 關閉資料庫連結
    $Rows2.="<a href='./bill.php?bid=$bill_id' class='list-group-item list-group-item-action d-flex gap-3 py-3' aria-current='true'><img src='./images/item/$pic' alt='twbs' width='32' height='32' class='rounded-circle flex-shrink-0'><div class='d-flex gap-2 w-100 justify-content-between'><div><h6 class='mb-0'>共 $nums 個商品， $total 元</h6><p class='mb-0 opacity-75'>$sta</p></div><small class='opacity-50 text-nowrap'>$date</small></div></a>";                  
}

?>
<!---內容加在裡面-->
<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1">會員專區</h1>
            <p class="lead"><?php echo $_SESSION["name"] ?></p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                <a href="./member_edit_password.php" class="btn btn-warning btn-lg px-4 me-md-2 fw-bold">修改密碼</a>
                <a href="./member_edit.php" class="btn btn-warning btn-lg px-4 me-md-2 fw-bold">修改會員資料</a>
                <a href="./logout.php" class="btn btn-outline-secondary btn-lg px-4">登出</a>
            </div>
        </div>
        <div class="col-lg-3 offset-lg-1 p-0 overflow-hidden shadow-lg">

        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1">訂單</h1>
            <p class="lead">共<?php echo $Num ?>+<?php echo $Num2 ?>筆記錄 </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">

                <div class="list-group w-75">
                    <h2>處理中</h2>
                    <?php echo $Rows; ?>
                </div>
                <div class="list-group w-75">
                    <h2>其他訂單</h2>
                    <?php echo $Rows2; ?>
                </div>
            </div>

        </div>
        <div class="col-lg-3 offset-lg-1 p-0 overflow-hidden shadow-lg">

        </div>
    </div>
</div>

<!---內容加在裡面-->
<?php
include "template_buttom.php";
?>