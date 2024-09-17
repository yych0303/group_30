$(document).ready(function($) {
    $.validator.addMethod("notEqualsto", function(value, element, arg) {
        return arg != value;
    }, "您尚未選擇!");

    $("#form1").validate({
        submitHandler: function(form) {
            form.submit();
        },
        rules: {
            passwd: {
                required: true,
                minlength: 2,
            },
            passwd2: {
                required: true,
                equalTo: "#passwd",
            },
            name: {
                required: true,
            },
            tel: {
                required: true,
            },
            loc: {
                required: true,
            },
            email: {
                required: true,
            },
        },
        messages: {
            passwd2: {
                equalTo: "兩次輸入的密碼不同"
            },
        }
    });
});

/*
$(document).ready(function() {
    $.ajax({
        url: "agm.txt",
        dataType: "text",
        success: function(data) {
            $('#agm').text(data);
        }
    });
});

$(document).ready(function() {
    $('Textarea').text());
});*/