<div id="page-wrapper">
	<div class="row">
      	<div class="col-lg-12">
        	<h1>Profile Management</h1>
        	<ol class="breadcrumb">
          		<li><i class="fa fa-home"></i> Homepage</li>
          		<li><i class="fa fa-user"></i> Profile</li>
          		<li><i class="fa fa-key"></i> Change Password</li>
        	</ol>
      	</div>
    </div><!-- /.row -->
    <div class="row">
		<div class="col-lg-2 column"></div>
		<div class="col-lg-8 column">
			<div class="panel panel-primary">
            	<div class="panel-heading">
            		<h3 class="panel-title"><center>Change Password</center></h3>
              	</div>
              	<div class="panel-body">
                	<form action="<?php echo base_url(); ?>change_password/change" method="post" class="form-horizontal" role="form">
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
                		<div class="form-group">
							 <label for="currentpass" class="col-sm-4 control-label">Current Password</label>
							<div class="col-sm-8">
								<input type="hidden" id="login" name="login" value="<?php echo $token ?>">
								<input type="password" class="form-control" id="currentpass" name="currentpass" value="" />
							</div>
						</div>
						<div class="form-group">
							 <label for="newpass" class="col-sm-4 control-label">New Password</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="newpass" name="newpass" value="" />
							</div>
						</div>
						<div class="form-group">
							 <label for="repass" class="col-sm-4 control-label">Re Type Password</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="repass" name="repass" value="" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<a href="<?php echo base_url(); ?>profile" type="button" class="btn btn-default">Cancel</a>
								<button type="submit" name="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					</form>
              	</div>
            </div>
		</div>
		<div class="col-lg-2 column"></div>
	</div>
</div>