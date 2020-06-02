<?php
require_once('../../private/initialize.php');

$filter = $_GET['division_id'];
// if ($_GET['filter'] == 'court') {
	// $judge_division = Admin::find_all_by_division($_GET['division_id'], ['level'=>4,'court_id'=>$loggedInAdmin->court_id]);
// }else

if ($_GET['filter'] == 'judge') {
	$judge_court_type = CourtType::find_all_by_division($_GET['division_id'], ['court_id'=>$loggedInAdmin->court_id]);
}

	// echo '<pre>';
	// print_r($judge_division);
	// echo '</pre>';

// $court_type = new CourtType;
$judge = new Admin;
$sn=0;
?>

<?php if ($_GET['filter'] == 'court') { ?>
	<!-- <label class="control-label" for="judge_id">Judge In Charge</label>
	<select class="form-control" name="court_type[judge_id]" id="judge_id">
		<option value="">choose</option>
	<?php //foreach ($judge_division as $value) { ?>
		<option value="<?php //echo $value->id ?>" <?php //echo $value->id == Admin::find_court_type($court_type->id)->id ? 'selected' : ''; ?>><?php //echo $value->full_name() ?></option>
	<?php //} ?>
	</select> -->
<?php }elseif ($_GET['filter'] == 'judge') { ?>
	<label class="control-label" for="court_type">Court Type</label>
	<select class="form-control" name="judges[court_type]">
		<option value="">choose</option>
	<?php foreach ($judge_court_type as $value) { ?>
		<option value="<?php echo $value->id ?>" <?php echo $value->id == $judge->court_type ? 'selected' : ''; ?>><?php echo $value->court_name ?></option>
	<?php } ?>
	</select>
<?php } ?>