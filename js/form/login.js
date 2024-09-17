$(document).ready(function($) {
    $.validator.addMethod("notEqualsto", function(value, element, arg) {
        return arg != value;
    }, "您尚未選擇!");

    $("#form001").validate({
        submitHandler: function(form) {
            form.submit();
        },
        rules: {
            userid: {
                required: true,
                maxlength: 12,
            },
            passwd: {
                required: true,
                minlength: 2,
                maxlength: 12,
            },
        },
        messages: {}
    });
});