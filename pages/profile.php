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
                            $db->query_prepared('SELECT * FROM Patient WHERE pa_id =?', [$paid]);
                            $result = $db->queryResult();

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
                            echo ' <div class="alert m-t-30 alert-info" role="alert"> Patient Infomation updated, Check it out</div>';
                          }



                        ?>
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
  

    $(function() {
       $("#login").submit(function(e) {
        var identity = "patient";
        var phonenum = 0;
        var uemail = "";
        if ($('#rPatient').is(":checked")) {
            identity = "patient";
            uemail = $(" #email ").val();
            phonenum = 0;

        } else {
            identity = "provider";
            uemail = "";
            phonenum = $("#phone").val();

        }

        e.preventDefault();
        e.stopPropagation();

        var form = $(this);
        if (form[0].checkValidity() === false) {

            form.addClass('was-validated');
            return false;

        }


    })})
    
    </script>


</body>
 <iframe id="is_iframe" name="the_iframe" style="display:none;"></iframe>


</html>
