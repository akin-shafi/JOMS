<?php

require_once('../../../private/initialize.php');

require_login();

// ! Find all admins
// ? $admins = FortressAdmin::find_all();

$transactions = Task::recent_cases();
// $client_case = ClientCase::find_by_undeleted();

//* */ echo '<pre>';print_r($transactions);echo '</pre>';

// echo json_encode($data[0]['title']);
// echo '<pre>'; 
// echo json_encode($data);
// echo '</pre>';

?>
<?php $page_name = 'Judge';
$page_title = 'Dashboard';
if ($loggedInAdmin->level != 3) {
  redirect_to(url_for('/high-court/logout.php'));
}
?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<!-- Mirrored from pixinvent.com/demo/vuexy-html-bootstrap-admin-template/html/ltr/horizontal-menu-template-dark/app-calender.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Oct 2019 19:29:02 GMT -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>App Calender - Vuexy - Bootstrap HTML admin template</title>
  <link rel="apple-touch-icon" href="apple-icon-120.html">
  <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,50a0,600" rel="stylesheet">

  <!-- BEGIN: Vendor CSS-->
  <link rel="stylesheet" type="text/css" href="calendar/css/vendors.min.css">
  <link rel="stylesheet" type="text/css" href="calendar/css/fullcalendar.min.css">
  <link rel="stylesheet" type="text/css" href="calendar/css/daygrid.min.css">
  <link rel="stylesheet" type="text/css" href="calendar/css/timegrid.min.css">
  <link rel="stylesheet" type="text/css" href="calendar/css/pickadate.css">
  <!-- END: Vendor CSS-->

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" type="text/css" href="calendar/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="calendar/css/bootstrap-extended.min.css">
  <link rel="stylesheet" type="text/css" href="calendar/css/colors.min.css">
  <link rel="stylesheet" type="text/css" href="calendar/css/components.min.css">
  <link rel="stylesheet" type="text/css" href="calendar/css/dark-layout.min.css">
  <link rel="stylesheet" type="text/css" href="calendar/css/semi-dark-layout.min.css">

  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" type="text/css" href="calendar/css/horizontal-menu.min.css">
  <link rel="stylesheet" type="text/css" href="calendar/css/palette-gradient.min.css">
  <link rel="stylesheet" type="text/css" href="calendar/css/fullcalendar.min-2.css">
  <!-- END: Page CSS-->

  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" type="text/css" href="calendar/css/style.css">
  <link rel="stylesheet" type="text/css" href="calendar/css/feather.css">
  <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu dark-layout 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" data-layout="dark-layout">

  <!-- BEGIN: Header-->

  <!-- END: Header-->


  <!-- BEGIN: Main Menu-->
  
  <!-- END: Main Menu-->

  <!-- BEGIN: Content-->

    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- Full calendar start -->
        <section id="basic-examples">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div class="cal-category-bullets d-none">
                      <div class="bullets-group-1 mt-2">
                        <div class="category-business mr-1">
                          <span class="bullet bullet-success bullet-sm mr-25"></span>
                          Business
                        </div>
                        <div class="category-work mr-1">
                          <span class="bullet bullet-warning bullet-sm mr-25"></span>
                          Work
                        </div>
                        <div class="category-personal mr-1">
                          <span class="bullet bullet-danger bullet-sm mr-25"></span>
                          Personal
                        </div>
                        <div class="category-others">
                          <span class="bullet bullet-primary bullet-sm mr-25"></span>
                          Others
                        </div>
                      </div>
                    </div>
                    <div id='fc-default'></div>
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
        <!-- // Full calendar end -->

      </div>
    </div>
  <!-- END: Content-->


  <!-- BEGIN: Customizer-->
 
  <!-- End: Customizer-->

  <!-- Buynow Button-->

  <!-- BEGIN: Footer-->

  <!-- END: Footer-->


  <!-- BEGIN: Vendor JS-->
  <script src="calendar/js/vendors.min.js"></script>
  <!-- BEGIN Vendor JS-->

  <!-- BEGIN: Page Vendor JS-->
  <script src="calendar/js/jquery.sticky.js"></script>
  <script src="calendar/js/moment.min.js"></script>
  <script src="calendar/js/fullcalendar.min.js"></script>
  <script src="calendar/js/daygrid.min.js"></script>
  <script src="calendar/js/timegrid.min.js"></script>
  <script src="calendar/js/interactions.min.js"></script>
  <script src="calendar/js/picker.js"></script>
  <script src="calendar/js/picker.date.js"></script>
  <!-- END: Page Vendor JS-->

  <!-- BEGIN: Theme JS-->
  <script src="calendar/js/app-menu.min.js"></script>
  <script src="calendar/js/app.min.js"></script>
  <script src="calendar/js/components.min.js"></script>
  <script src="calendar/js/customizer.min.js"></script>
  <script src="calendar/js/footer.min.js"></script>
  <!-- END: Theme JS-->

  <!-- BEGIN: Page JS-->
  <script src="calendar/js/fullcalendar.min-2.js"></script>
  <!-- <script src="calendar/js/fullcalendar.min.dev.js"></script> -->
  <!-- END: Page JS-->

</body>
<!-- END: Body-->

<!-- Mirrored from pixinvent.com/demo/vuexy-html-bootstrap-admin-template/html/ltr/horizontal-menu-template-dark/app-calender.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Oct 2019 19:29:10 GMT -->

</html>


<?php include(SHARED_PATH . '/joms_footer.php'); ?>