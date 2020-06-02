<?php

require_once('../../../private/initialize.php');

require_login();
$judeg_case = CourtCase::find_case_by_judge($loggedInAdmin->id);
// pre_r();

// ! Find all admins
// ? $admins = FortressAdmin::find_all();

$transactions = Task::recent_cases();

//* */ echo '<pre>';print_r($transactions);echo '</pre>';

?>
<?php $page_name = 'Chief Judge';
$page_title = 'Judgement';

?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>
<style type="text/css">
  /*.buttons-copy,.buttons-json,.buttons-pdf{display: none !important;}*/
</style>
<!-- <div class="Quick View"> -->


<!-- Quick View End -->




<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <div class="border-bottom h3 pb-2 text-uppercase">Preparation of Certified true copy</div>
  
  <div class="row">
    <div class="col-lg-9 border-right ">
      <div class="clearfix">
        <div class="btn-group mb-2 float-right">
          <div class="btn btn-md btn-primary">Judgment</div>
          <div class="btn btn-md btn-outline-primary">Ruling</div>
        </div>
      </div>

      <div class="card">
        <form>
        <input type="hidden" name="created_by" value="<?php echo $loggedInAdmin->id; ?>" />
        <div class="modal-body">
          <input type="hidden" name="" placeholder="type of matter">
          <input type="hidden" name="" placeholder="offence">

           

          <div class="form-group">
            <label for="trans_no">Case title</label>
            <select name="court_case_name" required class="form-control select2 w-100 mt-1" id="case_progress">
              <option value="">-select-</option>
              <?php foreach ($judeg_case as $key => $status) { ?>
                <option value="<?php echo $key; ?>"><?php echo $status->court_case_name; ?></option>
              <?php } ?>
            </select>
          </div>
         
          <div class="form-group">
            <label for="p_payment">Judgement Type</label>
            <select name="case_progress" required class="form-control select2 w-100 mt-1" id="case_progress">
              <option value="">-select-</option>
              <option value="">Sentenced</option>
              <option value="">Discharge and Aquitted</option>
              <?php //foreach (CourtCase::CASE_STATUS as $key => $status) { ?>
                <option value="<?php //echo $key; ?>"><?php// echo $status; ?></option>
              <?php //} ?>
            </select>
          </div>
          
          <div class="form-group">
            <label for="s_name">Judgement</label>
            <textarea class="form-control form-control-md" placeholder="Enter Judgement here"></textarea>
            <!-- <input type="text" class="form-control form-control-md" id="s_name" placeholder="Subscriber Name"> -->
          </div>

          <!-- <div class="form-group">
            <input type="checkbox" name="">
            <label>Add stamsp</label>
          </div> -->
        </div>
        <div class="modal-footer">
          <button type="Submit" class="btn btn-outline-primary" data-dismiss="modal">Save & Stamp</button>
          <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Save with Stamp</button> -->
        </div>
      </form>
      </div>
    </div>

    <div class="col-lg-3">
      <h4 class="border-bottom">Refrence</h4>
    </div>
  </div>
</section>
<!-- Column selectors with Export Options and print table -->
<!-- </div> -->


<!-- Modal -->
<div class="modal fade text-left" id="trans" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel19">New Transaction</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
        <input type="hidden" name="created_by" value="<?php echo $loggedInAdmin->id; ?>" />
        <div class="modal-body">
          <div class="form-group">
            <label for="trans_no">Transaction Number</label>
            <input type="text" class="form-control form-control-sm" id="transa_no" placeholder="Transaction Number">
          </div>
          <div class="form-group">
            <label for="p_payment">Payment Purpose</label>
            <select name="" id="" class="form-control form-control-sm select2 w-100" id="p_payment">
              <option value="">-select-</option>
              <option value="1">Litigation</option>
              <option value="2">Marriage Certificate</option>
            </select>
          </div>
          <div class="form-group">
            <label for="p_mode">Payment Mode</label>
            <select name="" id="" class="form-control form-control-sm select2 w-100" id="p_mode">
              <option value="">-select-</option>
              <option value="1">POS</option>
              <option value="2">Bank Payment</option>
            </select>
          </div>
          <div class="form-group">
            <label for="s_name">Subscriber Name</label>
            <input type="text" class="form-control form-control-sm" id="s_name" placeholder="Subscriber Name">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>




<?php include(SHARED_PATH . '/joms_footer.php'); ?>