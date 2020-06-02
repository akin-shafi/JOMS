<?php

require_once('../../../private/initialize.php');

// ========== FETCH RECORD FROM THE DB ========== 
if (isset($_POST['fetchData'])) { 
  $sn = 1;
  foreach (CourtCase::find_case_by_judge($loggedInAdmin->id) as $transaction) { ?>
    <?php if (in_array($transaction->case_progress, [4,6])) { ?>
      <tr>
        <td ><?php echo $sn++; ?></td>
        <td ><?php echo $transaction->court_case_name; ?></td>
        <td ><?php echo date('dS M, Y', strtotime($transaction->assigned_to_judge_on)); ?></td>
        <td ><?php echo $transaction->court_matter == CourtCase::MATTER[$transaction->court_matter] ? CourtCase::MATTER[$transaction->court_matter] : CourtCase::MATTER[$transaction->court_matter]; ?></td>
        <td ><?php echo $transaction->description; ?></td>

        <td >
          <?php if ($transaction->case_progress == 1) { ?>
            <span>On-going Trial</span>
          <?php } elseif ($transaction->case_progress == 2) { ?>
            <span class="text-warning">Remanded</span>
          <?php } elseif ($transaction->case_progress == 3) { ?>
            <span class="text-primary">Bailed</span>
          <?php } elseif ($transaction->case_progress == 4) { ?>
            <span class="text-warning">Adjourned</span>
          <?php } elseif ($transaction->case_progress == 5) { ?>
            <span class="text-danger">Sentenced</span>
          <?php } elseif ($transaction->case_progress == 6) { ?>
            <span class="text-success">Discharged and Acquitted</span>
          <?php } ?>
        </td>

        <td style="font-size: 11px;">
          <a href="<?php echo url_for('/high-court/pdf_viewer.php?pdf=' . $transaction->id); ?>" class="">
            <?php if ($transaction->document) { ?>
              <img width="20" src="<?php echo url_for('/lawyer/upload/pdfs.png'); ?>" class="img-thumbsnail">
            <?php } else {
              echo 'NO FILE';
            } ?>
          </a>
        </td>
        <td>
          <div class="btn-group mb-1">
              <div class="dropdown ">
                <button class="btn btn-primary dropdown-toggle mr-1 waves-effect waves-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  Action
                </button>
                <div class="dropdown-menu ">
                  <?php if (in_array($transaction->case_progress, [4,6])) { ?>
                      <button type="button" class="dropdown-item text-danger" id="case_close">Update Status</button>
                  <?php }else{ ?>
                       <button class="dropdown-item" id="btn_edit" data-toggle="modal" data-target="#re_assign" data-id="<?php echo $transaction->id ?>">Update Status</button>
                  <?php } ?>
                 

                  

                  <a class="dropdown-item" href="<?php echo url_for('/high-court/judge/case_file.php?id='. $transaction->id) ?>">Case Record</a>
                  <a class="dropdown-item" href="<?php echo url_for('/high-court/judge/case_management/edit.php?id='. $transaction->id) ?>">Edit Status</a>
                </div>
              </div>
            </div>
          <!-- <button class="btn btn-sm btn-info" id="btn_edit" data-id="<?php //echo $transaction->id ?>" data-toggle="modal" data-target="#re_assign">Update Status</button> -->
        </td>
        <!-- <td style="font-size: 10px;">
          <button class="btn btn-sm btn-info" id="btn_edit" data-id="<?php //echo $transaction->id ?>" data-toggle="modal" data-target="#re_assign">Update Status</button>
        </td> -->
      </tr>
    <?php } ?>
  <?php }
  // echo json_encode(['status' => 'success']);
  exit();
}

