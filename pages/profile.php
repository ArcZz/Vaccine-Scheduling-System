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

                        <form id="save-profile" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <h3 class="page-title">Patient Infomation</h3>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient Name <span class="text-danger">*</span> </label>
                                        <input class="form-control" type="text"
                                            value="<?php echo $patientData->pa_name; ?>" name="name" id="name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Contact Email <span class="text-danger">*</span> </label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="<?php echo $patientData->email; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                        <label for="example-date-input">Date of birth <span class="text-danger">*</span> </label>
                                        <input name="dob" id="dob" class="form-control" type="date"
                                            value="<?php echo $patientData->dob; ?>">
                                    </div>
                                </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>SSN <span class="text-danger">*</span> </label>
                                        <input class="form-control" name="ssn" id="ssn" value="<?php echo $patientData->ssn;?>"type="text" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address (follow by latitude and longitude)<span class="text-danger">*</span> </label>
                                        <input class="form-control"
                                            value="<?php echo $patientData->pa_address;?>" type="text" name="address" id="address">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile Number <span class="text-danger">*</span> </label>
                                        <input class="form-control" value="<?php echo $patientData->pa_phone;?>" type="text" name="phone" id="phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Max travel distance <span class="text-danger">*</span> </label>
                                        <input class="form-control" value="<?php echo $patientData->max_travel_distance;?>" type="number" name="max" id="max">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-12 text-center m-t-20">

                                    <button id="profilesubmit" name ="profilesubmit" type="submit" data-toggle="modal" data-target="#save_type"
                                        class="btn btn-primary submit-btn">Save & Update</button>
                                </div>
                            </div>
                        </form>
                        <?php
                          if(isset($_POST['profilesubmit'])){
                            $paid = $patientData->pa_id;
                            $db->flush();
                            $db->query_prepared('SELECT * FROM Patient WHERE pa_id =?',
                                [$paid]);
                            $result = $db->queryResult();

                            // echo "test test <br/>";
                            // echo "db value: ".$result[0]->dob."<br/>";
                            // echo "form value: ".htmlspecialchars($_POST['dob'])."<br/>";
                            $paname = htmlspecialchars($_POST['name']);
                            $dob = htmlspecialchars($_POST['dob']);
                            $paaddress = htmlspecialchars($_POST['address']);
                            $paphone = htmlspecialchars($_POST['phone']);
                            $maxtravel = htmlspecialchars($_POST['max']);

                            if($result[0]->pa_name != $_POST['name']){
                              $db->query_prepared('UPDATE Patient SET pa_name = ? WHERE pa_id = ?',
                                  [$paname, $paid]);
                            }
                            if($result[0]->dob != $dob){
                              $birthyear = (int) explode('-', $dob)[0];
                              if ($birthyear < 1980) {
                                  $pid = 1;
                              } elseif ($birthyear >= 1980 && $birthyear < 2010) {
                                  $pid = 2;
                              } else {
                                  $pid = 3;
                              }

                              $db->query_prepared('UPDATE Patient SET dob = ?, p_number =? WHERE pa_id = ?',
                                  [$dob, $pid, $paid]);
                            }
                            if($result[0]->pa_address != $paaddress){
                              $db->query_prepared('UPDATE Patient SET pa_address = ? WHERE pa_id = ?',
                                  [$paaddress, $paid]);
                            }
                            if($result[0]->pa_phone != $paphone){
                              $db->query_prepared('UPDATE Patient SET pa_phone = ? WHERE pa_id = ?',
                                  [$paphone, $paid]);
                            }
                            if($result[0]->max_travel_distance != $maxtravel){

                              $db->query_prepared('UPDATE Patient SET max_travel_distance = ? WHERE pa_id = ?',
                                  [$maxtravel, $paid]);
                            }
                            echo "<meta http-equiv='refresh' content='0'>";
                          }



                        ?>
                    </div>
                </div>
            </div>

        </div>
        <!-- <div id="save_type" class="modal fade delete-modal" role="dialog">
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
        </div> -->
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
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="../public/js/profile.js"></script>

</body>


<!-- settings23:11-->

</html>
