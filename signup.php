<?php
//level 0
session_start();
$head = <<<EOT
<!-- form -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
<script src="./js/form/signup.js"></script>
<link href="./css/form/error.css" rel="stylesheet">
<!-- form -->
<script src="./js/signup.js"></script>
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
        註冊會員
        <div class="form-floating mb-3">
            <input class="form-control" type="text" id="userid" name="userid" size="20" placeholder="userid">
            <label for="floatingInput">帳號<label for="userid" class="error"></label></label>
            <span id="show_msg" style="color:red"></span>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="password" name="passwd" id="passwd" size="20" placeholder="限2-12個字">
            <label for="floatingInput">密碼<label for="passwd" class="error"></label></label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="password" name="passwd2" id="passwd2" size="20" placeholder="限2-12個字">
            <label for="floatingInput">再次輸入密碼<label for="passwd2" class="error"></label></label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="name" size="20" placeholder="name">
            <label for="floatingInput">姓名<label for="name" class="error"></label></label>
        </div>
        <div class="form-floating mb-3">
            <h5 class="mb-3">性別<label for="sex" class="error"></label></h5>
            <input type="radio" name="sex" value="1">男生
            <input type="radio" name="sex" value="0">女生
        </div>
        <div class="form-floating mb-3">
            <h5 class="mb-3">生日<label for="birth" class="error"></label></h5>
            <!-- <input type="text" name="birth" size="20" maxlength="10" placeholder="例:1999/09/01"> -->
            <input type="date" name="birth" require>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="tel" name="tel" size="20" placeholder="tel">
            <label for="floatingInput">電話號碼<label for="tel" class="error"></label></label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="loc" size="20" placeholder="loc">
            <label for="floatingInput">地址<label for="loc" class="error"></label></label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="email" name="email" size="100" placeholder="email">
            <label for="floatingInput">電子郵件<label for="email" class="error"></label></label>
        </div>
        <div class="form-floating mb-3">
            <h5 class="mb-3">會員合約<label for="check" class="error"></label></h5>
            <textarea name="content" id="agm" rows="8" cols="80"
                readonly="readonly">親愛的會員您好，非常感謝您使用本公司服務（以下稱本服務），本公司將根據以下之會員服務條款(以下簡稱本條款)，提供會員便利的交易。為了保障您的權益，請務必詳讀本條款，在您註冊成為本公司會員、或開始使用本服務時，即視為您已經閱讀、瞭解並同意接受本條款及「隱私權保護政策」之所有內容，並視為您已確認詳閱並同意個人資料保護告知暨同意事項。如您不同意本條款之全部或部分內容，請勿註冊，並請立即停止使用本服務。
本條款之具體約定內容如後：
一、會員資料 01._在您使用本服務之前，必須提供正確個人資料，並加入成為本公司會員，無須支付任何費用；在加入完成後，始得登入本公司網站，使用本服務及參加與本服務相關之活動。如個人資料有異動，請務必即時更新，以保障您的權益。如因會員未正確更新個人資料，致未能收到本公司寄發之會員權益、消費優惠、活動內容等相關資訊，或變更、終止會員權益、消費優惠、活動內容之通知，會員同意在此情形下，視為會員已經收到該等資訊或通知。 02._個人資料之填寫如有重複、錯誤或虛偽不實、故意冒用他人姓名、侵害他人姓名權、公司名稱專用權、商標權或其他智慧財產權、或有違反公序良俗、政府法令、或破壞本公司服務宗旨…等情形，本公司得拒絕註冊，並有權立即暫停或終止會員帳號，取消會員資格，拒絕提供本服務，會員不得向本公司為任何主張，並應自行承擔全部法律責任。 03._隱私權保護聲明：會員之個人資料受到本公司隱私權條款之保護與規範。
二、服務內容的變更 會員同意本公司得隨時調整、變更、修改或終止本服務及本條款，於本公司公告後生效，不再另行個別通知。會員因參與本公司活動及使用本公司服務，而與本公司所發生之權利義務關係，均以本條款最新修訂之版本為準。 
三、商店個人資料保護告知及暨同意事項： 為提供會員最完善的服務，並保護會員個人資料，本公司謹此依個人資料保護法(下稱個資法)規定，告知您如下事項： (一)蒐集之目的、個人資料類別、利用期間、地區、對象及方式 為提供會員有關本公司各項消費優惠、商品、服務、活動及最新資訊，並有效管理會員資料、進行服務與調查、滿意度及消費統計分析調查(下稱蒐集目的)，本公司將於上開蒐集目的消失前，在完成上開蒐集目的之必要地區內，蒐集、處理、利用您填載於本公司會員申請之個人資料、消費與交易資料，或日後經您同意而提供之其他個人資料。在上開蒐集目的範圍內，本公司可能會將您全部或部分個人資料，提供予合作廠商。 例：當會員使用本服務進行線上消費，本公司需透過宅配貨運等合作廠商，方能完成貨品或相關贈品之配送，故當會員完成線上交易，即表示會員同意並授權本公司得將會員提供之個人資料(如收件人姓名、配送地址、電話…等)提供予宅配及貨運合作廠商，以利完成貨品或相關贈品之配送。 (二)注意事項： 您同意以電子文件作為行使個資法書面同意之方式。如您不同意提供個人資料，或要求刪除或停止蒐集、處理您的個人資料，您瞭解本公司可能因此無法進行網路會員資格審核及相關處理作業，或提供您完善的網路服務，尚請見諒。</textarea>
            <input type="checkbox" name="check">同意會員合約
        </div>





        <button class="btn btn-primary btn-lg px-4 me-md-2" type="submit">送出</button>
        <button class="btn btn-outline-secondary btn-lg px-4" type="reset">清除</button>
        <hr class="my-4">
        <small>
            <a href="./login.php" class="c_button">登入會員</a>
        </small>
    </form>
</div>
<!---內容加在裡面-->
<?php if(isset($_POST['name'])){ 
    $user_lever = 2;
    $user_account = $_POST['userid'];
    $user_password = $_POST['passwd'];
    $user_name = $_POST['name'];
    $user_sex = $_POST['sex'];
    $user_birthday = $_POST['birth'];
    $user_phone = $_POST['tel'];
    $user_address = $_POST['loc'];
    $user_email = $_POST['email'];
    include "link.php";
    $sql = "insert into member values('','$user_lever','$user_account','$user_password','$user_name','$user_sex','$user_birthday','$user_phone','$user_address','$user_email')"; //SQL新增資料
    if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
        $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
    else
        $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
    mysqli_close($link); // 關閉資料庫連結
    $url = "login.php";
echo "<script type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>"; 
} ?>
<?php
include "template_buttom.php";

?>