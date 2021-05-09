$("#signup").click(function() {
    $("#first").fadeOut("fast", function() {
        $("#second").fadeIn("fast");
    });
});

$("#signin").click(function() {
    $("#second").fadeOut("fast", function() {
        $("#first").fadeIn("fast");
    });
});






$(function() {

    $("form[name='registration']").validate({
        rules: {
            firstname: "required",
            lastname: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            }
        },

        messages: {
            firstname: "Please enter your firstname",
            lastname: "Please enter your lastname",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Please enter a valid email address"
        },

        submitHandler: function(form) {
            form.submit();
        }
    });
});








$(function() {


    $("#login").submit(function(e) {

        e.preventDefault();
        e.stopPropagation();

        var form = $(this);
        if (form[0].checkValidity() === false) {

            form.addClass('was-validated');
            return false;

        }
        $.post("api/loginControl.php", {
                method: "login",
                user: $(" #email ").val(),
                pass: $(" #password ").val(),

            },
            function(r, err) {
                $("#reportmsg").html(r);
                console.log(r);
                console.log(err);
                //window.location.href = "./pages/main.html";
            }
        );


    });
});


// $(function () {
//     $("form[name='login']").validate({
//         rules: {

//             email: {
//                 required: true,
//                 email: true
//             },
//             password: {
//                 required: true,

//             }
//         },
//         messages: {
//             email: "Please enter a valid email address",

//             password: {
//                 required: "Please enter password",

//             }

//         },
//         submitHandler: function (form) {
//             form.submit();
//         }
//     });
// });