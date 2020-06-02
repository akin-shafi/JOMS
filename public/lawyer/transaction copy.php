<?php require_once('../../private/initialize.php'); ?>

<?php

require_login();

$id = $_GET['id'] ?? '';
$transaction = Transaction::find_by_case_id($id);
// echo '<pre>'; print_r($transaction); '</pre>';

if (is_post_request()) {
  $args = $_POST['trans'];

  $transaction->merge_attributes($args);

  $result = $transaction->save();

  //  echo "<pre>";
  //  print_r($courtCase);
  //  print_r($courtCase->errors);
  //  echo "</pre>";
  if ($result === true) {
    $new_id = $transaction->id;

    $session->message('Your registration was successfully.');
    redirect_to(url_for('lawyer/index.php'));
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
  <div class="row justify-content-center">
    <div class="col-md-12  text-dark rounded">
      <h6 class="text-center alert alert-success fs-12 " id="result">Welcome to registration page</h6>
      <div class="progress mb-3 shadow" style="height: 25px;">
        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 30%;" id="progressBar">
          <b class="lead" id="progressText">Transaction</b>
        </div>
      </div>
      <form action="" method="post" id="form_data" class="shadow bg-white p-3" enctype="multipart/form-data">
        <input type="hidden" name="trans[case_id]" value="<?php echo $loggedInClient->id; ?>">
        <div id="first">
          <h4 class="text-center alert-primary p-1 rounded text-light">Case Filling</h4>
          <!-- <h6><i class="step-icon feather-file-text"></i> </h6> -->
          <fieldset>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group d-none">
                  <label for="cType">Transactoin Number</label>
                  <input type="text" name="trans[trans_no]" class="form-control" value="<?php echo $transaction->trans_no; ?>">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="cMatter" class="control-label">Mode of Payment</label>
                  <select class="custom-select form-control" name="trans[payment_mode]" id="cMatter">
                    <option value="">-select-</option>
                    <?php foreach (Transaction::MOP as $key => $value) { ?>
                      <option value="<?php echo $key ?>" <?php echo $key == $transaction->payment_mode ? 'selected' : ''; ?>><?php echo $value ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="cDivision">Purpose of Payment</label>
                  <select class="custom-select form-control" id="cDivision" name="trans[payment_purpose]">
                    <option value="">-select-</option>
                    <?php foreach (Transaction::DOC_TYPE as $key => $value) { ?>
                      <option value="<?php echo $key ?>" <?php echo $key == $transaction->payment_purpose ? 'selected' : ''; ?>><?php echo $value ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="cType">Subscriber</label>
                  <input type="text" name="trans[subscriber_id]" class="form-control" value="<?php echo $transaction->subscriber_id; ?>">
                </div>
              </div>
            </div>

            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="cType">Receipt Number</label>
                  <input type="text" name="trans[receipt_no]" class="form-control" value="<?php echo $transaction->receipt_no; ?>">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="cType">Subscriber</label>
                  <input type="text" name="trans[subscriber_id]" class="form-control" value="<?php echo $transaction->subscriber_id; ?>">
                </div>
              </div>
            </div>
          </fieldset>

      </form>

      <br class="clearfix" />

    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/lawyer_footer.php'); ?>
<script>
  $(function() {
  // ========== NEXT ==========

  // $('#next-1').click(function(e) {
  //   e.preventDefault();
  //   $('#errcType').html('');
  //   $('#errcDivision').html('');
  //   $('#errcMatter').html('');
  //   $('#errcName').html('');

  //   if ($('#cType').val() == '') {
  //     $('#errcType').html('* This field is required.');
  //     return false;
  //   } else if ($('#cDivision').val() == '') {
  //     $('#errcDivision').html('* This field is required.');
  //     return false;
  //   } else if ($('#cMatter').val() == '') {
  //     $('#errcMatter').html('* This field is required.');
  //     return false;
  //   } else if ($('#cName').val() == '') {
  //     $('#errcName').html('* This field is required.');
  //     return false;
  //   } else {
  //     $('#second').show('slow');
  //     $('#first').hide('slow');
  //     $('#progressBar').css('width', '65%');
  //     $('#progressText').html('Case Description');
  //   }

  // });

  // $('#next-2').click(function(e) {
  //   e.preventDefault();
  //   $('#errcDesc').html('');
  //   $('#errUpload').html('');

  //   if ($('#cDesc').val() == '') {
  //     $('#errcDesc').html('* This field is required.');
  //     return false;
  //   } else if ($('#upload').val() == '') {
  //     $('#errUpload').html('* This field is required.');
  //     return false;
  //   } else {
  //     $.ajax({
  //       url: '../inc/process_lawyer.php',
  //       method: 'post',
  //       data: $('#form_data').serialize(),
  //       success: function(r) {
  //         $('#result').show();
  //         $('#result').html(r);
  //         $('#form_data')[0].reset();
  //       }
  //     });

  //     $('#third').show('slow');
  //     $('#second').hide('slow');
  //     $('#progressBar').css('width', '100%');
  //     $('#progressText').html('Payment');
  //   }


  //   function validateEmail($email) {
  //     var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  //     return emailReg.test($email);
  //   }
  // });

  // $('#next-3').click(function(e) {
  //   e.preventDefault();

  // else {
  //   $('#fourth').show('slow');
  //   $('#third').hide('slow');
  //   $('#progressBar').css('width', '100%');
  //   $('#progressText').html('Step - 4');
  // }

  });
  // ========== NEXT END ==========

  // ========== PREVIOUS ==========

  // $('#prev-2').click(function() {
  //   $('#second').hide('slow');
  //   $('#first').show('slow');
  //   $('#progressBar').css('width', '30%');
  //   $('#progressText').html('Case Filing');
  // });

  // $('#prev-3').click(function() {
  //   $('#second').show('slow');
  //   $('#third').hide('slow');
  //   $('#progressBar').css('width', '65%');
  //   $('#progressText').html('Case Description');
  // });


  // ========== PREVIOUS END ==========

  // ========== SUBMIT ==========

  // $('#submit').click(function(e) {
  //   e.preventDefault();

  //   $('#user_typeErr').html('');
  //   // $('#profile_imgErr').html('');

  //   if ($('#user_type').val() == '') {
  //     $('#user_typeErr').html('* This type field is required');
  //     return false;
  //   }
  //   // else if ($('#profile_imgErr').val() == '') {
  //   //   $('#profile_imgErr').html('* This image field is required');
  //   //   return false;
  //   // }
  //   else {
  //     $.ajax({
  //       url: 'inc/process_lawyer.php',
  //       method: 'post',
  //       data: $('#form-data').serialize(),
  //       success: function(r) {
  //         $('#result').show();
  //         $('#result').html(r);
  //         $('#form-data')[0].reset();
  //       }
  //     });
  //   }
  // });

  // ========== SUBMIT END ==========

  });
</script>