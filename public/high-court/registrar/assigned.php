<?php

require_once('../../../private/initialize.php');

// ! require_login();

// ! Find all admins
// ? $admins = FortressAdmin::find_all();

$transactions = CourtCase::find_by_assigned();

// echo '<pre>';print_r($transactions);echo '</pre>';

?>
<?php $page_name = 'Registrar';
$page_title = 'Dashboard';  ?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>
<style type="text/css">
	/*.buttons-copy,.buttons-json,.buttons-pdf{display: none !important;}*/
</style>
<!-- <div class="Quick View"> -->

<div class="row d-flex justify-content-between">
	<div class="col-lg-3 col-sm-6 col-12 d-none">
		<a href="<?php echo url_for('/high-court/registrar/assigned.php'); ?>">
			<div class="card">
				<div class="card-header d-flex align-items-start pb-0">
					<div>
						<h2 class="text-bold-700 mb-0"><?php echo count($transactions); ?></h2>
						<p class="text-primary text-bold-700">ALL CASES <?php echo date('(M. dS)'); ?></p>
					</div>
					<div class="avatar bg-rgba-primary p-50 m-0">
						<div class="avatar-content">
							<i class="feather-cpu text-primary font-medium-5"></i>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>

	<div class="col-lg-3 col-sm-6 col-12 d-none">
		<a href="<?php echo url_for('/high-court/registrar/unassigned.php'); ?>">
			<div class="card">
				<div class="card-header d-flex align-items-start pb-0">
					<div>
						<h2 class="text-bold-700 mb-0"><?php echo count(CourtCase::find_by_unassigned()); ?></h2>
						<p class="text-danger text-bold-700">UNASSIGNED</p>
					</div>
					<div class="avatar bg-rgba-warning p-50 m-0">
						<div class="avatar-content">
							<i class="feather-alert-octagon text-warning font-medium-5"></i>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>

	<div class="col-lg-3 col-sm-6 col-12">
		<a href="<?php echo url_for('/high-court/registrar/assigned.php'); ?>">
			<div class="card">
				<div class="card-header d-flex align-items-start pb-0">
					<div>
						<h2 class="text-bold-700 mb-0"><?php echo count(CourtCase::find_by_assigned()); ?></h2>
						<p class="text-success text-bold-700">ASSIGNED</p>
					</div>
					<div class="avatar bg-rgba-success p-50 m-0">
						<div class="avatar-content">
							<i class="feather-alert-octagon text-success font-medium-5"></i>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
</div>
<!-- Quick View End -->




