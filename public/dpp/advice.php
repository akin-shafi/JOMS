
<?php
require_once('../../private/initialize.php');
require_login();


?>
<?php $page_title = 'Advice' ?>

<?php include(SHARED_PATH . '/agency_header.php'); ?>

  


    

    <!-- BEGIN: Content-->
<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-area-wrapper">
      <?php include('left.php') ?>
      <div class="content-right">
         <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
               <div class="app-content-overlay"></div>
               <div class="email-app-area">
                  <!-- Email list Area -->
                  <div class="email-app-list-wrapper">
                     <div class="email-app-list">
                        <div class="app-fixed-search">
                           <div class="sidebar-toggle d-block d-lg-none"><i class="feather-menu"></i></div>
                           <fieldset class="form-group position-relative has-left m-0">
                              <input type="text" class="form-control" id="email-search" placeholder="Search email">
                              <div class="form-control-position">
                                 <i class="feather-search"></i>
                              </div>
                           </fieldset>
                        </div>
                        <div class="app-action">
                           <div class="action-left">
                              <div class="vs-checkbox-con selectAll">
                                 <input type="checkbox" >
                                 <span class="vs-checkbox">
                                 <span class="vs-checkbox--check">
                                 <i class="vs-icon feather-minus"></i>
                                 </span>
                                 </span>
                                 <span>Select All</span>
                              </div>
                           </div>
                           <div class="action-right">
                              <ul class="list-inline m-0">
                                 <li class="list-inline-item">
                                    <div class="dropdown">
                                       <a href="#" class="dropdown-toggle" id="folder" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="feather-folder"></i>
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="folder">
                                          <a class="dropdown-item d-flex font-medium-1" href="#"><i class="font-medium-3 feather-edit-2 mr-50"></i> Draft</a>
                                          <a class="dropdown-item d-flex font-medium-1" href="#"><i class="font-medium-3 feather-info mr-50"></i> Spam</a>
                                          <a class="dropdown-item d-flex font-medium-1" href="#"><i class="font-medium-3 feather-trash mr-50"></i> Trash</a>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-inline-item">
                                    <div class="dropdown">
                                       <a href="#" class="dropdown-toggle" id="tag" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="feather-tag"></i>
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="tag">
                                          <a href="#" class="dropdown-item font-medium-1"><span class="mr-1 bullet bullet-success bullet-sm"></span> Personal</a>
                                          <a href="#" class="dropdown-item font-medium-1"><span class="mr-1 bullet bullet-primary bullet-sm"></span> Company</a>
                                          <a href="#" class="dropdown-item font-medium-1"><span class="mr-1 bullet bullet-warning bullet-sm"></span> Important</a>
                                          <a href="#" class="dropdown-item font-medium-1"><span class="mr-1 bullet bullet-danger bullet-sm"></span> Private</a>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-inline-item mail-unread"><span class="action-icon"><i class="feather-mail"></i></span></li>
                                 <li class="list-inline-item mail-delete"><span class="action-icon"><i class="feather-trash"></i></span></li>
                              </ul>
                           </div>
                        </div>
                        <div class="email-user-list list-group">
                           <ul class="users-list-wrapper media-list">
                              <?php for ($i=1; $i < 3; $i++) { ?>
                                 <li class="media mail-read">
                                    <div class="media-left pr-50">
                                       <div class="avatar">
                                          <img src="images/avatar-s-20.png" alt="avtar img holder">
                                       </div>
                                       <div class="user-action">
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
                                             <h5 class="list-group-item-heading text-bold-600 mb-25">Tonny Deep</h5>
                                             <span class="list-group-item-text text-truncate">Focused impactful open system</span>
                                          </div>
                                          <div class="mail-meta-item">
                                             <span class="float-right">
                                             <span class="mr-1 bullet bullet-success bullet-sm"></span><span class="mail-date">4:14 AM</span>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="mail-message">
                                          <p class="list-group-item-text truncate mb-0">Hey John, bah kivu decrete epanorthotic unnotched Argyroneta nonius veratrine preimaginary saunders demidolmen Chaldaic allusiveness lorriker unworshipping ribaldish tableman hendiadys outwrest unendeavored fulfillment scientifical Pianokoto CheloniaFreudian sperate unchary hyperneurotic phlogiston duodecahedron unflown Paguridea catena disrelishable Stygian paleopsychology cantoris phosphoritic disconcord fruited inblow somewhatly ilioperoneal forrard palfrey Satyrinae outfreeman melebiose</p>
                                       </div>
                                    </div>
                                 </li>
                              <?php } ?>
                           </ul>
                           <div class="no-results">
                              <h5>No Items Found</h5>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--/ Email list Area -->
                  <!-- Detailed Email View -->
                  <div class="email-app-details">
                     <div class="email-detail-header">
                        <div class="email-header-left d-flex align-items-center mb-1">
                           <span class="go-back mr-1"><i class="feather-arrow-left font-medium-4"></i></span>
                           <h3>Focused impactful open system 📷 😃</h3>
                        </div>
                        <div class="email-header-right mb-1 ml-2 pl-1">
                           <ul class="list-inline m-0">
                              <li class="list-inline-item"><span class="action-icon favorite"><i class="feather-star font-medium-5"></i></span></li>
                              <li class="list-inline-item">
                                 <div class="dropdown no-arrow">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather-folder font-medium-5"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="folder">
                                       <a class="dropdown-item d-flex font-medium-1" href="#"><i class="font-medium-3 feather-edit-2 mr-50"></i> Draft</a>
                                       <a class="dropdown-item d-flex font-medium-1" href="#"><i class="font-medium-3 feather-info mr-50"></i> Spam</a>
                                       <a class="dropdown-item d-flex font-medium-1" href="#"><i class="font-medium-3 feather-trash mr-50"></i> Trash</a>
                                    </div>
                                 </div>
                              </li>
                              <li class="list-inline-item">
                                 <div class="dropdown no-arrow">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather-tag font-medium-5"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="tag">
                                       <a href="#" class="dropdown-item font-medium-1"><span class="mr-1 bullet bullet-success bullet-sm"></span> Personal</a>
                                       <a href="#" class="dropdown-item font-medium-1"><span class="mr-1 bullet bullet-primary bullet-sm"></span> Company</a>
                                       <a href="#" class="dropdown-item font-medium-1"><span class="mr-1 bullet bullet-warning bullet-sm"></span> Important</a>
                                       <a href="#" class="dropdown-item font-medium-1"><span class="mr-1 bullet bullet-danger bullet-sm"></span> Private</a>
                                    </div>
                                 </div>
                              </li>
                              <li class="list-inline-item"><span class="action-icon"><i class="feather-mail font-medium-5"></i></span></li>
                              <li class="list-inline-item"><span class="action-icon"><i class="feather-trash font-medium-5"></i></span></li>
                              <li class="list-inline-item email-prev"><span class="action-icon"><i class="feather-chevrons-left font-medium-5"></i></span></li>
                              <li class="list-inline-item email-next"><span class="action-icon"><i class="feather-chevrons-right font-medium-5"></i></span></li>
                           </ul>
                        </div>
                     </div>
                     <div class="email-scroll-area">
                        <div class="row">
                           <div class="col-12">
                              <div class="email-label ml-2 my-2 pl-1">
                                 <span class="mr-1 bullet bullet-primary bullet-sm"></span><small class="mail-label">Company</small>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12">
                              <div class="card px-1">
                                 <div class="card-header email-detail-head ml-75">
                                    <div class="user-details d-flex justify-content-between align-items-center flex-wrap">
                                       <div class="avatar mr-75">
                                          <img src="images/avatar-s-18.png" alt="avtar img holder" width="61" height="61">
                                       </div>
                                       <div class="mail-items">
                                          <h4 class="list-group-item-heading mb-0">Ardis Balderson</h4>
                                          <div class="email-info-dropup dropdown">
                                             <span class="dropdown-toggle font-small-3" id="dropdownMenuButton200" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             abaldersong@utexas.edu
                                             </span>
                                             <div class="dropdown-menu dropdown-menu-right p-50" aria-labelledby="dropdownMenuButton200">
                                                <div class="px-25 dropdown-item">From: <strong> abaldersong@utexas.edu </strong></div>
                                                <div class="px-25 dropdown-item">To: <strong> johndoe@ow.ly </strong></div>
                                                <div class="px-25 dropdown-item">Date: <strong> 4:25 AM 13 Jan 2018 </strong></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="mail-meta-item">
                                       <div class="mail-time mb-1">4:14 AM</div>
                                       <div class="mail-date">17 May 2018</div>
                                    </div>
                                 </div>
                                 <div class="card-body mail-message-wrapper pt-2 mb-0">
                                    <div class="mail-message">
                                       <p>Hey John,</p>
                                       <p>bah kivu decrete epanorthotic unnotched Argyroneta nonius veratrine preimaginary saunders demidolmen Chaldaic allusiveness lorriker unworshipping ribaldish tableman hendiadys outwrest unendeavored fulfillment scientifical Pianokoto Chelonia</p>
                                       <p>Freudian sperate unchary hyperneurotic phlogiston duodecahedron unflown Paguridea catena disrelishable Stygian paleopsychology cantoris phosphoritic disconcord fruited inblow somewhatly ilioperoneal forrard palfrey Satyrinae outfreeman melebiose</p>
                                    </div>
                                    <div class="mail-attachements d-flex">
                                       <i class="feather-paperclip font-medium-5 mr-50"></i>
                                       <span>Attachments</span>
                                    </div>
                                 </div>
                                 <div class="mail-files py-2">
                                    <div class="chip chip-primary">
                                       <div class="chip-body py-50">
                                          <span class="chip-text">interdum.docx</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12">
                              <div class="card">
                                 <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                       <span class="font-medium-1">Click here to <span class="primary cursor-pointer"><strong>Reply</strong></span> or <span class="primary  cursor-pointer"><strong>Forward</strong></span></span>
                                       <i class="feather-paperclip font-medium-5 mr-50"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--/ Detailed Email View -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
    <!-- END: Content-->

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