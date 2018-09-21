
      </div>
    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
      <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <!-- jQuery -->
    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";
    </script>

    <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- <script src="<?php //echo base_url('vendors/jquery-userTimeout-master/dist/jquery.userTimeout.min.js'); ?>"></script> -->
    <script src="<?php echo base_url('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/nprogress/nprogress.min.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/pnotify/dist/pnotify.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/pnotify/dist/pnotify.buttons.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/formvalidation/formValidation.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/formvalidation/framework/bootstrap.min.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/select2/dist/js/select2.full.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js'); ?>"></script>

    <!-- dataTables -->
    <script src="<?php echo base_url('vendors/pdatatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/pdatatables/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/pdatatables/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/pdatatables/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/pdatatables/buttons.html5.min.js'); ?>"></script>



    <script src="<?php //echo base_url('vendors/highcharts/highcharts.js'); ?>"></script>
    <script src="<?php //echo base_url('vendors/highcharts/exporting.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/easyautocomplete/jquery.easy-autocomplete.min.js'); ?>"></script>

    <!-- <script src="<?php // echo base_url('vendors/signature/SigWebTablet.min.js'); ?>"></script> -->
    <!-- <script src="<?php // echo base_url('build/js/signature.min.js?v='.VERSION); ?>"></script> -->

    <!-- <script src="<?php // echo base_url('vendors/webcam/webcam.min.js'); ?>"></script> -->
    <!-- <script src="<?php // echo base_url('build/js/capturefunction.min.js?v='.VERSION); ?>"></script> -->

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('build/js/custom.js?v='.VERSION); ?>"></script>

    <script>

    </script>

    <?php if(($this->uri->segment(1) == "admin" || $this->uri->segment(1) == "")  && $this->uri->segment(2) == "") { ?>
      <script src="<?php echo base_url('build/js/admin.js?v='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(1) == "admin" && $this->uri->segment(2) == "seniorlist") { ?>
      <script src="<?php echo base_url('build/js/senior.js?v='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(1) == "admin" && $this->uri->segment(2) == "pwdlist") { ?>
      <script src="<?php echo base_url('build/js/pwd.js?v='.VERSION); ?>"></script>
    <?php } ?>
      
    <?php if($this->uri->segment(1) == "admin" && $this->uri->segment(2) == "pwdreport") { ?>
      <script src="<?php echo base_url('build/js/pwdreport.js?v='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(1) == "admin" && $this->uri->segment(2) == "soloparentlist") { ?>
      <script src="<?php echo base_url('build/js/soloparent.js?v='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(1) == "report" && ($this->uri->segment(2) == "index" || $this->uri->segment(2) == "" )) { ?>
    <script src="<?php echo base_url('build/js/report.js?v='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(1) == "osca" && ($this->uri->segment(2) == "index" || $this->uri->segment(2) == "" )) { ?>
    <script src="<?php echo base_url('build/js/osca.js?v='.VERSION); ?>"></script>
    <?php } ?>


    <?php if($this->uri->segment(1) == "osca" && $this->uri->segment(2) == "masterlist") { ?>
    <script src="<?php echo base_url('build/js/osca_senior.js?v='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(1) == "report" && $this->uri->segment(2) == "brgy_organization" ) { ?>
    <script src="<?php echo base_url('build/js/organization.js?v='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(1) == "report" && $this->uri->segment(2) == "print_organization" ) { ?>
    <script src="<?php echo base_url('build/js/print_organization.js?v='.VERSION); ?>"></script>
    <?php } ?>

    <?php if($this->uri->segment(1) == "maintenance" && $this->uri->segment(2) == "cswd") { ?>
    <script src="<?php echo base_url('build/js/cswd_maintenance.js?v='.VERSION); ?>"></script>
    <?php } ?>


     <?php if($this->uri->segment(1) == "admin" && $this->uri->segment(2) == "pwdsummary") { ?>
    <script src="<?php echo base_url('build/js/pwdsummary.js?v='.VERSION); ?>"></script>
    <?php } ?>

     <?php if($this->uri->segment(1) == "admin" && $this->uri->segment(2) == "soloparentreports") { ?>
    <script src="<?php echo base_url('build/js/soloparentreports.js?v='.VERSION); ?>"></script>
    <?php } ?>
    
    <?php if ($this->session->userdata('password') == '8c4b1850f2b93f670b55ab809adf57f1033d9414' && $this->uri->segment(2) != "profile") { ?>
    <!-- <script src="<?php // echo base_url('build/js/notify.min.js?v='.VERSION); ?>"></script> -->
    <?php } ?>

    <script>
    function printDiv(printthis) {
     var printContents = document.getElementById('printthis').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
   }
    </script>

  </body>
</html>
