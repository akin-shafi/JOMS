<?php

require_once('../../../private/initialize.php');

// ! require_login();

// ! Find all admins
// ? $admins = FortressAdmin::find_all();
$transactions = Transaction::find_by_unapproved();

// echo '<pre>';print_r($transactions);echo '</pre>';

?>
<?php $page_name = 'Bursary';
$page_title = 'All Un-approved';  ?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>
<style type="text/css">
	/*.buttons-copy,.buttons-json,.buttons-pdf{display: none !important;}*/
</style>
<!-- <div class="Quick View"> -->
<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">
						<span class="text-uppercase">All Un-approved Transactions</span> |
						<span class="text-muted">Filed Cases and Documents</span></h4>
				</div>
				<div class="card-content">
					<div class="card-body card-dashboard">
						<p class="card-text">The table below displays all un-approved transactions for the year <?php echo date('Y') ?>.
						</p>

						<div class="table-responsive">
							<table class="table table-striped dataex-html5-selectors">
								<thead>
									<tr>
										<th style="font-size: 10px;">No.</th>
										<th style="font-size: 10px;">Trans No.</th>
										<th style="font-size: 10px;">Payment Purpose</th>
										<th style="font-size: 10px;">Payment Mode</th>
										<th style="font-size: 10px;">Subscriber Name</th>
										<th style="font-size: 10px;">Reciept No.</th>
										<th style="font-size: 10px;">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $sn = 0;
									foreach ($transactions as $transaction) { ?>
										<tr>
											<td style="font-size: 10px;"><?php echo ++$sn; ?></td>
											<td style="font-size: 10px;"><?php echo $transaction->trans_no; ?></td>
											<td style="font-size: 10px;"><?php echo $transaction->payment_purpose; ?></td>
											<td style="font-size: 10px;"><?php echo $transaction->payment_mode; ?></td>
											<td style="font-size: 10px;"><?php echo $transaction->subscriber_id; ?></td>
											<td style="font-size: 10px;"><?php echo $transaction->receipt_no; ?></td>
											<td style="font-size: 10px;"><button class="btn btn-sm btn-info"><i class="feather-thumbs-up"></i></button></td>
										</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th style="font-size: 10px;">No.</th>
										<th style="font-size: 10px;">Trans No.</th>
										<th style="font-size: 10px;">Payment Purpose</th>
										<th style="font-size: 10px;">Payment Mode</th>
										<th style="font-size: 10px;">Subscriber Name</th>
										<th style="font-size: 10px;">Reciept No.</th>
										<th style="font-size: 10px;">Action</th>
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


<?php include(SHARED_PATH . '/joms_footer.php'); ?>