<?php
require_once('../../../private/initialize.php');
require_login();
if(!in_array($loggedInAdmin->level, [1])) { redirect_to(url_for('../../high-court/logout.php')); }


if(is_post_request()){

	$args = $_POST['court_type'];
	$args['court_id'] = $loggedInAdmin->court_id;
	$court_type = new CourtType($args);
	$result = $court_type->save();
 
	if($result === true) {
		// $judge = Admin::find_by_id($args['judge_id']);
		// $judge->court_type = $court_type->id;
		// $result = $judge->save();
		// 	if($result === true) {
			$session->message('A New Court has being added.');
			redirect_to(url_for('admin/court/index.php'));
			// }
	} else {
		// show errors
	}
}else {
	$court_type = new CourtType;
}

// echo '<pre>';
// print_r($args['judge_id']);
// print_r($court_type);
// echo '</pre>';
$edit=false;
?>


<?php $page_title = 'New Court' ?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>

<div class="container border bg-white">
	<h1 class="ui header divider">Add New Court</h1>
	<section class='container'>
		<div class='row'>
			<div class='col-lg-6 offset-lg-3'>
				<form method="post">
				
					<?php include('form_fields.php') ?>

				<hr>
				<p class='text-center'>
				<a href="<?php echo url_for('admin/court/') ?>" class="btn btn-outline-success">Back</a>
				<input type="submit" name="commit" value="Add Court" class="btn btn-success" />
				</p>
				</form>
			</div>
		</div>

	</section>

	</div>

	
<?php include(SHARED_PATH . '/joms_footer.php'); ?>