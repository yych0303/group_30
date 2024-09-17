<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>歡迎光臨打折鋪，只有打折能夠贏過原價</title>


    <link href="./css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="./css/other.css" rel="stylesheet" crossorigin="anonymous">
    <link href="./css/basecss.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="./css/slick.css">
    <link rel="stylesheet" type="text/css" href="./css/slick-theme.css">
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="./js/slick.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/basejs.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/addcart.js" crossorigin="anonymous"></script>
    <?php echo $head ?>
</head>

<body>

    <div class="wrap">
        <div class="header clearfix">
            <div class="">
                <a href="./index.php"><img src="./images/11.png" class="id" width=180px height=120px></a>
            </div>
            <div class="butsgroup clearfix">
<?php
if (isset($_SESSION['userid'])) {
    if($_SESSION['level']==9){
        echo '管理者: ' . $_SESSION["name"];
    }
    if($_SESSION['level']==2){
	    echo '會員: ' . $_SESSION["name"];
    }
}
?>
            <a href="./forum.php"><button class="btn btn-success buts" type="button">折論壇</button></a>
<a href="./products.php"><button class="btn btn-primary buts" type="button">檢視商品</button></a>

                
<?php
if (isset($_SESSION['userid'])) {
    if($_SESSION['level']==9){//admin
        echo '<a href="./admin.php" class="btn btn-warning buts" >管理員中心</a>';
    }
    if($_SESSION['level']==2){//member
        $cnt = 0;
        include "link.php";
        if ($result = mysqli_query($link, "SELECT * FROM order_content a, order_inf b WHERE a.order_num = b.order_num AND b.order_state = 0 AND b.member_id =" . $_SESSION['userid'] . "")) {
            while ($row = mysqli_fetch_row($result)) {
            $cnt += $row[3];
            }
            $ccc = mysqli_num_rows($result); //查詢結果筆數
            mysqli_free_result($result); // 釋放佔用的記憶體
        }
        mysqli_close($link); // 關閉資料庫連結
	    echo '<a href="./member.php"><button class="btn btn-warning buts" type="button">會員中心</button></a><a href="./cart.php" class="btn btn-danger buts" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16"><path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" /></svg></button><span id="cart_cnt" class="badge alert-danger">' . $cnt . '</span></a>';
    }
    echo '<a href="./logout.php" class="btn btn-light buts" >登出</a>';
}
else {
	echo '<a href="./login.php" class="btn btn-primary buts" id="member">會員登入</a><a href="./signup.php" class="btn btn-secondary buts" id="member">加入會員</a>';
}
?>



            </div>
        </div>
    </div>

    <!---內容加在裡面-->