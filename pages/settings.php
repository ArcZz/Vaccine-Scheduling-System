<?php 

include "../api/pridfetch.php";

include("header.php");?>

<body>
    <div class="main-wrapper">
          <?php $identity = "Provider"; $num=0; include("menubar.php");?>
    
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
                            <h3 class="page-title">Provider Infomation</h3>
                            <div class="row">
                                <div class="col-sm-6">
                                   <div class="form-group">
                                        <label>Provider Name <span class="text-danger"></span> </label>
                                        <input class="form-control" type="text"
                                            value="<?php echo $prData->pr_name; ?>" name="name" id="name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Provider Type</label>
                                          <input class="form-control" type="text" 
                                          value="<?php echo $prData->pr_type;?>" name="type" id="type">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                        <label>Provider Address (follow by latitude and longitude)<span class="text-danger"></span> </label>
                                        <input class="form-control"
                                            value="<?php echo $prData->pr_address;?>" type="text" name="address" id="address">
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                        <div class="form-group">
                                        <label>Provider Number  </label>
                                        <input class="form-control" value="<?php echo $prData->pr_phone;?>" type="text" name="phone" id="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="col-sm-12 text-center m-t-20">
                                    <button type="button" class="btn btn-primary submit-btn">Save</button>
                                </div> -->
                            </div>
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
    <script src="assets/js/app.js"></script>
</body>


<!-- settings23:11-->

</html>