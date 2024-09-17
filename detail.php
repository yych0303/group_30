<?php
session_start();
include "level/level_0.php";

$head = <<<EOT
<!---head 內容加在裡面-->
<!---head 內容加在裡面-->
EOT;

include "template_top.php";
?>
<?php
if (!isset($_COOKIE["history"])) {
    //$_COOKIE['history'] = Array();
    setcookie("history", "", time()+13600); //設定Cookie變數
    $arr = Array();
}
else{
    $arr = explode(",",$_COOKIE["history"]."");
}
//session_start();
$id = $_GET['pid'];//商品ID
//若商品未在購物車中,則加入購物車(陣列)
if (!in_array($id,$arr)){
    array_unshift($arr, $id);
    //$arr[]=$id;//加入陣列
}
else{
    if (($key = array_search($id, $arr)) !== false) { // 單值的寫法
        unset($arr[$key]);
    }
    array_unshift($arr, $id);
}
setcookie("history", implode(",", $arr), time()+13600); //設定Cookie變數
?>





<?php
include "link.php";
$rows= "";
$today = date("YmdHis"); 
$hour = date("G");   // 時，例如 15
$minute = date("i"); // 分，例如 48
$second = date("s"); // 秒，例如 54
$timestamp=$today.$hour.$minute.$second;
//echo $_GET['pid'];
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM `item_list` WHERE `item_id` = " . $_GET['pid'] . "")) {
    while ($row = mysqli_fetch_row($result)) {
        $name = $row[2];
        $title = $row[7];
        $price = floor($row[4]*$row[5]);
        $it_state = $row[6];
        $pic = $row[3]."?t=".$timestamp;
        $text = $row[8];

        //$rows .= "<div class='product '><img src='./images/item/$row[3]" . "' height='200' width='200'><br><span>" . $row[2] . "</span><br><div class='colorred'>打折價:<s>8888</s>" . $row[4] . "<div class='btn-group'><button type='button' class='btn btn-sm btn-outline-secondary'>加入購物車</button><a href='detail.php?pid=" . $row[0] . "'><button type='button' class='btn btn-sm btn-outline-secondary'>查看詳情</button></a><button type='button' class='btn btn-sm btn-outline-secondary'>直接購買</button></div></div></div>";
    }
    $num = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}

mysqli_close($link); // 關閉資料庫連結

?>

<!---內容加在裡面-->
<section id="intro">
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="text-align:center">
                    <img src="./images/item/<?php echo $pic ?>" width="600">
                    <h3><?php echo $name ?></h3>
                </div>
                <div class="col-md-6">
                    <div>
                        <h2 style="line-height: 2"><?php echo $title ?></h2>
                        <h4 style="line-height: 2">
                            <!-- 商品介紹 -->
                            <pre>
<?php echo $text ?>
                            </pre>
                        </h4>
                    </div>
                    <div>
                        <?php if($it_state == 9){ echo "<h2 class='colorred'><b>商品已下架</b></h2>"; ?>
                        <?php } else if($it_state == 3){ echo "<h2 class='colorred'><b>商品缺貨中</b></h2>"; ?>
                        <?php } else if(isset($_SESSION["level"]))if($_SESSION["level"] == 2){ ?>
                        <span>購買數量</span>
                        <input style = "width: 3em" class="amount" type="number" min="1" value="1">
                        <button type='button' class='btn addcart btn-primary' data-id=<?php echo $id ?>>加入購物車</button>
                        <?php } ?>
                    </div>
                </div>
            </div>







           
        </div>
    </div>
</section>
<!---內容加在裡面-->
<?php
include "template_buttom.php";
?>