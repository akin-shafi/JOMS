
<?php
require_once('../../private/initialize.php');
require_login();
   
   // $variable = CourtCase::find_by_client_id(7);

   // foreach ($variable as $value) {
   //    pre_r($value->case_title());
   // }
   

?>
<?php $page_title = 'Replied' ?>

<?php include(SHARED_PATH . '/agency_header.php'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo url_for('plugins/summernote/summernote-bs4.css')?>">
<style type="text/css">
.btn-light{
   color: #000 !important;
    background-color: transparent !important;
    border-color: transparent !important;
}
.bg-gradient-purple {
    background: repeat-x #640064;
    color: #FFF;
    background-image: linear-gradient(30deg,#640064, rgba(115,103,240,.5));
  }
.note-editor.note-frame .note-editing-area .note-editable{
  min-height: 150px;
}

.email-application .app-content .content-area-wrapper .email-user-list .users-list-wrapper li.mail-unread {
    background-color: #FFF;
}
</style>
  


    

    <!-- BEGIN: Content-->
<div class="app-content content">
   <div class="content-overlay"></div>
   
   <div class="text-success text-center d-flex justify-content-center mn-4"><?php echo display_session_message(); ?></div>
   
   <div class="header-navbar-shadow"></div>
   <?php
      // $me = CourtCase::find_by_client_id(7,6);
      // pre_r($me);
   ?>
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
                           
                           <div id="display"></div>
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
                           <h3  id="client_name" class="text-uppercase">Focused impactful open system 📷 😃</h3>
                        </div>
                        <div class="email-header-right mb-1 ml-2 pl-1 d-none">
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
                                 <span class="mr-1 bullet bullet-primary bullet-sm"></span><small class="mail-label">Request for advice</small>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12">
                              <div class="card px-1">
                                 <div class="card-header email-detail-head ml-75">
                                    <div class="user-details d-flex justify-content-between align-items-center flex-wrap">
                                      <!--  <div class="avatar mr-75">
                                          <img src="images/avatar-s-18.png" alt="avtar img holder" width="61" height="61">
                                       </div> -->
                                       <div class="mail-items">
                                          <h4 class="list-group-item-heading mb-0 text-uppercase" id="case_name">Ardis Balderson</h4>
                                          <div class="email-info-dropup dropdown">
                                             <!-- <span class="dropdown-toggle font-small-3" id="dropdownMenuButton200" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             abaldersong@utexas.edu
                                             </span> -->
                                             <div class="dropdown-menu dropdown-menu-right p-50" aria-labelledby="dropdownMenuButton200">
                                                <div class="px-25 dropdown-item">From: <strong> abaldersong@utexas.edu </strong></div>
                                                <div class="px-25 dropdown-item">To: <strong> johndoe@ow.ly </strong></div>
                                                <div class="px-25 dropdown-item">Date: <strong> 4:25 AM 13 Jan 2018 </strong></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="mail-meta-item">
                                       <div class="mail-time mb-1" id="time">4:14 AM</div>
                                       <div class="mail-date" id="date">17 May 2018</div>
                                    </div>
                                 </div>
                                 <div class="card-body mail-message-wrapper pt-2 mb-0">
                                    <div class="mail-message" id="case_description">
                                       <p>Hey John,</p>
                                       <p>bah kivu decrete epanorthotic unnotched Argyroneta nonius veratrine preimaginary saunders demidolmen Chaldaic allusiveness lorriker unworshipping ribaldish tableman hendiadys outwrest unendeavored fulfillment scientifical Pianokoto Chelonia</p>
                                       <p>Freudian sperate unchary hyperneurotic phlogiston duodecahedron unflown Paguridea catena disrelishable Stygian paleopsychology cantoris phosphoritic disconcord fruited inblow somewhatly ilioperoneal forrard palfrey Satyrinae outfreeman melebiose</p>
                                    </div>
                                    <!-- <div class="mail-attachements d-flex">
                                       <i class="feather-paperclip font-medium-5 mr-50"></i>
                                       <span>Attachments</span>
                                    </div> -->
                                 </div>
                                 <!-- <div class="mail-files py-2">
                                    <div class="chip chip-primary">
                                       <div class="chip-body py-50">
                                          <span class="chip-text">interdum.docx</span>
                                       </div>
                                    </div>
                                 </div> -->
                              </div>
                           </div>
                        </div>
                        <!-- <div class="row">
                           <div class="col-12">
                              <div class="card">
                                 <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                       <span class="font-medium-1">Click here to <span class="primary cursor-pointer"><strong data-toggle="modal" data-target="#reply">Reply</strong></span> or <span class="primary  cursor-pointer"><strong>Forward</strong></span></span>
                                       <i class="feather-paperclip font-medium-5 mr-50"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div> -->
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

<div class="modal fade text-left " id="reply" >
 <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel33">Reply </h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
       </button>
     </div>
     <form action="#" method="post">
       <div class="modal-body">
         
         <label for="advice" class="h3">Enter Advice: </label>
         <textarea style="min-height: 200px;" class="form-control " placeholder="Enter Written statement"  id="advice"  name="advice" required data-validation-required-message="Required: Enter Written statement" ></textarea>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-primary waves-effect waves-light" id="btn-reply">Reply</button>
         <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
       </div>
     </form>
   </div>
 </div>
</div>

<input type="hidden" id="inputReply" name="">
<input type="hidden" id="page_title" name="" value="<?php echo $page_title; ?>">

<?php include(SHARED_PATH . '/agency_footer.php'); ?>
<script src="<?php echo url_for('plugins/summernote/summernote-bs4.min.js') ?>"></script>
<script type="text/javascript" src="dpp_script.js"></script>