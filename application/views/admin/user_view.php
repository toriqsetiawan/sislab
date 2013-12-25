<div id="page-wrapper">
	<div class="row">
      	<div class="col-lg-12">
        	<h1>User Management</h1>
        	<ol class="breadcrumb">
          		<li><i class="fa fa-home"></i> Homepage</li>
          		<li><i class="fa fa-user"></i> User</li>
        	</ol>
      	</div>
    </div><!-- /.row -->
    <div class="row">
		<div class="col-lg-12 column">
			<div class="panel-group" id="panel-user">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class="panel-title" data-toggle="collapse" data-parent="#panel-user" href="#panel-element-asisten">User List - Asisten</a>
						<a href="<?php echo base_url(); ?>add_user/index/asisten" class="btn btn-primary btn-sm" style="float:right;"><i class="fa fa-file"></i> add user</a>
					</div>
					<div id="panel-element-asisten" class="panel-collapse collapse">
						<div class="panel-body">
							<table class="table table-hover table-striped tablesorter">
				                <thead>
			                  		<tr>
			                  			<th>Id</th>
					                    <th>Name</th>
					                    <th>Grade</th>
					                    <th>Email</th>
					                    <th>Address</th>
					                    <th>Phone</th>
					                    <th><center>Actions</center></th>
			                  		</tr>
				                </thead>
				                <tbody>
				                	
				                	<?php for ($i=0; $i < $count_asisten; $i++) { ?>
				                	<tr>
				                		<td><?php echo $asisten[$i]['asisten_id']; ?></td>
					                    <td><?php echo $asisten[$i]['name']; ?></td>
					                    <td><?php echo $asisten[$i]['grade']; ?></td>
					                    <td><?php echo $asisten[$i]['email']; ?></td>
					                    <td><?php echo $asisten[$i]['address']; ?></td>
					                    <td><?php echo $asisten[$i]['phone']; ?></td>
					                    <td>
					                    	<center>
					                    		<a href="<?php echo base_url(); ?>edit_asisten/<?php echo $asisten[$i]['asisten_id']; ?>"><i class="fa fa-edit"></i></a>
					                    		<a id="modal-<?php echo $i; ?>" href="#modal-container-<?php echo $i; ?>" role="button" data-toggle="modal"><i class="fa fa-minus-square-o"></i></a>
					                    	</center>
					                    </td>
					                </tr>  
					                <!-- delete modal -->
					                <div class="modal fade" id="modal-container-<?php echo $i; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
													<h4 class="modal-title" id="myModalLabel">
														Delete Asisten
													</h4>
												</div>
												<div class="modal-body">
													Are you sure want to delete <b>"<?php echo $asisten[$i]['name']; ?>"</b> ?
												</div>
												<div class="modal-footer">
													 <button type="button" class="btn btn-default" data-dismiss="modal">No</button> 
													 <a href="<?php echo base_url(); ?>delete_user/asisten/<?php echo $asisten[$i]['asisten_id']; ?>" type="button" class="btn btn-primary">Yes</a>
												</div>
											</div>
										</div>
									</div>
									<!-- end of delete modal -->
				                	<?php } ?>
				                </tbody>
			              	</table>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class="panel-title" data-toggle="collapse" data-parent="#panel-user" href="#panel-element-dosen">User List - Dosen</a>
						<a href="<?php echo base_url(); ?>add_user/index/dosen" class="btn btn-primary btn-sm" style="float:right;"><i class="fa fa-file"></i> add user</a>
					</div>
					<div id="panel-element-dosen" class="panel-collapse collapse">
						<div class="panel-body">
							<table class="table table-hover table-striped tablesorter">
				                <thead>
			                  		<tr>
					                    <th>Id</th>
					                    <th>Name</th>
					                    <th>Email</th>
					                    <th>Address</th>
					                    <th>Phone</th>
					                    <th><center>Actions</center></th>
			                  		</tr>
				                </thead>
				                <tbody>
				                	<?php for ($i=0; $i < $count_dosen; $i++) { ?>
				                	<tr>
				                  		<td><?php echo $dosen[$i]['dosen_id']; ?></td>
					                    <td><?php echo $dosen[$i]['name']; ?></td>
					                    <td><?php echo $dosen[$i]['email']; ?></td>
					                    <td><?php echo $dosen[$i]['address']; ?></td>
					                    <td><?php echo $dosen[$i]['phone']; ?></td>
					                    <td>
					                    	<center>
					                    		<a href="<?php echo base_url(); ?>edit_dosen/<?php echo $dosen[$i]['dosen_id']; ?>"><i class="fa fa-edit"></i></a>
					                    		<a id="modal-d-<?php echo $i; ?>" href="#modal-dosen-<?php echo $i; ?>" role="button" data-toggle="modal"><i class="fa fa-minus-square-o"></i></a>
					                    	</center>
					                    </td>
				                  	</tr>
				                  	<!-- delete modal -->
					                <div class="modal fade" id="modal-dosen-<?php echo $i; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
													<h4 class="modal-title" id="myModalLabel">
														Delete Dosen
													</h4>
												</div>
												<div class="modal-body">
													Are you sure want to delete <b>"<?php echo $dosen[$i]['name']; ?>"</b> ?
												</div>
												<div class="modal-footer">
													 <button type="button" class="btn btn-default" data-dismiss="modal">No</button> 
													 <a href="<?php echo base_url(); ?>delete_user/dosen/<?php echo $dosen[$i]['dosen_id']; ?>" type="button" class="btn btn-primary">Yes</a>
												</div>
											</div>
										</div>
									</div>
				                  	<?php } ?>
				                </tbody>
			              	</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>