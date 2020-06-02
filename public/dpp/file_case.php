<?php
require_once('../../private/initialize.php');
require_login();
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


    $session->message('Case filed successfully! Kindly wait for further Instruction');
    redirect_to(url_for('dpp/index.php'));
  } else {
    $session->message($courtCase->errors[0]);
  }
} else {
  // display the form
  $courtCase = new CourtCase;
}

?>
<?php $page_title = 'File Case' ?>
<?php include(SHARED_PATH . '/agency_header.php'); ?>

  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

  
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
          <div class="row breadcrumbs-top">
            <div class="col-12">
              <h2 class="content-header-title float-left mb-0"><?php echo $page_title; ?></h2>
              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>

                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block">
          <?php
              $time = date('H');
              if ($time < '12') {
                echo 'Good Morning! ';
              } elseif ($time >= '12' && $time < '17') {
                echo 'Good Afternoon! ';
              } elseif ($time >= '17' && $time < '19') {
                echo 'Good Evening! ';
              } elseif ($time >= '19') {
                echo 'Good Night! ';
              }
          ?>
          <div class="form-group breadcrum-right d-none">
            <div class="dropdown d-none">
              <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather-settings"></i></button>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Dashboard Analytics Start -->

        <!-- BEGIN: Content-->
	<div class="content">
		<section class="card">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">File new case</h4>

						</div>
						<div class="card-content">
							<div class="text-danger text-center d-flex justify-content-center mn-4"><?php echo display_errors($courtCase->errors); ?></div>
							<div class="card-body">
								<form class="form-horizontal" novalidate="" method="post" enctype="multipart/form-data">
									<input type="hidden" name="court_case[client_id]" value="<?php echo $loggedInAdmin->id; ?>">
									<fieldset>
			                         	<div class="row">
							              <div class="col-md-6">
							                <div class="form-group">
							                  <label for="cType">Court Type</label>

							                  <div class="controls">
							                  	<select class="custom-select form-control required" id="cType" name="court_case[court_id]" required="">
								                    <option value="">-select</option>
								                    <?php  foreach (CourtCase::COURT_TYPE as $key => $value) { ?>
								                      <option value="<?php echo $key ?>" <?php echo $key == $courtCase->court_id ? 'selected' : ''; ?>><?php echo $value ?></option>
								                    <?php } ?>
								                  </select>
							                  </div>
							                  <b class="form-text text-danger" id="errcType"></b>
							                </div>
							              </div>

							              <div class="col-md-6">
							                <div class="form-group">
							                  <label for="cDivision">Court Division</label>
							                  <div class="controls">
							                  	<select class="custom-select form-control" id="cDivision" name="court_case[court_division]" required="">
								                    <option value="">-select-</option>
								                    <?php foreach (CourtCase::COURT_DIVISION as $key => $value) { ?>
								                      <option value="<?php echo $key ?>" <?php echo $key == $courtCase->court_division ? 'selected' : ''; ?>><?php echo $value ?></option>
								                    <?php } ?>
								                  </select>
							                  </div>
							                  <b class="form-text text-danger" id="errcDivision"></b>
							                </div>
							              </div>
							            </div>

							            <div class="row">
							              <div class="col-md-6">
							                <div class="form-group">
							                  <label for="cMatter" class="control-label">Type of Matter</label>
							                  <div class="controls">
							                  	<select class="custom-select form-control" name="court_case[court_matter]" id="cMatter" required="">
								                    <option value="">-select-</option>
								                    <?php foreach (CourtCase::MATTER as $key => $value) { ?>
								                      <option value="<?php echo $key ?>" <?php echo $key == $courtCase->court_matter ? 'selected' : ''; ?>><?php echo $value ?></option>
								                    <?php } ?>
								                  </select>
							                  </div>
							                  <b class="form-text text-danger" id="errcMatter"></b>
							                </div>
							              </div>

							              <div class="col-md-6">
							                <div class="form-group">
							                  <label for="cName" class="control-label">Case Name</label>
							                   <div class="controls">
							                   	  <input type="text" name="court_case[court_case_name]" class="form-control" id="cName" value="<?php echo $courtCase->court_case_name ?>" required>
							                   </div>
							                  <b class="form-text text-danger" id="errcName"></b>
							                </div>
							              </div>
							            </div>
			                         <!-- </fieldset> -->

			                        <!-- Step 2 -->
			                        <!-- <h6> Step 2</h6> -->
			                        <!-- <fieldset> -->
							            <div class="row">
							              <div class="col-md-6">
							                <fieldset class="form-group">
							                    <label for="basicInputFile">Upload Statement of claim</label>
							                    <div class="custom-file controls">
							                        <input type="file" name="document" class="custom-file-input" id="upload" required="">
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
						            <div class="clearfix">
									  <button type="submit" class="btn btn-primary waves-effect waves-light float-right">Submit</button>
								    </div>
								</form>

								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>
<?php include(SHARED_PATH . '/agency_footer.php'); ?>