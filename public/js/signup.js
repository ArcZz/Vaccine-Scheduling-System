function objectifyForm(formArray) {
    //serialize data function
    var returnArray = {};
    for (var i = 0; i < formArray.length; i++) {
        returnArray[formArray[i]['name']] = formArray[i]['value'];
    }
    return returnArray;
}


$(function() {

    $("#submitform").validate({
        errorClass: "is-invalid",
        errorPlacement: function(label, element) {
            label.addClass('invalid-feedback');
            label.insertAfter(element);
        },
        wrapper: "span",
        //errorLabelContainer: ".invalid-feedback",
        rules: {

            fullname: "required",
            lastname: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5,

            },
            passcon: {
                equalTo: "#password",
            },
            date: {
                required: true,
                date: true
            },
            phone: {
                digits: true,
                required: true,
            },
            ssn: {

                required: true,
            },
            address: "required",
            long: {

                required: true,
            },
            lat: {

                required: true,
            },
            max: {
                range: [1, 100],
                required: true,
            },


        },

        messages: {
            fullname: "Please enter your Fullname dumb ",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            passcon: "Not the same",
            date: "required, cannot enter a date greater than today",
            phone: "required",
            ssn: {
                required: "Please provide a ssn",

            },
            address: "required",
            long: "required, must be number",
            lat: "required, must be number",
            max: "Distance between [5, 100]",
        },

        submitHandler: function(form) {

            $("#successmsg").removeClass("text-success").removeClass("text-danger");
            $("#successmsg").html("loading......");
            var data = $(form).serializeArray();
            formdata = objectifyForm(data);
            formdata.address = formdata.address + ',' + formdata.long + ',' + formdata.lat;
            console.log(formdata.date);

            $.post("../api/signupControl.php", {
                fullname: formdata.fullname,
                ssn: formdata.ssn,
                date: formdata.date,
                address: formdata.address,
                phone: formdata.phone,
                email: formdata.email,
                max: formdata.max,
                password: formdata.password,

            }, function(r, err) {
                console.log(r);

                if (isNaN(r)) {
                    $("#successmsg").removeClass("text-danger").addClass("text-success");

                    $("#successmsg").html("success registe, login soon");
                    $("#submit").text("loading").prop('disabled', true);
                    Cookies.remove('userdata', { path: '/' })
                    Cookies.set('userdata', JSON.stringify(r), { expires: 7, path: '/' });
                    setTimeout(function() {

                        console.log(r);

                        window.location.href = "./offer.php"



                    }, 600);
                    //window.location.href = "./pages/main.php"

                } else {
                    $("#successmsg").removeClass("text-success").addClass("text-danger");
                    $("#successmsg").html("signup failed, user already exist");
                }

            });




        }
    });
});