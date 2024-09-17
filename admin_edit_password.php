<?php
session_start();
include "level/level_a.php";

$head = <<<EOT
<!---head 內容加在裡面-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
<script src="./js/form/editinf.js"></script>
<link href="./css/form/error.css" rel="stylesheet">
<!---head 內容加在裡面-->
EOT;
include "template_top.php";

?>
<!---內容加在裡面-->

<div class="col-md-10 mx-auto col-lg-5">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">

            <form class="p-4 p-md-5 border rounded-3 bg-light" name="form1" id="form1" action="" method="POST">
                <!---
            <table>
                    
                    ===帳號    限6-12個字
                    密碼    限6-12個字
                    密碼確認    請再次輸入密碼
                    姓名
                    暱稱   
                    ===性別    男性    女性
                    ===生日    例:1999/09/01
                    電話號碼
                    地址
                    電子郵件
                    ===同意會員合約  readonly="readonly"
    
                    資料送出
                    重新填寫
                
                    <h6 class=" fw-bold">修改會員資料</h6>

                    <tr>
                        <td class="c_title">密碼</td>
                        <td class="c_content">
                        <input class="form-control" type="password" name="passwd" id="passwd" size="20" placeholder="限2-12個字">
            <label for="floatingInput">密碼<label for="passwd" class="error"></label></label>
                        </td>
                    </tr>
                    <tr>
                        <td class="c_title">密碼確認</td>
                        <td class="c_content">
                        <input class="form-control" type="password" name="passwd2" id="passwd2" size="20" placeholder="限2-12個字">
            <label for="floatingInput">再次輸入密碼<label for="passwd2" class="error"></label></label>
                        </td>
                    </tr>
                    <tr>
                        <td class="c_title">姓名</td>
                        <td class="c_content">
                            <input type="text" name="name" size="20">
                        </td>
                    </tr>
                    <tr>
                        <td class="c_title">電話號碼</td>
                        <td class="c_content">
                            <input type="tel" name="tel" size="20">
                        </td>
                    </tr>
                    <tr>
                        <td class="c_title">地址</td>
                        <td class="c_content">
                            <input type="text" name="loc" size="20">
                        </td>
                    </tr>
                    <tr>
                        <td class="c_title">電子郵件</td>
                        <td class="c_content">
                            <input type="email" name="email" size="20">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="c_content" style="text-align: center;">
                            <input class="c_button" type="submit" size="20" value="資料送出">
                            <input class="c_button" type="reset" size="20" value="重新填寫">

                        </td>
                    </tr>
                </table>
                -->
                <h6 class=" fw-bold">修改密碼</h6>
                <div class="form-floating mb-3">
                    <input class="form-control" type="password" name="passwd" id="passwd" size="20"
                        placeholder="限2-12個字">
                    <label for="floatingInput">密碼<label for="passwd" class="error"></label></label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="password" name="passwd2" id="passwd2" size="20"
                        placeholder="限2-12個字">
                    <label for="floatingInput">再次輸入密碼<label for="passwd2" class="error"></label></label>
                </div>

                <button class="btn btn-primary btn-lg px-4 me-md-2" type="submit">送出</button>
                <a href="./admin.php" class="btn btn-warning btn-lg px-4">取消</a>
            </form>

        </div>
    </div>
</div>
<?php if(isset($_POST['passwd'])&&isset($_POST['passwd2'])){ 
    $memberid = $_SESSION['userid'];
    $user_password = $_POST['passwd'];
    include "link.php";
        echo "<script> alert('密碼修改成功!!'); </script>";
        $sql_1 ="UPDATE `member` SET `member_ password`='" . $user_password . "' WHERE `member_id`='" . $memberid . "'";
            if ($result = mysqli_query($link, $sql_1)) // 送出查詢的SQL指令
            $msg = "<span style='color:#0000FF'>資料更新成功!</span>";
                else
            $msg = "<span style='color:#FF0000'>資料更新失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
    mysqli_close($link); // 關閉資料庫連結
    $url = "member.php";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
}
 ?>
<!---內容加在裡面-->
<?php
include "template_buttom.php";
?>