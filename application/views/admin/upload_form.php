<div id="page-wrapper">
	<div class="row">
      	<div class="col-lg-12">
        	<h1>Profile Management</h1>
        	<ol class="breadcrumb">
          		<li><i class="fa fa-home"></i> Homepage</li>
          		<li><i class="fa fa-user"></i> Profile</li>
          		<li><i class="fa fa-picture-o"></i> Picture</li>
        	</ol>
      	</div>
    </div><!-- /.row -->
    <div class="row">
		<div class="col-lg-offset-2 col-lg-8 column">
			<div class="panel panel-primary">
            	<div class="panel-heading">
            		<h3 class="panel-title"><center>Change Profile Picture ( jpg )</center></h3>
              	</div>
              	<div class="panel-body">
              		<?php 
              			echo $error; 
              			if ($msg == "success") {
              				echo '<script type="text/javascript">
          								   		setInterval(function(){
          								   			window.location.href = "/sislab/profile/refresh_image";
          								   		},1500);
          									</script>';
              			}
              		?>

					<?php echo form_open_multipart('upload/do_upload');?>

  					<input type="file" class="btn btn-default" name="userfile">
  					<br><br>
  					<input type="submit" class="btn btn-primary" value="upload">

					</form>
              	</div>
            </div>
		</div>
	</div>
</div>