<?php

require_once('../../../private/initialize.php');
$page_title = "All Cases";
require_login();

// $transactions = Task::recent_cases();

// ! Find all admins
// ? $admins = FortressAdmin::find_all();

// $transactions = CourtCase::find_case_by_judge($loggedInAdmin->id);
$client_case = CourtCase::find_by_undeleted();

?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo url_for('plugins/summernote/summernote-bs4.css')?>">
<style type="text/css">
.bg-gradient-purple {
    background: repeat-x #640064;
    color: #FFF;
    background-image: linear-gradient(30deg,#640064, rgba(115,103,240,.5));
  }
.note-editor.note-frame .note-editing-area .note-editable{
  min-height: 150px;
}
/*.btn-light {
    border-color: #4839EB !important;
    background-color: #000 !important;
    color: #FFF;
}*/
  .textarea{
    /*width: 100%;
      height: 200px;
      font-size: 14px;
      line-height: 18px;
      border: 1px solid #dddddd;
      padding: 10px;*/
  }
</style>


<div class="content container-fluid card">
      

      <div class="row">
        <div class="col-md-12">
          <div class="card-group m-b-30">
            <a href="query.php?case=1" class="card">
              <div class="card-body bg-gradient-purple m-1 ">
                <div class="mb-3">Total Remanded</div>

                <div class="d-flex justify-content-between">
                  <div>
                    <i class="las la-balance-scale-left fa-3x"></i>
                  </div>
                  <div>
                    <h3 class=" text-bold text-white fa-3x" id="remanded">0</h3>
                  </div>


                </div>


              </div>
            </a>

            <a href="query.php?case=2" class="card">
              <div class="card-body bg-gradient-primary m-1 ">
                <div class="mb-3">On-going Trial</div>

                <div class="d-flex justify-content-between">
                  <div>
                    <!-- <i class="las la-balance-scale-right "></i> -->
                    <i class="las la-blind fa-3x"></i>
                  </div>

                  <div>
                    <h3 class=" text-bold text-white fa-3x" id="trial">0</h3>
                  </div>


                </div>


              </div>
            </a>

            <a href="query.php?case=3" class="card">
              <div class="card-body bg-gradient-warning m-1 ">
                <div class="mb-3">Adjourned Cases</div>

                <div class="d-flex justify-content-between">
                  <div>
                    <!-- <i class="fa fa-gavel "></i> -->
                    <i class="las la-undo-alt fa-3x"></i>
                  </div>

                  <div>
                    <h3 class=" text-bold text-white fa-3x" id="adjourned">0</h3>
                  </div>


                </div>


              </div>
            </a>

            <a href="query.php?case=4" class="card">
              <div class="card-body bg-gradient-success m-1 ">
                <div class="mb-3">Bailed</div>

                <div class="d-flex justify-content-between">
                  <div>
                    <i class="fa fa-gavel fa-3x"></i>
                  </div>

                  <div>
                    <h3 class=" text-bold text-white fa-3x" id="bailed">0</h3>
                  </div>


                </div>


              </div>
            </a>

            <a href="query.php?case=5" class="card">
              <div class="card-body card-body bg-gradient-danger m-1 ">
                <div class="mb-3">Total Sentenced</div>

                <div class="d-flex justify-content-between">
                  <div>
                    <i class="las la-balance-scale fa-3x"></i>
                  </div>

                  <div>
                    <h3 class=" text-bold text-white fa-3x" id="sentenced">0</h3>
                  </div>


                </div>

              </div>
            </a>
            <a href="query.php?case=6" class="card">
              <div class="card-body card-body bg-success m-1 ">
                <div class="mb-3 text-white">Discharged & Acquited</div>

                <div class="d-flex justify-content-between">
                  <div>
                    <!-- <i class="las la-free-code-camp "></i> -->
                    <i class="lab la-accessible-icon fa-3x text-white"></i>
                  </div>

                  <div>
                    <h3 class=" text-bold text-white fa-3x" id="discharged">0</h3>
                  </div>


                </div>

              </div>
            </a>
          </div>
        </div>
      </div>



  <!--  -->
  

  <!-- <div class="text-bold fs-18 border-bottom  ">Search for transaction below</div> -->




  <!-- Column selectors with Export Options and print table -->
  <section id="column-selectors">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header  pb-2">
            <h4 class="card-title">
              <span class="text-uppercase">Cases Assigned</span> |
              <!-- <span class="text-muted"></span></h4> -->
              <!-- <div class="btn btn-sm btn-primary p-1" data-toggle="modal" data-target="#trans">Add Transaction</div> -->
          </div>
          <div class="card-content">
            <div class="card-body card-dashboard">
              <p class="card-text">The table below displays all cases assigned to you.
              </p>

              <div class="table-responsive">
                <table class="table table-striped dataex-html5-selectors" style="font-size: 14px;">
                  <thead>
                    <tr >
                      <th>No.</th>
                      <th>Case Name</th>
                      <th>Assigned on</th>
                      <th>Type of Matter</th>
                      <th>Case Description</th>
                      <th>Status</th>
                      <th>Uploads</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Waiting for AJAX CALL -->
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Case Name</th>
                      <th>Submitted on</th>
                      <th>Type of Matter</th>
                      <th>Case Description</th>
                      <th>Status</th>
                      <th>Uploads</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Column selectors with Export Options and print table -->
  <!-- </div> -->

</div>
</div><!-- /.container-fluid -->

</section>

<!-- id="composeForm" tabindex="-1" role="dialog" aria-labelledby="emailCompose" -->
<!-- Modal -->
<div class="modal fade text-left" id="re_assign" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel16" aria-hidden="true">
  <div class="modal-dialog modal-dialog-top  modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel19"><i class="fa fa-tasks text-success"></i>Update Case Status</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" novalidate id="user-data" onsubmit="return false">
        <div class="modal-body">
         
              <!-- <div class="row timeline" id="timeline"></div> -->
              <section class="row">
                  <dl class="col-lg-8 col-md-6 col-12" >
                    <dt class="card p-2" >
                      <input type="hidden" id="updated_by" name="updated_by" value="<?php echo $loggedInAdmin->id; ?>">
                      <input type="hidden" id="id" />
                       <div class="row">
                          <div class="form-group col-6">
                            <label for="assigned_judge">Status</label>
                            <div class="controls">
                              <select name="case_status" required  class="form-control select2 w-100 mt-1" id="case_status"  required data-validation-required-message="This field is required">
                                <option value="">-select-</option>
                                <?php foreach (CourtCase::CASE_STATUS as $key => $status) { ?>
                                  <option value="<?php echo $key; ?>" ><?php echo $status; ?></option>
                                <?php } ?>
                              </select>
                              <!-- <p id="case_error"></p> -->
                            </div>
                          </div>

                          <div class="form-group col-6">
                            <label for="date">Sitting Date</label>
                            <div class="controls">

                                <input type="date" id="hearing_date" name="hearing_date" class=" form-control mt-1" required data-validation-required-message="Required: Enter date of court sitting">
                            </div>
                            <!-- <p id="date_error"></p> -->
                          </div>
                       </div>

                       <div class="form-group" style="display: none" id="ad_wrap">
                          <label for="adjourned_date">Adjourned To</label>
                          <input type="date" class="form-control " id="adjourned_date" name="adjourned_date">
                       </div>
                      

                      <div class="form-group">
                        <label for="judge_summary"> Judgement Summary</label>
                        <div class="controls ">
                          
                          <textarea class="form-control textarea"  id="judge_summary"  name="judge_summary" required
                                data-validation-required-message="Required: Enter Judgement summary" ></textarea>
                        </div>
                        <!-- <p id="comment_error"></p> -->
                      </div>
                      <!-- end -->
                      <div class="d-flex justify-content-end border-top pt-1">
                         <button type="submit"   class="btn-sm btn btn-primary" id="submit" data-edit="update">Assign</button>
                        <input type="Reset" value="Cancel" class="btn-sm btn btn-white btn-secondary" data-dismiss="modal">
                      </div>
                    </dt>
                  </dl>
                  <dl class="col-lg-4 col-md-6 col-12">
                    <div class="card" style="">
                      <div class="card-header">
                        <h4 class="card-title">Case Timeline</h4>
                      </div>
                      <div class="card-content">
                        <div class="card-body">
                          <ul class="activity-timeline timeline-left list-unstyled" id="timeline">
                            
                            
                          </ul>
                        </div>
                      </div>
                    </div>
                  </dl>

              </section>
        </div>

        
      </form>
    </div>
  </div>
</div>



<!-- Modal -->


<?php include(SHARED_PATH . '/joms_footer.php'); ?>
<script src="<?php echo url_for('plugins/summernote/summernote-bs4.min.js') ?>"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote();

    $(document).ready(function() {
      show_record();
      counted_data();
      // insert_record();
      get_update();
      update_record();
      getTimeline()
      // get_delete();
      // delete_record();

      // var u= $('#user-data')[0].reset()
      // var u = $('#user-data')[0]
      // console.log(u)

      $('#case_status').on('change', function() {
        // alert($('#case_status').val());

        var value = $('#case_status').val();
        // console.log(value)
        if (value == 4) {
          $('#ad_wrap').css('display', 'block');
          // $('#adjourned_date').attr('required', true);
        } else {
          $('#ad_wrap').css('display', 'none');
        }

      })
    });

    $(document).on('click', '#case_close', function() {
    // $("#case_close").on("click", function () { 
      Swal.fire({ title: "Sorry!", text: " Case already closed!", 
      type: "warning", 
      confirmButtonClass: "btn btn-primary", 
      buttonsStyling: !1 }) 
    })
    // ========== FETCH RECORD FROM THE DB ==========
    function show_record() {
      $.ajax({
        url: 'process.php',
        method: 'post',
        data: {
          fetchData: 1
        },
        success: function(r) {
          $('tbody').html(r);
        }
      });
    }

    function counted_data() {
      var status = $('#case_status').val();
      $.ajax({
        url: 'process.php',
        method: 'post',
        data: {
          countedData: 1,
          status: status
        },
        dataType: 'json',
        success: function(r) {
          // console.log(r);
          $('#remanded').text(r.remanded);
          $('#trial').text(r.trial);
          $('#bailed').text(r.bailed);
          $('#sentenced').text(r.sentenced);
          $('#adjourned').text(r.adjourned);
          $('#discharged').text(r.discharged); 
        }
      });
    }
    // ========== FETCH RECORD FROM THE DB END ==========

    // ========== UPDATE RECORD IN THE DB ==========
    function getTimeline() {
      $(document).on('click', '#btn_edit', function() {
          var eId = $(this).attr('data-id');
          $.ajax({
              url: 'process.php',
              method: 'post',
              data: {
                timeline: 1,
                id: eId
              },
              success: function(r) {
                $('#timeline').html(r)
              }
          });
      });
    }
    function get_update() {
      $(document).on('click', '#btn_edit', function() {
        var eId = $(this).attr('data-id');
        $('#id').val(eId);
        $.ajax({
          url: 'process.php',
          method: 'post',
          data: {
            updateData: 1,
            id: eId
          },
          dataType: 'json',
          success: function(r) {
            console.log(r)
            $('#submit').html('Update Status');
            $('#case_status').val(r.response.case_progress);
            $('#adjourned_date').val(r.response.date_adjourned);

            if(r.response.case_progress == 4){
            $('#ad_wrap').css('display', 'block');
              // $('#adjourned_date').attr('required', true);
            } else {
              $('#ad_wrap').css('display', 'none');
            }
          }
        }); 
      });
    }
    function toastSuccess() {
        toastr.success(
          "Case Updated Successfully.",
          "Success!",{showMethod:"slideDown",hideMethod:"slideUp",timeOut:5e3}
        )
    }

    function toastFail() {
        toastr.error(
          "Problem Updating case file try again.",
          "Error!",{showMethod:"slideDown",hideMethod:"slideUp",timeOut:5e3}
        )
    }

    function update_record() {
      $(document).on('click', '#submit', function(e) {
        // e.preventDefault();
        var id = $('#id').val();
        
        var edit = $(this).attr('data-edit');
        // console.log(edit)
        var case_status = $('#case_status').val();
        var hearing_date = $('#hearing_date').val();
        var adjourned_date = $('#adjourned_date').val();
        var judge_summary = $('#judge_summary').val();
        var error = '';

        


        if (case_status == '') {
          console.log('case status is required')
        } else if(hearing_date == ''){
          console.log('hearing date is required')
        } else if (judge_summary == '') {
          console.log('judge_summary is required')
        } else {
          $('#case_error').text('')
          $('#comment_error').text('')
          $.ajax({
            url: 'process.php',
            method: 'post', 
            data: {
              case_progress: 1,
              case_id: id,
              case_status: case_status,
              hearing_date: hearing_date, 
              adjourned_date: adjourned_date,
              judge_summary: judge_summary,
              // edit: edit,
            },
            dataType: 'json',
            success: function(r) {
              // $('#message').show();
              // $('#message').html(r.response);
              if(r.msg == 'success'){
                
                $('#user-data')[0].reset();
                $('#re_assign').modal('hide');
                show_record();
                counted_data();
                toastSuccess();

                 case_status = '';
                 hearing_date = '';
                 adjourned_date = '';
                 judge_summary = '';
              }else{
                toastFail();
              }
              
            }
        });
        }
      });
    }
    // ========== UPDATE RECORD IN THE DB END ==========

  });
</script>

