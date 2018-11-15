<div class="modal-content">
    <form id="register_user_form" method="post" role="form" data-action="<?php echo site_url('setting/register_new_user') ?>" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">User Register</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Name:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="full_name" autocomplete="off" class="form-control col-md-10" />
                                </div>
                                <div class="col-md-3 m-t-10">
                                    <label>Sex:</label>
                                </div>
                                <div class="col-md-9 m-t-10">
                                    <div class="form-group" >
                                        <label class="radio-inline" style="color:#000 !important;margin-right: 15px;"><input type="radio" value="Male" name="gender" checked>Male</label>
                                        <label class="radio-inline" style="color:#000 !important;"><input type="radio" value="Female" name="gender">Female</label>
                                    </div>
                                </div>
                                <div class="col-md-3 m-t-10">
                                    <label>Username:</label>
                                </div>
                                <div class="col-md-9 m-t-10">
                                    <input type="text" name="username" autocomplete="off" class="form-control col-md-10" />
                                </div>
                                <div class="col-md-3 m-t-10">
                                    <label>Password:</label>
                                </div>
                                <div class="col-md-9 m-t-10">
                                    <input type="password" name="password" autocomplete="off" class="form-control col-md-10" />
                                </div>
                                <div class="col-md-3 m-t-10">
                                    <label>Re-Type Password:</label>
                                </div>
                                <div class="col-md-9 m-t-10">
                                    <input type="password" name="confirm_password" autocomplete="off" class="form-control col-md-10" />
                                </div>
                                <div class="col-md-3 m-t-10">
                                    <label>Contact:</label>
                                </div>
                                <div class="col-md-9 m-t-10">
                                    <input type="text" name="contact_no" autocomplete="off" class="form-control col-md-10" />
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
                                    <textarea class="form-control col-md-10" autocomplete="off" name="address" rows="2"></textarea>
                                </div>
                            </div>
                           
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6 p-r-0">
                                    <div class="ribbon-wrapper card">
                                        <div class="ribbon ribbon-info">Appointments</div>
                                        <?php $appointment_rights = explode(',',$other_rights['appointments']) ?>
                                        <p class="ribbon-content m-t-10">
                                            <?php foreach ($appointment_rights as $a): $right_name = explode('-',$a); ?>
                                                <?php if(($right_name[0]=='can_delete') || ($right_name[0]=='can_edit') || ($right_name[0]=='can_add') || ($right_name[0]=='view_wallet') || ($right_name[0]=='mark_status') || ($right_name[0]=='can_complete') || ($right_name[0]=='print') || ($right_name[0]=='parent')){ ?>
                                                    <label class="checkbox-inline m-l-10">
                                                        <input type="checkbox" name="user_rights[]" value="<?php echo $right_name[1]; ?>">
                                                        <?php
                                                            if($right_name[0]=='view_wallet'){
                                                                echo "View Wallet";
                                                            }elseif($right_name[0]=='mark_status'){
                                                                echo "Change Complete";
                                                            }elseif($right_name[0]=='can_add'){
                                                                echo "Add";
                                                            }elseif($right_name[0]=='can_edit'){
                                                                echo "Edit";
                                                            }elseif($right_name[0]=='can_delete'){
                                                                echo "Delete";
                                                            }
                                                            elseif($right_name[0]=='can_complete'){
                                                                echo "Mark Complete";
                                                            }
                                                            elseif($right_name[0]=='print'){
                                                                echo "Print";
                                                            }
                                                            elseif($right_name[0]=='parent'){
                                                                echo "Appointment";
                                                            }
                                                        ?>
                                                    </label>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-2 p-r-0 p-l-0">
                                    <div class="ribbon-wrapper card">
                                        <div class="ribbon ribbon-info">Uploads</div>
                                        <p class="ribbon-content m-t-10">
                                           <?php $uploads = explode('-',$other_rights['delete_uploads']) ?>
                                            <label class="checkbox-inline m-l-10">
                                              <input type="checkbox" name="user_rights[]" value="<?php echo $uploads[1]; ?>"> Delete
                                            </label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4 p-l-0">
                                    <div class="ribbon-wrapper card">
                                        <div class="ribbon ribbon-info">General</div>
                                        <p class="ribbon-content m-t-10">
                                            <label class="checkbox-inline m-l-10">
                                              <?php $setting_id = explode('-',$other_rights['setting']) ?>
                                              <input type="checkbox" name="user_rights[]" value="<?php echo $setting_id[1]; ?>"> Settings
                                            </label>
                                            <label class="checkbox-inline m-l-10">
                                                <?php $backup = explode('-',$other_rights['backup']) ?>
                                                <input type="checkbox" name="user_rights[]" value="<?php echo $backup[1]; ?>"> Backup
                                            </label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 p-r-0">
                                    <div class="ribbon-wrapper card">
                                        <div class="ribbon ribbon-info">Profile</div>
                                        <?php $appointment_rights = explode(',',$other_rights['profile']) ?>
                                        <p class="ribbon-content m-t-10">
                                            <?php foreach ($appointment_rights as $a): $right_name = explode('-',$a);?>
                                                <?php if(($right_name[0]=='delete_profile') || ($right_name[0]=='edit_profile') || ($right_name[0]=='create_new_profile') || ($right_name[0]=='parent')){ ?>
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
                                                        elseif($right_name[0]=='parent'){
                                                            echo "View";
                                                        }
                                                        ?>
                                                    </label>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 p-l-0">
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
                                
                                <div class="col-md-6 p-r-0">
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
                                <div class="col-md-6 p-l-0">
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
                                <div class="col-md-6 p-r-0">
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
                                <div class="col-md-6 p-l-0">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info" id="register_new_user">Save</button>
        </div>
    </form>
</div>
