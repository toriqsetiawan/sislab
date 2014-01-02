<div id="page-wrapper">
  <div class="row">
        <div class="col-lg-12">
          <h1>Schedule Management</h1>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i> Homepage</li>
              <li><i class="fa fa-table"></i> Schedule</li>
          </ol>
        </div>
    </div><!-- /.row -->
    <div class="row">
    <div class="col-lg-12 column">
      <div class="panel-group" id="panel-schedule">
        <div class="panel panel-default">
          <div class="panel-heading">
            <a class="panel-title" data-toggle="collapse" data-parent="#panel-schedule" href="#panel-element-lab-a">Lab 1</a>
            <a href="<?php echo base_url(); ?>add_schedule/1" class="btn btn-primary btn-sm" style="float:right;"><i class="fa fa-file"></i> add schedule</a>
          </div>
          <div id="panel-element-lab-a" class="panel-collapse collapse">
            <div class="panel-body">
              <table class="table table-hover table-striped tablesorter">
                <thead>
                  <tr>
                    <th>JAM</th>
                    <?php for ($i=0; $i < 5; $i++) { ?> 
                    <th><?php echo $day[$i]['name']; ?></th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($i=0; $i < 14; $i++) { ?>
                  <tr>
                    <td><?php echo $i+1; ?></td>

                    <?php for ($j=1; $j <= 5; $j++) { ?>
                      <td>
                        <?php 
                          $status = false;
                          for ($x=0; $x < $count; $x++) { 
                            if ($schedule[$x]['start'] == $i+1 && $schedule[$x]['day_id'] == $j && $schedule[$x]['lab_id'] == 1) {
                              $status = true;
                              echo $data[$x]['name'].' / '.$data[$x]['semester'].$data[$x]['class'];
                              echo ' <a href="'.base_url().'edit_schedule/'.$schedule[$x]['sch_id'].'"><i class="fa fa-edit"></i></a>';
                              echo '&nbsp;';
                              echo '<a id="modal-d-'.$x.'" href="#modal-schedule-'.$x.'" role="button" data-toggle="modal"><i class="fa fa-minus-square-o"></i></a>';
                            } 
                            if ($schedule[$x]['end'] == $i+1 && $schedule[$x]['day_id'] == $j && $schedule[$x]['lab_id'] == 1) {
                              $status = true;
                              echo $data[$x]['dosen_id'];
                            } 
                            echo '
                            <div class="modal fade" id="modal-schedule-'.$x.'" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">
                                      Delete Schedule
                                    </h4>
                                  </div>
                                  <div class="modal-body">
                                    Are you sure want to delete data <b>"'.$data[$x]['name'].' / '.$data[$x]['semester'].$data[$x]['class'].'"</b> ?
                                  </div>
                                  <div class="modal-footer">
                                     <button type="button" class="btn btn-default" data-dismiss="modal">No</button> 
                                     <a href="'.base_url().'delete_schedule/'.$schedule[$x]['sch_id'].'" type="button" class="btn btn-primary">Yes</a>
                                  </div>
                                </div>
                              </div>
                            </div>';
                          }
                          if ($status == false) {
                            echo "";
                          }
                        ?>
                      </td>
                    <?php } ?>

                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <a class="panel-title" data-toggle="collapse" data-parent="#panel-schedule" href="#panel-element-lab-b">Lab 2</a>
            <a href="<?php echo base_url(); ?>add_schedule/2" class="btn btn-primary btn-sm" style="float:right;"><i class="fa fa-file"></i> add schedule</a>
          </div>
          <div id="panel-element-lab-b" class="panel-collapse collapse">
            <div class="panel-body">
              <table class="table table-hover table-striped tablesorter">
                <thead>
                  <tr>
                    <th>JAM</th>
                    <?php for ($i=0; $i < 5; $i++) { ?>
                    <th><?php echo $day[$i]['name']; ?></th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($i=0; $i < 14; $i++) { ?>
                  <tr>
                    <td><?php echo $i+1; ?></td>

                    <?php for ($j=1; $j <= 5; $j++) { ?>
                      <td>
                        <?php 
                          $status = false;
                          for ($x=0; $x < $count; $x++) { 
                            if ($schedule[$x]['start'] == $i+1 && $schedule[$x]['day_id'] == $j && $schedule[$x]['lab_id'] == 2) {
                              $status = true;
                              echo $data[$x]['name'].' / '.$data[$x]['semester'].$data[$x]['class'];
                              echo ' <a href="'.base_url().'edit_schedule/'.$schedule[$x]['sch_id'].'"><i class="fa fa-edit"></i></a>';
                              echo '&nbsp;';
                              echo '<a id="modal-d-'.$x.'" href="#modal-schedule-10'.$x.'" role="button" data-toggle="modal"><i class="fa fa-minus-square-o"></i></a>';
                            } 
                            if ($schedule[$x]['end'] == $i+1 && $schedule[$x]['day_id'] == $j && $schedule[$x]['lab_id'] == 2) {
                              $status = true;
                              echo $data[$x]['dosen_id'];
                            } 
                            echo '
                            <div class="modal fade" id="modal-schedule-10'.$x.'" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">
                                      Delete Schedule
                                    </h4>
                                  </div>
                                  <div class="modal-body">
                                    Are you sure want to delete data <b>"'.$data[$x]['name'].' / '.$data[$x]['semester'].$data[$x]['class'].'"</b> ?
                                  </div>
                                  <div class="modal-footer">
                                     <button type="button" class="btn btn-default" data-dismiss="modal">No</button> 
                                     <a href="'.base_url().'delete_schedule/'.$schedule[$x]['sch_id'].'" type="button" class="btn btn-primary">Yes</a>
                                  </div>
                                </div>
                              </div>
                            </div>';
                          }
                          if ($status == false) {
                            echo "";
                          }
                        ?>
                      </td>
                    <?php } ?>

                  </tr>
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