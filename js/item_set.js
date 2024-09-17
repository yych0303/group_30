$(function() {
    tbl = $('#example').DataTable({
        "scrollX": false,
        "scrollY": false,
        "displayLength": 10,
        "lengthChange": true,
        "scrollCollapse": false, //當筆數小於scrillY高度時,自動縮小
        "ajax": 'item_show_ajax.php'
    });
    $('tbody').on('click', '#btn_delete1', function() {
        var id = tbl.row($(this).closest('tr')).data();
        var t_id = id[0];
        $.ajax({
            url: "delete_item.php",
            data: {
                t_id,
            },
            type: "POST",
            dataType: 'text',
            success: function() {
                console.log("商品代號" + t_id + "刪除成功");
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
        tbl.ajax.reload();
    });
});