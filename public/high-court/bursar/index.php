<?php

require_once('../../../private/initialize.php');

// ! require_login();

// ! Find all admins
// ? $admins = FortressAdmin::find_all();
$transactions = Transaction::recent_transaction();
$unapproved = Transaction::find_by_unapproved();
$approved = Transaction::find_by_approved();

// echo '<pre>';print_r($transactions);echo '</pre>';

?>
<?php $page_name = 'Bursary';
$page_title = 'Dashboard';  ?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>
<style type="text/css">
	/*.buttons-copy,.buttons-json,.buttons-pdf{display: none !important;}*/
</style>
<!-- <div class="Quick View"> -->

<div class="row d-flex justify-content-between">
	<div class="col-lg-3 col-sm-6 col-12">
		<a href="<?php //echo url_for('/high-court/bursar/approved.php'); 
							?>">
			<div class="card">
				<div class="card-header d-flex align-items-start pb-0">
					<div>
						<h2 class="text-bold-700 mb-0" id="recent_transaction"><?php //echo count($transactions); 
																																		?></h2>
						<p class="text-dark text-bold-700">Recent Trans <?php echo date('(dS M)') ?></p>
					</div>
					<div class="avatar bg-rgba-info p-50 m-0">
						<div class="avatar-content">
							<i class="feather-cpu text-info font-medium-5"></i>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-lg-3 col-sm-6 col-12">
		<a href="<?php echo url_for('/high-court/bursar/approved.php'); ?>">
			<div class="card">
				<div class="card-header d-flex align-items-start pb-0">
					<div>
						<h2 class="text-bold-700 mb-0" id="approved"><?php //echo count($approved); 
																													?></h2>
						<p class="text-primary text-bold-700">APPROVED</p>
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

	<div class="col-lg-3 col-sm-6 col-12">
		<a href="<?php echo url_for('/high-court/bursar/unapproved.php'); ?>">
			<div class="card">
				<div class="card-header d-flex align-items-start pb-0">
					<div>
						<h2 class="text-bold-700 mb-0" id="unapproved"><?php //echo count($unapproved); 
																														?></h2>
						<p class="text-danger text-bold-700">UNAPPROVED</p>
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

						<!-- DataTable starts -->
						<div class="table-responsive">
							<table class="table data-list-view">
								<thead>
									<tr>
										<th></th>
										<th>Case Name</th>
										<th>Temp Suit No.</th>
										<th>Created on</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
						<!-- DataTable ends -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Column selectors with Export Options and print table -->
<!-- </div> -->


<!-- Modal -->
<div class="modal fade text-left" id="trans" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel19">Approve Transaction</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" id="approve-trans">
				<input type="hidden" id="id">
				<input type="hidden" id="transNo">
				<input type="hidden" name="created_by" id="approve_by" value="<?php echo $loggedInAdmin->id; ?>" />
				<div class="modal-body">
					<div class="form-group">
						<label for="trans_no">Transaction Number</label>
						<input type="text" class="form-control" id="trans_no" placeholder="Transaction Number" disabled>
					</div>
					<div class="form-group">
						<label for="p_payment">Payment Purpose</label>
						<input type="text" class="form-control" id="p_purpose" disabled>
					</div>
					<div class="form-group">
						<label for="p_mode">Payment Mode</label>
						<select name="payment_mode" class="form-control select2 w-100" id="p_mode" disabled>
							<option value="">-select-</option>
							<?php foreach (Transaction::MOP as $key => $value) { ?>
								<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
							<?php } ?>

						</select>
					</div>
					<div class="form-group">
						<label for="s_name">Subscriber Name</label>
						<input type="text" class="form-control" id="s_name" placeholder="Subscriber Name" disabled>
					</div>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" name="approval" value="1" class="custom-control-input" id="checkAssign">
						<label class="custom-control-label" for="checkAssign">Approve</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-primary" id="submit" data-edit="update">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>




<?php include(SHARED_PATH . '/joms_footer.php'); ?>

<script>
	// $(document).ready(function() {
	$(document).ready(function() {
		show_record();
		// insert_record();
		get_update();
		update_record();
		counted_data();
		// get_delete();
		// delete_record();
	});

	// ========== FETCH RECORD FROM THE DB ==========
	function show_record() {
		$.ajax({
			url: 'process.php',
			method: 'post',
			data: {
				fetchData: 1,
			},
			success: function(r) {
				$('tbody').html(r);
			}
		});
	}

	function counted_data() {
		$.ajax({
			url: 'process.php',
			method: 'post',
			data: {
				countedData: 1,
			},
			dataType: 'json',
			success: function(r) {
				$('#recent_transaction').text(r.recent_transaction);
				$('#unapproved').text(r.unapproved);
				$('#approved').text(r.approved);
			}
		});
	}
	// ========== FETCH RECORD FROM THE DB END ==========

	// ========== UPDATE RECORD IN THE DB ==========
	function get_update() {
		$(document).on('click', '#btn_edit', function() {
			var eId = $(this).attr('data-id');
			var transNo = $(this).attr('data-transNo');
			$('#id').val(eId);
			$('#transNo').val(transNo);
			$.ajax({
				url: 'process.php',
				method: 'post',
				data: {
					updateData: 1,
					id: eId,
					transNo: transNo
				},
				dataType: 'json',
				success: function(r) {
					$('#submit').html('Approve');
					$('#trans_no').val(r.response.trans_no);
					$('#p_purpose').val(r.response.payment_purpose);
					$('#p_mode').val(r.response.payment_mode);
					$('#s_name').val(r.subscriber_name);
				}
			});
		});
	}

	function update_record() {
		$(document).on('click', '#submit', function name() {
			var id = $('#id').val();
			var transNo = $('#transNo').val();
			var update = $(this).attr('data-edit');
			var approval = $('#checkAssign').val();
			var approve_by = $('#approve_by').val();

			$.ajax({
				url: 'process.php',
				method: 'post',
				data: {
					id: id,
					update: update,
					approval: approval,
					approve_by: approve_by,
					transNo: transNo,
				},
				dataType: 'json',
				success: function(r) {
					console.log(r);
					$('#message').show();
					$('#message').html(r.response);

					$('#approve-trans')[0].reset();
					$('#trans').modal('hide');
					show_record();
					counted_data();
				}
			});
		});
	}
	// ========== UPDATE RECORD IN THE DB END ==========

	// });
</script>