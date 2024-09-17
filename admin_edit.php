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
<?php
$member_id = $_SESSION['userid'];
include "link.php";
// 送出查詢的SQL指令
$row="";
if ( $result = mysqli_query($link, "SELECT * FROM member where member_id='$member_id' ") ) {
    while ($row = mysqli_fetch_row($result)) {
        $name = $row[4];
        $email = $row[9]; 
    }

    mysqli_free_result($result); // 釋放佔用的記憶體
}
?>
<div class="col-md-10 mx-auto col-lg-5">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" name="form1" id="form1" action="" method="POST">
                <h6 class=" fw-bold">修改管理員資料</h6>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="name" size="20" placeholder="name" value="<?php echo $name ?>">
                    <label for="floatingInput">姓名<label for="name" class="error"></label></label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="email" name="email" size="100" placeholder="email" value="<?php echo $email ?>">
                    <label for="floatingInput">電子郵件<label for="email" class="error"></label></label>
                </div>
                <button class="btn btn-primary btn-lg px-4 me-md-2" type="submit">送出</button>
                <a href="./admin.php" class="btn btn-warning btn-lg px-4">取消</a>
            </form>

        </div>
    </div>
</div>
<?php if(isset($_POST['name'])&&isset($_POST['email'])){ 
    $memberid = $_SESSION['userid'];
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    include "link.php";
    echo "<script> alert('管理員資料修改成功!!'); </script>";
    $sql_1 ="UPDATE `member` SET `member_name`='" . $user_name . "',`member_email`='" . $user_email . "' WHERE `member_id`='" . $memberid . "'";
    echo $sql_1;
        if ($result = mysqli_query($link, $sql_1)) // 送出查詢的SQL指令
        $msg = "<span style='color:#0000FF'>資料更新成功!</span>";
            else
        $msg = "<span style='color:#FF0000'>資料更新失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
mysqli_close($link); // 關閉資料庫連結
$url = "member.php";
echo "<script type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";
} ?>
<!---內容加在裡面-->
<?php
include "template_buttom.php";
?>