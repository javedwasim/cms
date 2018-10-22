<form id="update_registered_user_form" method="post" role="form" data-action="<?php echo site_url('setting/update_registered_user') ?>" enctype="multipart/form-data">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
                <?php if(isset($user_data)){ ?>
                <div class="row">
                    <div class="col-md-3">
                        <label>Name:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="hidden" name="user_id" value="<?php echo $user_data['login_id']; ?>">
                        <input type="text" name="full_name" value="<?php echo $user_data['full_name']; ?>" class="form-control col-md-10" />
                    </div>
                    <div class="col-md-3 m-t-10">
                        <label>Sex:</label>
                    </div>
                    <div class="col-md-9 m-t-10">
                        <div class="form-group" >
                            <?php if($user_data['gender']=='on'){?>
                            <label class="radio-inline" style="color:#000 !important;margin-right: 15px;"><input type="radio" name="gender" value="Male" checked>Male</label>
                            <label class="radio-inline" style="color:#000 !important;"><input type="radio" name="gender" value="Female">Female</label>
                        <?php }else{?>
                            <label class="radio-inline" style="color:#000 !important;margin-right: 15px;"><input type="radio" name="gender" value="Male">Male</label>
                            <label class="radio-inline" style="color:#000 !important;"><input type="radio" name="gender" value="Female" checked>Female</label>
                        <?php }?>
                        </div>
                    </div>
                    <div class="col-md-3 m-t-10">
                        <label>Username:</label>
                    </div>
                    <div class="col-md-9 m-t-10">
                        <input type="text" name="username" value="<?php echo $user_data['username']; ?>" class="form-control col-md-10" />
                    </div>
                    <div class="col-md-3 m-t-10">
                        <label>Password:</label>
                    </div>
                    <div class="col-md-9 m-t-10">
                        <input type="password" name="password" value="<?php echo $user_data['password']; ?>" class="form-control col-md-10" readonly="readonly" />
                    </div>
                    <div class="col-md-3 m-t-10">
                        <label>Contact:</label>
                    </div>
                    <div class="col-md-9 m-t-10">
                        <input type="text" name="contact_no" class="form-control col-md-10" value="<?php echo $user_data['contact_no']; ?>" />
                    </div>
                    <div class="col-md-3 m-t-10">
                        <label>Company:</label>
                    </div>
                    <div class="col-md-9 m-t-10">
                        <input type="text" name="company" value="Shahadat Clinic" readonly="readonly" class="form-control col-md-10"  />
                    </div>
                    <div class="col-md-3 m-t-10">
                        <label>Address:</label>
                    </div>
                    <div class="col-md-9 m-t-10">
                        <textarea class="form-control col-md-10" name="address"  rows="2"><?php echo $user_data['address']; ?></textarea>
                    </div>
                </div>
            <?php }?>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary edit_user_data" >Update</button>
        </div>
    </div> 
</form>