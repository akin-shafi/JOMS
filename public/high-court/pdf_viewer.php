<?php require_once('../../private/initialize.php'); ?>
<?php 

  $pdf = $_GET['pdf'] ?? '';

  $pdf_viewer = CourtCase::find_by_id($pdf);
  // echo '<pre>';print_r($pdf_viewer->document);'</pre>';



?>

<?php echo url_for('/lawyer/upload/'. $pdf_viewer->document); ?>
<?php $page_name = 'JUDICIARY';
$page_title = 'PDF VIEWER';  ?>
<?php include(SHARED_PATH . '/joms_header_pdf.php'); ?>
<iframe src="http://192.168.1.20:8080/newjoms/public/lawyer/upload/<?php echo $pdf_viewer->document ?>" style="width:100%; height:100vh;" frameborder="0"></iframe>



<?php include(SHARED_PATH . '/joms_footer.php'); ?>