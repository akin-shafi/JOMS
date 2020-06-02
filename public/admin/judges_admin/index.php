<?php

require_once('../../../private/initialize.php');

// ! require_login();

// ! Find all admins
// ? $admins = FortressAdmin::find_all();

$all_judges = Admin::find_all_by_court($loggedInAdmin->court_id, ['level' => 3]);


// echo '<pre>';print_r($transactions);echo '</pre>';
if (is_post_request()) {

  $args = $_POST['judges'];
  $args['court_id'] = $loggedInAdmin->court_id;
  $args['level'] = 3;
  $judge = new Admin($args);
  $result = $judge->save();

  if ($result === true) {
    $session->message('A New Judge has being added.');
    redirect_to(url_for('admin/judges_admin/index.php'));
  } else {
    // show errors
  }
} else {
  $judge = new Admin;
}

$edit = false;

?>

<?php $page_title = 'All Judges'; ?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>
<style type="text/css">
  /*.buttons-copy,.buttons-json,.buttons-pdf{display: none !important;}*/
</style>
<!-- <div class="Quick View"> -->

<div class="row d-flex justify-content-between">
  <div class="col-lg-3 col-sm-6 col-12">
    <a href="#">
      <div class="card">
        <div class="card-header d-flex align-items-start pb-0">
          <div>
            <h2 class="text-bold-700 mb-0"><?php echo count($all_judges); ?></h2>
            <p class="text-primary text-bold-700">Total Judges</p>
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
</div>
<!-- Quick View End -->




<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="text-success text-center d-flex justify-content-center mn-4"><?php echo display_session_message(); ?></div>

        <div class="text-danger text-center d-flex justify-content-center mn-4"><?php echo display_errors($judge->errors); ?></div>
        <div class="card-header border pb-2">
          <h4 class="card-title">
            <span class="text-uppercase">All Judges</span> |
            <small class="text-muted">In Rivers State Judicial Service Commission</small></h4>
          <div class="btn btn-sm btn-primary p-1" data-toggle="modal" data-target="#judge">Add New Judge</div>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard">
            <!-- <p class="card-text">The table below displays all most recent document and case filed from lawyers and users.
            </p> -->

            <div class="table-responsive">
              <table class="table table-striped dataex-html5-selectors">
                <thead>

                  <tr>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">S/N</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">First name</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Last name</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Email</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Phone</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Court</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Court Division</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Court Assigned To</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sn = 1;
                  foreach ($all_judges as $value) { ?>
                    <tr>
                      <td class="text-bold-700" style="font-size: 12px;"><?php echo $sn++ ?></td>
                      <td class="text-bold-700" style="font-size: 12px;"><?php echo $value->first_name ?></td>
                      <td class="text-bold-700" style="font-size: 12px;"><?php echo $value->last_name ?></td>
                      <td class="text-bold-700" style="font-size: 12px;"><?php echo $value->email ?></td>
                      <td class="text-bold-700" style="font-size: 12px;"><?php echo $value->phone ?></td>
                      <td class="text-bold-700" style="font-size: 12px;"><?php echo CourtCase::COURT_TYPE[$value->court_id] ?></td>
                      <td class="text-bold-700" style="font-size: 12px;"><?php echo CourtCase::COURT_DIVISION[$value->court_division] ?></td>
                      <td class="text-bold-700" style="font-size: 12px;"><?php echo $value->court_type ? CourtType::find_by_id($value->court_type)->court_name : 'Not Assigned to any Court' ?></td>
                      <td class="product-action">
                        <a href="<?php echo url_for('admin/judges_admin/edit.php?id=' . $value->id) ?>" class="action-view text-info mr-2">
                          <i class="feather-maximize-2"></i>
                        </a>
                        <a href="<?php echo url_for('admin/judges_admin/delete.php?id=' . $value->id) ?>" class="action-edit text-warning">
                          <i class="feather-edit"></i>
                        </a>
                      </td>



                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">S/N</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">First name</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Last name</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Email</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Phone</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Court</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Court Division</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Court Assigned To</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Actions</th>
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
<div class="modal fade text-left" id="judge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel19">New Judge</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        <input type="hidden" name="created_by" value="<?php echo $loggedInAdmin->id; ?>" />
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label" for="first_name">First Name</label>
                  <input class="form-control" value="<?php echo $judge->first_name; ?>" type="text" name="judges[first_name]" id="first_name">
                </div>

                <div class="form-group">
                  <label class="control-label" for="last_name">Last Name</label>
                  <input class="form-control" value="<?php echo $judge->last_name; ?>" type="text" name="judges[last_name]" id="last_name">
                </div>

                <div class="form-group">
                  <label class="control-label" for="phone">Phone Number</label>
                  <input class="form-control" value="<?php echo $judge->phone; ?>" type="number" name="judges[phone]" id="phone">
                </div>

                <div class="form-group">
                  <label class="control-label" for="email">Email</label>
                  <input class="form-control" value="<?php echo $judge->email; ?>" type="email" name="judges[email]" id="email">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label" for="court_division">Court Division</label>
                  <select class="form-control" name="judges[court_division]" id="court_division" onclick="findCourtByDivision()">
                    <option value="">choose</option>
                    <?php foreach (CourtCase::COURT_DIVISION as $key => $value) { ?>
                      <option value="<?php echo $key ?>" <?php echo $key == $judge->court_division ? 'selected' : ''; ?>><?php echo $value ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group fil">
                  <label class="control-label" for="court_type">Court Type</label>
                  <select class="form-control" name="judges[court_type]">
                    <option value="">choose</option>
                  </select>
                </div>

                <?php if ($edit == false) { ?>
                  <div class="form-group">
                    <label class="control-label" for="password">Password</label>
                    <input class="form-control" value="<?php echo $judge->password; ?>" type="password" name="judges[password]" id="password">
                  </div>

                  <div class="form-group">
                    <label class="control-label" for="confirm_password">Confirm Password</label>
                    <input class="form-control" value="<?php echo $judge->confirm_password; ?>" type="password" name="judges[confirm_password]" id="confirm_password">
                  </div>
                <?php } ?>

              </div>

            </div>
          </div>

        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button> -->
          <input type="submit" class="btn btn-primary" value="Create">
        </div>
      </form>
    </div>
  </div>
</div>




<?php include(SHARED_PATH . '/joms_footer.php'); ?>
<script src="<?php echo url_for('/js/script.js') ?>"></script>