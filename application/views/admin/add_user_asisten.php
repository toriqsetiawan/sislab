<div id="page-wrapper">
	<div class="row">
      	<div class="col-lg-12">
        	<h1>Profile Management</h1>
        	<ol class="breadcrumb">
          		<li><i class="fa fa-home"></i> Homepage</li>
          		<li><i class="fa fa-user"></i> Profile</li>
          		<li><i class="fa fa-plus-circle"></i> Add Asisten</li>
        	</ol>
      	</div>
    </div><!-- /.row -->
    <div class="row">
		<div class="col-lg-offset-2 col-lg-8 column">
			<div class="panel panel-primary">
            	<div class="panel-heading">
            		<h3 class="panel-title"><center>Add Asisten</center></h3>
              	</div>
              	<div class="panel-body">
                	<form action="<?php echo base_url(); ?>add_user/add_asisten" method="post" class="form-horizontal" role="form">
                		<br><br>
						<?php 
							if ($msg != '') {
								echo $msg;
								echo '<script type="text/javascript">
								   		setInterval(function(){
								   			window.location.href = "/sislab/user";
								   		},1500);
									  </script>';
							}
						;?>
						<br><br>
                		<div class="form-group">
							 <label for="username" class="col-sm-3 control-label">Username</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="username" name="username" value="" />
							</div>
						</div>
						<div class="form-group">
							 <label for="password" class="col-sm-3 control-label">Password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="password" name="password" value="" />
							</div>
						</div>
						<div class="form-group">
							 <label for="name" class="col-sm-3 control-label">Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="name" name="name" value="" />
							</div>
						</div>
						<div class="form-group">
							 <label for="grade" class="col-sm-3 control-label">Grade</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="grade" name="grade" placeholder="2012/2011/2010" value="" />
							</div>
						</div>
						<div class="form-group">
							 <label for="email" class="col-sm-3 control-label">Email</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="email" name="email" value="" />
							</div>
						</div>
						<div class="form-group">
							 <label for="address" class="col-sm-3 control-label">Address</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="address" name="address" value="" />
							</div>
						</div>
						<div class="form-group">
							 <label for="phone" class="col-sm-3 control-label">Phone</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="phone" name="phone" value="" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<a href="<?php echo base_url(); ?>user" type="button" class="btn btn-default">Cancel</a>
								<button type="submit" name="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					</form>
              	</div>
            </div>
		</div>
	</div>
</div>