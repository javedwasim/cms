<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-header">
                    Delete patient
                </div>
                <div class="card-body">
                  
                    <form>
                        <?php foreach($limiter_details as $row){?>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Limiter</label>
                                <input type="number" class="form-control" id="limiter" placeholder="Enter limiter" autocomplete="off" value="<?php echo $row->limiter ?>" maxlength="3">
                            </div>
                            <div class="form-group">
                                <div class='input-group mb-3'>
                                    <input type='text' class="form-control" value="<?php  echo date('d-M-Y',strtotime($row->limiter_date)); ?>" id="limiter_date" autocomplete="off" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <span class="ti-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class='input-group mb-3'>
                                 <input class="form-control" type="time" value="<?php echo $row->clinic_time ?>" id="example-time-input" autocomplete="off">
                                 <div class="input-group-append">
                                    <span class="input-group-text">
                                        <span class="fa fa-clock"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                    </form>
                    <button type="button" id="save_limiter" class="btn btn-danger waves-effect waves-light">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>