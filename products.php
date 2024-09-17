<?php
session_start();
include "level/level_0.php";

$head = <<<EOT
<!---head 內容加在裡面-->

<!---head 內容加在裡面-->
EOT;

include "template_top.php";
?>

<link rel="stylesheet" type="text/css" href="./css/bootstrap1.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<!-- select -->

<?php
$keyword = " ";
$slct = " item_state != 9  ";
$fl=0;
if (isset($_GET['clct'])){
    $keyword .= $_GET['clct'] . "<br>";
    $slct .= " AND ";
    if($_GET['clct']=="All")$slct .=" 1 ";
    else$slct .= " `item_type` = '" . $_GET['clct'] . "' ";
    if($_GET['clct']=="cpu")$fl = 1;
    if($_GET['clct']=="顯示卡")$fl = 3;
    if($_GET['clct']=="記憶體")$fl = 4;
    if($_GET['clct']=="主機板")$fl = 2;
}
if (isset($_GET['range0'])&&isset($_GET['range1'])){
    $slct .= " AND " . "`item_price` BETWEEN ". $_GET['range0'] . " AND " . $_GET['range1'];
}
if (isset($_GET['search'])){
    $keyword .= $_GET['search'] . "<br>";
    $slct .=  " AND `item_name` LIKE '%" . $_GET['search'] . "%' ";
}
if (isset($_GET['hidden'])){
$f = 1;
for ($i = 0; $i < 5; $i++) {
    if (isset($_GET["price_range$i"])){
        if($f == 1)$slct .= " AND ";
        if($f == 0)$slct .= " OR ";
        $f = 0;
        $slct .= $_GET["price_range$i"];
    }
} 
$f = 1;
for ($i = 0; $i < 20; $i++) {
    if (isset($_GET["com$i"])){
        if($f == 1)$slct .= " AND ";
        if($f == 0)$slct .= " OR ";
        $f = 0;

        $keyword .= $_GET["com$i"] . "<br>";
        $slct .= " `item_name` LIKE '%" .  $_GET["com$i"] . "%' ";
    }
}
if (isset($_GET['order']))$slct .= $_GET['order'];
//echo $slct;
}

?>

<!-- select -->
<?php
include "link.php";
$pperpg = 10;
$page = 1;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
$today = date("YmdHis"); 
$hour = date("G");   // 時，例如 15
$minute = date("i"); // 分，例如 48
$second = date("s"); // 秒，例如 54
$timestamp=$today.$hour.$minute.$second;
$rows= "";
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM `item_list` WHERE " . $slct)) {
    while ($row = mysqli_fetch_row($result)) {
        $cp = 0;
        while ($row = mysqli_fetch_row($result)) {    
            if($pperpg*($page-1) <= $cp &&$cp < $pperpg*$page){
                $it_id = $row[0];
                $it_img = $row[3];
                $it_name = $row[2];
                $it_sprice = $row[4];
                $it_price = floor($row[4]*$row[5]);
                $it_state = $row[6];
                include("item_frame.php");
                $rows.= $it_info . $it_btns;   
            }
            $cp++;
        }
    }
    $num = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}
$pgs = ceil($num/$pperpg);
mysqli_close($link); // 關閉資料庫連結
?>

