<?php
require_once('../../../private/initialize.php');

require_login();
if(!in_array($loggedInAdmin->level, [1])) { redirect_to(url_for('../../high-court/logout.php')); }

$id = $_GET['id'] ?? redirect_to(url_for('/admin/judges/')); // PHP > 7.0

$judges= Admin::find_by_id($id);
 
if($judges == false) {
  redirect_to(url_for('/admin/judges/?id='.$id));
}

if(is_post_request()) {

  // Save record using post parameters
  $args['deleted'] = 1;
  $judges->merge_attributes($args);
  $result = $judges->save();

// echo '<pre>';
// print_r($judges);
// echo '</pre>';
  if($result === true) {
    
    $session->message('Deleted successfully.');
    redirect_to(url_for('/admin/judges/?id='.$id));
  } else {
    // show errors
  }

} else {
  // display the form
}


?>

<?php $page_title = 'Judges||Delete' ?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>



<div class="container my-3 border card">
  <div id="content" class="container-50 text-center">

    <div class="admin delete p-2">
      <h1 class="text-danger">Confirm delete</h1>
      <p>Are you sure you want to delete?</p>
      <p class="item mb-3"><?php echo 'Judge '. $judges->full_name() ?></p>

      <form method="post">
        <div class="btn-group">
          <input type="submit" class="btn btn-danger border-0" value="Yes" />
          <a href="<?php echo url_for('/admin/judges_admin/') ?>" class="btn btn-outline-secondary">No</a>
        </div>
      </form>
      
    </div>

  </div>
</div>


<?php include(SHARED_PATH . '/joms_footer.php'); ?>