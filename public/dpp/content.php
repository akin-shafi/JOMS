<?php require_once('../../private/initialize.php'); ?>
<?php if (isset($_POST['content'])) { 
  if ($_POST['page_title'] == 'Advice') { 
    $reply = 0;
  }elseif ($_POST['page_title'] == 'Replied') {
    $reply = 1;
  }
?>
    <ul class="users-list-wrapper media-list">
         <?php foreach (Advice::find_advice(['reply' => $reply]) as  $value) { ?>

              <li class="media <?php if ($value->mail_read  == 1) {
                     echo 'mail-read';
                 } else {
                     echo 'mail-unread';
                 } ?>" data-id="<?php echo $value->id; ?>">
                 <div class="media-left pr-50">
                    <div class="avatar">
                       <img src="<?php
                       if (Admin::find_by_id($value->client_id)->level == 12) {
                           echo url_for('images/police_icon.png');
                       } else {
                           echo url_for('images/profile.svg');
                       }
                       ?>" alt="avtar img holder">
                    </div>
                    <div class="user-action ">
                       <div class="vs-checkbox-con">
                          <input type="checkbox" >
                          <span class="vs-checkbox vs-checkbox-sm">
                             <span class="vs-checkbox--check">
                                <i class="vs-icon feather-check"></i>
                             </span>
                          </span>
                       </div>
                       <span class="favorite"><i class="feather-star"></i></span>
                    </div>
                 </div>

                 <div class="media-body">
                    <div class="user-details">
                       <div class="mail-items">
                          <h5 class="list-group-item-heading text-bold-600 mb-25 text-uppercase">
                             <?php echo $value->case_name;?>
                             
                                
                             </h5>
                          <span class="list-group-item-text text-truncate text-uppercase">
                             From: <?php if (Admin::find_by_id($value->client_id)->level == 12) {
                           echo 'npf '. Admin::find_by_id($value->client_id)->division(). ' division';
                       } else {
                           echo Admin::find_by_id($value->client_id)->full_name();
                       }?>
                             <?php //echo CourtCase::find_by_client_id($value->client_id)->court_case_name;?>
                          </span>
                       </div>
                       <div class="mail-meta-item">
                          <span class="float-right">
                          <span class="mr-1 bullet bullet-success bullet-sm"></span><span class="mail-date"><?php echo date('d M Y {H:s a}', strtotime($value->request_on)); ?></span>
                          </span>
                       </div>
                    </div>
                    <div class="mail-message">
                       <p class="list-group-item-text truncate mb-0"><?php echo $value->case_description;?></p>
                    </div>
                 </div>
              </li>
           <?php } ?>
        
    </ul>
   
<?php } ?>

<?php if (isset($_POST['view'])) { 
$case = Advice::find_by_id($_POST['view']);
$sendAdvice = Advice::find_by_caseId($case->case_id);




if($sendAdvice->mail_read == 0){
   $args = ['mail_read' => 1];

   $sendAdvice->merge_attributes($args);
   // pre_r($args);
   $result = $sendAdvice->save();
   // exit(json_encode(['msg' => 'success']));
}



if(Admin::find_by_id($case->client_id)->level == 12) {
   $cId = 'npf '. Admin::find_by_id($case->client_id)->division(). ' division';
} else{
   $cId = Admin::find_by_id($case->client_id)->full_name(); 
}

if ($_POST['page_title'] == 'Advice') { 
    $data = $case->case_description;
}elseif ($_POST['page_title'] == 'Replied') {
  $data = $case->advice;
}

exit(json_encode([
  'case_id' => $case->case_id,
  'client_id' => $cId,
  'case_name' => 'On the Case of: '.$case->case_name,
  'case_description' => $data,
  'time' => date('H:s a', strtotime($case->request_on)),
  'date' => date('d M Y', strtotime($case->request_on)),
]));



?>

<?php } ?>

<?php if (isset($_POST['advice'])) { 
   $input = $_POST['input'];
   $sendAdvice = Advice::find_by_caseId($_POST['id']);
   // pre_r($sendAdvice);

   if(!$sendAdvice->advice == ''){
      exit(json_encode(['msg' => 'Fail']));
   }else{
      $args = [
         'advice' => $input,
         'reply' => 1,
      ];
   
      $sendAdvice->merge_attributes($args);
      // pre_r($args);
      $result = $sendAdvice->save();
      exit(json_encode(['msg' => 'success']));
   }
?>

<?php } ?>

<?php if (isset($_POST['count'])) {  
   $request = count(Advice::find_advice(['reply' => 0]));
   $replies = count(Advice::find_advice(['reply' => 1]));
   exit(json_encode([
    'request' => $request,
    'replies' => $replies,
  ]));
?>
<?php } ?>

<?php if (isset($_POST['staff'])) { 

  $args = [
    'level' => $loggedInAdmin->level,
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'rank' => $_POST['rank'],
    'password' => $_POST['password'],
    'confirm_password' => $_POST['confirm_password'],
    'created_by' => $loggedInAdmin->id,
  ];

  $admins = new Admin($args);
  // pre_r($admins);
  $result = $admins->save();
  if ($result === true) {
    exit(json_encode(['msg' => 'success']));
  } else {
    exit(json_encode(['msg' => $admins->errors]));
  }

?>
  
<?php } ?>

<!--  -->
