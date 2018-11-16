<form id="update_registered_user_form" method="post" role="form" data-action="<?php echo site_url('setting/update_registered_user') ?>" enctype="multipart/form-data">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <?php if(isset($user_data)){ ?>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Name:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="hidden" name="user_id" value="<?php echo $user_data['login_id']; ?>">
                                <input type="text" name="full_name" value="<?php echo $user_data['full_name']; ?>" class="form-control col-md-10" required />
                            </div>
                            <div class="col-md-3 m-t-10">
                                <label>Sex:</label>
                            </div>
                            <div class="col-md-9 m-t-10">
                                <div class="form-group" >
                                <?php if($user_data['gender']=='Male'){?>
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
                                <input type="text" name="username" value="<?php echo $user_data['username']; ?>" class="form-control col-md-10" required />
                            </div>
                            <div class="col-md-3 m-t-10">
                                <label>Password:</label>
                            </div>
                            <div class="col-md-9 m-t-10">
                                <input type="password" name="password" placeholder="*****"  class="form-control col-md-10" />
                            </div>
                            <div class="col-md-3 m-t-10">
                                <label>Contact:</label>
                            </div>
                            <div class="col-md-9 m-t-10">
                                <input type="text" name="contact_no" class="form-control col-md-10" value="<?php echo $user_data['contact_no']; ?>" required />
                            </div>
                            <div class="col-md-3 m-t-10">
                                <label>Company:</label>
                            </div>
                            <div class="col-md-9 m-t-10">
                                <input type="text" name="company" value="Shahadat Clinic" readonly="readonly" class="form-control col-md-10"   />
                            </div>
                            <div class="col-md-3 m-t-10">
                                <label>Address:</label>
                            </div>
                            <div class="col-md-9 m-t-10">
                                <textarea class="form-control col-md-10" name="address" required rows="2"><?php echo $user_data['address']; ?></textarea>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div class="col-md-7 p-l-0">
                        <?php foreach ($users  as $user): $user_rights = explode(',',$user['user_rights']);  ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ribbon-wrapper card">
                                    <div class="ribbon ribbon-info">Appointments</div>
                                    <p class="ribbon-content m-t-10">
                                        <label class="checkbox-inline m-l-10">
                                            <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-5'; ?>" <?php echo in_array("appointments-parent-1", $user_rights)?'checked':''; ?>>Appointment</label>
                                        <label class="checkbox-inline m-l-10">
                                            <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-15'; ?>" <?php echo in_array("appointments-can_add-1", $user_rights)?'checked':''; ?>>Add</label>
                                        <label class="checkbox-inline m-l-10">
                                            <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-11'; ?>" <?php echo in_array("appointments-can_edit-1", $user_rights)?'checked':''; ?>>Edit</label>
                                        <label class="checkbox-inline m-l-10">
                                            <input type="checkbox" class="user_permission" name="user_rights[]" value="<?php echo $user['other_rights_group_id'].'-12'; ?>" <?php echo in_array("appointments-can_delete-1", $user_rights)?'checked':''; ?>>Delete</label>
                                        <!-- <label class="checkbox-inline m-l-10">
                                            <input type="checkbox" class="user_permission" name="user_rights[]" value="<?php echo $user['other_rights_group_id'].'-9'; ?>" <?php echo in_array("appointments-mark_status-1", $user_rights)?'checked':''; ?>>Change Complete</label> -->
                                        <label class="checkbox-inline m-l-10">
                                            <input type="checkbox" class="user_permission" name="user_rights[]" value="<?php echo $user['other_rights_group_id'].'-10'; ?>" <?php echo in_array("appointments-view_wallet-1", $user_rights)?'checked':''; ?>>View Wallet</label>
                                        <label class="checkbox-inline m-l-10">
                                            <input type="checkbox" class="user_permission" name="user_rights[]" value="<?php echo $user['other_rights_group_id'].'-14'; ?>" <?php echo in_array("appointments-can_complete-1", $user_rights)?'checked':''; ?>>Mark Complete</label>
                                        <label class="checkbox-inline m-l-10">
                                            <input type="checkbox" class="user_permission" name="user_rights[]" value="<?php echo $user['other_rights_group_id'].'-8'; ?>" <?php echo in_array("appointments-print-1", $user_rights)?'checked':''; ?>>Appointment Print</label>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-2 p-0">
                                <div class="ribbon-wrapper card">
                                    <div class="ribbon ribbon-info">Uploads</div>
                                        <p class="ribbon-content m-t-10">
                                            <label class="checkbox-inline m-l-10">
                                              <input type="checkbox" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-37'; ?>" <?php echo in_array("delete_uploads-parent-1", $user_rights)?'checked':''; ?>> Delete
                                            </label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4 p-0">
                                    <div class="ribbon-wrapper card">
                                        <div class="ribbon ribbon-info">General</div>
                                        <p class="ribbon-content m-t-10">
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" class="user_permission" name="user_rights[]" value="<?php echo $user['other_rights_group_id'].'-36'; ?>" <?php echo in_array("setting-menu-1", $user_rights)?'checked':''; ?>> Settings</label>
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-38'; ?>"  <?php echo in_array("backup-parent-1", $user_rights)?'checked':''; ?>> Backup
                                            </label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="ribbon-wrapper card">
                                        <div class="ribbon ribbon-info">Profile</div>
                                        <p class="ribbon-content m-t-10">
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-1'; ?>" class="user_permission" name="profile_view" <?php echo in_array("profile-parent-1", $user_rights)?'checked':''; ?>>View</label>
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-2'; ?>" <?php echo in_array("profile-create_new_profile-1", $user_rights)?'checked':''; ?>>Add</label>
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-4'; ?>" <?php echo in_array("profile-delete_profile-1", $user_rights)?'checked':''; ?>>Delete</label>
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-3'; ?>" <?php echo in_array("profile-edit_profile-1", $user_rights)?'checked':''; ?>>Edit</label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="ribbon-wrapper card">
                                        <div class="ribbon ribbon-info">Examination</div>
                                        <p class="ribbon-content m-t-10">
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-18'; ?>" <?php echo in_array("examinations-can_edit-1", $user_rights)?'checked':''; ?>>Edit</label>
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-19'; ?>" <?php echo in_array("examinations-can_delete-1", $user_rights)?'checked':''; ?>>Delete</label>
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-17'; ?>" <?php echo in_array("examinations-can_add-1", $user_rights)?'checked':''; ?>>Add</label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="ribbon-wrapper card">
                                        <div class="ribbon ribbon-info">Echo</div>
                                        <p class="ribbon-content m-t-10">
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-22'; ?>" <?php echo in_array("echos-can_edit-1", $user_rights)?'checked':''; ?>>Edit</label>
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-23'; ?>" <?php echo in_array("echos-can_delete-1", $user_rights)?'checked':''; ?>>Delete</label>
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-21'; ?>" <?php echo in_array("echos-can_add-1", $user_rights)?'checked':''; ?>>Add</label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="ribbon-wrapper card">
                                        <div class="ribbon ribbon-info">ETT</div>
                                        <p class="ribbon-content m-t-10">
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-27'; ?>" <?php echo in_array("ett-can_delete-1", $user_rights)?'checked':''; ?>>Delete</label>
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-26'; ?>" <?php echo in_array("ett-can_edit-1", $user_rights)?'checked':''; ?>>Edit</label>
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-25'; ?>" <?php echo in_array("ett-can_add-1", $user_rights)?'checked':''; ?>>Add</label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="ribbon-wrapper card">
                                        <div class="ribbon ribbon-info">Lab Test</div>
                                        <p class="ribbon-content m-t-10">
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-29'; ?>" <?php echo in_array("lab_tests-can_add-1", $user_rights)?'checked':''; ?>>Add</label>
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-30'; ?>" <?php echo in_array("lab_tests-can_edit-1", $user_rights)?'checked':''; ?>>Edit</label>
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-31'; ?>" <?php echo in_array("lab_tests-can_delete-1", $user_rights)?'checked':''; ?>>Delete</label>
                                            
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="ribbon-wrapper card">
                                        <div class="ribbon ribbon-info">Special Instructions</div>
                                        <p class="ribbon-content m-t-10">
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-33'; ?>" <?php echo in_array("special_instructions-can_add-1", $user_rights)?'checked':''; ?>>Add</label>
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-34'; ?>" <?php echo in_array("special_instructions-can_edit-1", $user_rights)?'checked':''; ?>>Edit</label>
                                            <label class="checkbox-inline m-l-10">
                                                <input type="checkbox" name="user_rights[]" class="user_permission" value="<?php echo $user['other_rights_group_id'].'-35'; ?>" <?php echo in_array("special_instructions-can_delete-1", $user_rights)?'checked':''; ?>>Delete</label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary edit_user_data" >Update</button>
        </div>
    </div> 
</form>