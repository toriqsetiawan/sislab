      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Home Administration <small>Laboratorium Informatika UMM</small></h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i> Homepage</li>
            </ol>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <h4><center>HELLO <?php echo strtoupper($this->session->userdata['name']); ?>!, HOW ARE YOU TODAY?.</center></h4>
            <h5><center><?php echo date('D, d M Y'); ?></center></h5>
            <br><br>
            <center><a href="<?php echo base_url(); ?>" target="_blank">Goto Your Site</a></center>
          </div>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->