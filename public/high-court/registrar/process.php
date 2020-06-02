<?php

require_once('../../../private/initialize.php');

// ========== FETCH RECORD FROM THE DB ========== 
if (isset($_POST['fetchData'])) {
  $sn = 1;
  foreach (CourtCase::recent_cases() as $transaction) { ?>
    <tr>
      <td style="font-size: 11px;"><?php echo $sn++; ?></td>
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
      <td style="font-size: 11px;"><button class="btn btn-sm btn-primary" id="btn_edit" data-id="<?php echo $transaction->id ?>" data-toggle="modal" data-target="#re_assign">Re-Assign</button></td>
    </tr>
  <?php }
  // echo json_encode(['status' => 'success']);
  exit();
}

// !------------------------------------------------------------
if (isset($_POST['countedData'])) {
  $recent_cases = count(CourtCase::recent_cases());
  $unassigned = count(CourtCase::find_by_unassigned());
  $assigned = count(CourtCase::find_by_assigned());

  exit(json_encode([
    'recent_cases' => $recent_cases,
    'unassigned' => $unassigned,
    'assigned' => $assigned
  ]));
}
// !------------------------------------------------------------

if (isset($_POST['fetchAssignData'])) {
  $sn = 0;
  foreach (CourtCase::recent_cases() as $transaction) { ?>
    <tr>
      <td style="font-size: 10px;"><?php echo ++$sn; ?></td>
      <td style="font-size: 10px;"><?php echo $transaction->court_case_name; ?></td>
      <td style="font-size: 10px;"><?php echo date('dS M, Y', strtotime($transaction->created_on)); ?></td>
      <td style="font-size: 10px;"><?php echo $transaction->court_matter == CourtCase::MATTER[$transaction->court_matter] ? CourtCase::MATTER[$transaction->court_matter] : CourtCase::MATTER[$transaction->court_matter]; ?></td>
      <td style="font-size: 10px;"><?php echo $transaction->description; ?></td>
      <td style="font-size: 11px;">
        <a href="<?php echo url_for('/lawyer/upload/' . $transaction->document); ?>" class="">
          <?php if ($transaction->document) { ?>
            <img width="20" src="<?php echo url_for('/lawyer/upload/pdfs.png'); ?>" class="img-thumbsnail">
          <?php } else {
            echo 'NO FILE';
          } ?>
        </a>
      </td>
      <td style="font-size: 10px;"><button class="btn btn-sm btn-primary" id="btn_edit" data-id="<?php echo $transaction->id ?>" data-toggle="modal" data-target="#trans">Assign</button></td>
    </tr>
<?php }
  // echo json_encode(['status' => 'success']);
  exit();
}
// ========== FETCH RECORD FROM THE DB ========== 

// ========== UPDATE RECORD FROM THE DB ========== 

// ========== UPDATE RECORD FROM THE DB ========== 

if (isset($_POST['updateData'])) { 
  $id = $_POST['id'];
  $get_update = CourtCase::find_by_id($id);
  exit(json_encode(['status' => 'success', 'response' => $get_update]));
}

if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $edit_judge = CourtCase::find_by_id($id);
  $args = [
    'judge_incharge_id' => $_POST['judge_incharge_id']
  ];

  $edit_judge->merge_attributes($args);
  $result = $edit_judge->save();

  exit(json_encode(['status' => 'success', 'response' => 'Judge updated successfully']));
}

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $assigned_by = $loggedInAdmin->id;
  $edit_judge = CourtCase::find_by_id($id);
  $args = [
    'status' => $_POST['status'],
    'judge_incharge_id' => $_POST['judge_incharge_id'],
    'assigned_by' => $assigned_by,
    'assigned_to_judge_on' => date('Y-m-d H:i:s')
  ];

  $edit_judge->merge_attributes($args);
  $result = $edit_judge->save();

  exit(json_encode(['status' => 'success', 'response' => 'Justice ' . Admin::find_by_id($edit_judge->judge_incharge_id)->full_name() . ' has been assigned to this case successfully']));
}
// ========== UPDATE RECORD FROM THE DB ========== 
  // ========== UPDATE RECORD FROM THE DB ========== 
