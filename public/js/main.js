$(function() {

    $.post("../api/apphistory.php", {
            pr_id: $(" #prid ").html(),
        },
        function(r, err) {
            $(" #load ").remove();

            if (isNaN(r)) {

                $("#successmsg").removeClass("alert-info").addClass("alert-success");
                $("#successmsg").html("success found history appointment");


            } else {
                $("#successmsg").removeClass("alert-success").addClass("alert-info");
                $("#successmsg").html("No data found in database");

            }
        }
    );

});