$(function() {

    $("#rPatient").click(function() {

        $("#ulabel").text("Email Address");
        $("#phone").replaceWith('<input id="email" type="email" class="form-control" name="email" value="" required autofocus> ');
        $("#ufeedback").text(" Email is invalid, eg: xxx@mac.com");
    });

    $("#rProvider").click(function() {
        $("#ulabel").text("Phone Number");
        $("#email").replaceWith('<input id="phone" type="text" pattern="[0-9]{6,10}"  class="form-control" name="phone" value="" required autofocus> ');
        $("#ufeedback").text("Phone Number is invalid, eg: 5731119999");
    });




    $("#login").submit(function(e) {
        var identity = "patient";
        if ($('#rPatient').is(":checked")) {
            identity = "patient";
        } else {
            identity = "provider";

        }

        e.preventDefault();
        e.stopPropagation();

        var form = $(this);
        if (form[0].checkValidity() === false) {

            form.addClass('was-validated');
            return false;

        }


        $.post("api/loginControl.php", {

                method: "login",
                who: identity,
                user: $(" #email ").val(),
                pass: $(" #password ").val(),

            },
            function(r, err) {
                switch (parseInt(r)) {
                    case 3:
                        $("#reportmsg").remove();
                        $("#successmsg").html("Success login");
                        var udata = {
                            identity: 'patient',
                            username: $(" #email ").val(),
                        }
                        Cookies.set('userdata', JSON.stringify(udata), { expires: 10, path: '/' });
                        if (identity == "patient") {
                            window.location.href = "./pages/offer.php"
                        } else {
                            window.location.href = "./pages/main.php"
                        }
                        break;
                    case 2:

                        $("#reportmsg").html("Password failed");

                        break;
                    default:
                         
                        $("#reportmsg").html(r);
                        // $("#reportmsg").html("Can not find this user");
                }




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