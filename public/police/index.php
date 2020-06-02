
<?php
require_once('../../private/initialize.php');
require_login();

// $query = CourtCase::find_by_id(7);

// pre_r($query);
$offence = new CourtCase;
?>
<?php $page_title = 'All Cases' ?>

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
</style>

    

    <!-- BEGIN: Content-->
<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="text-success text-center d-flex justify-content-center mt-4"><?php echo display_session_message(); ?></div>
   <div class="content-area-wrapper">
      <?php include('left.php') ?>
      <div class="content-right" >
         <div class="" >
            <div class="content-header row">
            </div>
            <div class="content-body">
               <div class="app-content-overlay"></div>
               <div class="app-fixed-search">
                  <div class="sidebar-toggle d-block d-lg-none"><i class="feather-menu"></i></div>
                  <fieldset class="form-group position-relative has-left m-0">
                     <input type="text" class="form-control" id="email-search" placeholder="Search case">
                     <div class="form-control-position">
                        <i class="feather-search"></i>
                     </div>
                  </fieldset>
               </div>
               <section id="data" class="m-1">
               		
               </section>
               
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade " id="new" tabindex="-1" role="dialog" aria-labelledby="newTitle" aria-modal="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newTitle">Record new Case</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>


	    
	        <div class=" modal-body">
		      <form class="" id="newCase"  method="post">
		       <input type="hidden" name="case[station_id]" id="station_id" value="<?php $loggedInAdmin->id ?>">
	        <!-- <div class="row "> -->
	           <section class="row ">
	            <div class="col-md-6 col-12 mb-1">
	              <label for="officer_incharge">Officer in Charge</label>
	              
	                 <input type="text" class="form-control" id="officer_incharge" placeholder="officer in charge" name="case[officer_incharge]" required >
	            
	            </div>
	            <input type="hidden" value="2" name="case[case_type]">
	            <div class="col-md-6 col-12 mb-1">
	              <label for="case_type">Offence Type</label>
	              <select id="case_type" type="text" class="form-control" name="case[case_type]" required>
	                <option value="">-select-</option>
                    <?php foreach (StationCase::OFFENCE_TYPE as $key => $value) { ?>
                      <?php //if(in_array($key, [2])){ ?>
                      	<option value="<?php echo $key ?>" <?php //echo $key == $offence->court_matter ? 'selected' : ''; ?>><?php echo $value ?></option>
                  	 <?php //} ?>
                    <?php } ?>
                  </select>
	              </select>
	              <!-- <div class="valid-tooltip">
	                Looks good!
	              </div> -->
	            </div>

	            <div class="col-md-6 col-12 mb-1">
	              <label for="complainant">Complainer</label>
	              <input type="text" class="form-control" id="complainant" placeholder="complainant name" name="case[complainant]" required>
	              <!-- <div class="valid-tooltip">
	                Looks good!
	              </div> -->
	            </div>

	            <div class="col-md-6 col-12 mb-1">
	              <label for="accused">Accused</label>
	              <input type="text" class="form-control" id="accused" placeholder="Accused Person name" name="case[accused]" required>
	              <!-- <div class="valid-tooltip">
	                Looks good!
	              </div> -->
	            </div>

	            <div class="col-md-12 col-12 mb-1">
	              <label for="statement_of_claim">Written statement</label>
	              <textarea class="form-control textarea" placeholder="Enter Written statement"  id="statement_of_claim"  name="statement_of_claim" required data-validation-required-message="Required: Enter Written statement" ></textarea>

	              <!-- <textarea style="min-height: 240px" type="text" class="form-control" id="statement_of_claim" placeholder="statement of claim" name="case[statement_of_claim]" required></textarea> -->
	             
	            </div>



	           
	           <!--  <div class="col-md-12 col-12 mb-1">
	            	<div class="form-group ">
			          <div class="custom-file">
			            <input type="file" name="document" class="custom-file-input" id="upload">
                        <b class="form-text text-danger" id="errUpload"></b>
                        <label class="custom-file-label" for="upload">Choose file</label>
			          </div>
			        </div>
	            </div> -->

	            <div class="col-12">
	            	<button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Cancel</button>
	           		<button type="submit" class="btn btn-primary float-right waves-effect waves-light">Submit</button>
	            </div>
	           </section>
	          </form>
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
<script src="<?php echo url_for('plugins/summernote/summernote-bs4.min.js') ?>"></script>
<script type="text/javascript">
	$(window).ready(function() {
		$('.textarea').summernote();
		// var quill = new Quill('#editor', {
		// modules: {
		// 	toolbar: '#toolbar'
		// },
		// theme: 'snow'
		// });

		fetch_table()
	});
	
	$(document).on('submit', '#newCase', function(e) {
		e.preventDefault();
		$.ajax({
	        url: 'content.php',
	        method: 'post',
	        data: {
	          newCase: 1,
	          officer_incharge: $('#officer_incharge').val(),
	          case_type: $('#case_type').val(),
	          complainant: $('#complainant').val(),
	          accused: $('#accused').val(),
	          statement_of_claim: $('#statement_of_claim').val(),
	          station_id: $('#station_id').val(),
	          // sub_id: id,
	          // sub_status: status,
	        },
	        dataType: 'json',
	        success: function(r) {
	        	$("#new").modal('hide');
	        	if(r.msg == 'success' ){
	        		toastSuccess();
	        		fetch_table()
	        	}else{
	        		toastFail();
	        	}
			   
	        }
	    });
	});
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
	// 	fetch_form();	
	// });
	

    

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
	        		toastSuccess("Request sent Successfully!.");
	        	}else{
	        		$("#advice").modal('hide');
	        		toastFail("Request already Sent!!");
	        	}
			   
	        }
	    });
	});
</script>