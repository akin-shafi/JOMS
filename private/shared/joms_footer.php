</div>
</div>
</div>
<!-- END: Content-->




<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-dark navbar-shadow">
  <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; <?php echo date('Y') ?><a class="text-bold-800 grey darken-2" href="#" target="_blank">JOMS,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Designed by All-Tech Systems & Co.<i class="feather-heart pink"></i></span>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather-arrow-up"></i></button>
  </p>
</footer>
<!-- END: Footer-->


<!-- Designed by Shafi Akinropo -->


<!-- BEGIN: Vendor JS-->
<script src="<?php echo url_for('js/vendors.min.js') ?>"></script>
<script src="<?php echo url_for('js/jquery.steps.min.js') ?>"></script>
<script src="<?php echo url_for('js/jquery.validate.min.js') ?>"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo url_for('js/jquery.sticky.js') ?>"></script>
<!-- <script src="<?php //echo url_for('js/apexcharts.min.js') ?>"></script> -->
<script src="<?php echo url_for('js/tether.min.js') ?>"></script>
<script src="<?php echo url_for('js/shepherd.min.js') ?>"></script>
<!-- END: Page Vendor JS-->

 <!-- BEGIN: Page Vendor JS-->
    <!-- <script src="<?php //echo url_for('js/katex.min.js') ?>"></script>
    <script src="<?php //echo url_for('js/highlight.min.js') ?>"></script>
    <script src="<?php //echo url_for('js/quill.min.js') ?>"></script> -->
    <!-- END: Page Vendor JS-->
    
<!-- BEGIN: Theme JS-->
<script src="<?php echo url_for('js/app-menu.min.js') ?>"></script>
<script src="<?php echo url_for('js/app.min.js') ?>"></script>
<script src="<?php echo url_for('js/components.min.js') ?>"></script>
<script src="<?php echo url_for('js/customizer.min.js') ?>"></script>
<script src="<?php echo url_for('js/footer.min.js') ?>"></script>

<script src="<?php echo url_for('js/app-todo.min.js') ?>"></script>
<!-- END: Theme JS-->
 <script src="<?php echo url_for('js/sweetalert2.all.min.js') ?>"></script>
<!-- BEGIN: Page JS-->

<script src="<?php echo url_for('js/jqbootstrapvalidation.js') ?> "></script>
<script src="<?php echo url_for('js/form-validation.js') ?>"></script>
<!-- Select2 -->
<!-- END: Page JS-->

<script src="<?php echo url_for('js/wizard-steps.min.js') ?>"></script>
<!-- END: Page JS-->
<script src="<?php echo url_for('js/toastr.min.js') ?>"></script>


<!-- <script src="<?php //echo url_for('js/toastr.min-2.js') ?>"></script> -->




<script src="<?php echo url_for('js/pdfmake.min.js') ?>"></script>
<script src="<?php echo url_for('js/vfs_fonts.js') ?>"></script>
<script src="<?php echo url_for('js/datatables.min.js') ?>"></script>
<script src="<?php echo url_for('js/datatables.buttons.min.js') ?>"></script>
<script src="<?php echo url_for('js/buttons.html5.min.js') ?>"></script>
<script src="<?php echo url_for('js/buttons.print.min.js') ?>"></script>
<script src="<?php echo url_for('js/buttons.bootstrap.min.js') ?>"></script>
<script src="<?php echo url_for('js/datatables.bootstrap4.min.js') ?>"></script>
<!-- END: Page Vendor JS-->

<!-- <script src="<?php //echo url_for('js/sweet-alerts.min.js') ?>"></script> -->


<script src="<?php echo url_for('js/datatable.min.js') ?>"></script>
<!-- END: Page JS-->


</body>
<!-- END: Body-->

</html>
<?php
  db_disconnect($db);
?>