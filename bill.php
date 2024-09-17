<?php
session_start();
include "level/level_1.php";

$head = <<<EOT
<!---head 內容加在裡面-->

<!---head 內容加在裡面-->
EOT;
include "template_top.php";

?>
<?php
$bill_id = $_GET["bid"];

include "bill_sta.php";

?>

<!---內容加在裡面-->
<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1">訂單紀錄</h1>

            <div class="p-5 mb-4 bg-light rounded-3 shadow-lg">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold"><?php echo $date ?></h1>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3 ">
                        <div class="list-group w-75">
                            <h2><?php echo $sta; ?></h2>
                            <p class="lead">共<?php echo $num ?>項商品，共<?php echo $nums ?>件商品</p>
                            <!-- <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3"
                                aria-current="true">
                                <img src="./images/product_AMD5950X.jpg" alt="twbs" width="32" height="32"
                                    class="rounded-circle flex-shrink-0">
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                        <h6 class="mb-0">AMD5950X</h6>
                                        <p class="mb-0 opacity-75">12498元</p>
                                    </div>
                                    <small class="opacity-50 text-nowrap">x1</small>
                                </div>
                            </a> -->
                            <!-- 


                            <a href='./detail.php?pid=' class='list-group-item list-group-item-action d-flex gap-3 py-3'
                                aria-current='true'>
                                <img src='./images/item/' alt='twb' width='32' height='32'
                                    class='rounded-circle flex-shrink-0'>
                                <div class='d-flex gap-2 w-100 justify-content-between'>
                                    <div>
                                        <h6 class='mb-0'>AMD5950X</h6>
                                        <p class='mb-0 opacity-75'>12498元</p>
                                    </div>
                                    <small class='opacity-50 text-nowrap'>x1</small>
                                </div>
                            </a>
                             -->

                            <?php echo $rows ?>
                        </div>


                    </div>
                    <p class="col-md-8 fs-4">
                        <!-- 資料 -->
                        總金額:<?php echo $total ?>元
                        <br>
                        訂單成立時間:<?php echo $tim ?>
                        <br>
                        收件人:<?php echo $mname ?>
                        <br>
                        地址: <?php echo $loc ?>
                        <br>
                        電話: <?php echo $tel ?>



                        <!-- 資料 -->
                    </p>
                </div>
            </div>
            <!-- <button class="btn btn-danger btn-lg px-4 me-md-2" type="submit">取消訂單</button> -->
            <?php include("bill_buttons.php"); echo $btns;?>
            
        </div>
        <div class="col-lg-3 offset-lg-1 p-0 overflow-hidden shadow-lg">

        </div>
    </div>
</div>

<!---內容加在裡面-->
<?php
include "template_buttom.php";
?>