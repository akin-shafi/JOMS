<?php

require_once('../../../private/initialize.php');

require_login();
$id = $_GET['id'];
  $case_status = CaseProgress::find_by_caseId($id) ?? '';
  $court_case = CourtCase::find_by_id($id);
//   // pre_r();
  $rec = $_GET['rec'] ?? 1;
  $case_rec = CaseProgress::find_by_id($rec);
  // pre_r($case_rec);
?>

<?php $page_name = '';
$page_title = 'Case Record'; ?>
<?php include(SHARED_PATH . '/joms_header_nav.php'); ?>
<style type="text/css">
    .text-underline{
        text-decoration: underline;
    }
</style>
<section class="">
    <div class="content-body"><!-- Knowledge base question Content  -->
<section id="knowledge-base-question">
    <div class="row">
        <div class="col-lg-3 col-md-5 col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Case Timeline</h4>
                    <div class="card-content">
                        <!-- <div class="card-body"> -->
                          <ul class="activity-timeline timeline-left list-unstyled" id="timeline">
                            
                            
                          </ul>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-7 col-12">
            <div class="card" >
                <div class="card-body" >
                    <div class="title mb-2">
                        <h1>Case Title: <?php echo $court_case->court_case_name; ?></h1>
                    </div>
                    <div id="content">
                        <?php //$sn = 1; foreach ($case_status as $key =>  $value) { ?>
                            <div class="title ">
                                <h5>Judgement: <?php echo CourtCase::CASE_STATUS[$case_rec->case_status]; ?></h5>
                                <p>Hearing Date :<?php echo date('l, dS \of M, Y', strtotime($case_rec->hearing_date)); ?></p>
                            </div>
                             <p>
                                <?php echo $case_rec->judge_summary; ?>
                            </p>
                            <!-- <hr> -->
                        <?php //}?>
                    </div>
                    <!-- <div class="d-flex justify-content-between mt-2">
                        <a href="#">
                            <i class="feather-chevrons-left"></i>
                            <span>Previous Article</span>
                        </a>
                        <a href="#">
                            <span>Next Article</span>
                            <i class="feather-chevrons-right"></i>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Knowledge base question Content ends -->

        </div>
</section>
<input type="hidden" id="record" data-id="<?php echo $id ?>">


<?php include(SHARED_PATH . '/joms_footer.php'); ?>

<script type="text/javascript">
     $(document).ready(function() {
        getTimeline();

        var menu = document.querySelector('#inner-menu');
         menu.addEventListener('click', activateItem);
         function activateItem(e){
           if(e.target.tagName == "P"){
             for (var i = 0; i < e.target.parentNode.children.length; i++) {
               e.target.parentNode.children[i].classList.remove("active");
               // console.log(e);
               e.target.classList.add("active");
             }
              
           }
         }
    });
    function loader(display) {
        $( "#processMsg" ).text('Please wait ...');
        $( "#loader" ).css('display', display);
    }

    function getTimeline() {
      // $(document).on('click', '#btn_edit', function() {
          var elem = document.getElementById('record');
          var eId = $(elem).attr('data-id');
          // console.log(eId)
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
      // });
    }

    $(document).on('click', '.item', function(e) {
        // e.preventDefault();
        // loader('block');
        var id = $(this).data('id');
        console.log(id)
        $.ajax({
          url: 'process.php',
          method: 'post',
          data: {
            pagination: 1,
            id: id
          },
          // dataType: 'json',
          success: function(r) {
            $('#content').html(r);
            getTimeline();
            // loader('none');

            if(r.msg == 'OK'){
            // $('#ad_wrap').css('display', 'block');
              // $('#adjourned_date').attr('required', true);
            } else {
              // $('#ad_wrap').css('display', 'none');
            }
          }
        });
    });
</script>
