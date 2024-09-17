$(function() { //網頁完成後才會載入
    $('#userid').keyup(function() {
        $.ajax({
            url: "check_account_jquery_ajax.php",
            data: $('#form1').serialize(),
            type: "POST",
            dataType: 'text',
            success: function(msg) {
                $("#show_msg").html(msg); //顯示訊息
                //document.getElementById('show_msg').innerHTML= msg ;
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
});