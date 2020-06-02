<?php require_once('../../../private/initialize.php') ?>
<?php
require_login();
// if(!in_array($loggedInAdmin->level, [1])) { redirect_to(url_for('../../high-court/logout.php')); }

$id = $_GET['id'] ?? redirect_to(url_for('high-court/mgt/index.php')); // PHP > 7.0

$managements = Admin::find_by_id($id);

if (is_post_request()) {

	$args = $_POST['mgt'];
	$args['court_id'] = $loggedInAdmin->court_id;

	$managements->merge_attributes($args);
	$result = $managements->save();

	if ($result === true) {
		$session->message('User has been Updated.');
		redirect_to(url_for('high-court/mgt/index.php'));
	} else {
		// show errors
	}
}

// echo '<pre>';
// print_r($managements);
// echo '</pre>';

$edit = true;
?>
<?php $page_title = 'Edit User' ?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>

<div class="container  border bg-white">
	<h1 class="ui header divider w-100">Add New User</h1>
	<div class="text-danger text-center d-flex justify-content-center mn-4"><?php echo display_errors($managements->errors); ?></div>
	<section class='container'>
		<div class='row'>
			<div class='col-lg-12'>
				<form method="post" class="container">

					<?php include('form_fields.php') ?>

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