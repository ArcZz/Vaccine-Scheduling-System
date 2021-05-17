// function objectifyForm(formArray) {
//     //serialize data function
//     var returnArray = {};
//     for (var i = 0; i < formArray.length; i++) {
//         returnArray[formArray[i]['name']] = formArray[i]['value'];
//     }
//     return returnArray;
// }

// jQuery.validator.addMethod("greaterThanToday",
// function(value, element) {
//
//     if (!/Invalid|NaN/.test(new Date(value))) {
//         return new Date(value) > new Date();
//     }
//
//     return isNaN(value))
//         || (Number(value) > Number(new Date(value).val()));
// },'Must be greater than {0}.');

$(document).ready(function() {

    $("#save-profile").validate({
        errorClass: "is-invalid",
        errorPlacement: function(label, element) {
            label.addClass('invalid-feedback');
            label.insertAfter(element);
        },
        wrapper: "span",
        //errorLabelContainer: ".invalid-feedback",
        rules: {

            name: "required",
            email:"required",
            dob: {
              required: true,
            },
            ssn:{
              required: true,
            },
            phone: {
                digits: true,
                required: true,
            },
            address: "required",
            max: {
                range: [1, 100],
                required: true,
            },

        },

        messages: {
            name: "Please enter your Full Name ",
            dob: "required, date cannot be greater than today",
            phone: "required",
            address: "required, please enter your address follow by latitude and longitude",
            max: "Distance between [5, 100]",
        },

        //submitHandler: function(form) {
            // $("#successmsg").removeClass("text-success").removeClass("text-danger");
            // $("#successmsg").html("loading......");
            // var data = $(form).serializeArray();
            // formdata = objectifyForm(data);
            //form.submit();
            // $.post("../api/signupControl.php", {
            //     fullname: formdata.fullname,
            //     ssn: formdata.ssn,
            //     date: formdata.date,
            //     address: formdata.address,
            //     phone: formdata.phone,
            //     email: formdata.email,
            //     max: formdata.max,
            //     password: formdata.password,

            //},
            // function(r, err) {
            //     console.log(r);
            //
            //     if (isNaN(r)) {
            //         $("#successmsg").removeClass("text-danger").addClass("text-success");
            //
            //         $("#successmsg").html("success registe, login soon");
            //         $("#submit").text("loading").prop('disabled', true);
            //         Cookies.set('userdata', JSON.stringify(r), { expires: 7, path: '/' });
            //         setTimeout(function() {
            //
            //             console.log(r);
            //
            //              // window.location.href = "./offer.php"
            //
            //
            //
            //         }, 800);
            //         //window.location.href = "./pages/main.php"
            //
            //     } else {
            //         $("#successmsg").removeClass("text-success").addClass("text-danger");
            //         $("#successmsg").html("signup failed, user already exist");
            //     }
            //
            // }
          //);




        //}
    });
});
