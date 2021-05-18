$(function() {

    $.post("../api/apphistory.php", {
            pr_id: $(" #prid ").html(),
        },
        function(r, err) {
            $(" #load ").remove();

            if (isNaN(r)) {

                $("#successmsg").removeClass("alert-info").addClass("alert-success");
                $("#successmsg").html("success found history appointment");
                setTimeout(function() {
                  $("#successmsg").html("").removeClass("alert-success");


              }, 800);
              var jsonData = JSON.parse(r);

              console.log(jsonData);
              $('#main').DataTable({

                      "data": jsonData,
                      "columns": [
                          { "data": "aid" },
                          { "data": "pr_id" },
                          { "data": "appdt" },
                          { "data": "number_available" },
                      ],
                      initComplete: function() {

                          var api = this.api();

                          api.columns().indexes().flatten().each(function(i) {
                              var column = api.column(i);

                              var select = $('<select><option value=""></option></select>')
                                  .appendTo($(column.footer()).empty())
                                  .on('change', function() {
                                      var val = $.fn.dataTable.util.escapeRegex(
                                          $(this).val()
                                      );
                                      column
                                          .search(val ? '^' + val + '$' : '', true, false)
                                          .draw();
                                  });
                              column.data().unique().sort().each(function(d, j) {
                                  select.append('<option value="' + d + '">' + d + '</option>')
                              });
                          });
                      },


                  }

              );


            } else {
                $("#successmsg").removeClass("alert-success").addClass("alert-info");
                $("#successmsg").html("No data found in database");

            }
        }
    );

});
