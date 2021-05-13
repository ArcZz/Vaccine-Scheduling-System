// $(function() {

//     $("#submit").submit(function(e) {


//         e.preventDefault();
//         e.stopPropagation();

//         var form = $(this);
//         if (form[0].checkValidity() === false) {

//             form.addClass('was-validated');
//             return false;

//         }
//         $.get("https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyA3IVN6j1-LnOVnEx6hmujSKGNDheRRNTg", {

//             },
//             function(r, err) {
//                 console.log(r);
//             }



//         );



//     });
// });


$(function() {
    console.log("ds")
    $("#submitform").validate({
        errorClass: "is-invalid",
        errorPlacement: function(label, element) {
            label.addClass('invalid-feedback');
            label.insertAfter(element);
        },
        wrapper: "div",
        //errorLabelContainer: ".invalid-feedback",
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            fullname: "required",
            lastname: "required",
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true
            },
            password: {
                required: true,
                minlength: 5
            }
        },

        messages: {
            fullname: "Please enter your firstname",
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