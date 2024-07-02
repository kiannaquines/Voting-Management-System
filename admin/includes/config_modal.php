<!-- Config -->
<div class="modal fade" id="config">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Election Configuration</b></h4>
            </div>
            <div class="modal-body">
              <div class="text-center">
                <?php
                  $parse = parse_ini_file('config.ini', FALSE, INI_SCANNER_RAW);
                  $title = $parse['election_title'];
                  $startDate = $parse['start_date'];
                  $startTime = $parse['start_time'];
                  $endDate = $parse['end_date'];
                  $endTime = $parse['end_time'];
                  $already_finished = $parse['election_ended'];
                ?>
                <form class="form-horizontal" method="POST" action="config_save.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>">
                  <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Election Title</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="startTime" class="col-sm-3 control-label">Start Date & Time</label>
                    <div class="col-sm-9">
                      <div class="col">
                        <input type="date" class="form-control" id="startDate" name="startDate" value="<?php echo $startDate; ?>">
                      </div>
                      <div class="col">                        
                        <input type="time" class="form-control" id="startTime" name="startTime" value="<?php echo $startTime; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="endDate" class="col-sm-3 control-label">End Date & Time</label>

                    <div class="col-sm-9">
                      <div class="col">
                        <input type="date" class="form-control" id="endDate" name="endDate" value="<?php echo $endDate; ?>">
                      </div>
                      <div class="col">
                        <input type="time" class="form-control" id="endTime" name="endTime" value="<?php echo $endTime; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="election_ended" class="col-sm-3 control-label">Election Status</label>
                    <div class="col-sm-9">
                      <div class="col">
                        <select name="election_ended" id="election_ended" class="form-control">
                          <option value="true" <?php echo ($already_finished == 'true')? 'selected':''; ?>>Already finished</option>
                          <option value="false" <?php echo ($already_finished == 'false')? 'selected':''; ?>>Not yet finish</option>
                        </select>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success" name="save"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>