
<?php
require_once('../../private/initialize.php');
require_login();


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
                      <?php for ($i= 1; $i < 10 ; $i++) { ?>
                        <div class="col-xl-4 col-md-6 col-sm-12 profile-card-1">
                          <div class="card" style="">
                            <div class="card-header mx-auto">
                              <div class="avatar avatar-xl">
                                <img class="img-fluid" src="<?php echo url_for('images/profile.svg') ?>" alt="img placeholder">
                              </div>
                            </div>
                            <div class="card-content">
                              <div class="card-body text-center">
                                <h4>IbrahimOladipo</h4>
                                <p class="">Barrister</p>
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
                                    <i class="feather-briefcase text-primary mr-50"></i> 37 Projects
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
<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-modal="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Vertically Centered</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Croissant jelly-o halvah chocolate sesame snaps. Brownie caramels candy canes chocolate cake
          marshmallow icing lollipop I love. Gummies macaroon donut caramels biscuit topping danish.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Accept</button>
      </div>
    </div>
  </div>
</div>
<?php include(SHARED_PATH . '/agency_footer.php'); ?>
<!-- <script type="text/javascript">
	$(window).ready(function() {
	// $(document).on('load', '.status', function(e) {
		fetch()
	});
	// var menu = $('#menu')
	var menu = document.querySelector('#inner-menu');
	 menu.addEventListener('click', activateItem);
	 function activateItem(e){
	   if(e.target.tagName == "A"){
	     for (var i = 0; i < e.target.parentNode.children.length; i++) {
	       e.target.parentNode.children[i].classList.remove("active");
	       // console.log(e);
	       e.target.classList.add("active");
	     }
	      
	   }
	 }

	function fetch(e) {
		$.ajax({
	        url: 'content.php',
	        method: 'post',
	        data: {
	          content: 1,
	          // sub_id: id,
	          // sub_status: status,
	        },
	        // dataType: 'json',
	        success: function(r) {
	        	$("#data").html(r)
			   
	        }
	    });
	}

	$(document).on('click', '.list-group-item', function(e) {
		var id = $(this).data('id');

		$.ajax({
	        url: 'content.php',
	        method: 'post',
	        data: {
	          content: id,
	          // sub_id: id,
	          // sub_status: status,
	        },
	        // dataType: 'json',
	        success: function(r) {
	        	$("#data").html(r)
			   
	        }
	    });
	});


</script> -->