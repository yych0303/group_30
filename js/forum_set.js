$(function() {
    tbl = $('#example').DataTable({
        "scrollX": false,
        "scrollY": false,
        "displayLength": 10,
        "lengthChange": true,
        "scrollCollapse": false, //當筆數小於scrillY高度時,自動縮小
        "ajax": 'forum_show_ajax.php'
    });
    $('tbody').on('click', '#btn_delete1', function() {
        var id = tbl.row($(this).closest('tr')).data()[0];
        var t_id = "" + id;
        console.log(t_id);
        $.ajax({
            url: "forum_delete.php",
            data: {
                id,
            },
            type: "POST",
            dataType: 'text',
            success: function() {
                console.log(id);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
        tbl.ajax.reload();
    });
});