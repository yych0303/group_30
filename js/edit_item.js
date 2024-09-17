$(function() { //網頁完成後才會載入
    $('.price_change').keyup(function() {
        var price = $('#price').val();
        var discount = $('#discount').val();
        var new_d_price = Math.floor(price * discount);
        $("#d_price").val(new_d_price);
    });
});