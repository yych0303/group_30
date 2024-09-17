<?php
session_start();
include "level/level_a.php";//0/1/m/a

$head = <<<EOT
<!-- form -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
<script src="./js/form/signup.js"></script>
<link href="./css/form/error.css" rel="stylesheet">
<!-- form -->
<script src="./js/add_admin.js"></script>			
EOT;
include "template_top.php";
?>

<!---內容加在裡面-->
<div class="col-md-10 mx-auto col-lg-5">
    <!--
        帳號    限6-12個字
        密碼    限6-12個字
        密碼確認    請再次輸入密碼
        姓名
        XXXXXXXXXXXX暱稱   
        性別    男性    女性
        生日    例:1999/09/01
        電話號碼
        地址
        電子郵件
        同意會員合約  readonly="readonly"

        資料送出
        重新填寫
    -->
    <form class="p-4 p-md-5 border rounded-3 bg-light" role="form1" name="form1" id="form1" action="" method="POST">
        <h3>新增管理員</h3>
        <div class="form-floating mb-3">
            <input class="form-control" type="text" id="userid" name="userid" size="20" placeholder="userid">
            <label for="floatingInput">管理員帳號<label for="userid" class="error"></label></label>
            <span id="show_msg" style="color:red"></span>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="password" name="passwd" id="passwd" size="20" placeholder="限2-12個字">
            <label for="floatingInput">管理員密碼<label for="passwd" class="error"></label></label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="password" name="passwd2" id="passwd2" size="20" placeholder="限2-12個字">
            <label for="floatingInput">再次輸入管理員密碼<label for="passwd2" class="error"></label></label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="name" size="20" placeholder="name">
            <label for="floatingInput">管理員姓名<label for="name" class="error"></label></label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="email" name="email" size="100" placeholder="email">
            <label for="floatingInput">管理員電子郵件<label for="email" class="error"></label></label>
        </div>

        <button class="btn btn-primary btn-lg px-4 me-md-2" type="submit">送出</button>
        <button class="btn btn-outline-secondary btn-lg px-4" type="reset">清除</button>　
        <a href="./admin.php" class="btn btn-warning btn-lg px-4">取消</a>
    </form>
</div>
<!---內容加在裡面-->
<?php if(isset($_POST['name'])){ 
    $user_lever = 9;
    $user_account = $_POST['userid'];
    $user_password = $_POST['passwd'];
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    include "link.php";
    $sql = "insert into member values('','$user_lever','$user_account','$user_password','$user_name','$user_sex','$user_birthday','$user_phone','$user_address','$user_email')"; //SQL新增資料
    if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
        $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
    else
        $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
    mysqli_close($link); // 關閉資料庫連結
    $url = "admin.php";
echo "<script type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>"; 
} ?>
<?php
include "template_buttom.php";

?>