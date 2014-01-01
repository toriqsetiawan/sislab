  <!-- Full Page Image Header Area -->
  <div id="top" class="header">
    <div class="vert-text" style="vertical-align:top;">
      <h1 style="color:#fff; margin-top:100px">My Schedule</h1>
      <div style="padding-top:30px;">
        <div class="col-md-10 col-md-offset-1 text-center">
          <div class="service-item">
            <h4 style="color:#fff; text-align:left;">
              <table class="table tablesorter">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Time</th>
                    <th>Day</th>
                    <th>Class</th>
                    <th>Dosen</th>
                    <th>Asisten</th>
                    <th>Lab</th>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($i=0; $i < $new_data['count']; $i++) { ?>
                  <tr>
                    <td><?php echo $i+1; ?></td>
                    <td>ret</td>
                    <td>zxdvz</td>
                    <td><?php echo $new_data[$i]['semester'].$new_data[$i]['class']; ?></td>
                    <td><?php echo $new_data[$i]['d_name']; ?></td>
                    <td><?php echo $new_data[$i]['a_name']; ?></td>
                    <td>Lab 1</td>
                  </tr>  
                  <?php } ?>
                </tbody>
              </table>
            </h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Full Page Image Header Area -->