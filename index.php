<?php
session_start();
include "level/level_0.php";

$head = <<<EOT
		
EOT;
include "template_top.php";
?>
<?php
include "link.php";
$rows= "";
$today = date("YmdHis"); 
$hour = date("G");   // 時，例如 15
$minute = date("i"); // 分，例如 48
$second = date("s"); // 秒，例如 54
$timestamp=$today.$hour.$minute.$second;
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT a.* , SUM(`item_ amount`) FROM `item_list` a, `order_content` b WHERE a.item_id = b.item_id AND a.item_state != 9 GROUP BY b.item_id ORDER BY SUM(`item_ amount`) DESC")) {
    $t=0;   
    while ($row = mysqli_fetch_row($result)) {
        $t+=1;
        if($t>12)//放八個熱銷
            break;
        $it_id = $row[0];
        $it_img = $row[3];
        $it_name = $row[2];
        $it_sprice = $row[4];
        $it_price = floor($row[4]*$row[5]);
        $amount = $row[9];
        $it_state = $row[6];
        include("item_frame.php");
        $rows.= $it_info . "<h6>已售出" . $amount . "</h6>" . $it_btns;
    }
    $num = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}

mysqli_close($link); // 關閉資料庫連結
?>
<?php
$rows2= "";
//session_start();
if (!isset($_COOKIE['history'])) {
    $rows2= "";
}
else{
    $arr_his = explode(",",$_COOKIE["history"]."");

    include "link.php";
    $rows2= "";
    $t=0;
    foreach ($arr_his as &$value) {
        // // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
        if ($result = mysqli_query($link, "SELECT * FROM `item_list` WHERE item_id  = $value AND item_state != 9 ")) {
            if ($row = mysqli_fetch_row($result)) {
                $it_id = $row[0];
                $it_img = $row[3];
                $it_name = $row[2];
                $it_sprice = $row[4];
                $it_price = floor($row[4]*$row[5]);
                $it_state = $row[6];
                include("item_frame.php");
                $rows2.= $it_info . $it_btns;
            }
            mysqli_free_result($result); // 釋放佔用的記憶體
        }
        $t+=1;
        if($t>5 )//放八個熱銷
            break; 
    }
    mysqli_close($link); // 關閉資料庫連結
}/* 
//若商品未在購物車中,則加入購物車(陣列)
if (!in_array($id,$_SESSION['history'])){
   $_SESSION['history'][]=$id;//加入陣列
} */

$rows3= "";
include "link.php";
$arr_state = array('0' => '啟用中', '2' => '未啟用');
if ($result = mysqli_query($link, "SELECT * FROM index_image WHERE `state`='0'")) {
      while ($row = mysqli_fetch_assoc($result)) {
        $today = date("YmdHis"); 
        $hour = date("G");   // 時，例如 15
        $minute = date("i"); // 分，例如 48
        $second = date("s"); // 秒，例如 54
        $timestamp=$today.$hour.$minute.$second;
        $rows3 .="<div><img src='./images/index/" . $row["path"]  . "?t=" . $timestamp . "' height='350' width='800'></div>";
      }
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
		

?>



<!---內容加在裡面-->

<div>
    <!---  輪播圖  --->
    <div>
        <section class="regular slider">
            <?php echo $rows3 ?>
        </section>
    </div>
</div>
<div class="webdital">

    <div class="today_hot">
        <h2 class="topic">今日熱銷</h2>
        <div class="show1">
            <?php echo $rows; ?>


        </div>
    </div>

    <div class="lastview">
        <h2 class="topic">最近瀏覽</h2>
        <div class="show1">
            <?php echo $rows2; ?>

        </div>
    </div>
</div>
<!---內容加在裡面-->


<?php
include "template_buttom.php";

?>