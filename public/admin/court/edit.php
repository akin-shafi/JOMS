<?php require_once('../../../private/initialize.php') ?>
<?php
require_login();
if(!in_array($loggedInAdmin->level, [1])) { redirect_to(url_for('../../high-court/logout.php')); }

$id = $_GET['id'] ?? redirect_to(url_for('admin/court/index.php')); // PHP > 7.0

$court_type = CourtType::find_by_id($id);

if(is_post_request()){

	$args = $_POST['court_type'];
	$args['court_id'] = $loggedInAdmin->court_id;

	$court_type->merge_attributes($args);
	$result = $court_type->save();
	 
	if($result === true) {
		$session->message('Court has been Updated.');
		redirect_to(url_for('/admin/court/?id='.$id));
	} else {
		// show errors
	}
	
}

// echo '<pre>';
// print_r($court_type);
// echo '</pre>';

$edit=true;
?>
<?php $page_title = 'Edit Court' ?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>

<div class="container my-3 border card">
	<!-- <h1 class="ui header divider">Edit Court</h1> -->
	<section class='container pt-3'>
		<div class='row'>
			<div class='col-lg-6 offset-lg-3'>
				<form method="post">
				
					<?php include('form_fields.php') ?>

				<hr>
				<p class='text-center'>
				<a href="<?php echo url_for('admin/court/') ?>" class="btn btn-outline-success">Back</a>
				<input type="submit" name="commit" value="Edit Court" class="btn btn-success" />
				</p>
				</form>
			</div>
		</div>

	</section>

	</div>
	
	
<?php include(SHARED_PATH . '/joms_footer.php'); ?>