<?php include("header.php");
//include '../api/jwtkey.php';
include '../api/db.php';
?>

<body>
    <div class="main-wrapper">
         <?php $identity = "Patient"; $num = 1; include("menubar.php");
        //  $id = backid($k);
         $id = 1;

         ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action = "#" method = "POST">
                            <h3 class="page-title">Preferred Time Slot</h3>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-striped custom-table">
                                        <thead>
                                            <tr>
                                                <th>Week time</th>
                                                <th class="text-center">Mon</th>
                                                <th class="text-center">Tues</th>
                                                <th class="text-center">Wed</th>
                                                <th class="text-center">Thur</th>
                                                <th class="text-center">Fri</th>
                                                <th class="text-center">Sat</th>
                                                <th class="text-center">Sun</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>8:00 AM to 12:00 PM</td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 1 >
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 4>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 7>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 10>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 13>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 16>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 19>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>12:00 PM to 16:00 PM</td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 2>
                                                </td>

                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 5>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 8>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 11>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 14>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 17>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 20>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>16:00 PM to 20:00 PM</td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 3>
                                                </td>

                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 6>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 9>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 12>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 15>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 18>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 21>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-center m-t-20">
                                    <button type="submit" name = "submit-slot" class="btn btn-primary submit-btn">Save Changes</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        //echo "test test <br/>";
                            if(isset($_POST['submit-slot'])){
                              if(!empty($_POST['slot'])){
                                foreach($_POST['slot'] as $selected){
                                  //echo "selected slot#: ".$selected."<br/>";
                                  $db->flush();
                                  $db->query_prepared('SELECT sid, pa_id FROM PatientPreferredSlot WHERE sid = ? AND pa_id = ?',
                                                      [$selected, $id]);
                                  $result = $db->queryResult();
                                  $resultCount = count($result);
                                  if($resultCount == 0){
                                    // if not exist in DB, then add to DB
                                    flush();
                                    $db->query_prepared('INSERT INTO PatientPreferredSlot(sid, pa_id)
                                                        VALUES(?,?);',
                                                        [$selected, $id]);
                                  }

                                }
                              }
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
</body>



</html>
