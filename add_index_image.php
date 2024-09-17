<?php
session_start();
include "level/level_a.php";


$head = <<<EOT
<!---head 內容加在裡面-->

<!---head 內容加在裡面-->
EOT;

include "template_top.php";

?>

<?php
/*
狀態
0=>啟用中
2=>未啟用

*/

//echo $_GET['pid'];
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
include "link.php";
// 送出查詢的SQL指令
if ( $result = mysqli_query($link, "SELECT MAX(`id`) AS Max FROM index_image") ) {
    $row = mysqli_fetch_assoc($result) ;
    mysqli_free_result($result); // 釋放佔用的記憶體   
}
mysqli_close($link); // 關閉資料庫連結
?>

<div class="col-md-10 mx-auto col-lg-5">
    <div class="p-5 mb-4 bg-light rounded-3">
        <h3 class="display-4 fw-bold lh-1">新增輪撥圖資料</h3>
        <div class="container-fluid py-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" name="form1" id="form1"
                action="" method="POST" enctype='multipart/form-data'>

                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="image_id" id="image_id" readonly="readonly"
                        value="<?php echo ($row["Max"]+1) ?>">
                    <label for="floatingInput">圖片ID</label>
                </div>
                <?php
                date_default_timezone_set("Asia/Taipei");
$today1 = date("Y-m-d");
$today2 = date("H:i:s");
$today12 = $today1."T".$today2;
                ?>
                <div class="form-floating mb-3">
                    <input class="form-control" id="image_start_time" type="datetime-local" step="1"
                        name="image_start_time" value="<?php echo $today12 ?>">
                    <label for="floatingInput">開始時間</label>
                </div>
                <?php
$today3 = date("Y-m-d",strtotime('+1 month'));
$today4 = date("H:i:s");
$today34 = $today3."T".$today4;
                ?>
                <div class="form-floating mb-3">
                    <input class="form-control" id="image_end_time" step="1" type="datetime-local" name="image_end_time"
                        value="<?php echo $today34 ?>">
                    <label for="floatingInput">結束時間</label>
                </div>

                <br>
                <div class="mb-3">
                    <h4>目前狀態</h4>
                    <input type="radio" name="state" value="0">啟用中
                    <input type="radio" name="state" value="2">未啟用
                </div>
                <div class="mb-3">
                    <h4>上傳圖片</h4>
                    <input type='file' accept=".png,.jpg" name="item_photo" id="item_photo">
                </div>
                <button class="btn btn-primary btn-lg px-4 me-md-2" type="submit">送出</button>
                <a href="./shop_set.php" class="btn btn-warning btn-lg px-4">取消</a>
            </form>

        </div>
    </div>

</div>
<?php if(isset($_POST['image_id'])&&isset($_POST['image_start_time'])&&isset($_POST['image_end_time'])&&isset($_POST['state'])){ 
    $id = $_POST['image_id'];
    $starttime= str_replace("T", " ", $_POST['image_start_time']);
    $endtime = str_replace("T", " ", $_POST['image_end_time']);
    $state = $_POST['state'];
    $photo= "i_".$id.".jpg";
    include "link.php";
    $sql = "insert into index_image values('$id','$photo',NOW(),'$state','$starttime','$endtime')"; //SQL新增資料
    echo $sql;
    if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
        $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
    else
        $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
    mysqli_close($link); // 關閉資料庫連結
    move_uploaded_file($_FILES['item_photo']['tmp_name'],"./images/index/i_" . $id . ".jpg");
    $url = "shop_set.php";
echo "<script type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>"; 
} ?>
<?php
include "template_buttom.php";
?>