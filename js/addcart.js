toastr.options = {
    // 參數設定
    "closeButton": false, // 顯示關閉按鈕
    "debug": false, // 除錯
    "newestOnTop": true, // 最新一筆顯示在最上面
    "progressBar": false, // 顯示隱藏時間進度條
    "positionClass": "toast-top-right", // 位置的類別
    "preventDuplicates": false, // 隱藏重覆訊息
    "onclick": null, // 當點選提示訊息時，則執行此函式
    "showDuration": "300", // 顯示時間(單位: 毫秒)
    "hideDuration": "1000", // 隱藏時間(單位: 毫秒)
    "timeOut": "1500", // 當超過此設定時間時，則隱藏提示訊息(單位: 毫秒)
    "extendedTimeOut": "1000", // 當使用者觸碰到提示訊息時，離開後超過此設定時間則隱藏提示訊息(單位: 毫秒)
    "showEasing": "swing", // 顯示動畫時間曲線
    "hideEasing": "linear", // 隱藏動畫時間曲線
    "showMethod": "fadeIn", // 顯示動畫效果
    "hideMethod": "fadeOut" // 隱藏動畫效果
}
$(function() {
    $(".addcart").click(function() {
        toastr.success("加入購物車成功");
        var id = $(this).data('id');
        var amount = $(".amount").val();
        var cart_cnt = $('#cart_cnt').text();
        //alert(cart_cnt);
        $('#cart_cnt').text(parseInt(cart_cnt, 10) + parseInt(amount, 10));
        $.ajax({
            url: "addcart.php",
            data: {
                id,
                amount
            },
            type: "POST",
            dataType: 'text',
            success: function() {
                console.log(id);
                console.log(amount);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
    $(".nowbuy").click(function() {
        var id = $(this).data('id');
        var amount = $(".amount").val();
        $.ajax({
            url: "addcart.php",
            data: {
                id,
                amount
            },
            type: "POST",
            dataType: 'text',
            success: function() {
                console.log(id);
                console.log(amount);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
        var url = "./cart.php?sid=" + id;
        window.location.href = url;

    });
});