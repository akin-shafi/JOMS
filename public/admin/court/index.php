<?php
require_once('../../../private/initialize.php');
require_login();
if(!in_array($loggedInAdmin->level, [1,2])) { redirect_to(url_for('admin/dashboard.php')); }

$court_type = CourtType::find_all_by_court($loggedInAdmin->court_id);
$sn=1
?>
<?php $page_title = 'Court' ?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>

<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="text-success text-center d-flex justify-content-center mn-4"><?php echo display_session_message(); ?></div>

        <div class="text-danger text-center d-flex justify-content-center mn-4"><?php //echo display_errors($judge->errors); ?></div>
        <div class="card-header border pb-2">
          <h4 class="card-title">
            <span class="text-uppercase">All Courts Rooms</span> |
            <!-- <small class="text-muted">In Rivers State Judicial Service Commission</small> -->
        </h4>
          <a href="<?php echo url_for('/admin/court/new.php') ?>" class="btn btn-sm btn-primary p-1" >Add New Court</a>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard">
            <!-- <p class="card-text">The table below displays all most recent document and case filed from lawyers and users.
            </p> -->

            <div class="table-responsive">
              <table class="table table-striped dataex-html5-selectors">
                <thead>
                  <tr role="row">
                        <th>S/N</th>
                        <th>Court name</th>
                        <th>Judge in charge</th>
                        <th>Court</th>
                        <th>Court Division</th>
                        <th>Actions</th>
                    </tr>
                    <!-- 
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
                  </tr> -->
                </thead>
                <tbody>
                   <?php $sn = 1; foreach ($court_type as $value) { ?>
                    <tr>
                        <td><?php echo $sn++ ?></td>
                        <td><?php echo $value->court_name ?></td>
                        <td><?php echo Admin::find_court_type($value->id, ['level'=>4]) ? Admin::find_court_type($value->id, ['level'=>4])->full_name() : 'Not Assigned to any Judge' ?></td>
                        <td><?php echo CourtCase::COURT_TYPE[$value->court_id] ?></td>
                        <td><?php echo CourtCase::COURT_DIVISION[$value->court_division] ?></td>
                        <td class="actions">
                            <a href="<?php echo url_for('admin/court/edit.php?id='.$value->id) ?>" class="action-view text-info mr-2">
                          <i class="feather-maximize-2"></i> EDIT </a>
                            <a href="<?php echo url_for('admin/court/delete.php?id='.$value->id) ?>" class="action-edit text-danger">
                          <i class="feather-trash"></i> DELETE</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                 <tr role="row">
                    <th>S/N</th>
                    <th>Court name</th>
                    <th>Judge in charge</th>
                    <th>Court</th>
                    <th>Court Division</th>
                    <th>Actions</th>
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