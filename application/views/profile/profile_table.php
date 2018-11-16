<?php
    if(isset($rights[0]['user_rights'])){//print_r($rights[0]['rights']);
        $permissions = explode(',',$rights[0]['user_rights']);
    }else{
        $permissions = array();
    }
    $user_info = ($this->session->userdata('user_data_logged_in'));
?>
<div class="profile-table">
    <table class="table table-bordered profiletable" cellspacing="0" id="profiletable" width="100%" >
       <thead>
            <tr>
                <th style="width: 20px" class="<?php echo in_array("profile-delete_profile-0", $permissions)?"op-hide":''; ?>">Delete</th>
                <th style="width: 20px" class="<?php echo in_array("profile-edit_profile-0", $permissions)?"op-hide":''; ?>">Edit</th>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Father/Husband Name</th>
                <th>Contact</th>
                <th>Profession</th>
                <th>District</th>
                <th>Last Visit</th>
                <th>Registered Since</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($profiles as $key){ ?>
            <tr id="patid<?php echo $key['id']; ?>">
                <td style="width: 20px" class="<?php echo in_array("profile-delete_profile-0", $permissions)?"op-hide":''; ?>">
                    <button class="btn btn-danger btn-xs" id="delete_profile">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
                <td style="width: 20px" class="<?php echo in_array("profile-edit_profile-0", $permissions)?"op-hide":''; ?>">
                    <button class="btn btn-info btn-xs" id="profile_modal_edit">
                        <i class="fa fa-edit"></i>
                    </button>
                </td>
                <td class="profile_id">
                    <?php echo $key['id']; ?>
                </td>
                <td style="text-transform: capitalize;"><?php echo $key['pat_name']; ?></td>
                <td style="text-transform: capitalize;"><?php echo $key['pat_relative']; ?></td>
                <td><?php echo $key['pat_contact']; ?></td>
                <td style="text-transform: capitalize;"><?php echo $key['pat_profession']; ?></td>
                <td><?php echo $key['pat_district']; ?></td>
                <?php $datetime = date(' d-m-Y h:i a', strtotime($key['creation_date'])); ?>
                <td><?php echo $datetime; ?></td>
                <td><?php echo $datetime; ?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
    