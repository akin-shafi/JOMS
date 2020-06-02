<?php

require_once('../../../private/initialize.php');
$case = $_GET['case'] ?? '';

if ($case == 1) { 
  $page_title =  "On-going Trial";
} elseif ($case == 2) { 
  $page_title =  "Remanded";
} elseif ($case == 3) { 
  $page_title =  "Bailed";
} elseif ($case == 4) { 
  $page_title =  "Adjourned";
} elseif ($case == 5) { 
  $page_title =  "Sentenced";
} elseif ($case == 6) { 
  $page_title =  "Discharged and Acquitted";
}

// $case;
require_login();

// $transactions = Task::recent_cases();

// ! Find all admins
// ? $admins = FortressAdmin::find_all();

// $transactions = CourtCase::find_case_by_judge($loggedInAdmin->id);
$client_case = CourtCase::find_by_undeleted();


?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>



<div class="content container-fluid card">
      
  <section id="column-selectors">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header  pb-2">
            <h4 class="card-title">
              <span class="text-uppercase">Cases Assigned</span> |
              <!-- <span class="text-muted"></span></h4> -->
              <!-- <div class="btn btn-sm btn-primary p-1" data-toggle="modal" data-target="#trans">Add Transaction</div> -->
          </div>
          <div class="card-content">
            <div class="card-body card-dashboard">
              <p class="card-text">The table below displays all cases assigned to you.
              </p>

              <div class="table-responsive">
                <table class="table table-striped dataex-html5-selectors" style="font-size: 14px;">
                  <thead>
                    <tr >
                      <th>No.</th>
                      <th>Case Name</th>
                      <th>Assigned on</th>
                      <th>Type of Matter</th>
                      <th>Case Description</th>
                      <th>Status</th>
                      <th>Uploads</th>
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Waiting for AJAX CALL -->
                   <?php $sn = 1;
                    foreach (CourtCase::find_case_by_judge($loggedInAdmin->id) as $transaction) { ?>
                      <?php if (in_array($transaction->case_progress, [$case])) { ?>
                        <tr>
                          <td ><?php echo $sn++; ?></td>
                          <td ><?php echo $transaction->court_case_name; ?></td>
                          <td ><?php echo date('dS M, Y', strtotime($transaction->assigned_to_judge_on)); ?></td>
                          <td ><?php echo $transaction->court_matter == CourtCase::MATTER[$transaction->court_matter] ? CourtCase::MATTER[$transaction->court_matter] : CourtCase::MATTER[$transaction->court_matter]; ?></td>
                          <td ><?php echo $transaction->description; ?></td>

                          <td >
                            <?php if ($transaction->case_progress == 1) { ?>
                              <span>On-going Trial</span>
                            <?php } elseif ($transaction->case_progress == 2) { ?>
                              <span class="text-warning">Remanded</span>
                            <?php } elseif ($transaction->case_progress == 3) { ?>
                              <span class="text-primary">Bailed</span>
                            <?php } elseif ($transaction->case_progress == 4) { ?>
                              <span class="text-warning">Adjourned</span>
                            <?php } elseif ($transaction->case_progress == 5) { ?>
                              <span class="text-danger">Sentenced</span>
                            <?php } elseif ($transaction->case_progress == 6) { ?>
                              <span class="text-success">Discharged and Acquitted</span>
                            <?php } ?>
                          </td>

                          <td style="font-size: 11px;">
                            <a href="<?php echo url_for('/high-court/pdf_viewer.php?pdf=' . $transaction->id); ?>" class="">
                              <?php if ($transaction->document) { ?>
                                <img width="20" src="<?php echo url_for('/lawyer/upload/pdfs.png'); ?>" class="img-thumbsnail">
                              <?php } else {
                                echo 'NO FILE';
                              } ?>
                            </a>
                          </td>
                          <td class="d-none">
                            <div class="btn-group mb-1">
                                <div class="dropdown ">
                                  <button class="btn btn-primary dropdown-toggle mr-1 waves-effect waves-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Action
                                  </button>
                                  <div class="dropdown-menu ">
                                    <?php if (in_array($transaction->case_progress, [4,6])) { ?>
                                        <button type="button" class="dropdown-item text-danger" id="case_close">Update Status</button>
                                    <?php }else{ ?>
                                         <button class="dropdown-item" id="btn_edit" data-toggle="modal" data-target="#re_assign" data-id="<?php echo $transaction->id ?>">Update Status</button>
                                    <?php } ?>
                                   

                                    

                                    <a class="dropdown-item" href="<?php echo url_for('/high-court/judge/case_file.php?id='. $transaction->id) ?>">Case Record</a>
                                    <a class="dropdown-item" href="<?php echo url_for('/high-court/judge/case_management/edit.php?id='. $transaction->id) ?>">Edit Status</a>
                                  </div>
                                </div>
                              </div>
                            <!-- <button class="btn btn-sm btn-info" id="btn_edit" data-id="<?php //echo $transaction->id ?>" data-toggle="modal" data-target="#re_assign">Update Status</button> -->
                          </td>
                          <!-- <td style="font-size: 10px;">
                            <button class="btn btn-sm btn-info" id="btn_edit" data-id="<?php //echo $transaction->id ?>" data-toggle="modal" data-target="#re_assign">Update Status</button>
                          </td> -->
                        </tr>
                      <?php } ?>
                    <?php } ?>
                   
                  </tbody>
                  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Column selectors with Export Options and print table -->
  <!-- </div> -->

