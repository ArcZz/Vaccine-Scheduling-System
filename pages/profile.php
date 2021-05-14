<?php

include "../api/profilefetch.php";

include "header.php";?>

<body>
    <div class="main-wrapper">
        <?php $identity = "Patient";
$num = 0;include "menubar.php";?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <?php
if ($failreport == 0) {
    echo ' <div class="alert alert-danger" role="alert">  No data found or No permission, please login again </div>';
}
?>

                        <form>
                            <h3 class="page-title">Patient Infomation</h3>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient Name </label>
                                        <input class="form-control" type="text"
                                            value="<?php echo $patientData->pa_name; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Contact Email <span class="text-danger">*</span> </label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="<?php echo $patientData->email; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                        <label for="example-date-input">Date of birth</label>
                                        <input name="date" id="date" class="form-control" type="date"
                                            value="<?php echo $patientData->dob; ?>">
                                    </div>
                                </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>SSN</label>
                                        <input class="form-control" value="<?php echo $patientData->ssn;?>"type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control"
                                            value="<?php echo $patientData->pa_address;?>" type="text">
                                    </div>
                                </div>
                             
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input class="form-control" value="<?php echo $patientData->pa_phone;?>" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Max travel distance</label>
                                        <input class="form-control" value="<?php echo $patientData->max_travel_distance;?>" type="text">
                                    </div>
                                </div>
                            </div>
                        

                            <div class="row">
                                <div class="col-sm-12 text-center m-t-20">

                                    <button id="submit" type="button" data-toggle="modal" data-target="#save_type"
                                        class="btn btn-primary submit-btn">Save & Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div id="save_type" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="../public/images/2.png" alt="" width="50" height="46">
                        <h3>Are you sure want to save this new changes?</h3>
                        <div class="m-t-20"> <a href="#" class="btn btn-outline-secondary "
                                data-dismiss="modal">Close</a>
                            <button type="submit" id="update" class="btn btn-outline-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
    //test
    $(function() {
        console.log("on");
        $("#update").click(
            function() {
                console.log("caleed");
            }
        )
    })
    </script>


</body>


<!-- settings23:11-->

</html>