<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header border pb-2">
					<h4 class="card-title">
						<span class="text-uppercase">Recent Activities</span> |
						<span class="text-muted">Filed Cases and Documents</span></h4>
					<!-- <div class="btn btn-sm btn-primary p-1" data-toggle="modal" data-target="#trans">Add Transaction</div> -->
				</div>
				<div class="card-content">
					<div class="card-body card-dashboard">
						<p class="card-text">The table below displays all most recent document and case filed from lawyers and users.
						</p>

						<div class="table-responsive">
							<table class="table table-sm table-striped dataex-html5-selectors">
								<thead>
									<tr>
										<th style="font-size: 11px;">No.</th>
										<th style="font-size: 11px;">Case Name</th>
										<th style="font-size: 11px;">Submitted on</th>
										<th style="font-size: 11px;">Matter Type</th>
										<th style="font-size: 11px;">Description</th>
										<th style="font-size: 11px;">Assigned By</th>
										<th style="font-size: 11px;">Assigned To</th>
										<th style="font-size: 11px;">Date Assigned</th>
										<th style="font-size: 11px;">Court Type</th>
										<th style="font-size: 11px;">Division</th>
										<th style="font-size: 11px;">Uploads</th>
										<th style="font-size: 11px;">Action</th>
									</tr>
								</thead>
								<tbody id="call">
									<?php $sn = 0;
									foreach ($transactions as $transaction) { ?>
										<tr>
											<td style="font-size: 11px;"><?php echo ++$sn; ?></td>
											<td style="font-size: 11px;"><?php echo $transaction->court_case_name; ?></td>
											<td style="font-size: 11px;"><?php echo date('dS M, Y', strtotime($transaction->created_on)); ?></td>
											<td style="font-size: 11px;"><?php echo $transaction->court_matter == CourtCase::MATTER[$transaction->court_matter] ? CourtCase::MATTER[$transaction->court_matter] : CourtCase::MATTER[$transaction->court_matter]; ?></td>
											<td style="font-size: 11px;"><?php echo $transaction->description; ?></td>
											<td style="font-size: 11px;"><?php echo Admin::find_by_id($transaction->assigned_by)->full_name() ?></td>
											<td style="font-size: 11px;"><?php echo Admin::find_by_id($transaction->judge_incharge_id)->full_name() ?></td>
											<td style="font-size: 11px;"><?php echo date('dS M, Y', strtotime($transaction->assigned_to_judge_on)); ?></td>

											<td style="font-size: 11px;"><?php echo $transaction->court_id == CourtCase::COURT_TYPE[$transaction->court_id] ? CourtCase::COURT_TYPE[$transaction->court_id] : CourtCase::COURT_TYPE[$transaction->court_id]; ?></td>

											<td style="font-size: 11px;"><?php echo $transaction->court_division == CourtCase::COURT_DIVISION[$transaction->court_division] ? CourtCase::COURT_DIVISION[$transaction->court_division] : CourtCase::COURT_DIVISION[$transaction->court_division]; ?></td>

											<td style="font-size: 11px;">
												<a href="<?php echo url_for('/high-court/pdf_viewer.php?pdf=' . $transaction->id); ?>" class="">
													<?php if ($transaction->document) { ?>
														<img width="20" src="<?php echo url_for('/lawyer/upload/pdfs.png'); ?>" class="img-thumbsnail">
													<?php } else {
														echo 'NO FILE';
													} ?>
												</a>
											</td>
											<td style="font-size: 11px;">
												<?php if ($loggedInAdmin->level == 2) { ?>
													<button class="btn btn-sm btn-primary" id="btn_edit" data-id="<?php echo $transaction->id ?>" data-toggle="modal" data-target="#re_assign">Re-Assign</button>
												<?php } ?>

											</td>
										</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th style="font-size: 11px;">No.</th>
										<th style="font-size: 11px;">Case Name</th>
										<th style="font-size: 11px;">Submitted on</th>
										<th style="font-size: 11px;">Matter Type</th>
										<th style="font-size: 11px;">Description</th>
										<th style="font-size: 11px;">Assigned By</th>
										<th style="font-size: 11px;">Assigned To</th>
										<th style="font-size: 11px;">Date Assigned</th>
										<th style="font-size: 11px;">Court Type</th>
										<th style="font-size: 11px;">Division</th>
										<th style="font-size: 11px;">Uploads</th>
										<th style="font-size: 11px;">Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Column selectors with Export Options and print table -->
<!-- </div> -->


<!-- Modal -->
<div class="modal fade text-left" id="re_assign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel19"><i class="fa fa-tasks text-success"></i> Assign Case to Judge</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" id="user-data" onsubmit="return false">
				<input type="hidden" name="created_by" value="<?php echo $loggedInAdmin->id; ?>" />
				<input type="hidden" name="judge_incharge_id" id="id" />
				<div class="modal-body">
					<div class="form-group">
						<!-- <label for="assigned_judge">Judges</label> -->
						<select name="judge_incharge_id" class="form-control select2 w-100 mt-1" id="judge_incharge_id">
							<option value="">-select-</option>
							<?php foreach (Admin::find_all_judges() as $add) { ?>
								<option value="<?php echo $add->id; ?>"><?php echo $add->full_name(); ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="modal-footer d-flex justify-content-between">
					<button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
					<button class="btn btn-sm btn-primary" id="submit" data-edit="update">Assign</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include(SHARED_PATH . '/joms_footer.php'); ?>

<script>
	$(document).ready(function() {
		$(document).ready(function() {
			// show_record();
			// insert_record();
			get_update();
			update_record();
			// get_delete();
			// delete_record();
		});

		// ========== FETCH RECORD FROM THE DB ==========
		function show_record() {
			$.ajax({
				url: 'process.php',
				method: 'post',
				data: {
					fetchData: 1
				},
				success: function(r) {
					$('tbody').html(r);
				}
			});
		}
		// ========== FETCH RECORD FROM THE DB END ==========

		// ========== UPDATE RECORD IN THE DB ==========
		function get_update() {
			$(document).on('click', '#btn_edit', function() {
				var eId = $(this).attr('data-id');
				$('#id').val(eId);
				$.ajax({
					url: 'process.php',
					method: 'post',
					data: {
						updateData: 1,
						id: eId
					},
					dataType: 'json',
					success: function(r) {
						$('#submit').html('Re-assign');
						$('#judge_incharge_id').val(r.response.judge_incharge_id);
					}
				});
			});
		}

		function update_record() {
			$(document).on('click', '#submit', function name() {
				var id = $('#id').val();
				var edit = $(this).attr('data-edit');
				var judge_incharge_id = $('#judge_incharge_id').val();

				$.ajax({
					url: 'process.php',
					method: 'post',
					data: {
						id: id,
						edit: edit,
						judge_incharge_id: judge_incharge_id,
					},
					dataType: 'json',
					success: function(r) {
						$('#message').show();
						$('#message').html(r.response);
						$('#user-data')[0].reset();
						$('#re_assign').modal('hide');
						// show_record();
					}
				});
			});
		}
		// ========== UPDATE RECORD IN THE DB END ==========

	});
</script>