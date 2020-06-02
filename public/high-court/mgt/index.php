<?php
require_once('../../../private/initialize.php');
require_login();
// if(!in_array($loggedInAdmin->level, [1,2])) { redirect_to(url_for('admin/dashboard.php')); }

$management = Admin::find_by_division($loggedInAdmin->id, $loggedInAdmin->court_division);

?>
<?php $page_title = 'Dashboard' ?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>

<!-- Column selectors with Export Options and print table -->

<div class="row d-flex justify-content-between">
  <div class="col-lg-3 col-sm-6 col-12">
    <a href="#">
      <div class="card">
        <div class="card-header d-flex align-items-start pb-0">
          <div>
            <h2 class="text-bold-700 mb-0"><?php echo count($management) - 1; ?></h2>
            <p class="text-primary text-bold-700">ALL STAFF</p>
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

<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="text-success text-center d-flex justify-content-center mn-4"><?php echo display_session_message(); ?></div>

        <div class="card-header border pb-2">
          <h4 class="card-title">
            <span class="text-uppercase">All Non-Judicial Officer</span> | 
          </h4>
          <div class="justify-content-end">
            <a href="<?php echo url_for('/high-court/mgt/new.php') ?>" class="btn btn-sm btn-primary p-1 mr-1">Add New Officer</a>
            <a href="<?php echo url_for('/high-court/mgt/new_office.php') ?>" class="btn btn-sm btn-outline-primary p-1">Create Office</a>
          </div>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard">
            <div class="table-responsive">
              <table class="table table-striped dataex-html5-selectors">
                <thead>
                  <tr role="row">
                    <th style="font-size: 11px">S/N</th>
                    <th style="font-size: 11px">Full name</th>
                    <th style="font-size: 11px">Email</th>
                    <th style="font-size: 11px">Phone Number</th>
                    <th style="font-size: 11px">Admin Level</th>
                    <th style="font-size: 11px">Court Division</th>
                    <th style="font-size: 11px">Court</th>
                    <th style="font-size: 11px">Created By</th>
                    <th style="font-size: 11px">Created At</th>
                    <th style="font-size: 11px">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sn = 1;
                  foreach ($management as $value) {
                    if ($value->id == 1) {
                      continue;
                    }
                  ?>
                    <tr>
                      <td style="font-size: 12px"><?php echo $sn++ ?></td>
                      <td style="font-size: 12px"><?php echo $value->full_name() ?></td>
                      <td style="font-size: 12px"><?php echo $value->email ?></td>
                      <td style="font-size: 12px"><?php echo $value->phone ?></td>
                      <td style="font-size: 12px"><?php echo Admin::ADMIN_LEVEL[$value->level] ?></td>
                      <td style="font-size: 12px"><?php echo CourtCase::COURT_DIVISION[$value->court_division] ?></td>
                      <td style="font-size: 12px"><?php echo CourtCase::COURT_TYPE[$value->court_id] ?></td>
                      <td style="font-size: 12px"><?php echo Admin::find_created_by($value->created_by)->full_name() ?></td>
                      <td style="font-size: 12px"><?php echo date('dS M, Y', strtotime($value->created_on)) ?></td>
                      <td class="actions" style="font-size: 12px">
                        <a href="<?php echo url_for('/high-court/mgt/edit.php?id=' . $value->id) ?>" class="action-view text-info mr-2">
                          <i class="feather-maximize-2"></i> </a>
                        <a href="<?php echo url_for('high-court/mgt/delete.php?id=' . $value->id) ?>" class="action-edit text-danger">
                          <i class="feather-trash"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr role="row">
                    <th style="font-size: 11px">S/N</th>
                    <th style="font-size: 11px">Full name</th>
                    <th style="font-size: 11px">Email</th>
                    <th style="font-size: 11px">Phone Number</th>
                    <th style="font-size: 11px">Admin Level</th>
                    <th style="font-size: 11px">Court Division</th>
                    <th style="font-size: 11px">Court</th>
                    <th style="font-size: 11px">Actions</th>
                  </tr>
                  <!-- <tr>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">S/N</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">First name</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Last name</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Email</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Phone</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Court</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Court Division</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Court Assigned To</th>
                    <th class="text-bold-700" style="color:black;font-size: 10px;">Actions</th>
                  </tr> -->
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



<?php include(SHARED_PATH . '/joms_footer.php'); ?>