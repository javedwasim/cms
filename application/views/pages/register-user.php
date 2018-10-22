<div class="dashboard-content">
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
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
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
                                    <div class="col-md-2 p-r-0">
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-info">Uploads</div>
                                            <p class="ribbon-content m-t-10">
                                                <label class="checkbox-inline m-l-10">
                                                  <input type="checkbox" value=""> Delete
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
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
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
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
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-default btn-block" id="register_new_user">Save</button>
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
                <div class="card-body" style="width:100%;" id="user_table_content">
                    
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Modal -->
<div class="modal fade" id="useredit" role="dialog">
    <div class="modal-dialog" id="user_moda_contnt">
          <!-- Modal content-->
        
    </div>
</div>