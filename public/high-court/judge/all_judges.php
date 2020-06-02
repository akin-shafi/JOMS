<?php

require_once('../../../private/initialize.php');
$page_title = "All Cases";
require_login();

// ! Find all admins
// ? $admins = FortressAdmin::find_all();

$transactions = Task::recent_cases();
$client_case = CourtCase::find_by_undeleted();
?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>

<section id="basic-examples">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">

            <!-- <div id='calendar'></div> -->
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- calendar Modal starts-->
  <div class="modal fade text-left modal-calendar" tabindex="-1" role="dialog" aria-labelledby="cal-modal" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-text-bold-600" id="cal-modal">Add Event</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="#">
          <div class="modal-body">
            <div class="d-flex justify-content-between align-items-center add-category">
              <div class="chip-wrapper"></div>
              <div class="label-icon pt-1 pb-2 dropdown calendar-dropdown">
                <i class="feather-tag dropdown-toggle" id="cal-event-category" data-toggle="dropdown"></i>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="cal-event-category">
                  <span class="dropdown-item business" data-color="success">
                    <span class="bullet bullet-success bullet-sm mr-25"></span>
                    Business
                  </span>
                  <span class="dropdown-item work" data-color="warning">
                    <span class="bullet bullet-warning bullet-sm mr-25"></span>
                    Work
                  </span>
                  <span class="dropdown-item personal" data-color="danger">
                    <span class="bullet bullet-danger bullet-sm mr-25"></span>
                    Personal
                  </span>
                  <span class="dropdown-item others" data-color="primary">
                    <span class="bullet bullet-primary bullet-sm mr-25"></span>
                    Others
                  </span>
                </div>
              </div>
            </div>
            <fieldset class="form-label-group">
              <input type="text" class="form-control" id="cal-event-title" placeholder="Event Title">
              <label for="cal-event-title">Event Title</label>
            </fieldset>
            <fieldset class="form-label-group">
              <input type="text" class="form-control pickadate" id="cal-start-date" placeholder="Start Date">
              <label for="cal-start-date">Start Date</label>
            </fieldset>
            <fieldset class="form-label-group">
              <input type="text" class="form-control pickadate" id="cal-end-date" placeholder="End Date">
              <label for="cal-end-date">End Date</label>
            </fieldset>
            <fieldset class="form-label-group">
              <textarea class="form-control" id="cal-description" rows="5" placeholder="Description"></textarea>
              <label for="cal-description">Description</label>
            </fieldset>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary cal-add-event waves-effect waves-light" disabled>
              Add Event</button>
            <button type="button" class="btn btn-primary d-none cal-submit-event waves-effect waves-light" disabled>submit</button>
            <button type="button" class="btn btn-flat-danger cancel-event waves-effect waves-light" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-flat-danger remove-event d-none waves-effect waves-light" data-dismiss="modal">Remove</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- calendar Modal ends-->
</section>




<?php include(SHARED_PATH . '/joms_footer.php'); ?>


<script>
  $(document).ready(function() {
    $.ajax({
      url: 'calendar.php',
      method: 'post',
      data: {
        calendar: 1
      },
      dataType: 'json',
      success: function(r) {
        console.log(r.event);
        console.log(r.title);
        console.log(r.start);
        console.log(r);
        title: 'Gafar Long Event'
        start: '2020-02-20'
        end: '2020-02-21'
      }
    });
  });
</script>