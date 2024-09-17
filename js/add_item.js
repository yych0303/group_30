$(function() { //網頁完成後才會載入
    $('.price_change').keyup(function() {
        var price = $('#price').val();
        var discount = $('#discount').val();
        var new_d_price = Math.floor(price * discount);
        $("#d_price").val(new_d_price);
    });

    $('input[name="item_type"]').change(function() {
        // $("#item_id").val($(this).val())
        var type = $(this).val();
        $.ajax({
            url: "add_item_id_ajax.php",
            data: {
                type
            },
            type: "POST",
            dataType: 'text',
            success: function(msg) {
                $("#item_id").val(msg)
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
});