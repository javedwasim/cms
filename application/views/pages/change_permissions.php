<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card">
    			<div class="card-header">
    				User Permissions
    			</div>
    			<div class="card-body">
    				<table class="table table-bordered nowrap responsive" cellspacing="0" id="permissions-table" width="100%" >
                       <thead>
                        <tr>

                            <th>Name</th>
                            <th>Username</th>
                            <th>Appointments</th>
                            <th>Appointments Printing</th>
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
                            <th>Update</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users  as $user): $user_rights = explode(',',$user['user_rights']); //echo "<pre>"; print_r($user) ?>
                            <tr>

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
                                <td><button class="btn btn-xs btn-default">Update</button></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
    			</div>
    		</div>
        </div>
    </div>
</div>
    <!-- row -->