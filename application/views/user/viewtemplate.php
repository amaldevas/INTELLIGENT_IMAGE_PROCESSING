      <!-- page content -->
        <div class='right_col' role='main'>
          <!-- top tiles -->
          <div class='row'>
              <div class='col-md-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Template <small></small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                      <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                      </li>
                      <li><a class='close-link'><i class='fa fa-close'></i></a>
                      </li>
                    </ul>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>

                    <div class='row'>

                      <p>Templates Incorporated</p>
                      <?php 
                            foreach ($result as $row) 
                            {
                                $url=base_url()."assets/upload_templates/".$row->src;
                                echo "
                                        <div class='col-md-55'>
                                        <div class='thumbnail'>
                                          <div class='image view view-first'>
                                            <img style='width: 100%; display: block;' src='$url' alt='image'>
                                            <div class='mask'>
                                              <p>$row->templateName</p>
                                              <div class='tools tools-bottom'>
                                                <a href='#'></a>
                                                <a href='#'></a>
                                                <a href='#'></a>
                                              </div>
                                            </div>
                                          </div>
                                          <div class='caption'>
                                            <p>$row->templateName</p>
                                          </div>
                                        </div>
                                      </div>
                                        ";
                            }
                       ?>
                      
                     
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
                    
            
           
            
                    
                    
                      
                  

           
          
        </div>
        <!-- /page content -->

         <!-- For drop down -->
         

    <!-- jQuery -->
    <script src='<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js'></script>
    <!-- Bootstrap -->
    <script src='<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js'></script>
    <!-- FastClick -->
    <script src='<?php echo base_url();?>assets/vendors/fastclick/lib/fastclick.js'></script>
    <!-- NProgress -->
    <script src='<?php echo base_url();?>assets/vendors/nprogress/nprogress.js'></script>
    <!-- Chart.js -->
    <script src='<?php echo base_url();?>assets/vendors/Chart.js/dist/Chart.min.js'></script>
    <!-- gauge.js -->
    <script src='<?php echo base_url();?>assets/vendors/gauge.js/dist/gauge.min.js'></script>
    <!-- bootstrap-progressbar -->
    <script src='<?php echo base_url();?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js'></script>
    <!-- iCheck -->
    <script src='<?php echo base_url();?>assets/vendors/iCheck/icheck.min.js'></script>
    <!-- Skycons -->
    <script src='<?php echo base_url();?>assets/vendors/skycons/skycons.js'></script>
    <!-- Flot -->
    <script src='<?php echo base_url();?>assets/vendors/Flot/jquery.flot.js'></script>
    <script src='<?php echo base_url();?>assets/vendors/Flot/jquery.flot.pie.js'></script>
    <script src='<?php echo base_url();?>assets/vendors/Flot/jquery.flot.time.js'></script>
    <script src='<?php echo base_url();?>assets/vendors/Flot/jquery.flot.stack.js'></script>
    <script src='<?php echo base_url();?>assets/vendors/Flot/jquery.flot.resize.js'></script>
    <!-- Flot plugins -->
    <script src='<?php echo base_url();?>assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js'></script>
    <script src='<?php echo base_url();?>assets/vendors/flot-spline/js/jquery.flot.spline.min.js'></script>
    <script src='<?php echo base_url();?>assets/vendors/flot.curvedlines/curvedLines.js'></script>
    <!-- DateJS -->
    <script src='<?php echo base_url();?>assets/vendors/DateJS/build/date.js'></script>
    <!-- JQVMap -->
    <script src='<?php echo base_url();?>assets/vendors/jqvmap/dist/jquery.vmap.js'></script>
    <script src='<?php echo base_url();?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js'></script>
    <script src='<?php echo base_url();?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js'></script>
    <!-- bootstrap-daterangepicker -->
    <script src='<?php echo base_url();?>assets/vendors/moment/min/moment.min.js'></script>
    <script src='<?php echo base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js'></script>

    <!-- Custom Theme Scripts -->
    <script src='<?php echo base_url();?>assets/build/js/custom.min.js'></script>
    <script type='text/javascript'>
        $('#s_photo').click(function(){
            $('#user-image').trigger('click');
        });
        $('input[type=file]').change(function(){
        $('input').remove('.count');
         var files = $(this)[0].files;
        var k=files.length;
        var row = '<input type='hidden' name='count' class='count' value=''+k+''>';
                            $('.form1').append(row);
                            $('#sub_btn').trigger('click');
    });
          Dropzone.options.imageUpload = {
        maxFilesize:1,
        acceptedFiles: '.jpeg,.jpg,.png,.gif,.tif'

    };
    </script>
  </body>
</html>
