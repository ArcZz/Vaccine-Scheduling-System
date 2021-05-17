$(function() {

    $("#addnew").submit(function(e) {
        $("#successmsg").removeClass(" alert-success").removeClass(" alert-danger");
        $("#successmsg").html("");

        e.preventDefault();
        e.stopPropagation();

        var form = $(this);
        if (form[0].checkValidity() === false) {

            form.addClass('was-validated');
            return false;

        }
        const format1 = "YYYY-MM-DD HH:mm:ss"
        const format2 = "HH:mm:ss"
        var time = $('#time').val() + ":00";

        var year = $('#date').val();
        var date = year + " " + time;

        // time = moment(date1).format(format1);
        //var date1 = moment($('#time').val()).format('hh:mm:ss');
        var finaldate = moment(date).format("YYYY-MM-DD HH:mm:ss")
        $.post("../api/addapp.php", {

                date: finaldate,
                pr_id: $(" #prid ").val(),
                num: $(" #num ").val(),

            },
            function(r, err) {
                console.log(r);
                if (r == 1) {
                    document.getElementById("addnew").reset();
                    $("#submit").html("add again");
                    $("#successmsg").removeClass("alert-danger").addClass("alert-success");
                    $("#successmsg").html("success add new appointment");

                } else {
                    $("#successmsg").removeClass("alert-success").addClass("alert-danger");
                    $("#successmsg").html("Add appointment failed, check your date again");

                }
            }
        );



    });
});