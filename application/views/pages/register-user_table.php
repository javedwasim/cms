<div class="user_table_content">
  <table class="table-bordered" cellspacing="0" id="permissions-table" width="100%" >
    <thead>
    <tr style="height: 200px;">
        <th class="verticalTableHeader"><p>Delete</p></th>
        <th class="verticalTableHeader"><p>Edit</p></th>
        <th class="verticalTableHeader"><p>Name</p></th>
        <th class="verticalTableHeader"><p>Username</p></th>
        <th class="verticalTableHeader"><p>Appointments</p></th>
        <th class="verticalTableHeader"><p>Printing</p></th>
        <th class="verticalTableHeader"><p>Profile View</p></th>
        <th class="verticalTableHeader"><p>Profile Add</p></th>
        <th class="verticalTableHeader"><p>Profile Edit</p></th>
        <th class="verticalTableHeader"><p>Profile Delete</p></th>
        <th class="verticalTableHeader"><p>Examination Edit</p></th>
        <th class="verticalTableHeader"><p>Examination New</p></th>
        <th class="verticalTableHeader"><p>Delete Uploads</p></th>
        <th class="verticalTableHeader"><p>Echo Add</p></th>
        <th class="verticalTableHeader"><p>Echo edit</p></th>
        <th class="verticalTableHeader"><p>Echo delete</p></th>
        <th class="verticalTableHeader"><p>ETT Add</p></th>
        <th class="verticalTableHeader"><p>ETT Edit</p></th>
        <th class="verticalTableHeader"><p>ETT Delete</p></th>
        <th class="verticalTableHeader"><p>Lab Test Add</p></th>
        <th class="verticalTableHeader"><p>Lab Test Edit</p></th>
        <th class="verticalTableHeader"><p>Lab Test Delete</p></th>
        <th class="verticalTableHeader"><p>Special Inst. Add</p></th>
        <th class="verticalTableHeader"><p>Special Inst. Edit</p></th>
        <th class="verticalTableHeader"><p>Special Inst. Delete</p></th>
        <th class="verticalTableHeader"><p>Settings</p></th>
        <th class="verticalTableHeader"><p>Backup</p></th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($users  as $user): $user_rights = explode(',',$user['user_rights']); // echo "<pre>"; print_r($user) ?>
        <tr style="text-align: center;">
            <td><a class="btn btn-xs btn-danger" onClick="deleteuser(this,'<?php echo $user['other_rights_group_id']; ?>','<?php echo $user['username']; ?>');" href="javascript:void(0)" ><i class="fa fa-trash"></i></a></td>
            <td><a class="btn btn-xs btn-primary edit_user"><i class="fa fa-edit"></i></a></td>
            <td><?php echo $user['full_name']; ?></td>
            <td class="username" ><?php echo $user['username']; ?></td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-5'; ?>" class="user_permission"
                       name="appointment" <?php echo in_array("appointments-parent-1", $user_rights)?'checked':''; ?>></td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-8'; ?>" class="user_permission"
                       name="appointment_printing" <?php echo in_array("appointments-print-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-1'; ?>" class="user_permission"
                       name="profile_view" <?php echo in_array("profile-parent-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-2'; ?>" class="user_permission"
                       name="profile_add" <?php echo in_array("profile-create_new_profile-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-3'; ?>" class="user_permission"
                       name="profile_edit" <?php echo in_array("profile-edit_profile-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-4'; ?>" class="user_permission"
                       name="profile_delete" <?php echo in_array("profile-delete_profile-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-18'; ?>" class="user_permission"
                       name="examination_edit" <?php echo in_array("examinations-can_edit-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-17'; ?>" class="user_permission"
                       name="examination_add" <?php echo in_array("examinations-can_add-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-37'; ?>" class="user_permission"
                       name="delete_uploads" <?php echo in_array("delete_uploads-parent-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-21'; ?>" class="user_permission"
                       name="echo_add" <?php echo in_array("echos-can_add-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-22'; ?>" class="user_permission"
                       name="echo_edit" <?php echo in_array("echos-can_edit-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-23'; ?>" class="user_permission"
                       name="echo_delete" <?php echo in_array("echos-can_delete-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-25'; ?>" class="user_permission"
                       name="ett_add" <?php echo in_array("ett-can_add-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-26'; ?>" class="user_permission"
                       name="ett_edit" <?php echo in_array("ett-can_edit-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-27'; ?>" class="user_permission"
                       name="ett_delete" <?php echo in_array("ett-can_delete-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-29'; ?>" class="user_permission"
                       name="lab_test_add" <?php echo in_array("lab_tests-can_add-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-30'; ?>" class="user_permission"
                       name="lab_test_edit" <?php echo in_array("lab_tests-can_edit-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-31'; ?>" class="user_permission"
                       name="lab_test_delete" <?php echo in_array("lab_tests-can_delete-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-33'; ?>" class="user_permission"
                       name="special_inst_add" <?php echo in_array("special_instructions-can_add-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-34'; ?>" class="user_permission"
                       name="special_inst_edit" <?php echo in_array("special_instructions-can_edit-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-35'; ?>" class="user_permission"
                       name="special_inst_delete" <?php echo in_array("special_instructions-can_delete-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-36'; ?>" class="user_permission"
                       name="setting" <?php echo in_array("setting-menu-1", $user_rights)?'checked':''; ?>> </td>
            <td><input type="checkbox" value="<?php echo $user['other_rights_group_id'].'-38'; ?>" class="user_permission"
                       name="backup" <?php echo in_array("backup-parent-1", $user_rights)?'checked':''; ?>> </td>

        </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>