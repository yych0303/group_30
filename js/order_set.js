$(function() {
    tbl = $('#example').DataTable({
        "scrollX": false,
        "scrollY": false,
        "displayLength": 10,
        "lengthChange": true,
        "scrollCollapse": false, //當筆數小於scrillY高度時,自動縮小
        "ajax": 'order_show_ajax.php'
    });
});