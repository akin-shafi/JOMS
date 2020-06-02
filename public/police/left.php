<div class="sidebar-left">
         <div class="sidebar">
            <div class="sidebar-content email-app-sidebar d-flex">
               <span class="sidebar-close-icon">
               <i class="feather-x"></i>
               </span>
               <div class="email-app-menu">
                  <div class="form-group form-group-compose text-center compose-btn ">

                     <?php if ($page_title == 'All Cases') { ?>
                        <a  href="#" data-toggle="modal" data-target="#new" class="btn btn-primary btn-block my-2" >
                        <i class="feather-edit"></i> Record Case</a>
                     <?php } ?>
                       
                  </div>
                  <div class="mb-1"></div>
                  <div class="sidebar-menu-list">
                     <div class="list-group list-group-messages font-medium-1" id="inner-menu">
                        <a href="index.php" class="list-group-item list-group-item-action border-0 
                        <?php echo $page_title == 'All Cases' ? 'active' : '' ?>" data-id="3">
                           <i class="font-medium-5 feather-folder mr-50"></i>
                        All Cases <span class="badge badge-danger badge-pill float-right">
                           <?php echo count(StationCase::find_by_station_id($loggedInAdmin->id)) ?>
                        </span> </a>

                        <a href="incourt.php" class="list-group-item list-group-item-action border-0 
                        <?php echo $page_title == 'Cases In Court' ? 'active' : '' ?>" data-id="3">
                           <i class="font-medium-5 feather-folder mr-50"></i>
                        Case in court <span class="badge badge-danger badge-pill float-right">
                           <?php echo count(CourtCase::find_by_client_id($loggedInAdmin->id)) ?>
                        </span> </a>

                        <!-- <a href="index.php" class="list-group-item list-group-item-action border-0 pt-0 
                        <?php //echo $page_title == 'Advice' ? 'active' : '' ?>" data-id="1">
                        <i class="font-medium-5 feather-mail mr-50"></i> Request<span
                           class="badge badge-primary badge-pill float-right">3</span>
                        </a> -->

                        <a href="replied.php" class="list-group-item list-group-item-action border-0 
                        <?php echo $page_title == 'Replied' ? 'active' : '' ?>" data-id="2"><i
                           class="font-medium-5 fa fa-paper-plane-o mr-50"></i> DPP Advice<span
                           class="badge badge-warning badge-pill float-right" id="countReplied"><?php echo count(Advice::find_advice(['reply' => 1, 'client_id' => $loggedInAdmin->id])); ?></span> </a></span> </a>

                        

                     </div>
                     <hr>
                     <!-- <h5 class="my-2 pt-25">Organisation</h5>
                     <div class="list-group list-group-labels font-medium-1">
                        <a href="staff.php" class="list-group-item list-group-item-action border-0 d-flex align-items-center <?php //echo $page_title == 'All Staffs' ? 'active' : '' ?>" data-id="4"><span
                           class="bullet bullet-success mr-1"></span> All Staffs</a>
                        <a href="#" class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                           class="bullet bullet-primary mr-1"></span> Company</a>
                           <a href="#" class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                           class="bullet bullet-warning mr-1"></span> Important</a>
                           <a href="#" class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                           class="bullet bullet-danger mr-1"></span> Private</a>
                     </div> -->
                  </div>
               </div>
            </div>
            <!-- Modal -->
            <div class="modal fade text-left" id="composeForm" tabindex="-1" role="dialog" aria-labelledby="emailCompose"
               aria-hidden="true">
               <div class="modal-dialog modal-dialog-scrollable modal-lg">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h3 class="modal-title text-text-bold-600" id="emailCompose">New Message</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body pt-1">
                        <div id="email-container">
                           <div class="editor" data-placeholder="Message">
                           </div>
                        </div>
                        <div class="form-group mt-2">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" id="emailAttach">
                              <label class="custom-file-label" for="emailAttach">Attach file</label>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <input type="submit" value="Send" class="btn btn-primary">
                        <input type="Reset" value="Cancel" class="btn btn-white" data-dismiss="modal">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>