
<?php
require_once('../../private/initialize.php');
require_login();


?>
<?php $page_title = 'Cases In Court' ?>

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
               <div class=" border d-flex justify-content-end p-1">
                  <a href="<?php echo url_for('/police/file_case.php') ?>" class="btn btn-outline-primary ">File New Case to court</a>
               </div>

               <section class="card m-1">
                 <div class="card-header">
                   <h4 class="mb-0">All Cases in Court</h4>
                 </div>
                 <div class="card-content">
                   <div class="table-responsive mt-1">
                     <table id="" class="table  mb-0 animated fadeIn">
                       <thead>
                         <tr class="uppercase">
                           <th>SUIT NO</th>
                          
                           <th>STATUS</th>
                           <th>COURT TYPE</th>
                           <th>DIVISION</th>
                           <!-- <th>DISTANCE</th> -->
                           <th>DATE SUBMITTED</th>
                           <th>ACTION</th>
                         </tr>
                       </thead>
                       <tbody>
                          <?php foreach (CourtCase::find_by_client_id($loggedInAdmin->id) as $cCase) { ?>
                              <tr>
                                <td> <?php echo Transaction::find_by_case_id($cCase->id)->trans_no ?? 'NOT SET' ?></td>
                                <td>
                                  <!-- <i class="fa fa-circle font-small-3 text-success mr-50"></i> -->
                                  <?php if ($cCase->approval == 0) { ?>
                                    <div class="chip chip-warning">
                                      <div class="chip-body">
                                        <div class="chip-text">Pending...</div>
                                      </div>
                                    </div>
                                  <?php } elseif ($cCase->approval == 1) { ?>
                                    <div class="chip chip-primary">
                                      <div class="chip-body">
                                        <div class="chip-text">Approved</div>
                                      </div>
                                    </div>
                                  <?php } ?>
                                </td>
                                <td class="p-1">
                                  <?php echo CourtCase::COURT_TYPE[$cCase->court_id] ?>
                                </td>
                                <td><?php echo CourtCase::COURT_DIVISION[$cCase->court_division] ?></td>
                                
                                <td> <?php echo date('H:i A d/m/Y ', strtotime($cCase->created_on)); ?></td>
                                <td>
                                  <button class="btn btn-sm bg-gradient-success dropdown-toggle mr-1 waves-effect waves-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather-more-vertical"></i> more
                                  </button>

                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton202">

                                    <a class="dropdown-item case" href="#" data-id="<?php echo $cCase->id; ?>" data-toggle="modal" data-target="#view">View</a>
                                    <a class="dropdown-item case" href="#" data-id="<?php echo $cCase->id; ?>" data-toggle="modal" data-target="#advice">Seek Advice</a>
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
            </div>
         </div>
      </div>
   </div>
</div>
    <!-- END: Content-->
<div class="modal fade show" id="advice">
  <div class="modal-dialog modal-dialog-top modal-dialog-top modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Seek Advice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <section id="return">
        
      </section>
    </div>
  </div>
</div>
<?php include(SHARED_PATH . '/agency_footer.php'); ?>
<script type="text/javascript">
	function fetch_table(e) {
    $.ajax({
          url: 'content.php',
          method: 'post',
          data: {
            fetch_table: 1,
            // sub_id: id,
            // sub_status: status,
          },
          // dataType: 'json',
          success: function(r) {
            $("#data").html(r)
         
          }
      });
  }
  
  $(document).on('click', '.go-back', function(e) {
    fetch_table()
  });
  // $(document).on('click', '#new', function(e) {
  //  fetch_form(); 
  // });
  function toastSuccess() {
        toastr.success(
          "Request sent Successfully!.",
          "Success!",{
            showMethod:"slideDown",
            hideMethod:"slideUp",
            timeOut:5e3, 
            positionClass:"toast-bottom-right"},
          // {,containerId:"toast-bottom-right"}
        )
    }

     function toastFail() {
        toastr.error(
          "Request already Sent!!",
          "Error!",{showMethod:"slideDown",hideMethod:"slideUp",timeOut:5e3, 
            positionClass:"toast-bottom-right"}
        )
    }

  $(document).on('click', '.case', function(e) {
    var id = $(this).data('id');
    // console.log(id);
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
            $("#return").html(r)
         
          }
      });
  });
  $(document).on('click', '#yes', function(e) {
    var id = $(this).data('id');
    var client = $(this).data('client');
    // console.log(id);
    $.ajax({
          url: 'content.php',
          method: 'post',
          data: {
            yes: id,

          },
          dataType: 'json',
          success: function(r) {
            $("#advice").modal('hide');
            if(r.msg == 'success' ){
              toastSuccess();
            }else{
              toastFail();
            }
         
          }
      });
  });


</script>