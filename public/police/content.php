<?php require_once('../../private/initialize.php'); ?>

<?php if (isset($_POST['fetch_content'])) { ?>
  <ul class="users-list-wrapper media-list">
         <?php foreach (Advice::find_advice(['reply' => 1, 'client_id' => $loggedInAdmin->id ]) as  $value) { ?>

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


<?php if (isset($_POST['newCase'])) { 
   $randomNum = rand(10, 100);
   $args = [
    'officer_incharge' => $_POST['officer_incharge'],
    'case_type' => $_POST['case_type'],
    'complainant' => $_POST['complainant'],
    'accused' => $_POST['accused'],
    'statement_of_claim' => $_POST['statement_of_claim'],
    'station_id' => $loggedInAdmin->id,
    // 'document'  => 
   ];

   $newCase = new StationCase($args);
   // $newCase->attach_file($_FILES['document']);
   // pre_r($newCase);
   $result = $newCase->save();

   if($result == true){
      $new_id = $newCase->id;
      
      $case_id =  "1" . str_pad($new_id, 1, "0", STR_PAD_LEFT) . $randomNum;
      $args2 = ['case_id' => $case_id];

      $newCase->merge_attributes($args2);
      $result2 = $newCase->save();
      exit(json_encode(['msg' => 'success']));
   }else{
      exit(json_encode(['msg' => 'Fail']));
   }
   
   // 

?>
   

<?php } ?>


<?php if (isset($_POST['fetch_table'])) { ?>
   <section class="card animated slideInUp " >
     <div class="card-header">
       <h4 class="mb-0">All Cases in Station</h4>
     </div>
     <div class="card-content">
       <div class="table-responsive mt-1">
          <table class="table table-hover-animation mb-0">
           <thead>
             <tr>
               <th>CASE NO</th>
               <th>OFFICER IN CHARGE</th>
               <!-- <th>CASE TITLE</th> -->
               <th>CASE TYPE</th>
               <th>COMPLINER</th>
               <th>ACCUSED</th>
               <th>STATUS</th>
               
               <th>DATE SUBMITTED</th>
               <th>ACTION</th>
             </tr>
           </thead>
            <tbody>
              <?php foreach (StationCase::find_by_station_id($loggedInAdmin->id) as $case) { ?>
                  <tr>
                    <td>
                      
                      <?php echo $case->case_id; ?></td>
                    <td><?php echo $case->officer_incharge; ?></td>
                    <!-- <td><?php //echo $case->case_title; ?></td> -->
                    <td><?php echo $case->case_type == CourtCase::MATTER[$case->case_type] ? CourtCase::MATTER[$case->case_type] : CourtCase::MATTER[$case->case_type]; ?>
                    <?php //echo $case->case_type; ?></td>
                    
                    <td><?php echo $case->complainant; ?></td>
                    <td><?php echo $case->accused; ?></td>
                    
                    <td><?php echo $case->status; ?></td>
                    <td><?php echo date('d M Y {H:s a}', strtotime($case->created_on)); ?></td>
                    <td>
                      <button class="btn btn-sm bg-gradient-success dropdown-toggle mr-1 waves-effect waves-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather-more-vertical"></i> more
                      </button>

                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton202">

                        <a class="dropdown-item case" href="#" data-id="<?php echo $case->id; ?>" data-toggle="modal" data-target="#view">View</a>
                        <a class="dropdown-item case" href="#" data-id="<?php echo $case->id; ?>" data-toggle="modal" data-target="#advice">Seek Advice</a>
                        <!-- <a class="dropdown-item" href="#">Option 3</a> -->
                      </div>
                     
                      </td>
                  </tr>
              <?php } ?>
           </tbody>
         </table>
       </div>
     </div>
   </section>
<?php } ?>


<?php if (isset($_POST['content'])) { 
$id = $_POST['content'];
$case = CourtCase::find_by_id($id);

// pre_r($case);
?>
   <div class="modal-body">
     <p>
      Seek advice for 
      Case No: <b><?php echo Transaction::find_by_case_id($case->id)->trans_no ?? 'NOT SET' ?></b> <br>
      Titled: <b><?php echo $case->court_case_name; ?></b>

     </p>
   </div>
   <div class="modal-footer">
      
     <button type="button" id="yes" class="btn btn-outline-primary waves-effect waves-light" data-id="<?php echo $case->id; ?>">Yes <i class="feather-thumbs-up"></i></button>

     <button type="button" data-dismiss="modal" class="btn btn-primary waves-effect waves-light">Cancel <i class="feather-thumbs-down"></i></button>
   </div>
   
<?php } ?>

<?php 
if (isset($_POST['yes'])) { 
$id = $_POST['yes'];
// $client_id = $_POST['client_id'];
$case = CourtCase::find_by_id($id);
$find_case = Advice::find_by_caseId($id);

if($find_case){
   // echo "Advice already requested!!";
   exit(json_encode(['msg' => 'fail']));
}else{
   $args = [
    'case_id' => $id,
    'client_id' => $loggedInAdmin->id,
    'case_name' => $case->court_case_name,
    'case_description' => $case->description,
    'document' => $case->document,
    
   ];
   $case_progress = new Advice($args);
   $result = $case_progress->save();
   exit(json_encode(['msg' => 'success']));
}

?>
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

<?php if (isset($_POST['count'])) {  
   // $request = count(Advice::find_advice(['reply' => 0]));
   $replies = count(Advice::find_advice(['reply' => 1, 'client_id' => $loggedInAdmin->id]));
   exit(json_encode([
    'request' => $request,
    'replies' => $replies,
  ]));
?>
<?php } ?>


