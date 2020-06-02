<?php

require_once('../../private/initialize.php');

require_login();
// echo '<pre>';print_r($loggedInClient);'</pre>'

$receipt = $_GET['receipt'];
if (!isset($receipt)) {
  redirect_to(url_for('/lawyer/index.php'));
} else {
  $payment = Transaction::find_by_case_id($receipt);
}

// $payment = Transaction::find_by_case_id($loggedInClient->id);

?>
<?php $page_name = '';
$page_title = 'Invoice'; ?>
<?php include(SHARED_PATH . '/lawyer_header.php'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo url_for('css/dropzone.min-2.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo url_for('css/data-list-view.min.css') ?>">

<style>
  .dt-buttons {
    display: none !important;
  }
</style>


<!-- BEGIN: Content-->

<!-- <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
  <strong><?php //echo display_session_message(); 
          ?>Welcome</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> -->

<section class="card invoice-page" id='receipt'>
  <div id="invoice-template" class="card-body">
    <!-- Invoice Company Details -->
    <div id="invoice-company-details" class="row">
      <div class="col-md-6 col-sm-12 text-left">
        <div class="media">
          <img width="220" src="<?php echo url_for('/images/qoute_of_arm.png'); ?>" alt="company logo" class="" />
        </div>
      </div>
      <div class="col-md-6 col-sm-12 text-right">
        <h1>Invoice</h1>
        <div class="invoice-details mt-2">
          <h6>INVOICE NO.</h6>
          <p><?php echo $payment->receipt_no; ?></p>
          <h6 class="mt-2">INVOICE DATE</h6>
          <p><?php echo date('dS M, Y (H : m a)', strtotime($payment->created_at)); ?></p>
        </div>
      </div>
    </div>
    <!--/ Invoice Company Details -->

    <!-- Invoice Recipient Details -->
    <div id="invoice-customer-details" class="row pt-2">
      <div class="col-md-6 col-sm-12 text-left">
        <h5>Recipient</h5>
        <div class="recipient-info my-2">
          <p><?php echo $loggedInClient->full_name(); ?></p>
        </div>
        <div class="recipient-contact pb-2">
          <p>
            <i class="feather-mail text-info"></i>
            <?php echo $loggedInClient->email; ?>
          </p>
          <p>
            <i class="feather-phone text-primary"></i>
            <?php echo $loggedInClient->phone; ?>
          </p>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 text-right">
        <h5>Lagos State Judiciary</h5>
        <div class="company-info my-2">
          <p>The Secretariat,</p>
          <p>Obafemi Awolowo Way, </p>
          <p>Ikeja, Lagos State, Nigeria.</p>
        </div>
        <div class="company-contact">
          <p>
            <i class="feather-mail text-info"></i>
            info@lagosstate.gov.ng
          </p>
        </div>
      </div>
    </div>
    <!--/ Invoice Recipient Details -->

    <!-- Invoice Items Details -->
    <div id="invoice-items-details" class="pt-1 invoice-items-table">
      <div class="row">
        <div class="table-responsive col-sm-12">
          <table class="table table-borderless">
            <thead>
              <tr>
                <th>CASE MATTER</th>
                <th>TEMP SUIT NO.</th>
                <th>STATUS</th>
                <th>DATE</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $payment->payment_purpose; ?></td>
                <td><?php echo $payment->trans_no ?></td>
                <td><?php echo $payment->approval ? 'Verified' : 'Unverified'; ?></td>
                <td><?php echo date('Y-m-d', strtotime($payment->created_at)); ?></td>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Invoice Footer -->
    <div id="invoice-footer" class="text-right pt-3">
      <p>
        You can transfer the fee to the state account below. Please
        <a class="text-danger" id="printer">print out</a> this receipt for payment verification.
      </p>
      <p class="bank-details mb-0">
        <span class="mr-4">BANK NAME: <strong>FIRST BANK</strong></span>
        <span>ACC NO: <strong>FB-123-4567-890</strong></span>
      </p>
    </div>
    <!--/ Invoice Footer -->
  </div>
</section>

<!-- END: Content-->


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

<script>
  $("#printer").click(function() {
    //Hide all other elements other than receipt.
    $("#receipt").show();
    window.print();
  });
</script>