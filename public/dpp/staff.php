
<?php
require_once('../../private/initialize.php');
require_login();
if(!$loggedInAdmin->rank == 1) {
  redirect_to(url_for('/dpp/'));
}

?>
<?php $page_title = 'All Cases' ?>

<?php include(SHARED_PATH . '/agency_header.php'); ?>

  


    

    <!-- BEGIN: Content-->
<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-area-wrapper">
      <?php include('left.php') ?>
      <div class="content-right">
         <div class="">
            <div class="content-header row">
            </div>
            <div class="content-body">
               <div class="app-content-overlay"></div>
                <div class="app-fixed-search">
                   <div class="sidebar-toggle d-block d-lg-none"><i class="feather-menu"></i></div>
                   <fieldset class="form-group position-relative has-left m-0">
                      <input type="text" class="form-control" id="email-search" placeholder="Search email">
                      <div class="form-control-position">
                         <i class="feather-search"></i>
                      </div>
                   </fieldset>
                </div>
                  <!-- <div class="card-header">
                   <h4 class="mb-0">All Staffs</h4>
                 </div> -->

               <section class=" m-1">
                 
                  <div class=" border d-flex justify-content-end p-1">
                    <!-- <a class="btn btn-outline-primary ">Add New Staff</a> -->
                    <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-toggle="modal" data-target="#new">Add New Staff</button>
                 </div>

                 <div class="card-content">
                   <div class="row pt-2">
                      <?php foreach (Admin::find_by_admin_level(['level' => $loggedInAdmin->level]) as $value) { ?>
                        <div class="col-xl-4 col-md-6 col-sm-12 profile-card-1">
                          <div class="card" style="">
                            <div class="card-header mx-auto">
                              <div class="avatar avatar-xl">
                                <img class="img-fluid" src="<?php echo url_for('images/profile.svg') ?>" alt="img placeholder">
                              </div>
                            </div>
                            <div class="card-content">
                              <div class="card-body text-center">
                                <h4><?php echo Admin::find_by_id($value->id)->full_name() ?? 'Not Declared' ?></h4>
                                <!-- echo Admin::ADMIN_LEVEL[$value->level] -->
                                <p class=""><?php echo Admin::RANK[$value->rank]; ?></p>
                                <div class="card-btns d-flex justify-content-center">
                                  <!-- <button class="btn gradient-light-primary waves-effect waves-light">Follow</button> -->
                                  <button class="btn btn-sm btn-outline-primary waves-effect waves-light">view</button>
                                </div>
                                <hr class="my-2">
                                <div class="d-flex justify-content-between">
                                 <!--  <div class="float-left">
                                    <i class="feather-star text-warning mr-50"></i> 4.9
                                  </div> -->
                                  <div class="float-right">
                                    <i class="feather-briefcase text-primary mr-50"></i> 3 Cases
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                   </div>
                 </div>
               </section>
            </div>
         </div>
      </div>
   </div>
</div>
    <!-- END: Content-->
<div class="modal fade text-left" id="new" >
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Add New Staff </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form class="form-horizontal" novalidate="" method="post">
        <input type="hidden" id="level" name="level" value="<?php $loggedInAdmin->level; ?>">
        <div id="error" class="px-2 text-danger animated flash infinite"></div>
        <div class="row modal-body">
          <div class="col-sm-6">
            <div class="form-group">
              <div class="controls">
                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" required="" data-validation-required-message="This name field is required">
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="controls">
                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name" required="" data-validation-required-message="This name field is required">
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="controls">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="" data-validation-required-message="The email field is required">
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="controls">
                <select class="form-control" id="rank" name="rank"  required="" data-validation-required-message="This field is required">
                  <option value="">Select Rank</option>
                  <option value="1">Director</option>
                  <option value="2">Barrister</option>
                </select>
                
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <div class="controls">
                <input type="tex" id="phone" name="phone" class="form-control" placeholder="Phone number" required="" data-validation-required-message="The phone field is required">
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="controls">
                <input type="password" id="password" name="password" class="form-control" placeholder="Your Password" required="" data-validation-required-message="The password field is required" minlength="6">
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="controls">
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required="" data-validation-match-match="password" data-validation-required-message="The Confirm password field is required" minlength="6">
              </div>
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary waves-effect waves-light" id="create">Create</button>
          <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-dismiss="modal">Cancel</button>
        </div>
      </form>

      
    </div>
  </div>
</div>
<?php include(SHARED_PATH . '/agency_footer.php'); ?>
<script type="text/javascript">
	$(window).ready(function() {
	// $(document).on('load', '.status', function(e) {
		// fetch()
	});

  $(document).on('click', '#create', function(e) {
      e.preventDefault();
       $.ajax({
          url: 'content.php',
          method: 'post',
          data: {
            staff: 1,
            level: $('#level').val(),
            first_name: $('#first_name').val(),
            last_name: $('#last_name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            rank: $('#rank').val(),
            password: $('#password').val(),
            confirm_password: $('#confirm_password').val(),
          },
          dataType: 'json',
          success: function(r) {
           if (r.msg == 'success') {
              $("#new").modal('hide');
              toastSuccess("Staff created successfully");
           }else{
            $("#error").html(r.msg);
              toastFail("Request failed!");
           }
         
          }
      })
      //  .done(function(res) {
      //   $("#create").modal('hide');
      //   toastSuccess("Staff created successfully");
      // }).fail(function(jqXHR, textStatus) {
      //   toastFail("Request failed: " + textStatus)
      //   // console.log("Request failed: " + textStatus);
      // });
  });
	// var menu = $('#menu')
	// var menu = document.querySelector('#inner-menu');
	//  menu.addEventListener('click', activateItem);
	//  function activateItem(e){
	//    if(e.target.tagName == "A"){
	//      for (var i = 0; i < e.target.parentNode.children.length; i++) {
	//        e.target.parentNode.children[i].classList.remove("active");
	//        // console.log(e);
	//        e.target.classList.add("active");
	//      }
	      
	//    }
	//  }

	// function fetch(e) {
	// 	$.ajax({
	//         url: 'content.php',
	//         method: 'post',
	//         data: {
	//           content: 1,
	//           // sub_id: id,
	//           // sub_status: status,
	//         },
	//         // dataType: 'json',
	//         success: function(r) {
	//         	$("#data").html(r)
			   
	//         }
	//     });
	// }

	// $(document).on('click', '.list-group-item', function(e) {
	// 	var id = $(this).data('id');

	// 	$.ajax({
	//         url: 'content.php',
	//         method: 'post',
	//         data: {
	//           content: id,
	//           // sub_id: id,
	//           // sub_status: status,
	//         },
	//         // dataType: 'json',
	//         success: function(r) {
	//         	$("#data").html(r)
			   
	//         }
	//     });
	// });


</script>