// !------------------------------------------------------------
if (isset($_POST['countedData'])) {
  $status = $_POST['status'] ?? '';
  $trial = count(CourtCase::find_by_case_progress(1));
  $remanded = count(CourtCase::find_by_case_progress(2));
  $bailed = count(CourtCase::find_by_case_progress(3));
  $adjourned = count(CourtCase::find_by_case_progress(4));
  $sentenced = count(CourtCase::find_by_case_progress(5));
  $discharged = count(CourtCase::find_by_case_progress(6));

  exit(json_encode([
    'trial' => $trial,
    'remanded' => $remanded,
    'bailed' => $bailed,
    'adjourned' => $adjourned,
    'sentenced' => $sentenced,
    'discharged' => $discharged,
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
    'case_progress' => $_POST['case_progress'],
    'date_adjourned' => $_POST['date_adjourned'],
    'comments' => $_POST['comments'],
  ];

  $edit_judge->merge_attributes($args);
  $result = $edit_judge->save();

  exit(json_encode(['status' => 'success', 'response' => 'Judge updated successfully']));
}


if (isset($_POST['case_progress'])) {
  $id = $_POST['case_id'];
  $court_case = CourtCase::find_by_id($id) ?? '';
  $args = [
    'case_id' => $id,
    'case_status' => $_POST['case_status'],
    'judge_summary' => $_POST['judge_summary'],
    'hearing_date' => $_POST['hearing_date'],
    'adjourned_date' => $_POST['adjourned_date'],
    'updated_by' => $loggedInAdmin->id,
  ];
  $case_progress = new CaseProgress($args);
  // $result = false;
  $result = $case_progress->save();

  $args2 = [
      'case_progress' => $_POST['case_status'],
      'date_adjourned' => $_POST['adjourned_date'],
  ];

  $court_case->merge_attributes($args2);
  // $result2 = false;
  $result2 =  $court_case->save();

  // pre_r($case_progress);
  // pre_r($court_case);
  if($result != false || $result2 != false){
    exit(json_encode(['msg' => 'success'])); 
  }else{
    exit(json_encode(['msg' => 'Fails']));
  }
}



if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $assigned_by = $loggedInAdmin->id;
  $edit_judge = CourtCase::find_by_id($id);
  $args = [
    'status' => $_POST['status'],
    'case_progress' => $_POST['case_progress'],
    'assigned_by' => $assigned_by,
    'assigned_to_judge_on' => date('Y-m-d H:i:s')
  ];

  $edit_judge->merge_attributes($args);
  $result = $edit_judge->save();
}

if(isset($_POST['timeline'])){ 
  $id = $_POST['id'];
  $case_status = CaseProgress::find_by_caseId($id) ?? '';
  $court_case = CourtCase::find_by_id($id);
  $rec = $_GET['rec'] ?? 1;
  $case_rec = CaseProgress::find_by_id($rec);
?>
 <?php if (!empty($case_status)) { ?>
   <?php $sn = 1; foreach ($case_status as  $value) { 
    if($court_case->case_progress == $value->case_status){
      $active = 'line-active';
    }else{
      $active = '';
    }
    if($value->case_status == 1){ $bgColor = 'bg-primary';}elseif ($value->case_status == 2) {$bgColor = 'bg-warning';}elseif ($value->case_status == 3) {$bgColor = 'bg-dark';}elseif ($value->case_status == 4) {$bgColor = 'bg-info';}elseif ($value->case_status == 5) {$bgColor = 'bg-danger';}elseif ($value->case_status == 6) {$bgColor = 'bg-success';}else{$bgColor = 'bg-secondary';}

    if($value->case_status == 1){ $icon = 'feather-refresh-ccw';}elseif ($value->case_status == 2) {$icon = 'feather-sliders';}elseif ($value->case_status == 3) {$icon = 'feather-sun';}elseif ($value->case_status == 4) {$icon = 'feather-clock';}else{$icon = 'feather-plus';}
    ?>

    <li class="item" data-id="<?php echo $value->id; ?>" > 
      <a href="#<?php //echo url_for('high_court/judge/case_file.php?id=' . $value->id) ?>">
          <div class="timeline-icon <?php echo $bgColor; ?>">
            <i class="<?php echo $icon; ?> font-medium-2 align-middle"></i>
          </div>
          <div class="timeline-info" id="inner-menu">
            <p class="font-weight-bold mb-0"><?php echo CourtCase::CASE_STATUS[$value->case_status]; ?></p>
            <!-- <span class="font-small-3">Bonbon macaroon jelly beans gummi bears jelly lollipop apple</span> -->
          </div>
          <small class="text-muted"><?php echo date('l, dS \of M, Y', strtotime($value->hearing_date)); ?></small>
      </a>
    </li>

   <?php } ?>
 <?php } ?>
 
   
<?php } ?>



<?php if(isset($_POST['pagination'])){ 
    $rec = $_POST['id'] ;
    $case_rec = CaseProgress::find_by_id($rec); 

    // pre_r($case_rec);
    ?>

    

    <div class="title ">
        <h5>Judgement: <?php echo  CourtCase::CASE_STATUS[$case_rec->case_status]; ?></h5>
        <p>Hearing Date :<?php echo date('l, dS \of M, Y', strtotime($case_rec->hearing_date)); ?></p>
    </div>
     <p>
        <?php echo $case_rec->judge_summary; ?>
    </p>

 <?php } ?>