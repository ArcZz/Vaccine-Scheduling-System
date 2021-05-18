<?php
include "../api/pridfetch.php";

include "header.php";?>

<body>
    <div class="main-wrapper">
        <?php $identity = "Provider";
$num = 1;include "menubar.php";?>


        <div class="page-wrapper">

            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Appointments History</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-appointment.php" class="btn btn btn-primary btn-rounded float-right"><i
                                class="fa fa-plus"></i> Add Appointment</a>
                    </div>
                </div>
                <p class="content-group">
                    This is the table shows the history of appointment created by this provider.
                </p>

                <p id="prid" hidden><?php echo $prData->pr_id;?></p>
                <div id="successmsg"  class="   text-center  alert  " role="alert">  </div>
                    

                <div class=" m-t-20 row">
                    <div class="col-md-12">


                        <div id="load" class="d-flex justify-content-center">
                            <div class=" m-40 spinner-border text-primary " style="width: 3rem; height: 3rem;"
                                role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>






                        <div class="table-responsive">
                            <table   width="100%" id="main" class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>aid</th>
                                        <th>pr_id</th>
                                        <th>appdt</th>
                                        <th>number_available</th>
                                    </tr>
                                </thead>
                                 <tfoot>
                                    <tr>
                                        <th>aid</th>
                                        <th>pr_id</th>
                                        <th>appdt</th>
                                        <th>number_available</th>
                                    </tr>
                                </tfoot>



                            </table>





                        </div>
                    </div>
                </div>
            </div>

            <div id="delete_appointment" class="modal fade delete-modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <img src="assets/img/sent.png" alt="" width="50" height="46">
                            <h3>Are you sure want to delete this Appointment?</h3>
                            <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>


    <script src="../public/js/main.js"></script>


</body>

</html>