<?php

require_once('../../../private/initialize.php');

// ========== FETCH RECORD FROM THE DB ========== 
// !------------------------------------------------------------
if (isset($_POST['fetchData'])) {
  $sn = 1;
  foreach (Transaction::find_by_unapproved() as $cCase) { ?>
    <tr>
      <td></td>
      <td><?php echo CourtCase::find_by_id($cCase->case_id)->court_case_name; ?></td>
      <td><?php
          if ($cCase->payment_mode == 2) {
            echo 'POS - ' . $cCase->trans_no;
          } else {
            echo 'EPS - ' . $cCase->trans_no;
          } ?></td>
      <td><?php echo date('dS M, Y', strtotime($cCase->created_at)) ?></td>
      <td class="product-action">
        <?php if ($cCase->approval == 0) { ?>

          <button class="btn btn-sm btn-warning" id="btn_edit" data-id="<?php echo $cCase->case_id ?>" data-transNo="<?php echo $cCase->trans_no ?>" data-toggle="modal" data-target="#trans">Pending</button>

        <?php } elseif ($cCase->approval == 1) { ?>

          <button class="btn btn-sm btn-primary" id="btn_edit" data-id="<?php echo $cCase->case_id ?>" data-transNo="<?php echo $cCase->trans_no ?>" data-toggle="modal" data-target="#trans">Approved</button>

        <?php } ?></td>
    </tr>
  <?php }
  // echo json_encode(['status' => 'success']);
  exit();
}
// !------------------------------------------------------------
if (isset($_POST['countedData'])) {
  $recent_transaction = count(Transaction::recent_transaction());
  $unapproved = count(Transaction::find_by_unapproved());
  $approved = count(Transaction::find_by_approved());

  exit(json_encode([
    'recent_transaction' => $recent_transaction,
    'unapproved' => $unapproved,
    'approved' => $approved
  ]));
}
// !------------------------------------------------------------
if (isset($_POST['fetchAssignData'])) {
  $sn = 0;
  foreach (CourtCase::recent_cases() as $transaction) { ?>
    <tr>
      <td style="font-size: 11px;"><?php echo ++$sn; ?></td>
      <td style="font-size: 11px;"><?php echo $transaction->court_case_name; ?></td>
      <td style="font-size: 11px;"><?php echo date('dS M, Y', strtotime($transaction->created_on)); ?></td>
      <td style="font-size: 11px;"><?php echo $transaction->court_matter == CourtCase::MATTER[$transaction->court_matter] ? CourtCase::MATTER[$transaction->court_matter] : CourtCase::MATTER[$transaction->court_matter]; ?></td>
      <td style="font-size: 11px;"><?php echo $transaction->description; ?></td>
      <td style="font-size: 11px;"><?php echo Admin::find_by_id($transaction->assigned_by)->full_name(); ?></td>
      <td style="font-size: 11px;"><?php echo Admin::find_by_id($transaction->judge_incharge_id)->full_name() ?></td>
      <td style="font-size: 11px;"><?php echo date('dS M, Y', strtotime($transaction->assigned_to_judge_on)); ?></td>

      <td style="font-size: 11px;"><?php echo $transaction->court_id == CourtCase::COURT_TYPE[$transaction->court_id] ? CourtCase::COURT_TYPE[$transaction->court_id] : CourtCase::COURT_TYPE[$transaction->court_id]; ?></td>

      <td style="font-size: 11px;"><?php echo $transaction->court_division == CourtCase::COURT_DIVISION[$transaction->court_division] ? CourtCase::COURT_DIVISION[$transaction->court_division] : CourtCase::COURT_DIVISION[$transaction->court_division]; ?></td>

      <td style="font-size: 11px;">
        <a href="<?php echo url_for('/lawyer/upload/' . $transaction->document); ?>" class="">
          <?php if ($transaction->document) { ?>
            <img width="20" src="<?php echo url_for('/lawyer/upload/pdfs.png'); ?>" class="img-thumbsnail">
          <?php } else {
            echo 'NO FILE';
          } ?>
        </a>
      </td>
      <td style="font-size: 11px;"><button class="btn btn-sm btn-primary" id="<?php echo $transaction->id ?>" data-toggle="modal" data-target="#re_assign">Re-Assign</button></td>
    </tr>
<?php }
  // echo json_encode(['status' => 'success']);
  exit();
}
// !------------------------------------------------------------
// ========== FETCH RECORD FROM THE DB ========== 

// ========== UPDATE RECORD FROM THE DB ========== 

// ========== UPDATE RECORD FROM THE DB ========== 

if (isset($_POST['updateData'])) {
  $id = $_POST['id'];
  $trans_no = $_POST['transNo'];
  $get_transaction = Transaction::find_by_trans_id($id, $trans_no);
  $get_case_id = CourtCase::find_by_id($get_transaction->case_id)->client_id;
  $barrister = Clients::find_by_id($get_case_id)->full_name();

  exit(json_encode([
    'status' => 'success',
    'response' => $get_transaction,
    'subscriber_name' => $barrister
  ]));
}

if (isset($_POST['update'])) {
  $randomNum = rand(10, 100);
  $id = $_POST['id'];
  $trans_no = $_POST['transNo'];
  $approve_trans = Transaction::find_by_trans_id($id, $trans_no);
  $receipt_no = $_POST['receipt_no'] = "REF-1" . str_pad($approve_trans->case_id, 3, "0", STR_PAD_LEFT) . $randomNum;

  $approve_case = CourtCase::find_by_id($id);

  if ($approve_case) {
    $args = [
      'approval' => $_POST['approval']
      // 'receipt_no' => $receipt_noc
    ];

    $approve_case->merge_attributes($args);
    $result = $approve_case->save();
  }

  if ($approve_trans) {
    $args = [
      'receipt_no' => $receipt_no,
      'approval' => $_POST['approval'],
      'approve_by' => $_POST['approve_by'],
      'approve_date' => date('Y-m-d H:i:s')
    ];

    $approve_trans->merge_attributes($args);
    $result = $approve_trans->save();
  }


  exit(json_encode(['status' => 'success', 'response' => 'Payment has been approved']));
}
// ========== UPDATE RECORD FROM THE DB ========== 
  // ========== UPDATE RECORD FROM THE DB ========== 
