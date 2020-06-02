<?php require_once('../../private/initialize.php'); ?>

<?php

require_login();

$id = $_GET['id'] ?? '';
$transaction = Transaction::find_by_case_id($id);
// echo '<pre>'; print_r($transaction); '</pre>';

if (is_post_request()) {
  $args = ['payment_mode' => $_POST['mode_of_payment']];

  $transaction->merge_attributes($args);

  $result = $transaction->save();

  //  echo "<pre>";
  //  print_r($courtCase);
  //  print_r($courtCase->errors);
  //  echo "</pre>";
  if ($result === true) {
    $new_id = $transaction->case_id;

    $session->message('Your registration was successfully.');
    redirect_to(url_for('lawyer/invoice.php?receipt=' . $new_id));
  } else {
    $session->message($courtCase->errors[0]);
  }
} else {
  // display the form
  // $transaction = new Transaction;
}


?>
<?php $page_name = '';
$page_title = 'File New Case'; ?>
<?php include(SHARED_PATH . '/lawyer_header.php'); ?>
<style>
  #second,
  #third,
  #fourth,
  #result {
    display: none;
  }
</style>

<div class="">
  <div class="text-danger text-center d-flex justify-content-center mn-4"><?php echo display_errors($transaction->errors); ?></div>
  <div class="text-success text-center d-flex justify-content-center mn-4"><?php echo display_session_message(); ?></div>
  <div class="row justify-content-center">
    <div class="col-md-12  text-dark rounded">
      <h6 class="text-center alert alert-success fs-12 " id="result">Welcome to registration page</h6>
      <div class="progress mb-3 shadow" style="height: 25px;">
        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 90%;" id="progressBar">
          <b class="lead" id="progressText">Transaction</b>
        </div>
      </div>
      <form action="" method="post" id="form_data" class="shadow bg-white p-3" enctype="multipart/form-data">
        <input type="hidden" name="trans[case_id]" value="<?php echo $loggedInClient->id; ?>">
        <div id="first">
          <h4 class="text-center alert-primary p-1 rounded text-light">Payment</h4>
          <!-- <h6><i class="step-icon feather-file-text"></i> </h6> -->
          <fieldset>
                <div class="row mb-2">
                  <div class="col-md-6">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="mode_of_payment[]" id="check1" value="1" disabled>
                      <label class="form-check-label" for="check1"><img src="<?php echo url_for('/images/remita.png'); ?>" alt=""  width="150" height="100"></label>
                    </div>
                  </div> 
                  <div class="col-md-6">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" required="" name="mode_of_payment" id="check2" value="2">
                      <label class="form-check-label" for="check2"><img src="<?php echo url_for('/images/pos.png'); ?>" alt="" width="150" height="100"></label>
                    </div>
                  </div>
                      
                </div>
                 <div class="form-group d-flex justify-content-end">
            <!-- <a href="#" class="btn btn-md btn-danger" id="prev-2">Previous</a> -->
            <button type="submit" class="btn btn-success">Submit</button>
            <!-- <a href="#" class="btn btn-md btn-danger" id="next-2">Save & Continue</a> -->
          </div>
              </fieldset>

      </form>

      <br class="clearfix" />

    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/lawyer_footer.php'); ?>
