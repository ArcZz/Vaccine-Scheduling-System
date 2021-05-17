<?php include("header.php");
include '../api/slotfetch.php';
?>

<body>
    <div class="main-wrapper">
         <?php $identity = "Patient"; $num = 1; include("menubar.php");
         $id = $patientData->pa_id;

         ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                      <?php if ($failreport == 0) {
                          echo ' <div class="alert alert-danger" role="alert">  No data found or No permission, please login again </div>';
                      }
                      ?>
                        <!-- <form action = "" method = "POST" > -->
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
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
                                                    <input type="checkbox" name = "slot[]" value = 1 <?php if(in_array('1', $slotArray)){echo 'checked';} ?> >
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 4 <?php if(in_array('4', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 7 <?php if(in_array('7', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 10 <?php if(in_array('10', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 13 <?php if(in_array('13', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 16 <?php if(in_array('16', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 19 <?php if(in_array('19', $slotArray)){echo 'checked';} ?>>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>12:00 PM to 16:00 PM</td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 2 <?php if(in_array('2', $slotArray)){echo 'checked';} ?>>
                                                </td>

                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 5 <?php if(in_array('5', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 8 <?php if(in_array('8', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 11 <?php if(in_array('11', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 14 <?php if(in_array('14', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 17 <?php if(in_array('17', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 20 <?php if(in_array('20', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>16:00 PM to 20:00 PM</td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 3 <?php if(in_array('3', $slotArray)){echo 'checked';} ?>>
                                                </td>

                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 6 <?php if(in_array('6', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 9 <?php if(in_array('9', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 12 <?php if(in_array('12', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 15 <?php if(in_array('15', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 18 <?php if(in_array('18', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name = "slot[]" value = 21 <?php if(in_array('21', $slotArray)){echo 'checked';} ?>>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-center m-t-20">
                                    <button id = "slotsubmit" type="submit" name = "submit-slot" class="btn btn-primary submit-btn" data-toggle="modal" data-target="#save_type">Save Changes</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        // echo "test test <br/>";
                            if(isset($_POST['submit-slot'])){
                              if(!empty($_POST['slot'])){
                                // check and delete unchecked slot
                                foreach($slotArray as $old){
                                  if(!in_array($old, $_POST['slot'])){
                                    $db->flush();
                                    $db->query_prepared('DELETE FROM PatientPreferredSlot WHERE sid = ? AND pa_id = ?',
                                                        [$old, $id]);
                                  }
                                }

                                // check and add new preferred slot
                                foreach($_POST['slot'] as $selected){
                                  //echo "selected slot#: ".$selected."<br/>";
                                  // echo gettype($_POST['slot']);
                                  $db->flush();
                                  $db->query_prepared('SELECT sid, pa_id FROM PatientPreferredSlot WHERE sid = ? AND pa_id = ?',
                                                      [$selected, $id]);
                                  $result = $db->queryResult();
                                  if(!isset($result[0]->sid)){
                                    // if not exist in DB, then add to DB
                                    $db->query_prepared('INSERT INTO PatientPreferredSlot(sid, pa_id)
                                                        VALUES(?,?);',
                                                        [$selected, $id]);
                                  }
                                }

                              }
                              else{ //if no slot checked, then delete all
                                $db->flush();
                                $db->query_prepared('DELETE FROM PatientPreferredSlot WHERE pa_id = ?',
                                                    [$id]);
                              }
                              echo "<meta http-equiv='refresh' content='0'>";
                              echo ' <div class="alert m-t-30 alert-info" role="alert"> Preferred Time Slot updated, Check it out</div>';
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
    //test
    $(function() {
        console.log("on");
        $("#slotsubmit").click(function() {

            });
    })
    </script>
</body>


<iframe id="is_iframe" name="the_iframe" style="display:none;"></iframe>

</html>
