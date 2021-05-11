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

                switch (parseInt(r)) {
                    case 3:
                        $("#reportmsg").remove();
                        $("#successmsg").html("success login");
                        $.cookie('the_cookie', 'the_value', { expires: 7 });

                        window.location.href = "./pages/main.html"
                        break;
                    case 2:

                        $("#reportmsg").html("Password failed");

                        break;
                    default:

                        $("#reportmsg").html("Can not find this user");
                }


                console.log(r);


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