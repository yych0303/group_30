$(function() {
    tb3 = $('#example3').DataTable({
        "scrollX": false,
        "scrollY": false,
        "displayLength": 5,
        "aLengthMenu": [5, 10, 15],
        "lengthChange": true,
        "scrollCollapse": false, //當筆數小於scrillY高度時,自動縮小
        "ajax": 'show_index_image_ajax.php'
    });
    $('tbody').on('click', '.image_btn_delete3', function() {
        var id = tb3.row($(this).closest('tr')).data();
        var t_id = id[0]
        $.ajax({
            url: "delete_index_image.php",
            data: {
                t_id,
            },
            type: "POST",
            dataType: 'text',
            success: function() {
                console.log("圖片" + t_id + " 刪除成功");
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
        tb3.ajax.reload();
    });
    $('tbody').on('click', '.image_btn_show', function() {
        var id = tb3.row($(this).closest('tr')).data();
        var t_id = id[0];
        var sta = id[3];
        $.ajax({
            url: "change_index_image_state_ajax.php",
            data: {
                t_id,
                sta,
            },
            type: "POST",
            dataType: 'text',
            success: function() {
                console.log("圖片" + t_id + " 切換成功");
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
        tb3.ajax.reload();
    });
});