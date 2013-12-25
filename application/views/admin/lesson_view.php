<div id="page-wrapper">
  <div class="row">
        <div class="col-lg-12">
          <h1>Lesson Management</h1>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i> Homepage</li>
              <li><i class="fa fa-book"></i> Lesson</li>
          </ol>
        </div>
    </div><!-- /.row -->
    <div class="row">
    <div class="col-lg-12 column">
      <div class="panel-group" id="panel-schedule">
        <?php for ($r=0; $r < 7; $r++) { ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <a class="panel-title" data-toggle="collapse" data-parent="#panel-schedule" href="#panel-element-<?php echo $r; ?>">Semester <?php echo $r+1; ?></a>
            <a href="<?php echo base_url(); ?>add_lesson/<?php echo $r+1; ?>" class="btn btn-primary btn-sm" style="float:right;"><i class="fa fa-file"></i> add lesson</a>
          </div>
          <div id="panel-element-<?php echo $r; ?>" class="panel-collapse collapse">
            <div class="panel-body">
              <table class="table table-hover table-striped tablesorter">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Semester</th>
                    <th>Class</th>
                    <th>Dosen</th>
                    <th>Asisten</th>
                    <th><center>Actions</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($i=0; $i < $count; $i++) { 
                    if ($data[$i]['semester'] == $r+1) { ?>
                  <tr>
                    <td><?php echo $data[$i]['mk_id']; ?></td>
                    <td><?php echo $data[$i]['name']; ?></td>
                    <td><?php echo $data[$i]['semester']; ?></td>
                    <td><?php echo $data[$i]['class']; ?></td>
                    <td><?php echo $data[$i]['dosen_name']; ?></td>
                    <td><?php echo $data[$i]['asisten_name']; ?></td>
                    <td>
                      <center>
                        <a href="<?php echo base_url(); ?>edit_lesson/<?php echo $data[$i]['mk_id']; ?>"><i class="fa fa-edit"></i></a>
                        <a id="modal-l-<?php echo $i; ?>" href="#modal-lesson-<?php echo $i; ?>" role="button" data-toggle="modal"><i class="fa fa-minus-square-o"></i></a>
                      </center>
                    </td>
                  </tr> 
                  <!-- delete modal -->
                  <div class="modal fade" id="modal-lesson-<?php echo $i; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h4 class="modal-title" id="myModalLabel">
                            Delete Lesson
                          </h4>
                        </div>
                        <div class="modal-body">
                          Are you sure want to delete <b>"<?php echo $data[$i]['name']; ?>" -> "<?php echo $data[$i]['dosen_name']; ?>"</b> ?
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">No</button> 
                           <a href="<?php echo base_url(); ?>delete_lesson/<?php echo $data[$i]['mk_id']; ?>" type="button" class="btn btn-primary">Yes</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end of delete modal -->
                  <?php }} ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>