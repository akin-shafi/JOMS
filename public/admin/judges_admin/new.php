<?php
require_once('../../../private/initialize.php');
require_login();
if(!in_array($loggedInAdmin->level, [1,2])) { redirect_to(url_for('admin/dashboard.php')); }

if(is_post_request()){

	$args = $_POST['judges'];
	$args['court_id'] = $loggedInAdmin->court_id;
	$args['level'] = 4;
	$judges = new Admin($args);
	$result = $judges->save();

	if($result === true) {
		$session->message('A New Judge has being added.');
		redirect_to(url_for('admin/judges_admin/index.php'));
	} else {
		// show errors
		$session->message($judges->errors[0]);
	}
}else {
	$judges = new Admin;
}

// echo '<pre>';
// print_r($edit);
// echo '</pre>';
$edit=false;
?>


<?php $page_title = 'Judges||New' ?>
<?php include(SHARED_PATH . '/court_header.php'); ?>

<div class="container  border bg-white">
	<h1 class="ui header divider w-100">Add New Judge</h1>
	<div class="text-danger text-center d-flex justify-content-center mn-4"><?php echo display_session_message(); ?></div>
	<section class='container'>
		<div class='row'>
			<div class='col-lg-12'>
				<form method="post" class="container">
				
					<?php include('form_fields.php') ?>

				<hr>
				<p class='text-center'>
				<input type="submit" name="commit" value="Add judges" class="btn btn-success" />
				</p>
				</form>
			</div>
		</div>

	</section>

	</div>
	
	
<?php include(SHARED_PATH . '/admin_footer.php'); ?>
