<?php
include "../api/offerfetch.php";
include "header.php";?>

<body>
    <div class="main-wrapper">
        <?php $identity = "Patient"; $num = 2; include("menubar.php");?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-8 col-6">
                        <h4 class="page-title">ALL Offers</h4>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if (is_null($patientInfo)) {
                            if($haveVaccinated == 0){
                              echo ' <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>Note!</strong> There is no current avaiable offer for you currently.
                            </div> ';
                          }else{
                            echo ' <div class="alert alert-info alert-dismissible fade show" role="alert">
                          <strong>Note!</strong> You have been vaccinated already!
                          </div> ';
                          }
                        }else{
                            if($haveAccept == 1){
                              // this for accept user
                              echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>Note!</strong>  Click ACTION to cancel your accepted offer, Notice you can only
                            change it once!
                        </div> ';
                      }elseif($havePending == 1){
                                // this for pending user
                                echo '
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success! </strong> Click ACTION to accept or decline your pending offer, Notice you can only
                            change it once!
                        </div>';

                      }


                          }
                        ?>
                        <?php
                        if (!is_null($patientInfo)) {}



                        ?>

                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0">
                                <thead>
                                    <tr>

                                        <th>patient id </th>
                                        <th>appointment id </th>
                                        <th>offer date</th>
                                        <th>deadlined date</th>
                                        <th>replyd date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td><?php echo $patientInfo->pa_id; ?></td>
                                        <td><?php echo $patientInfo->aid; ?></td>
                                        <td><?php echo $patientInfo->offerdt; ?></td>
                                        <td><?php echo $patientInfo->deadlinedt; ?></td>
                                        <td><?php echo $patientInfo->replydt; ?></td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a class="custom-badge status-red dropdown-toggle" href="#"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    Inactive
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Active</a>
                                                    <a class="dropdown-item" href="#">Inactive</a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>


                            </table>


                        </div>
                             <div class="row">
                    <div class=" mt-3 col-md-12">
                        <div class="card-box">
                            <h4 class="card-title">Provider Infomation </h4>
                            <p><strong>Name: </strong> <?php echo $providerInfo->pr_name; ?></p>
                            <p><strong>Appointment Date: </strong> <?php echo $providerInfo->appdt; ?></p>
                            <p><strong>Type: </strong><?php echo $providerInfo->pr_type; ?> </p>
                            <p><strong>Address: </strong><?php echo $providerInfo->pr_address; ?> </p>
                            <p><strong>Distance (in Miles): </strong><?php echo $distance; ?> </p>
                            <p><strong>Contact Number: </strong><?php echo $providerInfo->pr_phone; ?> </p>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>

        </div>
        <div id="delete_tax" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="assets/img/sent.png" alt="" width="50" height="46">
                        <h3>Are you sure want to delete this Tax?</h3>
                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
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
    <script src="../public/js/patientoffer.js"></script>
</body>

</html>
