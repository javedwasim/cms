<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-lg-4 col-md-6">
            <div class="card card-top-margin">
                <div class="card-header">
                    Limiter
                </div>
                <form id="limiter_form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Limiter</label>
                            <input type="number" class="form-control" id="limiter" placeholder="Enter limiter" autocomplete="off"  maxlength="3" required="required">
                        </div>
                        <div class="form-group">
                            <div class='input-group mb-3'>
                                <input type='text' class="form-control app_date" value="<?php echo date('d-m-Y'); ?>" id="limiter_date" autocomplete="off" required="required" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <span class="ti-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                   <!--      <div class="form-group">
                            <div class='input-group mb-3'>
                             <input class="form-control" type="time"  id="example-time-input" autocomplete="off">
                             <div class="input-group-append">
                                <span class="input-group-text">
                                    <span class="fa fa-clock"></span>
                                </span>
                                </div>
                            </div>
                        </div> -->
                        <button type="button" id="save_limiter" class="btn btn-danger waves-effect waves-light">Save</button>
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="card-body" id="limiter_table" >
                    
                </div>
            </div>
        </div>
    </div>
</div>
