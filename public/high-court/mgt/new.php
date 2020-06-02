<?php
require_once('../../../private/initialize.php');
require_login();
// if(!in_array($loggedInAdmin->level, [1,2])) { redirect_to(url_for('admin/dashboard.php')); }

if (is_post_request()) {

	$args = $_POST['mgt'];
	$args['court_id'] = $loggedInAdmin->court_id;
	// $args['level'] = 4;
	$managements = new Admin($args);
	$result = $managements->save();

	if ($result === true) {
		$session->message('User created successfully.');
		redirect_to(url_for('high-court/mgt/index.php'));
	} else {
		// show errors
		// $session->message($managements->errors);
	}
} else {
	$managements = new Admin;
}

// echo '<pre>';
// print_r($edit);
// echo '</pre>';
// $edit=false;
?>


<?php $page_title = 'Add User' ?>
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
<script type="text/javascript">

	$(document).on('click', '#level', function (e) {

		var level = $(this).val()
		if(level == 12){
			$("#user").css('display', 'none');
			$("#npf").css('display', 'block');
		}
		// console.log(level)
	})
	
</script>