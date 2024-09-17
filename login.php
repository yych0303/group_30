<?php
session_start();
include "link.php";
if (isset($_POST['userid']) && isset($_POST['passwd'])) {
    $rows= "";
    $_SESSION['level']=0;
    $check=0;
    if ($result = mysqli_query($link, "SELECT `member_id`,`member_account`,`member_ password`,`member_name`,`member_level` FROM `member`")) {
        while ($row = mysqli_fetch_row($result)) {
            $memberid= $row[0];
            $account = $row[1];
            $password = $row[2];
            $name = $row[3];
            $lever = (int) $row[4];
            if($account==$_POST['userid'] && $_POST['passwd'] == $password){
                $_SESSION['userid'] = $memberid;
                $_SESSION['level'] = (int) $lever; 
                $_SESSION['name'] = $name; 
                $check=1;
                break;
            }else if($account==$_POST['userid'] && $_POST['passwd'] != $password){
                echo "<script> alert('密碼輸入錯誤'); </script>";
                $check=1;
                break;
            }
        }
        if($check == 0){
            echo "<script> alert('無此帳號'); </script>";
        }
        if($check == 1){
            if( $_SESSION['level']==9){
                echo "<script> alert('管理者：" .  $_SESSION['name'] ."　登入成功 \\n 2秒後為您跳轉到首頁'); </script>";
                header("Refresh:2;url=index.php");
            }
            if( $_SESSION['level']==2){
                echo "<script> alert('會員：" .  $_SESSION['name'] ."　登入成功 \\n 2秒後為您跳轉到首頁'); </script>";
                header("Refresh:2;url=index.php");
            }
        }
        $num = mysqli_num_rows($result); //查詢結果筆數
        mysqli_free_result($result); // 釋放佔用的記憶體
    }
    mysqli_close($link); // 關閉資料庫連結
}
$head = <<<EOT
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
            <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
            <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
            <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
            <script src="./js/form/login.js"></script>
            <link href="./css/form/error.css" rel="stylesheet">
			
EOT;
include "template_top.php";
?>

<!---內容加在裡面-->
<div class="col-md-10 mx-auto col-lg-5">
    <form class="p-4 p-md-5 border rounded-3 bg-light" role="form001" name="form001" id="form001" action="./login.php" method="POST">
        登入
        <div class="form-floating mb-3">

            <input class="form-control" type="text" name="userid" size="20" placeholder="userid">
            <label for="floatingInput">帳號<label for="userid" class="error"></label></label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="password" name="passwd" id="passwd" size="20" placeholder="限2-12個字">
            <label for="floatingInput">密碼<label for="passwd" class="error"></label></label>
        </div>
        <button class="btn btn-primary btn-lg px-4 me-md-2" type="submit">登入</button>
        <button class="btn btn-outline-secondary btn-lg px-4" type="reset">清除</button>
        <hr class="my-4">
        <small>
            <a href="./forget.php" class="c_button">忘記密碼</a>
            <a href="./signup.php" class="c_button">加入會員</a>
        </small>
    </form>

</div>
<!---內容加在裡面-->


<?php
include "template_buttom.php";

?>