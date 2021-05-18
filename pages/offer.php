<?php include("header.php");?>


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
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>Note!</strong> There is no current avaiable offer for you currently.

                        </div>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Click <a href="offer1.html" class="alert-link"> LINK</a> to accept offer sent successfully.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									
								</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                      
                                        <th>offerdate </th>
                                        <th>deadline </th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      
                                        <td>VAT</td>
                                        <td>14%</td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a class="custom-badge status-red dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
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
      <script src="../public/js/appoffer.js"></script>
</body>
</html>