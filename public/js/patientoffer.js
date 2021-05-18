$(function() {
    $("#accept").click(function() {


        console.log($(" #paid ").html());
        $.post("../api/patientofferupdate.php", {
                method: "accept",
                paid: $(" #paid ").html(),
                aid: $(" #aid ").html(),
            },
            function(r, err) {
                console.log(r);
                window.location.href = "./offer.php"
            }
        );

    });
    $("#decline").click(function() {



        console.log($(" #paid ").html());
        $.post("../api/patientofferupdate.php", {
                method: "decline",
                paid: $(" #paid ").html(),
                aid: $(" #aid ").html(),
            },
            function(r, err) {
                console.log(r);
                window.location.href = "./offer.php"
            }
        );

    });

    $("#cancel").click(function() {


        console.log($(" #paid ").html());
        $.post("../api/patientofferupdate.php", {
                method: "cancel",
                paid: $(" #paid ").html(),
                aid: $(" #aid ").html(),
            },
            function(r, err) {
                console.log(r);
                window.location.href = "./offer.php"
            }
        );

    });






});