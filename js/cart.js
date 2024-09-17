var sum = [0, 0, 0];
window.onload = setsum;

function setsum() {
    //alert(sum);
    sum = [0, 0, 0];
    $('input[name = "buyList[]"]:checked').each(function() {
        var ppid = $(this).val();
        //alert(ppid);
        sum[0]++;
        sum[1] += parseInt($("#buy_value" + ppid).val(), 10);
        sum[2] += parseInt($("#buy_price" + ppid).val(), 10);
        //alert(sum);
    });
    $("#sum0").text(sum[0]);
    $("#sum1").text(sum[1]);
    $("#sum2").text(sum[2]);
    save_ajax();
};

function save_ajax() {

    var form = $("#form_cart");
    var url = "cart_save.php";

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data) {
            //alert(1321);
            //alert(data); // show response from the php script.
        }
    });

    //e.preventDefault(); // avoid to execute the actual submit of the form.
}

function delete_ajax(dpid) {

    var form = $("#form_cart");
    var url = "cart_delete.php?iid=" + dpid;

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data) {
            //alert(1321);
            //alert(data); // show response from the php script.
        }
    });
    setsum();
    //e.preventDefault(); // avoid to execute the actual submit of the form.
}
$(function() {
    //alert(sum);
    $("#sum0").text(sum[0]);
    $("#sum1").text(sum[1]);
    $("#sum2").text(sum[2]);
    $('input[name = "buyList[]"]').on("change", function() {
        setsum();
    })
    $('input[name ^= "buy_value"]').on("change", function() {
        var ppid = $(this).attr('id').replace("buy_value", "");
        //alert(ppid);
        var pptl = (parseInt($("#buy_value" + ppid).val(), 10) * parseInt($("#item_price" + ppid).val(), 10));
        $("#buy_price" + ppid).val(pptl);
        $("#buy_price_ptl" + ppid).text(pptl);
        setsum();
    })
    $('[name ^= "del"]').on("click", function() {
        //alert(111);
        var dpid = $(this).attr('name').replace("del", "");
        //alert(dpid);
        delete_ajax(dpid);
        $(this).closest("tr").remove();
        setsum();
    })
});