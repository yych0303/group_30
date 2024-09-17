<?php
session_start();
include "level/level_0.php";

$head = <<<EOT
<!-- form -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
<script src="./js/form/forget.js"></script>
<link href="./css/form/error.css" rel="stylesheet">
<script src="./js/forget.js"></script>
<!-- form -->

			
EOT;
include "template_top.php";
?>

<!---內容加在裡面-->
<div class="col-md-10 mx-auto col-lg-5">
    <form class="p-4 p-md-5 border rounded-3 bg-light" role="form1" name="form1" id="form1" action="" method="POST">
        忘記密碼
        <div class="form-floating mb-3">

            <input class="form-control" type="text" name="userid" id="userid" size="20" placeholder="userid">
            <label for="floatingInput">帳號<label for="userid" class="error"></label></label>
            <span id="show_msg" style="color:red"></span>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="tel" size="20" placeholder="tel">
            <label for="floatingInput">電話號碼<label for="tel" class="error"></label></label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="email" name="email" size="20" placeholder="email">
            <label for="floatingInput">電子郵件<label for="email" class="error"></label></label>
        </div>
        <button class="btn btn-primary btn-lg px-4 me-md-2" type="submit">送出</button>
        <button class="btn btn-outline-secondary btn-lg px-4" type="reset">清除</button>
        <hr class="my-4">
        <small>
            <a href="./login.php" class="c_button">登入會員</a>
            <a href="./signup.php" class="c_button">加入會員</a>
        </small>
    </form>
</div>
<!---內容加在裡面-->
<?php if(isset($_POST['email'])&&isset($_POST['userid'])&&isset($_POST['tel'])){ 
    $user_account = $_POST['userid'];
    $user_phone = $_POST['tel'];
    $user_email = $_POST['email'];
    include "link.php";
    $sql_account = "";
    $sql_phone = "";
    $sql_email="";
    $sql = "SELECT * FROM member where member_account='$user_account' "; //SQL新增資料
    if ($result = mysqli_query($link, $sql)){
        while ($row = mysqli_fetch_row($result)) {   
        $sql_account = $row[2];
        $sql_phone = $row[7];
        $sql_email=$row[9];
    }
        if($sql_account==$user_account && $sql_phone ==$user_phone && $user_email== $sql_email){
            $bytes = openssl_random_pseudo_bytes(4);
            $pass = bin2hex($bytes);
            echo "<script> alert('密碼重製成功!! \\n 您的新密碼為" . $pass . " \\n 若要修改請登入後至會員中心修改'); </script>";
            $sql_1 ="UPDATE `member` SET `member_ password`='" . $pass . "' WHERE `member_account`='" . $user_account . "'";
            if ($result = mysqli_query($link, $sql_1)) // 送出查詢的SQL指令
            $msg = "<span style='color:#0000FF'>資料更新成功!</span>";
                else
            $msg = "<span style='color:#FF0000'>資料更新失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
            $url = "login.php";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";
        }else{
            echo "<script> alert('會員資料輸入錯誤!!'); </script>";
        }
    } // 送出查詢的SQL指令
    else{
        $msg = "<span style='color:#FF0000'>資料查詢失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";//測試用
    }


    mysqli_close($link); // 關閉資料庫連結
} ?>

<?php
include "template_buttom.php";

?>