<?php

require_once('../../private/initialize.php');

require_login();
// echo '<pre>';print_r($loggedInClient);'</pre>'
// Find all admins
// $admins = FortressAdmin::find_all();

?>
<?php $page_name = '';
$page_title = 'Dashboard'; ?>
<?php include(SHARED_PATH . '/lawyer_header.php'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo url_for('css/dropzone.min-2.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo url_for('css/data-list-view.min.css') ?>">

<style>
  .dt-buttons {
    display: none !important;
  }
</style>
<!-- Data list view starts -->
<section id="data-list-view" class="data-list-view-header">


  <div class="row">
    <div class="col-md-12">
      <div class="card-group m-b-30">
        

       

        <div class="card">
          <div class="card-body bg-gradient-warning m-1 ">
            <div class="mb-3">Pending </div>

            <div class="d-flex justify-content-between">
              <div>
                <!-- <i class="fa fa-gavel "></i> -->
                <i class="las la-undo-alt fa-3x"></i>
              </div>

              <div>
                <h3 class=" text-bold text-white fa-3x" id="adjourned">0</h3>
              </div>


            </div>


          </div>
        </div>

        <!-- <div class="card">
          <div class="card-body bg-gradient-success m-1 ">
            <div class="mb-3">Bailed</div>

            <div class="d-flex justify-content-between">
              <div>
                <i class="fa fa-gavel fa-3x"></i>
              </div>

              <div>
                <h3 class=" text-bold text-white fa-3x" id="bailed">0</h3>
              </div>


            </div>


          </div>
        </div> -->

        <div class="card">
          <div class="card-body card-body bg-gradient-danger m-1 ">
            <div class="mb-3">on Trail</div>

            <div class="d-flex justify-content-between">
              <div>
                <i class="las la-balance-scale fa-3x"></i>
              </div>

              <div>
                <h3 class=" text-bold text-white fa-3x" id="sentenced">0</h3>
              </div>


            </div>

          </div>
        </div>
        <div class="card">
          <div class="card-body card-body bg-success m-1 ">
            <div class="mb-3 text-white">Concluded Case</div>

            <div class="d-flex justify-content-between">
              <div>
                <!-- <i class="las la-free-code-camp "></i> -->
                <i class="lab la-accessible-icon fa-3x text-white"></i>
              </div>

              <div>
                <h3 class=" text-bold text-white fa-3x" id="discharged">0</h3>
              </div>


            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="action-btns d-none">
    <div class="btn-dropdown mr-1 mb-1">
      <div class="btn-group dropdown actions-dropodown">
        <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Actions
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Delete</a>
          <a class="dropdown-item" href="#">Archive</a>
          <a class="dropdown-item" href="#">Print</a>
          <a class="dropdown-item" href="#">Another Action</a>
        </div>
      </div>
    </div>
  </div>

  <!-- DataTable starts -->
  <div class="table-responsive">
    <table class="table data-list-view">
      <thead>
        <tr>
          <th></th>
          <th>Case Name</th>
          <th>Court Type</th>
          <th>Created on</th>
          <th>Trans. No.</th>
          <th>Trans. Status</th>
          <th>Judge Assigned</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach (CourtCase::find_by_client_id($loggedInClient->id) as $cCase) { ?>
          <tr>
            <td></td>
            <td><?php echo $cCase->court_case_name ?></td>
            <td><?php echo CourtCase::COURT_TYPE[$cCase->court_id] ?></td>
            <td><?php echo date('dS M, Y', strtotime($cCase->created_on)) ?></td>
            <td><?php echo Transaction::find_by_case_id($cCase->id)->trans_no ?? 'NOT SET' ?></td>
            <td>
              <?php if ($cCase->approval == 0) { ?>
                <div class="chip chip-warning">
                  <div class="chip-body">
                    <div class="chip-text">Pending...</div>
                  </div>
                </div>
              <?php } elseif ($cCase->approval == 1) { ?>
                <div class="chip chip-primary">
                  <div class="chip-body">
                    <div class="chip-text">Approved</div>
                  </div>
                </div>
              <?php } ?>
            </td>
            <td>
              <?php if ($cCase->judge_incharge_id) { ?>
                <!-- <div class="chip chip-success"> -->
                  <!-- <div class="chip-body"> -->
                    <div class="chip-text">JSC: <?php echo Admin::find_by_id($cCase->judge_incharge_id)->full_name() ?></div>
                  <!-- </div> -->
                <!-- </div> -->
              <?php } else { ?>
                NOT ASSIGNED
              <?php } ?>
            </td>
            <td class="product-action" style="width: 85px;">
              <a href="<?php echo url_for('/lawyer/case_details.php')?>" class="action-view text-info mr-1"><i class="feather-maximize-2"></i></a>
              <span class="action-edit text-warning mr-1"><i class="feather-edit"></i></span>
              <a href="<?php echo url_for('/lawyer/invoice.php?receipt='.$cCase->id)?>" class="action-print text-secondary"><i class="fa fa-print"></i></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <!-- DataTable ends -->

  <!-- add new sidebar starts -->
  <div class="add-new-data-sidebar">
    <div class="overlay-bg"></div>
    <div class="add-new-data">
      <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
        <div>
          <h4>ADD NEW DATA</h4>
        </div>
        <div class="hide-data-sidebar">
          <i class="feather-x"></i>
        </div>
      </div>
      <div class="data-items pb-3">
        <div class="data-fields px-2 mt-3">
          <div class="row">
            <div class="col-sm-12 data-field-col">
              <label for="data-name">Name</label>
              <input type="text" class="form-control" id="data-name">
            </div>
            <div class="col-sm-12 data-field-col">
              <label for="data-category"> Category </label>
              <select class="form-control" id="data-category">
                <option>Audio</option>
                <option>Computers</option>
                <option>Fitness</option>
                <option>Appliance</option>
              </select>
            </div>
            <div class="col-sm-12 data-field-col">
              <label for="data-status">Order Status</label>
              <select class="form-control" id="data-status">
                <option>Pending</option>
                <option>Canceled</option>
                <option>Delivered</option>
                <option>On Hold</option>
              </select>
            </div>
            <div class="col-sm-12 data-field-col">
              <label for="data-price">Price</label>
              <input type="number" class="form-control" id="data-price">
            </div>
            <div class="col-sm-12 data-field-col data-list-upload">
              <form action="#" class="dropzone dropzone-area" id="dataListUpload">
                <div class="dz-message">Upload Image</div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
        <div class="add-data-btn">
          <button class="btn btn-primary">Add Data</button>
        </div>
        <div class="cancel-data-btn">
          <button class="btn btn-outline-danger">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <!-- add new sidebar ends -->
</section>
<!-- Data list view end -->


<?php include(SHARED_PATH . '/lawyer_footer.php'); ?>

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo url_for('js/jquery.sticky.js') ?>"></script>
<script src="<?php echo url_for('js/dropzone.min.js') ?>"></script>
<script src="<?php echo url_for('js/datatables.min.js') ?>"></script>
<script src="<?php echo url_for('js/datatables.buttons.min.js') ?>"></script>
<script src="<?php echo url_for('js/datatables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo url_for('js/buttons.bootstrap.min.js') ?>"></script>
<script src="<?php echo url_for('js/datatables.checkboxes.min.js') ?>"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="<?php echo url_for('js/data-list-view.min.js') ?>"></script>
<!-- END: Page JS-->