<?php

require_once('../../../private/initialize.php');

// ! require_login();

// ! Find all admins
// ? $admins = FortressAdmin::find_all();
$transactions = Transaction::recent_approved();

// echo '<pre>';print_r($transactions);echo '</pre>';

?>
<?php $page_name = 'Commissioner';
$page_title = 'Dashboard';  ?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>
<style type="text/css">
  /*.buttons-copy,.buttons-json,.buttons-pdf{display: none !important;}*/
</style>
<!-- <div class="Quick View"> -->

<div class="row d-flex justify-content-between">
  <div class="col-lg-3 col-sm-6 col-12">
    <a href="<?php echo url_for('/high-court/commissioner/sealed.php'); ?>">
      <div class="card">
        <div class="card-header d-flex align-items-start pb-0">
          <div>
            <h2 class="text-bold-700 mb-0"><?php echo count(Transaction::find_by_sealed()); ?></h2>
            <p class="text-primary text-bold-700">SEALED</p>
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


</div>
<!-- Quick View End -->




<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border pb-2">
          <h4 class="card-title">
            <span class="text-uppercase">Recent Approved</span> |
            <span class="text-muted">Filed Cases and Documents</span></h4>
          <!-- <div class="btn btn-sm btn-primary p-1" data-toggle="modal" data-target="#trans">Add Transaction</div> -->
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard">
            <p class="card-text">The table below displays all most recent document and case approved by bursary department.
            </p>

            <div class="table-responsive">
              <table class="table table-striped dataex-html5-selectors">
                <thead>
                  <tr>
                    <th style="font-size: 10px;">No.</th>
                    <th style="font-size: 10px;">Document Name</th>
                    <th style="font-size: 10px;">Document Type</th>
                    <th style="font-size: 10px;">Approved By</th>
                    <th style="font-size: 10px;">Date Approved</th>
                    <th style="font-size: 10px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sn = 0;
                  foreach ($transactions as $transaction) { ?>
                    <tr>
                      <td style="font-size: 10px;"><?php echo ++$sn; ?></td>
                      <td style="font-size: 10px;"><?php echo $transaction->doc_name; ?></td>
                      <td style="font-size: 10px;"><?php echo $transaction->doc_type == Transaction::DOC_TYPE[$transaction->doc_type] ? Transaction::DOC_TYPE[$transaction->doc_type] : Transaction::DOC_TYPE[$transaction->doc_type]; ?></td>
                      <td style="font-size: 10px;"><?php echo $transaction->approve_by; ?></td>
                      <td style="font-size: 10px;"><?php echo date('dS M, Y', strtotime($transaction->approve_date)); ?></td>
                      <td style="font-size: 10px;"><button class="btn btn-sm btn-info"><i class="feather-slash text-danger"></i> Affix Seal</button></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th style="font-size: 10px;">No.</th>
                    <th style="font-size: 10px;">Document Name</th>
                    <th style="font-size: 10px;">Document Type</th>
                    <th style="font-size: 10px;">Approved By</th>
                    <th style="font-size: 10px;">Date Approved</th>
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


<!-- Modal -->
<!-- <div class="modal fade text-left" id="trans" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel19">New Transaction</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form>
				<input type="hidden" name="created_by" value="<?php echo $loggedInAdmin->id; ?>" />
				<div class="modal-body">
					<div class="form-group">
						<label for="trans_no">Transaction Number</label>
						<input type="text" class="form-control form-control-sm" id="transa_no" placeholder="Transaction Number">
					</div>
					<div class="form-group">
						<label for="p_payment">Payment Purpose</label>
						<select name="" id="" class="form-control form-control-sm select2 w-100" id="p_payment">
							<option value="">-select-</option>
							<option value="1">Litigation</option>
							<option value="2">Marriage Certificate</option>
						</select>
					</div>
					<div class="form-group">
						<label for="p_mode">Payment Mode</label>
						<select name="" id="" class="form-control form-control-sm select2 w-100" id="p_mode">
							<option value="">-select-</option>
							<option value="1">POS</option>
							<option value="2">Bank Payment</option>
						</select>
					</div>
					<div class="form-group">
						<label for="s_name">Subscriber Name</label>
						<input type="text" class="form-control form-control-sm" id="s_name" placeholder="Subscriber Name">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div> -->




<?php include(SHARED_PATH . '/joms_footer.php'); ?>