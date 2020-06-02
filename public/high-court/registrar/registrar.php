<?php

require_once('../../../private/initialize.php');

require_login();

$transactions = CourtCase::recent_cases();


?>
<?php $page_name = 'Registrar';
$page_title = 'Dashboard';
// print_r($loggedInAdmin);
if ($loggedInAdmin->level != 4) {
  redirect_to(url_for('/high-court/logout.php'));
}
?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>
<style type="text/css">
  /*.buttons-copy,.buttons-json,.buttons-pdf{display: none !important;}*/
</style>
<!-- <div class="Quick View"> -->

<div class="row d-flex justify-content-between">
  <div class="col-lg-3 col-sm-6 col-12">
    <a href="<?php echo url_for('/high-court/registrar/assigned.php'); ?>">
      <div class="card">
        <div class="card-header d-flex align-items-start pb-0">
          <div>
            <h2 class="text-bold-700 mb-0"><?php echo count($transactions); ?></h2>
            <p class="text-primary text-bold-700">ALL CASES <?php echo date('(M. dS)'); ?></p>
          </div>
          <div class="avatar bg-rgba-primary p-50 m-0">
            <div class="avatar-content">
              <i class="feather-cpu text-primary font-medium-5"></i>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>

  <div class="col-lg-3 col-sm-6 col-12">
    <a href="<?php echo url_for('/high-court/registrar/unassigned.php'); ?>">
      <div class="card">
        <div class="card-header d-flex align-items-start pb-0">
          <div>
            <h2 class="text-bold-700 mb-0"><?php echo count(CourtCase::find_by_unassigned()); ?></h2>
            <p class="text-danger text-bold-700">UNASSIGNED</p>
          </div>
          <div class="avatar bg-rgba-warning p-50 m-0">
            <div class="avatar-content">
              <i class="feather-alert-octagon text-warning font-medium-5"></i>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>

  <div class="col-lg-3 col-sm-6 col-12">
    <a href="<?php echo url_for('/high-court/registrar/assigned.php'); ?>">
      <div class="card">
        <div class="card-header d-flex align-items-start pb-0">
          <div>
            <h2 class="text-bold-700 mb-0"><?php echo count(CourtCase::find_by_assigned()); ?></h2>
            <p class="text-success text-bold-700">ASSIGNED</p>
          </div>
          <div class="avatar bg-rgba-success p-50 m-0">
            <div class="avatar-content">
              <i class="feather-alert-octagon text-success font-medium-5"></i>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
</div>
<!-- Quick View End -->



<style>
  #message {
    display: none;
  }
</style>
<div class="alert alert-success text-center" id="message"></div>
<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border pb-2">
          <h4 class="card-title">
            <span class="text-uppercase">Recent Activities</span> |
            <span class="text-muted">Filed Cases and Documents</span></h4>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard">
            <p class="card-text">The table below displays all most recent document and case filed from lawyers and users.
            </p>

            <div class="table-responsive">
              <table class="table table-striped dataex-html5-selectors">
                <thead>
                  <tr>
                    <th style="font-size: 10px;">No.</th>
                    <th style="font-size: 10px;">Case Name</th>
                    <th style="font-size: 10px;">Submitted on</th>
                    <th style="font-size: 10px;">Type of Matter</th>
                    <th style="font-size: 10px;">Case Description</th>
                    <th style="font-size: 10px;">Uploads</th>
                    <th style="font-size: 10px;">Action</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                  <tr>
                    <th style="font-size: 10px;">No.</th>
                    <th style="font-size: 10px;">Case Name</th>
                    <th style="font-size: 10px;">Submitted on</th>
                    <th style="font-size: 10px;">Type of Matter</th>
                    <th style="font-size: 10px;">Case Description</th>
                    <th style="font-size: 10px;">Uploads</th>
                    <th style="font-size: 10px;">Action</th>
                  </tr>
                </tfoot>
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


<!-- Modal -->
<div class="modal fade text-left" id="trans" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel19"><i class="fa fa-tasks text-success"></i> Assign Case to Judge</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="user-data" onsubmit="return false">
        <input type="hidden" name="created_by" value="<?php echo $loggedInAdmin->id; ?>" />
        <input type="hidden" name="judge_incharge_id" id="id" />
        <div class="modal-body">
          <div class="form-group">
            <!-- <label for="assigned_judge">Judges</label> -->
            <select name="judge_incharge_id" class="form-control select2 w-100 mt-1" id="judge_incharge_id">
              <option value="">-select-</option>
              <?php foreach (Admin::find_all_judges() as $add) { ?>
                <option value="<?php echo $add->id; ?>"><?php echo $add->full_name(); ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" name="status" value="1" class="custom-control-input" id="checkAssign" required>
            <label class="custom-control-label" for="checkAssign">Assign</label>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-between">
          <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
          <button class="btn btn-sm btn-primary" id="submit" data-edit="update">Assign</button>
        </div>
      </form>
    </div>
  </div>
</div>




<?php include(SHARED_PATH . '/joms_footer.php'); ?>

<script>
  $(document).ready(function() {
    $(document).ready(function() {
      show_record();
      // insert_record();
      get_update();
      update_record();
      // get_delete();
      // delete_record();
    });

    // ========== FETCH RECORD FROM THE DB ==========
    function show_record() {
      $.ajax({
        url: 'process.php',
        method: 'post',
        data: {
          fetchAssignData: 1
        },
        success: function(r) {
          $('tbody').html(r);
        }
      });
    }
    // ========== FETCH RECORD FROM THE DB END ==========

    // ========== UPDATE RECORD IN THE DB ==========
    function get_update() {
      $(document).on('click', '#btn_edit', function() {
        var eId = $(this).attr('data-id');
        $('#id').val(eId);
        $.ajax({
          url: 'process.php',
          method: 'post',
          data: {
            updateData: 1,
            id: eId
          },
          dataType: 'json',
          success: function(r) {
            $('#submit').html('Assign');
            $('#status').val(r.response.status);
            $('#judge_incharge_id').val(r.response.judge_incharge_id);
          }
        });
      });
    }

    function update_record() {
      $(document).on('click', '#submit', function name() {
        var id = $('#id').val();
        var update = $(this).attr('data-edit');
        var status = $('#checkAssign').val();
        var judge_incharge_id = $('#judge_incharge_id').val();

        $.ajax({
          url: 'process.php',
          method: 'post',
          data: {
            id: id,
            update: update,
            status: status,
            judge_incharge_id: judge_incharge_id,
          },
          dataType: 'json',
          success: function(r) {
            console.log(r);
            $('#message').show();
            $('#message').html(r.response);
            $('#user-data')[0].reset();
            $('#trans').modal('hide');
            show_record();
          }
        });
      });
    }
    // ========== UPDATE RECORD IN THE DB END ==========

  });
</script>