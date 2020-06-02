<?php require_once('../../../private/initialize.php') ?>
<?php
require_login();
if(!in_array($loggedInAdmin->level, [1])) { redirect_to(url_for('../../high-court/logout.php')); }

$id = $_GET['id'] ?? redirect_to(url_for('admin/judges_admin/index.php')); // PHP > 7.0

$judges = Admin::find_by_id($id);

if(is_post_request()){

	$args = $_POST['judges'];
	$args['court_id'] = $loggedInAdmin->court_id;

	$judges->merge_attributes($args);
	$result = $judges->save();
	 
	if($result === true) {
		$session->message('Jugde has been Updated.');
		redirect_to(url_for('/admin/judges_admin/?id='.$id));
	} else {
		// show errors
	}
	
}

// echo '<pre>';
// print_r($judges);
// echo '</pre>';

$edit=true;
?>
<?php $page_title = 'Judges||Edit' ?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>

<div class="container my-3 border pt-3 card">
	<!-- <h1 class="ui header divider">Edit New Judges</h1> -->
	<section class='container '>
		<div class='row'>
			<div class='col-lg-6 offset-lg-3'>
				<form method="post">
				
					<?php include('form_fields.php') ?>

				<hr>
				<p class='text-center'>
				<a href="<?php echo url_for('admin/judges_admin/') ?>" class="btn btn-outline-success">Back</a>
				<input type="submit" name="commit" value="Edit Staff" class="btn btn-success" />
				</p>
				</form>
			</div>
		</div>

	</section>

	</div>
	
	
<?php include(SHARED_PATH . '/joms_footer.php'); ?>