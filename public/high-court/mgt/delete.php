<?php
require_once('../../../private/initialize.php');

require_login();
// if(!in_array($loggedInAdmin->level, [1])) { redirect_to(url_for('../../high-court/logout.php')); }

$id = $_GET['id'] ?? redirect_to(url_for('/high-court/mgt/')); // PHP > 7.0

$user = Admin::find_by_id($id);
 
if($user == false) {
  redirect_to(url_for('/high-court/mgt/'));
}

if(is_post_request()) {

  // Save record using post parameters
  $args['deleted'] = 1;
  $user->merge_attributes($args);
  $result = $user->save();

// echo '<pre>';
// print_r($user);
// echo '</pre>';
  if($result === true) {
    
    $session->message('User deleted successfully.');
    redirect_to(url_for('/high-court/mgt/'));
  } else {
    // show errors
  }

} else {
  // display the form
}


?>

<?php $page_title = 'User||Delete' ?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>



<div class="container my-3 border card">
  <div id="content" class="container-50 text-center">

    <div class="admin delete p-2">
      <h1 class="text-danger">Confirm delete</h1>
      <p>Are you sure you want to delete?</p>
      <p class="item mb-3"><?php echo '<i class="text-muted">'. $user->full_name() .'</i> '. '(<b class="text-danger">'. Admin::ADMIN_LEVEL[$user->level] .'</b>)'?></p>

      <form method="post">
        <div class="btn-group">
          <input type="submit" class="btn btn-danger border-0" value="Yes" />
          <a href="<?php echo url_for('/high-court/mgt/') ?>" class="btn btn-outline-secondary">No</a>
        </div>
      </form>
      
    </div>

  </div>
</div>


<?php include(SHARED_PATH . '/joms_footer.php'); ?>