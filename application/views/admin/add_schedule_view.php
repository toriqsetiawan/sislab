<div id="page-wrapper">
	<div class="row">
      	<div class="col-lg-12">
        	<h1>Schedule Management</h1>
        	<ol class="breadcrumb">
          		<li><i class="fa fa-home"></i> Homepage</li>
          		<li><i class="fa fa-book"></i> Schedule</li>
          		<li><i class="fa fa-plus-circle"></i> Add Schedule</li>
        	</ol>
      	</div>
    </div><!-- /.row -->
    <div class="row">
		<div class="col-lg-offset-2 col-lg-8 column">
			<div class="panel panel-primary">
            	<div class="panel-heading">
            		<h3 class="panel-title"><center>Add Schedule</center></h3>
              	</div>
              	<div class="panel-body">
                	<form action="<?php echo base_url(); ?>add_schedule/process" method="post" class="form-horizontal" role="form">
                		<br><br>
						<?php 
							if ($data['msg'] != '') {
								echo $data['msg'];
								echo '<script type="text/javascript">
								   		setInterval(function(){
								   			window.location.href = "'.base_url().'schedule";
								   		},1500);
									  </script>';
							}
						;?>
						<br><br>
                		<div class="form-group">
							 <label for="day" class="col-sm-3 control-label">Day</label>
							<div class="col-sm-9">
								<select id="day" name="day" class="form-control">
									<option value="1">SENIN</option>
									<option value="1">SELASA</option>
									<option value="1">RABU</option>
									<option value="1">KAMIS</option>
									<option value="1">JUMAT</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							 <label for="name" class="col-sm-3 control-label">Name</label>
							<div class="col-sm-9">
								<select class="form-control" id="name" name="name">
									<?php for ($i=0; $i < $count_d['count']; $i++) { ?>
										<option value="<?php echo $data_name[$i]['name']; ?>"><?php echo $data_name[$i]['name']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							 <label for="class" class="col-sm-3 control-label">Class</label>
							<div class="col-sm-9">
								<select class="form-control" id="class" name="class">
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="D">D</option>
									<option value="E">E</option>
									<option value="F">F</option>
									<option value="G">G</option>
									<option value="H">H</option>
									<option value="I">I</option>
								</select>
							</div>
						</div>
						<!--<div class="form-group">
							 <label for="semester" class="col-sm-3 control-label">Semester</label>
							<div class="col-sm-9">
								<select id="semester" name="semester" class="form-control">
									<?php for ($i=0; $i < $count; $i++) { ?>
										<option value="<?php echo $data[$i]['semester']; ?>"><?php echo $data[$i]['semester']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>-->
						<div class="form-group">
							 <label for="start" class="col-sm-3 control-label">Start Lesson</label>
							<div class="col-sm-9">
								<select class="form-control" id="start" name="start">
									<?php for ($i=0; $i < 14; $i++) { ?>
										<option value="<?php echo $i+1; ?>"><?php echo $lesson[$i]['start']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							 <label for="end" class="col-sm-3 control-label">End Lesson</label>
							<div class="col-sm-9">
								<select class="form-control" id="end" name="end">
									<?php for ($i=0; $i < 14; $i++) { ?>
										<option value="<?php echo $i+1; ?>"><?php echo $lesson[$i]['end']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							 <label for="labit" class="col-sm-3 control-label">Lab Id</label>
							<div class="col-sm-9">
								<select class="form-control" id="labit" name="labit">
									<option value="<?php echo $this->session->userdata('labit'); ?>">Lab <?php echo $this->session->userdata('labit'); ?></option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<a href="<?php echo base_url(); ?>schedule" type="button" class="btn btn-default">Cancel</a>
								<button type="submit" name="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					</form>
              	</div>
            </div>
		</div>
	</div>
</div>