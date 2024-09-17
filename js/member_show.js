$(function() {
    tb2 = $('#example').DataTable({
        "ajax": 'member_show_ajax.php'
    });
    $('tbody').on('click', '#m_btn_delete', function() {
        var id = tb2.row($(this).closest('tr')).data();
        var t_id = id[0]
        $.ajax({
            url: "delete_member.php",
            data: {
                t_id,
            },
            type: "POST",
            dataType: 'text',
            success: function() {
                console.log("會員編號 " + t_id + " 刪除成功");
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
        tb2.ajax.reload();
    });
});