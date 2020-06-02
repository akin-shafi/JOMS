<?php
require_once('../../../private/initialize.php');
require_login();
// if(!in_array($loggedInAdmin->level, [1,2])) { redirect_to(url_for('admin/dashboard.php')); }

if (is_post_request()) {

	$args = $_POST['mgt'];
	// $args['court_id'] = $loggedInAdmin->court_id;
	// $args['level'] = 4;
	$managements = new Office($args);
	$result = $managements->save();

	if ($result === true) {
		$session->message('Office created successfully.');
		redirect_to(url_for('high-court/mgt/index.php'));
	} else {
		// show errors
		// $session->message($managements->errors);
	}
} else {
	$managements = new Office;
}

// echo '<pre>';
// print_r($edit);
// echo '</pre>';
// $edit=false;
?>


<?php $page_title = 'Add New' ?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>

<div class="container  border bg-white">
	<h1 class="ui header divider w-100">Add New Office</h1>
	<div class="text-danger text-center d-flex justify-content-center mn-4"><?php echo display_errors($managements->errors); ?></div>
	<section class='container'>
		<div class='row'>
			<div class='col-lg-12'>
				<form method="post" class="container">

				   <div class="row">
					    <div class="form-group col-md-6">
					      <label class="control-label" for="level">Admin Level</label>
					      <select class="form-control" name="mgt[level]" id="level">
					        <option value="">choose</option>
					        <?php foreach (Admin::ADMIN_LEVEL as $key => $value) { ?>
					          <option value="<?php echo $key ?>" <?php echo $key == $managements->level ? 'selected' : ''; ?>><?php echo $value ?></option>
					        <?php } ?>
					      </select>
					    </div>
					    <div class="form-group col-md-6">
					      <label class="control-label" for="email">Email</label>
					      <input class="form-control" value="<?php echo $managements->email; ?>" type="text" name="mgt[email]" id="email">
					    </div>
	  
					    <div class="form-group col-md-6">
					      <label class="control-label" for="division">Division</label>
					      <input class="form-control" value="<?php echo $managements->division; ?>" type="text" name="mgt[division]" id="division">
					    </div>
					    <div class="form-group col-md-6">
					      <label class="control-label" for="address">Address</label>
					      <input class="form-control" value="<?php echo $managements->address; ?>" type="text" name="mgt[address]" id="address">
					    </div>

					    <div class="form-group col-md-6">
					      <label class="control-label" for="password">Password</label>
					      <input class="form-control" value="<?php echo $managements->password; ?>" type="password" name="mgt[password]" id="password">
					    </div>

					    <div class="form-group col-md-6">
					      <label class="control-label" for="confirm_password">Confirm Password</label>
					      <input class="form-control" value="<?php echo $managements->confirm_password; ?>" type="password" name="mgt[confirm_password]" id="confirm_password">
					    </div>

				   </div>

					<hr>
					<p class='text-center'>
						<input type="submit" value="Add User" class="btn btn-success" />
					</p>
				</form>
			</div>
		</div>

	</section>

</div>


<?php include(SHARED_PATH . '/joms_footer.php'); ?>