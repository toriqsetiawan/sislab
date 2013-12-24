<div id="page-wrapper">
	<div class="row">
      	<div class="col-lg-12">
        	<h1>Lesson Management</h1>
        	<ol class="breadcrumb">
          		<li><i class="fa fa-home"></i> Homepage</li>
          		<li><i class="fa fa-book"></i> Lesson</li>
          		<li><i class="fa fa-plus-circle"></i> Add Lesoon</li>
        	</ol>
      	</div>
    </div><!-- /.row -->
    <div class="row">
		<div class="col-lg-offset-2 col-lg-8 column">
			<div class="panel panel-primary">
            	<div class="panel-heading">
            		<h3 class="panel-title"><center>Add Lesson</center></h3>
              	</div>
              	<div class="panel-body">
                	<form action="<?php echo base_url(); ?>add_lesson/process" method="post" class="form-horizontal" role="form">
                		<br><br>
						<?php 
							if ($data['msg'] != '') {
								echo $data['msg'];
								echo '<script type="text/javascript">
								   		setInterval(function(){
								   			window.location.href = "/sislab/lesson";
								   		},1500);
									  </script>';
							}
						;?>
						<br><br>
                		<div class="form-group">
							 <label for="name" class="col-sm-3 control-label">Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="name" name="name" value="" />
							</div>
						</div>
						<div class="form-group">
							 <label for="class" class="col-sm-3 control-label">Class</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="class" name="class" value="" />
							</div>
						</div>
						<div class="form-group">
							 <label for="semester" class="col-sm-3 control-label">Semester</label>
							<div class="col-sm-9">
								<select id="semester" name="semester" class="form-control">
									<option value="<?php echo $this->session->userdata('semester'); ?>">Semester <?php echo $this->session->userdata('semester'); ?></option>
								</select>
							</div>
						</div>
						<div class="form-group">
							 <label for="dosen" class="col-sm-3 control-label">Dosen</label>
							<div class="col-sm-9">
								<select id="dosen" name="dosen" class="form-control">
									<option value="0">require</option>
									<?php for ($i=0; $i < $count['c_dosen']; $i++) { ?>
									<option value="<?php echo $dosen[$i]['dosen_id']; ?>"><?php echo $dosen[$i]['name']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							 <label for="asisten1" class="col-sm-3 control-label">Asisten 1</label>
							<div class="col-sm-9">
								<select id="asisten1" name="asisten1" class="form-control">
									<option value="0">optional</option>
									<?php for ($i=0; $i < $count['c_asisten']; $i++) { ?>
									<option value="<?php echo $asisten[$i]['asisten_id']; ?>"><?php echo $asisten[$i]['name']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							 <label for="asisten2" class="col-sm-3 control-label">Asisten 2</label>
							<div class="col-sm-9">
								<select id="asisten2" name="asisten2" class="form-control">
									<option value="0">optional</option>
									<?php for ($i=0; $i < $count['c_asisten']; $i++) { ?>
									<option value="<?php echo $asisten[$i]['asisten_id']; ?>"><?php echo $asisten[$i]['name']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							 <label for="asisten3" class="col-sm-3 control-label">Asisten 3</label>
							<div class="col-sm-9">
								<select id="asisten3" name="asisten3" class="form-control">
									<option value="0">optional</option>
									<?php for ($i=0; $i < $count['c_asisten']; $i++) { ?>
									<option value="<?php echo $asisten[$i]['asisten_id']; ?>"><?php echo $asisten[$i]['name']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							 <label for="asisten4" class="col-sm-3 control-label">Asisten 4</label>
							<div class="col-sm-9">
								<select id="asisten4" name="asisten4" class="form-control">
									<option value="0">optional</option>
									<?php for ($i=0; $i < $count['c_asisten']; $i++) { ?>
									<option value="<?php echo $asisten[$i]['asisten_id']; ?>"><?php echo $asisten[$i]['name']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<a href="<?php echo base_url(); ?>lesson" type="button" class="btn btn-default">Cancel</a>
								<button type="submit" name="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					</form>
              	</div>
            </div>
		</div>
	</div>
</div>