<!---內容加在裡面-->
<div class="inline">
    <!-- Offcanvas -->

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
        id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">篩選器</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="" method="get" id="formcpu" name="formcpu">
                <div>
                    <h6>
                        <!-- <button class="btn btn-outline-secondary btn-lg px-4" type="submit">送出</button> -->
                        <input name="hidden" type="hidden" value="0">
                        <br>商品種類:<br>
                        <select name="clct">
                            <option value="All" <?php if(($fl-0)==0)echo"selected"; ?>>All</option>
                            <option value="cpu" <?php if(($fl-1)==0)echo"selected"; ?>>CPU</option>
                            <option value="主機板" <?php if(($fl-2)==0)echo"selected"; ?>>主機板</option>
                            <option value="顯示卡" <?php if(($fl-3)==0)echo"selected"; ?>>顯示卡</option>
                            <!-- <option value=" `item_type` = '記憶體' ">記憶體</option> -->
                        </select>


                        <input type="text" name="search" size="20"
                            <?php if(isset($_GET["search"]))echo "value='" . $_GET['search'] . "'" ?>
                            placeholder="search">
                        <br><br> 價格選擇:<br>
                        <!-- <input type="text" name="range0" size="7"
                        <?php if(isset($_GET["range0"]))echo "value='" . $_GET['range0'] . "'" ?>>
                    ~<input type="text" name="range1" size="7"
                        <?php if(isset($_GET["range1"]))echo "value='" . $_GET['range1'] . "'" ?>>
                    <br> -->


                        <input type="checkbox" name="price_range0"
                            <?php if(isset($_GET["price_range0"]))echo "checked" ?>
                            value=" `item_price` BETWEEN 0 AND 1000">價格0~1000元<br>
                        <input type="checkbox" name="price_range1"
                            <?php if(isset($_GET["price_range1"]))echo "checked" ?>
                            value=" `item_price` BETWEEN 1000 AND 3000">價格1000~3000元<br>
                        <input type="checkbox" name="price_range2"
                            <?php if(isset($_GET["price_range2"]))echo "checked" ?>
                            value=" `item_price` BETWEEN 3000 AND 6000">價格3000~6000元<br>
                        <input type="checkbox" name="price_range3"
                            <?php if(isset($_GET["price_range3"]))echo "checked" ?>
                            value=" `item_price` BETWEEN 6000 AND 10000">價格6000~10000元<br>
                        <input type="checkbox" name="price_range4"
                            <?php if(isset($_GET["price_range4"]))echo "checked" ?>
                            value=" `item_price` >= 10000">價格10000元以上<br>



                        <br> 價格排序:<br>
                        <input type="radio" name="order" value=" ORDER BY item_price DESC">由大到小<br>
                        <input type="radio" name="order" value=" ORDER BY item_price ASC">由小到大<br>



                        <br> 廠牌選擇:<br>
                        <span <?php if($fl*($fl-1)!=0)echo"style='display:none'"; ?>>
                            <input type="checkbox" name="com0" value="Intel"
                                <?php if(isset($_GET["com0"]))echo "checked" ?>>Intel<br>
                            <input type="checkbox" name="com1" value="AMD"
                                <?php if(isset($_GET["com1"]))echo "checked" ?>>AMD<br>
                        </span>


                        <span <?php if($fl*($fl-2)!=0)echo"style='display:none'"; ?>>
                            <input type="checkbox" name="com2" value="技嘉"
                                <?php if(isset($_GET["com2"]))echo "checked" ?>>技嘉<br>
                            <input type="checkbox" name="com3" value="映泰"
                                <?php if(isset($_GET["com3"]))echo "checked" ?>>映泰<br>
                            <input type="checkbox" name="com4" value="華碩"
                                <?php if(isset($_GET["com4"]))echo "checked" ?>>華碩 <br>
                            <input type="checkbox" name="com5" value="華擎"
                                <?php if(isset($_GET["com5"]))echo "checked" ?>>華擎<br>
                            <input type="checkbox" name="com6" value="微星"
                                <?php if(isset($_GET["com6"]))echo "checked" ?>>微星<br>
                        </span>

                        <span <?php if($fl*($fl-3)!=0)echo"style='display:none'"; ?>>
                            <input type="checkbox" name="com7" value="pny"
                                <?php if(isset($_GET["com7"]))echo "checked" ?>>必恩威<br>
                            <input type="checkbox" name="com8" value="zotac"
                                <?php if(isset($_GET["com8"]))echo "checked" ?>>索泰<br>
                            <input type="checkbox" name="com9" value="asus"
                                <?php if(isset($_GET["com9"]))echo "checked" ?>>華碩 <br>
                            <input type="checkbox" name="com10" value="技嘉"
                                <?php if(isset($_GET["com10"]))echo "checked" ?>>技嘉<br>
                            <input type="checkbox" name="com11" value="微星"
                                <?php if(isset($_GET["com11"]))echo "checked" ?>>微星<br>
                        </span>



                        <button class="btn btn-outline-secondary btn-lg px-4" type="submit">送出</button>
                    </h6>
                </div>
            </form>
        </div>
    </div>
    <!-- Offcanvas -->


    <div class="pro_sidebar" style="width:100px">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
            aria-controls="offcanvasScrolling">篩選器</button>
        <br><br>關鍵字:<br>
        <h6><?php echo $keyword ?></h6>
    </div>

    <div class="showcontiner" style="padding:0; margin-left:100px; margin-right:0px">

        <div class="">
            <?php if($num==0) echo "查無商品";else echo "共" . $num . "項商品" ?>
            <br>
            <?php echo $rows; ?>
            <!-- <div class="product ">
                <img src="./images/product_Kingston FURY Beast.jpg" height="200" width="200"><br>
                <span>Kingston FURY Beast</span><br>
                <div class="colorred">打折價:<s>8888</s>　7888
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">加入購物車</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">查看詳情</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">直接購買</button>
                    </div>
                </div>
            </div> -->




            <!-- "<div class='product '><img src='./images/item/"
            
            
            
            "' height='200' width='200'><br><span>"

            "</span><br><div class='colorred'>打折價:<s>8888</s>"　
            "<div class='btn-group'><button type='button' class='btn btn-sm btn-outline-secondary'>加入購物車</button><button type='button' class='btn btn-sm btn-outline-secondary'>查看詳情</button><button type='button' class='btn btn-sm btn-outline-secondary'>直接購買</button></div></div></div>"
            
            -->
            <br>
            <div class="d-flex justify-content-center">
                <div class="btn-group me-2" role="group" aria-label="First group">
                    <!-- <a href= "./products_page.php?<?php echo $_SERVER['QUERY_STRING']; ?>&npage=1" type="button" class="btn btn-secondary">1</a>
                    <a href= "./products_page.php?<?php echo $_SERVER['QUERY_STRING']; ?>&npage=2" type="button" class="btn btn-secondary">2</a> -->
                    <?php 
                    for ($i=1; $i <= $pgs; $i++) { 
                        echo '<a href= "./products_page.php?'.$_SERVER['QUERY_STRING'].'&npage=' . $i . '" type="button" class="btn btn-secondary">' . $i . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>



<!---內容加在裡面-->
<?php
include "template_buttom.php";
?>