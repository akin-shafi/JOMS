<?php require_once('../../private/initialize.php'); ?>
<?php

require_login();
// echo '<pre>';print_r($loggedInClient);'</pre>';

if (is_post_request()) {
  $args = $_POST['court_case'];
  $courtCase = new CourtCase($args);
  $courtCase->attach_file($_FILES['document']);
  
  $result = $courtCase->savef();
  //  echo "<pre>";
  //  print_r($courtCase);
  //  print_r($courtCase->errors);
  //  echo "</pre>";
  if ($result === true) {
    $new_id = $courtCase->id;

    if (isset($new_id)) {
      $randomNum = rand(10, 100);
      $trans_no = $_POST['trans_no'] = "1" . str_pad($new_id, 3, "0", STR_PAD_LEFT) . $randomNum;
      $created_at = $courtCase->created_on;
      $payment_purpose = $courtCase->court_case_name;
      $args = [
        'case_id' => $new_id,
        'trans_no' => $trans_no,
        'payment_purpose' => $payment_purpose,
        'created_at' => $created_at
      ];
      $transaction = new Transaction($args);
      $result = $transaction->save();
    }


    $session->message('Your registration was successful, please select your prefered mode of payment!');
    redirect_to(url_for('lawyer/transaction.php?id=' . $new_id));
  } else {
    $session->message($courtCase->errors[0]);
  }
} else {
  // display the form
  $courtCase = new CourtCase;
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
  <div class="text-danger text-center d-flex justify-content-center mn-4"><?php echo display_errors($courtCase->errors); ?></div>
  <div class="row justify-content-center">

    <div class="col-md-12  text-dark rounded">
      <h6 class="text-center alert alert-success fs-12 " id="result">Welcome to registration page</h6>
      <div class="progress mb-3 shadow" style="height: 25px;">

        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 30%;" id="progressBar">
          <b class="lead" id="progressText">Case Filing</b>
        </div>
      </div>
      <div class="alert alert-dark p-2">
          <h2>Note: All documents such as: </h2>
          <ul>
            <li>Statement of claim/Statement of Defence</li>
            <li>Evidences</li>
            <li>Affidavit</li>
            <li>Doctors Report, written address or any other documentory evidences etc.</li>
            <small>are to be uploaded in a single PDF Document not larger than 300KB.</small>
          </ul>
      </div>
      <form action="" method="post" id="form_data" class="shadow bg-white p-3" enctype="multipart/form-data">
        <input type="hidden" name="court_case[client_id]" value="<?php echo $loggedInClient->id; ?>">
        <div id="first">
          <h4 class="text-center alert-primary p-1 rounded text-light">Case Filling</h4>
          <!-- <h6><i class="step-icon feather-file-text"></i> </h6> -->
          <fieldset>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="cType">Court Type</label>

                  <select class="custom-select form-control" id="cType" name="court_case[court_id]">
                    <option value="">-select</option>
                    <?php foreach (CourtCase::COURT_TYPE as $key => $value) { ?>
                      <option value="<?php echo $key ?>" <?php echo $key == $courtCase->court_id ? 'selected' : ''; ?>><?php echo $value ?></option>
                    <?php } ?>
                  </select>
                  <b class="form-text text-danger" id="errcType"></b>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="cDivision">Court Division</label>
                  <select class="custom-select form-control" id="cDivision" name="court_case[court_division]">
                    <option value="">-select-</option>
                    <?php foreach (CourtCase::COURT_DIVISION as $key => $value) { ?>
                      <option value="<?php echo $key ?>" <?php echo $key == $courtCase->court_division ? 'selected' : ''; ?>><?php echo $value ?></option>
                    <?php } ?>
                  </select>
                  <b class="form-text text-danger" id="errcDivision"></b>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="cMatter" class="control-label">Type of Matter</label>
                  <select class="custom-select form-control" name="court_case[court_matter]" id="cMatter">
                    <option value="">-select-</option>
                    <?php foreach (CourtCase::MATTER as $key => $value) { ?>
                      <option value="<?php echo $key ?>" <?php echo $key == $courtCase->court_matter ? 'selected' : ''; ?>><?php echo $value ?></option>
                    <?php } ?>
                  </select>
                  <b class="form-text text-danger" id="errcMatter"></b>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="cName" class="control-label">Case Name</label>
                  <input type="text" name="court_case[court_case_name]" class="form-control" id="cName" value="<?php echo $courtCase->court_case_name ?>">
                  <b class="form-text text-danger" id="errcName"></b>
                </div>
              </div>
            </div>
          </fieldset>
          <div class="form-group d-flex justify-content-between">
            <a href="#" class="btn btn-md btn-danger" id="next-1">Next</a>
          </div>
        </div>
        <div id="second">

          <h4 class="text-center alert-primary p-1 rounded text-light">Case Description</h4>
          <!-- Step 2 -->
          <fieldset>
            <div class="row">
              <div class="col-md-6">
                <fieldset class="form-group">
                    <label for="basicInputFile">Upload Statement of claim</label>
                    <div class="custom-file">
                        <input type="file" name="document" class="custom-file-input" id="upload">
                        <b class="form-text text-danger" id="errUpload"></b>
                        <label class="custom-file-label" for="upload">Choose file</label>
                    </div>
                </fieldset>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="cDesc" class="control-label">Case Description</label>
                  <textarea class="form-control" name="court_case[description]" id="cDesc" rows="4"><?php echo $courtCase->description ?></textarea>
                  <b class="form-text text-danger" id="errcDesc"></b>
                </div>
              </div>
            </div>
          </fieldset>
          <div class="form-group d-flex justify-content-between">
            <a href="#" class="btn btn-md btn-danger" id="prev-2">Previous</a>
            <button type="submit" class="btn btn-danger">Save & Continue</button>
            <!-- <a href="#" class="btn btn-md btn-danger" id="next-2">Save & Continue</a> -->
          </div>
        </div>
        
        <div id="third">
          <h4 class="text-center alert-primary p-1 rounded text-light">Payment</h4>
          <!-- Step 3 -->
          <fieldset>
            <div class="row mb-2">
              <div class="col-md-6">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="payment_mode[]" id="check1" value="1">
                  <label class="form-check-label" for="check1"><img src="<?php echo url_for('/images/remita.png'); ?>" alt="" width="150" height="100"></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="payment_mode[]" id="check2" value="2">
                  <label class="form-check-label" for="check2"><img src="<?php echo url_for('/images/pos.png'); ?>" alt="" width="150" height="100"></label>
                  <b class="form-text text-danger" id="errMOP"></b>
                </div>
              </div>

            </div>
          </fieldset>
          <div class="form-group d-flex justify-content-between">
            <a href="#" class="btn btn-md btn-danger" id="prev-3">Previous</a>
            <a href="#" class="btn btn-md btn-danger" id="submit">Submit</a>
          </div>
        </div>
      </form>

      <br class="clearfix" />

    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/lawyer_footer.php'); ?>
<script>
  $(function() {
    // ========== NEXT ==========

    $('#next-1').click(function(e) {
      e.preventDefault();
      $('#errcType').html('');
      $('#errcDivision').html('');
      $('#errcMatter').html('');
      $('#errcName').html('');

      if ($('#cType').val() == '') {
        $('#errcType').html('* This field is required.');
        return false;
      } else if ($('#cDivision').val() == '') {
        $('#errcDivision').html('* This field is required.');
        return false;
      } else if ($('#cMatter').val() == '') {
        $('#errcMatter').html('* This field is required.');
        return false;
      } else if ($('#cName').val() == '') {
        $('#errcName').html('* This field is required.');
        return false;
      } else {
        $('#second').show('slow');
        $('#first').hide('slow');
        $('#progressBar').css('width', '65%');
        $('#progressText').html('Case Description');
      }

    });

    $('#next-2').click(function(e) {
      e.preventDefault();
      $('#errcDesc').html('');
      $('#errUpload').html('');

      if ($('#cDesc').val() == '') {
        $('#errcDesc').html('* This field is required.');
        return false;
      } else if ($('#upload').val() == '') {
        $('#errUpload').html('* This field is required.');
        return false;
      } else {
        $.ajax({
          url: '../inc/process_lawyer.php',
          method: 'post',
          data: $('#form_data').serialize(),
          success: function(r) {
            $('#result').show();
            $('#result').html(r);
            $('#form_data')[0].reset();
          }
        });

        $('#third').show('slow');
        $('#second').hide('slow');
        $('#progressBar').css('width', '100%');
        $('#progressText').html('Payment');
      }


      function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
      }
    });

    $('#next-3').click(function(e) {
      e.preventDefault();

      // else {
      //   $('#fourth').show('slow');
      //   $('#third').hide('slow');
      //   $('#progressBar').css('width', '100%');
      //   $('#progressText').html('Step - 4');
      // }

    });
    // ========== NEXT END ==========

    // ========== PREVIOUS ==========

    $('#prev-2').click(function() {
      $('#second').hide('slow');
      $('#first').show('slow');
      $('#progressBar').css('width', '30%');
      $('#progressText').html('Case Filing');
    });

    $('#prev-3').click(function() {
      $('#second').show('slow');
      $('#third').hide('slow');
      $('#progressBar').css('width', '65%');
      $('#progressText').html('Case Description');
    });


    // ========== PREVIOUS END ==========

    // ========== SUBMIT ==========

    $('#submit').click(function(e) {
      e.preventDefault();

      $('#user_typeErr').html('');
      // $('#profile_imgErr').html('');

      if ($('#user_type').val() == '') {
        $('#user_typeErr').html('* This type field is required');
        return false;
      }
      // else if ($('#profile_imgErr').val() == '') {
      //   $('#profile_imgErr').html('* This image field is required');
      //   return false;
      // }
      else {
        $.ajax({
          url: 'inc/process_lawyer.php',
          method: 'post',
          data: $('#form-data').serialize(),
          success: function(r) {
            $('#result').show();
            $('#result').html(r);
            $('#form-data')[0].reset();
          }
        });
      }
    });

    // ========== SUBMIT END ==========

  });
</script>