<div id="page-wrapper">
	<div class="row">
      	<div class="col-lg-12">
        	<h1>Message Management</h1>
        	<ol class="breadcrumb">
          		<li><i class="fa fa-home"></i> Homepage</li>
          		<li><i class="fa fa-envelope"></i> Message</li>
        	</ol>
      	</div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
              	<div class="panel-heading">
                	<div class="row">
                  		<div class="col-xs-6">
                    		<i class="fa fa-comments fa-5x"></i>
                  		</div>
                  		<div class="col-xs-6 text-right">
                    		<p class="announcement-heading"><?php echo $count; ?></p>
                    		<p class="announcement-text">Message</p>
                  		</div>
                	</div>
              	</div>
              	<a href="#">
                	<div class="panel-footer announcement-bottom">
                  		<div class="row">
                    		<div class="col-lg-12 column">
								<table class="table table-hover table-striped tablesorter">
					                <thead>
					              		<tr>
						                    <th>Username</th>
						                    <th>Message</th>
						                    <th><center>Actions</center></th>
					              		</tr>
					                </thead>
					                <tbody>
					                	
					                	<?php for ($i=0; $i < $count; $i++) { ?>
					                	<tr>
						                    <td><?php echo $data[$i]['username']; ?></td>
						                    <td><?php echo $data[$i]['message']; ?></td>
						                    <td>
						                    	<center>
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
															Delete Message
														</h4>
													</div>
													<div class="modal-body">
														Are you sure want to delete message from : <b>"<?php echo $data[$i]['username']; ?>"</b> ?
													</div>
													<div class="modal-footer">
														 <button type="button" class="btn btn-default" data-dismiss="modal">No</button> 
														 <a href="<?php echo base_url(); ?>message/delete_msg/<?php echo $data[$i]['testimony_id']; ?>" type="button" class="btn btn-primary">Yes</a>
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
              	</a>
            </div>
        </div>
    </div><!-- /.row -->
</div>