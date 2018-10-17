<div class="dashboard-content" style="width: 88%;">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card-header">
                <h4>User Register</h4>
            </div>
            <div class="card">
                <div class="card-body">
                    <form id="register_user_form" method="post" role="form"
                          data-action="<?php echo site_url('setting/register_new_user') ?>"
                          enctype="multipart/form-data">
                    <div class="row">
                            <div class="col-md-12"></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Name:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="full_name" class="form-control col-md-10" />
                                    </div>
                                    <div class="col-md-3 m-t-10">
                                        <label>Sex:</label>
                                    </div>
                                    <div class="col-md-9 m-t-10">
                                        <div class="form-group" >
                                            <label class="radio-inline" style="color:#000 !important;margin-right: 15px;"><input type="radio" name="gender" checked>Male</label>
                                            <label class="radio-inline" style="color:#000 !important;"><input type="radio" name="gender">Female</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 m-t-10">
                                        <label>Username:</label>
                                    </div>
                                    <div class="col-md-9 m-t-10">
                                        <input type="text" name="username" class="form-control col-md-10" />
                                    </div>
                                    <div class="col-md-3 m-t-10">
                                        <label>Password:</label>
                                    </div>
                                    <div class="col-md-9 m-t-10">
                                        <input type="password" name="password" class="form-control col-md-10" />
                                    </div>
                                    <div class="col-md-3 m-t-10">
                                        <label>Re-Type Password:</label>
                                    </div>
                                    <div class="col-md-9 m-t-10">
                                        <input type="password" name="confirm_password" class="form-control col-md-10" />
                                    </div>
                                    <div class="col-md-3 m-t-10">
                                        <label>Contact:</label>
                                    </div>
                                    <div class="col-md-9 m-t-10">
                                        <input type="text" name="contact_no" class="form-control col-md-10" />
                                    </div>
                                    <div class="col-md-3 m-t-10">
                                        <label>Company:</label>
                                    </div>
                                    <div class="col-md-9 m-t-10">
                                        <input type="text" name="company" value="Shahadat Clinic" class="form-control col-md-10" readonly="readonly"  />
                                    </div>
                                    <div class="col-md-3 m-t-10">
                                        <label>Address:</label>
                                    </div>
                                    <div class="col-md-9 m-t-10">
                                        <textarea class="form-control col-md-10" name="address" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-info">Appointments</div>
                                            <?php $appointment_rights = explode(',',$other_rights['appointments']) ?>
                                            <p class="ribbon-content m-t-10">
                                                <?php foreach ($appointment_rights as $a): $right_name = explode('-',$a); ?>
                                                    <?php if(($right_name[0]=='can_delete') || ($right_name[0]=='can_edit') || ($right_name[0]=='can_add')){ ?>
                                                        <label class="checkbox-inline m-l-10">
                                                            <input type="checkbox" name="user_rights[]" value="<?php echo $right_name[1]; ?>">
                                                            <?php
                                                                if($right_name[0]=='can_delete'){
                                                                    echo "Delete";
                                                                } elseif($right_name[0]=='can_edit'){
                                                                    echo "Edit";
                                                                }elseif($right_name[0]=='can_add'){
                                                                    echo "Add";
                                                                }
                                                            ?>
                                                        </label>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-info">Uploads</div>
                                            <p class="ribbon-content m-t-10">
                                                <label class="checkbox-inline m-l-10">
                                                  <input type="checkbox" value=""> Delete
                                                </label>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-info">Profile</div>
                                            <?php $appointment_rights = explode(',',$other_rights['profile']) ?>
                                            <p class="ribbon-content m-t-10">
                                                <?php foreach ($appointment_rights as $a): $right_name = explode('-',$a);?>
                                                    <?php if(($right_name[0]=='delete_profile') || ($right_name[0]=='edit_profile') || ($right_name[0]=='create_new_profile')){ ?>
                                                        <label class="checkbox-inline m-l-10">
                                                            <input type="checkbox" name="user_rights[]" value="<?php echo $right_name[1]; ?>">
                                                            <?php
                                                            if($right_name[0]=='delete_profile'){
                                                                echo "Delete";
                                                            } elseif($right_name[0]=='edit_profile'){
                                                                echo "Edit";
                                                            }elseif($right_name[0]=='create_new_profile'){
                                                                echo "Add";
                                                            }
                                                            ?>
                                                        </label>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-info">Examination</div>
                                            <?php $examinations_rights = explode(',',$other_rights['examinations']) ?>
                                            <p class="ribbon-content m-t-10">
                                                <?php foreach ($examinations_rights as $e): $right_name = explode('-',$e); ?>
                                                    <?php if(($right_name[0]=='can_delete') || ($right_name[0]=='can_edit') || ($right_name[0]=='can_add')){ ?>
                                                        <label class="checkbox-inline m-l-10">
                                                          <input type="checkbox" name="user_rights[]" value="<?php echo $right_name[1]; ?>">
                                                            <?php
                                                            if($right_name[0]=='can_delete'){
                                                                echo "Delete";
                                                            } elseif($right_name[0]=='can_edit'){
                                                                echo "Edit";
                                                            }elseif($right_name[0]=='can_add'){
                                                                echo "Add";
                                                            }
                                                            ?>
                                                        </label>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-info">Echo</div>
                                            <?php $echos_rights = explode(',',$other_rights['echos']) ?>
                                            <p class="ribbon-content m-t-10">
                                                <?php foreach ($echos_rights as $echo): $right_name = explode('-',$echo); ?>
                                                    <?php if(($right_name[0]=='can_delete') || ($right_name[0]=='can_edit') || ($right_name[0]=='can_add')){ ?>
                                                        <label class="checkbox-inline m-l-10">
                                                            <input type="checkbox" name="user_rights[]" value="<?php echo $right_name[1]; ?>">
                                                            <?php
                                                            if($right_name[0]=='can_delete'){
                                                                echo "Delete";
                                                            } elseif($right_name[0]=='can_edit'){
                                                                echo "Edit";
                                                            }elseif($right_name[0]=='can_add'){
                                                                echo "Add";
                                                            }
                                                            ?>
                                                        </label>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-info">ETT</div>
                                            <?php $ett_rights = explode(',',$other_rights['ett']) ?>
                                            <p class="ribbon-content m-t-10">
                                                <?php foreach ($ett_rights as $ett): $right_name = explode('-',$ett); ?>
                                                    <?php if(($right_name[0]=='can_delete') || ($right_name[0]=='can_edit') || ($right_name[0]=='can_add')){ ?>
                                                        <label class="checkbox-inline m-l-10">
                                                            <input type="checkbox" name="user_rights[]" value="<?php echo $right_name[1]; ?>">
                                                            <?php
                                                            if($right_name[0]=='can_delete'){
                                                                echo "Delete";
                                                            } elseif($right_name[0]=='can_edit'){
                                                                echo "Edit";
                                                            }elseif($right_name[0]=='can_add'){
                                                                echo "Add";
                                                            }
                                                            ?>
                                                        </label>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-info">Lab Test</div>
                                            <?php $lab_rights = explode(',',$other_rights['lab_tests']) ?>
                                            <p class="ribbon-content m-t-10">
                                                <?php foreach ($lab_rights as $lab_right): $right_name = explode('-',$lab_right); ?>
                                                    <?php if(($right_name[0]=='can_delete') || ($right_name[0]=='can_edit') || ($right_name[0]=='can_add')){ ?>
                                                        <label class="checkbox-inline m-l-10">
                                                            <input type="checkbox" name="user_rights[]" value="<?php echo $right_name[1]; ?>">
                                                            <?php
                                                            if($right_name[0]=='can_delete'){
                                                                echo "Delete";
                                                            } elseif($right_name[0]=='can_edit'){
                                                                echo "Edit";
                                                            }elseif($right_name[0]=='can_add'){
                                                                echo "Add";
                                                            }
                                                            ?>
                                                        </label>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-info">Special Instructions</div>
                                            <?php $special_instructions = explode(',',$other_rights['special_instructions']) ?>
                                            <p class="ribbon-content m-t-10">
                                                <?php foreach ($special_instructions as $special_instruction): $right_name = explode('-',$special_instruction); ?>
                                                    <?php if(($right_name[0]=='can_delete') || ($right_name[0]=='can_edit') || ($right_name[0]=='can_add')){ ?>
                                                        <label class="checkbox-inline m-l-10">
                                                            <input type="checkbox" name="user_rights[]" value="<?php echo $right_name[1]; ?>">
                                                            <?php
                                                            if($right_name[0]=='can_delete'){
                                                                echo "Delete";
                                                            } elseif($right_name[0]=='can_edit'){
                                                                echo "Edit";
                                                            }elseif($right_name[0]=='can_add'){
                                                                echo "Add";
                                                            }
                                                            ?>
                                                        </label>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-info">General</div>
                                            <p class="ribbon-content m-t-10">
                                                <label class="checkbox-inline m-l-10">
                                                  <?php $setting_id = explode('-',$other_rights['setting']) ?>
                                                  <input type="checkbox" name="user_rights[]" value="<?php echo $setting_id[1]; ?>"> Settings
                                                </label>
                                                <label class="checkbox-inline m-l-10">
                                                  <input type="checkbox" value=""> Backup
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary btn-block" id="register_new_user">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    User Permissions
                </div>
                <div class="card-body" style="width:100%;overflow-x: scroll; overflow-y:scroll ">
                    <table class="table table-bordered nowrap responsive" cellspacing="0" id="permissions-table" width="100%" >
                        <thead>
                        <tr>
                            <th>Delete</th>
                            <th>Edit</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Appointments</th>
                            <th>Printing</th>
                            <th>Profile View</th>
                            <th>Profile Add</th>
                            <th>Profile Edit</th>
                            <th>Profile Delete</th>
                            <th>Examination Edit</th>
                            <th>Examination New</th>
                            <th>Delete Uploads</th>
                            <th>Echo Add</th>
                            <th>Echo edit</th>
                            <th>Echo delete</th>
                            <th>ETT Add</th>
                            <th>ETT Edit</th>
                            <th>ETT Delete</th>
                            <th>Lab Test Add</th>
                            <th>Lab Test Edit</th>
                            <th>Lab Test Delete</th>
                            <th>Special Inst. Add</th>
                            <th>Special Inst. Edit</th>
                            <th>Special Inst. Delete</th>
                            <th>Settings</th>
                            <th>Backup</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users  as $user): $user_rights = explode(',',$user['user_rights']); //echo "<pre>"; print_r($user) ?>
                            <tr>
                                <td><a class="btn btn-xs btn-danger" href="javascript:void(0)" ><i class="fa fa-trash"></i></a></td>
                                <td><a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#useredit"><i class="fa fa-edit"></i></a></td>
                                <td><?php echo $user['full_name']; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-5'; ?>" class="user_permission"
                                           name="appointment" <?php echo in_array("appointments-parent-1", $user_rights)?'checked':''; ?>></td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-8'; ?>" class="user_permission"
                                           name="appointment_printing" <?php echo in_array("appointments-print-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-1'; ?>" class="user_permission"
                                           name="profile_view" <?php echo in_array("profile-parent-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-2'; ?>" class="user_permission"
                                           name="profile_add" <?php echo in_array("profile-create_new_profile-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-3'; ?>" class="user_permission"
                                           name="profile_edit" <?php echo in_array("profile-edit_profile-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-4'; ?>" class="user_permission"
                                           name="profile_delete" <?php echo in_array("profile-delete_profile-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-18'; ?>" class="user_permission"
                                           name="examination_edit" <?php echo in_array("examinations-can_edit-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-17'; ?>" class="user_permission"
                                           name="examination_add" <?php echo in_array("examinations-can_add-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-37'; ?>" class="user_permission"
                                           name="delete_uploads" <?php echo in_array("delete_uploads-parent-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-21'; ?>" class="user_permission"
                                           name="echo_add" <?php echo in_array("echos-can_add-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-22'; ?>" class="user_permission"
                                           name="echo_edit" <?php echo in_array("echos-can_edit-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-23'; ?>" class="user_permission"
                                           name="echo_delete" <?php echo in_array("echos-can_delete-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-25'; ?>" class="user_permission"
                                           name="ett_add" <?php echo in_array("ett-can_add-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-26'; ?>" class="user_permission"
                                           name="ett_edit" <?php echo in_array("ett-can_edit-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-27'; ?>" class="user_permission"
                                           name="ett_delete" <?php echo in_array("ett-can_delete-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-29'; ?>" class="user_permission"
                                           name="lab_test_add" <?php echo in_array("lab_tests-can_add-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-30'; ?>" class="user_permission"
                                           name="lab_test_edit" <?php echo in_array("lab_tests-can_edit-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-31'; ?>" class="user_permission"
                                           name="lab_test_delete" <?php echo in_array("lab_tests-can_delete-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-33'; ?>" class="user_permission"
                                           name="special_inst_add" <?php echo in_array("special_instructions-can_add-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-34'; ?>" class="user_permission"
                                           name="special_inst_edit" <?php echo in_array("special_instructions-can_edit-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-35'; ?>" class="user_permission"
                                           name="special_inst_delete" <?php echo in_array("special_instructions-can_delete-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-36'; ?>" class="user_permission"
                                           name="setting" <?php echo in_array("setting-menu-1", $user_rights)?'checked':''; ?>> </td>
                                <td><input type="checkbox" value="<?php echo $user['login_id'].'-38'; ?>" class="user_permission"
                                           name="backup" <?php echo in_array("backup-parent-1", $user_rights)?'checked':''; ?>> </td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Modal -->
<div class="modal fade" id="useredit" role="dialog">
    <div class="modal-dialog">
          <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="update_registered_user_form" method="post" role="form"
                          data-action="<?php echo site_url('setting/update_registered_user') ?>"
                          enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Name:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="full_name" class="form-control col-md-10" />
                        </div>
                        <div class="col-md-3 m-t-10">
                            <label>Sex:</label>
                        </div>
                        <div class="col-md-9 m-t-10">
                            <div class="form-group" >
                                <label class="radio-inline" style="color:#000 !important;margin-right: 15px;"><input type="radio" name="gender" checked>Male</label>
                                <label class="radio-inline" style="color:#000 !important;"><input type="radio" name="gender">Female</label>
                            </div>
                        </div>
                        <div class="col-md-3 m-t-10">
                            <label>Username:</label>
                        </div>
                        <div class="col-md-9 m-t-10">
                            <input type="text" name="username" class="form-control col-md-10" />
                        </div>
                        <div class="col-md-3 m-t-10">
                            <label>Password:</label>
                        </div>
                        <div class="col-md-9 m-t-10">
                            <input type="password" name="password" class="form-control col-md-10" />
                        </div>
                        <div class="col-md-3 m-t-10">
                            <label>Re-Type Password:</label>
                        </div>
                        <div class="col-md-9 m-t-10">
                            <input type="password" name="confirm_password" class="form-control col-md-10" />
                        </div>
                        <div class="col-md-3 m-t-10">
                            <label>Contact:</label>
                        </div>
                        <div class="col-md-9 m-t-10">
                            <input type="text" name="contact_no" class="form-control col-md-10" />
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
                            <textarea class="form-control col-md-10" name="address" rows="2"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Update</button>
            </div>
        </div> 
    </div>
</div>