<?php
include "../api/pridfetch.php";

// $results2 = $db->get_results("SELECT COUNT(*) as num FROM Provider");
// //providernum
// $pnum2 =  $results2[0]->num;

$con = array("accepted","noshow","cancelled","declined");

$db->query_prepared('SELECT count(*) num
                      FROM Provider P LEFT JOIN AvailableApp AA ON P.pr_id = AA.pr_id
                      LEFT JOIN AppOffer AO ON AA.aid = AO.aid
                      WHERE status =? AND P.pr_id = ?;', [$con[0], $prData->pr_id] );
$num = $db->queryResult();
$accepted = $num[0]->num;


$db->query_prepared('SELECT count(*) num
                      FROM Provider P LEFT JOIN AvailableApp AA ON P.pr_id = AA.pr_id
                      LEFT JOIN AppOffer AO ON AA.aid = AO.aid
                      WHERE status =? AND P.pr_id = ?;', [$con[1], $prData->pr_id] );
$num = $db->queryResult();
$noshow = $num[0]->num;

$db->query_prepared('SELECT count(*) num
                    FROM Provider P LEFT JOIN AvailableApp AA ON P.pr_id = AA.pr_id
                    LEFT JOIN AppOffer AO ON AA.aid = AO.aid
                    WHERE status =? AND P.pr_id = ?;', [$con[2], $prData->pr_id] );
$num = $db->queryResult();
$cancelled = $num[0]->num;

$db->query_prepared('SELECT count(*) num
                    FROM Provider P LEFT JOIN AvailableApp AA ON P.pr_id = AA.pr_id
                    LEFT JOIN AppOffer AO ON AA.aid = AO.aid
                    WHERE status =? AND P.pr_id = ?;', [$con[3], $prData->pr_id] );
$num = $db->queryResult();
$declined = $num[0]->num;

include "header.php";?>

<body>
    <div class="main-wrapper">
        <?php $identity = "Provider";
$num = 3;include "menubar.php";?>


        <div class="page-wrapper">

            <div class="content">

                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Patient offers summary</h4>
                        <?php
                        // echo "provider id: ".$prData->pr_id."<br/>";
                        // echo "test".$accepted."<br/>";
                        // echo "test".$noshow."<br/>";
                        // echo "test".$cancelled."<br/>";
                        // echo "test".$declined."<br/>";
                        ?>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-stethoscope" ></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php if(isset($accepted)){echo $accepted; }else{echo 0 ;} ?></h3>
                                <span class="widget-title1">Accepted </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php if(isset($noshow)){echo $noshow; }else{echo 0 ;} ?></h3>
                                <span class="widget-title2">No Show </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-md" ></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php if(isset($cancelled)){echo $cancelled; }else{echo 0 ;} ?></h3>
                                <span class="widget-title3">Cancelled </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-heartbeat"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php if(isset($declined)){echo $declined; }else{echo 0 ;} ?></h3>
                                <span class="widget-title4">Declined</span>
                            </div>
                        </div>
                    </div>
                </div>
                 <p class="content-group">
                    This is the table shows the detals of patient appointment.
                </p>

                <p id="prid" hidden><?php echo $prData->pr_id;?></p>
                <div class="card p-3">

                    <div class="row">
                        <div class="col-md-12">


                            <div id="load" class="d-flex justify-content-center">
                                <div class=" m-40 spinner-border text-primary " style="width: 3rem; height: 3rem;"
                                    role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="offer" class="table table-striped custom-table"  width="100%"  >
                                   <thead>
                                    <tr>
                                        <th>aid</th>
                                        <th>AppointmentDate</th>
                                        <th>DeadlinedDate</th>
                                        <th>Number Available</th>
                                        <th>Offer Date</th>
                                        <th>pa_id</th>
                                        <th>pr_id</th>
                                        <th>Reply Date</th>
                                        <th>status</th>
                                    </tr>
                                </thead>

                                 <tfoot>
                                    <tr>
                                          <th>aid</th>
                                        <th>AppointmentDate</th>
                                        <th>DeadlinedDate</th>
                                        <th>Number Available</th>
                                        <th>Offer Date</th>
                                        <th>pa_id</th>
                                        <th>pr_id</th>
                                        <th>Reply Date</th>
                                        <th>status</th>
                                    </tr>
                                </tfoot>

                                </table>

                            </div>
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

    <script src="../public/js/appoffer.js"></script>


</body>

</html>
