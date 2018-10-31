      <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
          </div>
          <!-- /top tiles -->

          <div class="row">
            <form role="form" action="" method="POST" enctype="multipart/form-data" class="form1">
              <input type="hidden" name="count" class="count" value="0">
            <div class="row">
              <div class="col-md-6 col-md-offset-5 col-xs-12 col-xs-offset-4">
            
                    <button type="button" class="btn btn-primary" style="margin-bottom: 20px; " id="s_photo"><i class="fa fa-folder" aria-hidden="true" ></i>
Select Files To Upload</button>
<input type="file" id="user-image" name="user-image[]" multiple style="display:none;" webkitdirectory mozdirectory accept=".jpg,.png,.tiff">
            </div>
           
            
                    
                    
                        <input type="submit" id="sub_btn" style="display:none;">
                  

           
          </form>
        </div>
        <!-- /page content -->

         <!-- For drop down -->
         <div class="container">

    <div class="row">

        <div class="col-md-12">

            <h2> Multiple Image upload using dropzone.js</h2>

            <form action=<?php echo base_url();?>user/dragdetails-bill" enctype="multipart/form-data" class="dropzone" id="image-upload" method="POST" name="user-image[]">
                <div>
                    <h3>Upload Multiple Image By Click On Box</h3>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>assets/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url();?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url();?>assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url();?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url();?>assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url();?>assets/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url();?>assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url();?>assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url();?>assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>assets/build/js/custom.min.js"></script>
    <script type="text/javascript">
        $("#s_photo").click(function(){
            $("#user-image").trigger("click");
        });
        $("input[type=file]").change(function(){
        $("input").remove(".count");
         var files = $(this)[0].files;
        var k=files.length;
        var row = "<input type='hidden' name='count' class='count' value='"+k+"'>";
                            $('.form1').append(row);
                            $("#sub_btn").trigger("click");
    });
          Dropzone.options.imageUpload = {
        maxFilesize:1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif,.tif"

    };
    </script>
  </body>
</html>
