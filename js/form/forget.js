$(document).ready(function($) {
    $.validator.addMethod("notEqualsto", function(value, element, arg) {
        return arg != value;
    }, "您尚未選擇!");

    $("#form1").validate({
        submitHandler: function(form) {
            form.submit();
        },
        rules: {
            userid: {
                required: true,
                maxlength: 12,
            },
            tel: {
                required: true,
            },
            email: {
                required: true,
            },
        },
        messages: {}
    });
});