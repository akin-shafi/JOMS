<?php require_once('../../private/initialize.php');

require_login();

if (is_post_request()) {
  $args = $_POST['court_case'];
  $courtCase = new CourtCase($args);
  $courtCase->attach_file($_FILES['document']);
  $courtCase->client_id = $loggedInClient->id;
  $result = $courtCase->savef();
  //  echo "<pre>";
  //  print_r($courtCase);
  //  print_r($courtCase->errors);
  //  echo "</pre>";
  if ($result === true) {
    $session->message('Your registration was successfully.');
    redirect_to(url_for('lawyer/index.php'));
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


<!-- Form wizard with step validation section start -->
<section id="validation">
  <div class="row">
    <div class="col-12">
      <div class="text-danger text-center d-flex justify-content-center mn-4"><?php echo display_errors($judge->errors); ?></div>
      <div class="card">
        <div class="card-header alert alert-primary pb-2">
          <h4 class="card-title">Application</h4>
          <small class="text-danger">Please note: All fields are required!</small>
        </div>
        <div class="card-content">
          <div class="card-body">
            <form action="#" class="steps-validation wizard-circle" id="form_inputs">
              <!-- Step 1 -->
              <h6><i class="step-icon feather-file-text"></i> Case Filling</h6>
              <fieldset>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cType">Court Type</label>

                      <select class="custom-select form-control" id="cType" name="court_case[court_id]" required>
                        <option value="">-select</option>
                        <?php foreach (CourtCase::COURT as $key => $value) { ?>
                          <option value="<?php echo $key ?>" <?php echo $key == $courtCase->court_id ? 'selected' : ''; ?>><?php echo $value ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cDivision">Court Division</label>
                      <select class="custom-select form-control" id="cDivision" name="court_case[court_division]" required>
                        <option value="">-select-</option>
                        <?php foreach (CourtCase::COURT_DIVISION as $key => $value) { ?>
                          <option value="<?php echo $key ?>" <?php echo $key == $courtCase->court_division ? 'selected' : ''; ?>><?php echo $value ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cMatter" class="control-label">Type of Matter</label>
                      <select class="custom-select form-control" name="court_case[court_matter]" id="cMatter" required>
                        <option value="">-select-</option>
                        <?php foreach (CourtCase::MATTER as $key => $value) { ?>
                          <option value="<?php echo $key ?>" <?php echo $key == $courtCase->court_matter ? 'selected' : ''; ?>><?php echo $value ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cName" class="control-label">Case Name</label>
                      <input type="text" name="court_case[court_case_name]" class="form-control" id="cName" value="<?php echo $courtCase->court_case_name ?>" required>
                    </div>
                  </div>
                </div>
              </fieldset>

              <!-- Step 2 -->
              <h6><i class="step-icon feather-upload"></i> Case Description</h6>
              <fieldset>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="upload" class="control-label">Upload Statement of claim</label>
                      <input type="file" name="document" class="form-control" id="upload" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cDesc" class="control-label">Case Description</label>
                      <textarea class="form-control" name="court_case[description]" id="cDesc" rows="4" required><?php echo $courtCase->court_case_name ?></textarea>
                    </div>
                  </div>
                </div>
              </fieldset>

              <!-- Step 3 -->
              <h6><i class="step-icon feather-credit-card"></i> Payment</h6>
              <fieldset>
                <div class="row mb-2">
                  <div class="col-md-6">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="mode_of_payment[]" id="check1" value="1">
                      <label class="form-check-label" for="check1"><img src="<?php echo url_for('/images/remita.png'); ?>" alt="" width="150" height="100"></label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="mode_of_payment[]" id="check2" value="2">
                      <label class="form-check-label" for="check2"><img src="<?php echo url_for('/images/pos.png'); ?>" alt="" width="150" height="100"></label>
                    </div>
                  </div>

                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Form wizard with step validation section end -->

<?php include(SHARED_PATH . '/lawyer_footer.php'); ?>

<script>
  // Validation
  var cType = $('#cType').val();
  var cDivision = $('#cDivision').val();
  var cMatter = $('#cMatter').val();
  var cName = $('#cName').val();
  var cDesc = $('#cDesc').val();

  //   Buttons
  var prev = document.getElementsByTagName('a')[22];
  var next_btn = document.getElementsByTagName('a')[23];
  next_btn.id = 'next1';
  prev.id = 'prev1';
  // $("#prve1").hide();


  // function forward1(){
  //     if (cType != '' || cDivision != '' || cMatter != '' || cName != '' || cDesc) {
  //         next_btn.id = 'next2';
  //         next_btn.innerHTML = 'Save & Continue';
  //         prev.id = 'prev2'
  //     }
  // }
  // function forward2(){

  // }
  // function backward1(){

  // }
  // function backward2(){

  // }
  var x = 0;
  $(document).on('click', '#next1', function() {
    // var 
    if (x == 0) {
      next_btn.id = 'next2';
      next_btn.innerHTML = 'Save & Continue';
      prev.id = 'prev2'
    }

  });
  // $(document).on('click', '#next2', function () {
  //     forward2()
  // });
  // $(document).on('click', '#prev1', function () {
  //     backward1()
  // });
  // $(document).on('click', '#prev2', function () {
  //     backward2()
  // });
</script>