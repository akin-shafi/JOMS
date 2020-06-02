 

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-dark navbar-shadow">
      <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; <?php echo date('Y') ?><a class="text-bold-800 grey darken-2" href="#" target="_blank">JOMS,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Designed by All-Tech Systems & Co.<i class="feather-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather-arrow-up"></i></button>
      </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo url_for('js/vendors.min.js') ?>"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo url_for('js/jqbootstrapvalidation.js') ?>"></script>
    <script src="<?php echo url_for('js/jquery.sticky.js') ?>"></script>
    <script src="<?php echo url_for('js/katex.min.js') ?>"></script>
    <script src="<?php echo url_for('js/highlight.min.js') ?>"></script>
    <script src="<?php echo url_for('js/quill.min.js') ?>"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo url_for('js/app-menu.min.js') ?>"></script>
    <script src="<?php echo url_for('js/app.min.js') ?>"></script>
    <script src="<?php echo url_for('js/components.min.js') ?>"></script>
    <script src="<?php echo url_for('js/customizer.min.js') ?>"></script>
    <script src="<?php echo url_for('js/footer.min.js') ?>"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo url_for('js/app-email.min.js') ?>"></script>
    <script src="<?php echo url_for('js/toastr.min.js') ?>"></script>
    <script src="<?php echo url_for('js/form-validation.js') ?>"></script>
    
    <!-- END: Page JS-->
    <script type="text/javascript">
        function toastSuccess(msg) {
            toastr.success(
              msg,
              "Success!",{
                showMethod:"slideDown",
                hideMethod:"slideUp",
                timeOut:5e3, 
                positionClass:"toast-bottom-right"},
              // {,containerId:"toast-bottom-right"}
            )
        }

         function toastFail(msg) {
            toastr.error(
              msg,
              "Error!",{showMethod:"slideDown",hideMethod:"slideUp",timeOut:5e3, 
                positionClass:"toast-bottom-right"}
            )
        }

    </script>


  </body>
  <!-- END: Body-->

</html>
<?php
  db_disconnect($db);
?>