</div>
</div><!-- /.container-fluid -->

</section>

<!-- id="composeForm" tabindex="-1" role="dialog" aria-labelledby="emailCompose" -->
<!-- Modal -->
<div class="modal fade text-left" id="re_assign" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel16" aria-hidden="true">
  <div class="modal-dialog modal-dialog-top  modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel19"><i class="fa fa-tasks text-success"></i>Update Case Status</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" novalidate id="user-data" onsubmit="return false">
        <div class="modal-body">
         
              <!-- <div class="row timeline" id="timeline"></div> -->
              <section class="row">
                  <dl class="col-lg-8 col-md-6 col-12" >
                    <dt class="card p-2" >
                      <input type="hidden" id="updated_by" name="updated_by" value="<?php echo $loggedInAdmin->id; ?>">
                      <input type="hidden" id="id" />
                       <div class="row">
                          <div class="form-group col-6">
                            <label for="assigned_judge">Status</label>
                            <div class="controls">
                              <select name="case_status" required  class="form-control select2 w-100 mt-1" id="case_status"  required data-validation-required-message="This field is required">
                                <option value="">-select-</option>
                                <?php foreach (CourtCase::CASE_STATUS as $key => $status) { ?>
                                  <option value="<?php echo $key; ?>" ><?php echo $status; ?></option>
                                <?php } ?>
                              </select>
                              <!-- <p id="case_error"></p> -->
                            </div>
                          </div>

                          <div class="form-group col-6">
                            <label for="date">Sitting Date</label>
                            <div class="controls">

                                <input type="date" id="hearing_date" name="hearing_date" class=" form-control mt-1" required data-validation-required-message="Required: Enter date of court sitting">
                            </div>
                            <!-- <p id="date_error"></p> -->
                          </div>
                       </div>

                       <div class="form-group" style="display: none" id="ad_wrap">
                          <label for="adjourned_date">Adjourned To</label>
                          <input type="date" class="form-control " id="adjourned_date" name="adjourned_date">
                       </div>
                      

                      <div class="form-group">
                        <label for="judge_summary"> Judgement Summary</label>
                        <div class="controls ">
                          
                          <textarea class="form-control textarea"  id="judge_summary"  name="judge_summary" required
                                data-validation-required-message="Required: Enter Judgement summary" ></textarea>
                        </div>
                        <!-- <p id="comment_error"></p> -->
                      </div>
                      <!-- end -->
                      <div class="d-flex justify-content-end border-top pt-1">
                         <button type="submit"   class="btn-sm btn btn-primary" id="submit" data-edit="update">Assign</button>
                        <input type="Reset" value="Cancel" class="btn-sm btn btn-white btn-secondary" data-dismiss="modal">
                      </div>
                    </dt>
                  </dl>
                  <dl class="col-lg-4 col-md-6 col-12">
                    <div class="card" style="">
                      <div class="card-header">
                        <h4 class="card-title">Case Timeline</h4>
                      </div>
                      <div class="card-content">
                        <div class="card-body">
                          <ul class="activity-timeline timeline-left list-unstyled" id="timeline">
                            
                            
                          </ul>
                        </div>
                      </div>
                    </div>
                  </dl>

              </section>
        </div>

        
      </form>
    </div>
  </div>
</div>



<!-- Modal -->


<?php include(SHARED_PATH . '/joms_footer.php'); ?>
