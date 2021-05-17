$(function() {

    $("#rPatient").click(function() {
        $("#reportmsg").html("");
        $("#successmsg").html("");
        $("#ulabel").text("Email Address");
        $("#phone").replaceWith('<input id="email" type="email" class="form-control" name="email" value="" required autofocus> ');
        $("#ufeedback").text(" Email is invalid, eg: xxx@mac.com");
    });

    $("#rProvider").click(function() {
        $("#reportmsg").html("");
        $("#successmsg").html("");
        $("#ulabel").text("Phone Number");
        $("#email").replaceWith('<input id="phone" type="text" pattern="[0-9]{6,10}"  class="form-control" name="phone" value="" required autofocus> ');
        $("#ufeedback").text("Phone Number is invalid, eg: 5731119999");
    });



    $("#login").submit(function(e) {
        var identity = "patient";
        var phonenum = 0;
        var uemail = "";
        if ($('#rPatient').is(":checked")) {
            identity = "patient";
            uemail = $(" #email ").val();
            phonenum = 0;

        } else {
            identity = "provider";
            uemail = "";
            phonenum = $("#phone").val();

        }

        e.preventDefault();
        e.stopPropagation();

        var form = $(this);
        if (form[0].checkValidity() === false) {

            form.addClass('was-validated');
            return false;

        }

        $.post("api/loginControl.php", {

                who: identity,
                user: uemail,
                pass: $(" #password ").val(),
                phone: phonenum

            },
            function(r, err) {
                console.log(r);
                if (isNaN(r)) {
                    $("#reportmsg").html("");
                    $("#successmsg").html("Success login");
                    // var udata = {
                    //     identity: 'patient',
                    //     username: $(" #email ").val(),
                    // }
                    Cookies.set('userdata', JSON.stringify(r), { expires: 7, path: '/' });
                    if (identity == "patient") {
                        // window.location.href = "./pages/offer.php"
                    } else {
                        //  window.location.href = "./pages/main.php"
                    }


                } else {
                    switch (parseInt(r)) {
                        case 2:
                            $("#successmsg").html("");
                            $("#reportmsg").html("Password failed");
                            break;
                        default:
                            $("#successmsg").html("");
                            $("#reportmsg").html("Can not find this user");
                    }

                }
            }
        );



    });
});