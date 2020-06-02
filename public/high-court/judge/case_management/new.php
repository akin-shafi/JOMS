<?php

require_once('../../../../private/initialize.php');
$page_title = "Update Case Status";
require_login();


$id = $_GET['id'] ?? '';
// $case = CourtCase::find_by_id($id);
// pre_r($case);


if(is_post_request()){

	$args = $_POST['case_progress'];
	$case_progress = new CaseProgress($args);
	$result = $case_progress->save();
	if($result === true) {
		$session->message('A New Judge has being added.');
		redirect_to(url_for('admin/judges_admin/index.php'));
	} else {
		// show errors
		$session->message($judges->errors[0]);
	}
}else {
	$case_progress = new CaseProgress;
}

// echo '<pre>';
// print_r($edit);
// echo '</pre>';
$edit=false;
?>


<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo url_for('plugins/summernote/summernote-bs4.css')?>">
<style type="text/css">
.note-editor.note-frame .note-editing-area .note-editable{
	min-height: 200px;
}
.btn-light {
    border-color: #4839EB !important;
    background-color: #000 !important;
    color: #FFF;
}
	.textarea{
		/*width: 100%;
	    height: 200px;
	    font-size: 14px;
	    line-height: 18px;
	    border: 1px solid #dddddd;
	    padding: 10px;*/
	}
</style>
<section id="column-selectors">
  <div class="border-bottom h3 pb-2 text-uppercase">
  	<li></li>
  </div>
  
  <div class="row">
    <div class="col-lg-9 border-right ">

      <div class="card">
        <form method="post" id="user-data" >
        <input type="hidden" name="case_progress[case_id]" value="<?php echo $id; ?>">
        <input type="hidden" name="case_progress[updated_by]" value="<?php echo $loggedInAdmin->id; ?>">
        <!-- <input type="hidden" name="progress_updated_on" id="progress_updated_on" value="<?php //echo date('Y-m-d'); ?>" /> -->
        <input type="hidden" id="id" />
        <div class="modal-body">
          <div class="row">
            <div class="form-group col-6">
              <label for="assigned_judge">Status</label>
              <select name="case_progress[case_status]" required  class="form-control select2 w-100 mt-1" id="case_progress">
                <option value="">-select-</option>
                <?php foreach (CourtCase::CASE_STATUS as $key => $status) { ?>
                  <option value="<?php echo $key; ?>" ><?php echo $status; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-6">
              <label for="date">Date</label>
              <input type="date" id="date" name="case_progress[hearing_date]" class="form-control mt-1">
            </div>
          </div>
          

          <div>
            <div class="form-group" style="display: none" id="ad_wrap">
              <label for="adjourned_date">Adjourned To</label>
              <input type="date" class="form-control" id="date_adjourned" name="case_progress[date_adjourned]"></div>
            <p id="case_error" class="text-danger"></p>

            <div class="form-group">
              <label for="comments"> Judgement Summary</label>
              <textarea class="form-control textarea"  id="comments"  name="case_progress[judge_summary]" ></textarea>
              <p id="comment_error" class="text-danger"></p>
            </div>

            <!-- end -->


           <!--  <div class="form-group mt-2">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="emailAttach">
                <label class="custom-file-label" for="emailAttach">Attach file</label>
              </div>
            </div> -->

            <!-- end -->
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-end">
          <!-- <button type="Reset" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button> -->
          <input type="submit"  class="btn  btn-primary" value="Assign" >
          <input type="Reset" value="Cancel" class="btn btn-white btn-secondary" data-dismiss="modal">
          
        </div>
      </form>
      </div>
    </div>

    <div class="col-lg-3">
      <h4 class="border-bottom">Exibits/Evidences</h4>
    </div>
  </div>
</section>

<?php include(SHARED_PATH . '/joms_footer.php'); ?>

<script src="<?php echo url_for('plugins/summernote/summernote-bs4.min.js') ?>"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote();

    $('#case_progress').on('change', function() {
        // alert($('#case_progress').val());
        var value = $('#case_progress').val();
        if (value == 4) {
          $('#ad_wrap').css('display', 'block');
          // $('#adjourned_date').attr('', true);
        } else {
          $('#ad_wrap').css('display', 'none');
        }

      })

    // function update_record() {
    //   $(document).on('click', '#submit', function name() {
    //     var id = $('#id').val();
    //     var edit = $(this).attr('data-edit');

    //     var case_progress = $('#case_progress').val();
    //     var date_adjourned = $('#date_adjourned').val();
    //     var comments = $('#comments').val();
    //     var error = '';
    //     if (case_progress == '') {
    //       $('#case_error').text('This field is ')
    //     } else if (comments == '') {
    //       $('#comment_error').text('This field is ')

    //     } else {
    //       $('#case_error').text('')
    //       $('#comment_error').text('')
    //       $.ajax({
    //         url: 'process.php',
    //         method: 'post', 
    //         data: {
    //           id: id,
    //           edit: edit,
    //           case_progress: case_progress,
    //           date_adjourned: date_adjourned,
    //           comments: comments,
    //         },
    //         dataType: 'json',
    //         success: function(r) {
    //           $('#message').show();
    //           $('#message').html(r.response);
    //           $('#user-data')[0].reset();
    //           $('#re_assign').modal('hide');
    //           show_record();
    //           counted_data();
    //         }
    //       });
    //     }
    //   });
    // }

  })


</script>