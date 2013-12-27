<div id="page-wrapper">
	<div class="row">
      	<div class="col-lg-12">
        	<h1>Profile Management</h1>
        	<ol class="breadcrumb">
          		<li><i class="fa fa-home"></i> Homepage</li>
          		<li><i class="fa fa-user"></i> Profile</li>
        	</ol>
      	</div>
    </div><!-- /.row -->
    <div class="row">
		<div class="col-lg-offset-2 col-lg-8 column">
			<div class="panel panel-primary">
            	<div class="panel-heading">
            		<h3 class="panel-title"><center>My Profile</center></h3>
              	</div>
              	<div class="panel-body">
                	<!-- image upload -->
                		<center>
                			<a id="modal-picture" href="<?php echo base_url(); ?>upload" role="button" class="btn" data-toggle="modal">
                				<img alt="140x140" src="<?php echo base_url(); ?>assets/image/<?php echo $this->session->userdata('picture'); ?>.jpg" class="img-circle" width="140" height="140"/>
                			</a>
                		</center>
                		<!-- end of image upload -->
                		<br><br>
						<?php 
							if ($msg != '') {
								echo $msg;
								echo '<script type="text/javascript">
								   		setInterval(function(){
								   			window.location.href = "'.base_url().'profile";
								   		},1500);
									  </script>';
							}
						;?>
						<br><br>
					<form action="<?php echo base_url(); ?>profile/update" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							 <label for="inputName" class="col-sm-2 control-label">Username</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" required="" id="username" name="username" value="<?php echo $username ?>"/>
							</div>
						</div>
                		<div class="form-group">
							 <label for="inputName" class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" required="" id="name" name="name" value="<?php echo $name ?>"/>
							</div>
						</div>
						<div class="form-group">
							 <label for="inputEmail" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>"/>
							</div>
						</div>
						<div class="form-group">
							 <label for="inputAddress" class="col-sm-2 control-label">Address</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="address" name="address" value="<?php echo $address ?>"/>
							</div>
						</div>
						<div class="form-group">
							 <label for="inputPhone" class="col-sm-2 control-label">Phone</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone ?>"/>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" name="submit" class="btn btn-default">Save</button>
								<a id="modal-admin" href="<?php base_url() ?>change_password" role="button" class="btn btn-primary">Change Username&Password</a>
							</div>
						</div>
					</form>
              	</div>
            </div>
		</div>
	</div>
</div>