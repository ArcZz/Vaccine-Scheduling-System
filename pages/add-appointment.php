<?php 
include "../api/pridfetch.php";

include "header.php";?>


<body>
    <div class="main-wrapper">
        <?php $identity = "Provider";$num = 2; include("menubar.php");?>


        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Appointment</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form name="addnew" id="addnew" class="my-login-validation needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Provider Name</label>
                                        <input class="form-control" type="text" value="<?php echo $prData->pr_name;?>"
                                            readonly="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Provider ID</label>
                                        <input class="form-control" id="prid" type="text" value="<?php echo $prData->pr_id;?>"
                                            readonly="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Appointment Date <span class="text-danger">*</span> </label>

                                        <!-- <input  name="max  type="text" class="form-control datetimepicker" id="month" required> -->
                                        <input name="date" id="date" value=min="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" class="form-control" type="date" required>
                                        <div class="invalid-feedback">  required or invalid input </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Time (between 8:00AM - 8:00PM) <span class="text-danger">*</span> </label>
                                        <input required id="time" type="time"  class="form-control" name="appt-time" min="08:00" max="20:00">
                                        <div class="invalid-feedback" >
                                          required or invalid input 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Number of available<span class="text-danger">*</span> </label>
                                        <input name="num" id="num" min="1" max="100"  class="form-control" type="number" required>
                                        <div class="invalid-feedback"> Number required or invalid input </div>
                                    </div>
                                </div>

                            </div>

                            <div class="m-t-20 text-center">
                                <button type="submit" id="submit" class="btn btn-primary submit-btn">
                                    Add new appointment
                                </button>

                            </div>
                       
                           <div id="successmsg"  class=" m-t-20  text-center  alert  " role="alert">   </div>
                    

                        </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!-- <script src="assets/js/bootstrap-datetimepicker.min.js"></script> -->
    <script src="assets/js/app.js"></script>
    <script src="../public/js/first.js"></script>

</body>


</html>